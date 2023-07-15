<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;

use app\components\Query;
use app\components\Pdf;
use app\components\HelperSettings as HSettings;


class GeneratePdfController extends Controller {

    public $to_group = array('admin', 'staff','floor_supervisor');

    public function behaviors() 
    {
        return [];
    }

    public function actions() 
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function beforeAction($action) 
    {
        if ($action->id == 'error')
            $this->layout = 'error';
        
        $group[] = Yii::$app->params['user_role']['superadmin'];
        if (isset($this->to_group)) {
            foreach($this->to_group as $to):
                $group[] = Yii::$app->params['user_role'][$to];
            endforeach;
        }

        if (Yii::$app->user->isGuest || !in_array(Yii::$app->session['eHhupx5UpkLZoXRP_cR1ozEVjY14zWOC0_user']->role, $group)) {
            throw new HttpException(404, 'Page not found.');
        }
        
        return parent::beforeAction($action);
    }

    public function actionVatReport() 
    {   
        $condition = ''; $from = ''; $to = ''; $other = '';
        if (isset($_GET['from']) && $_GET['from'] != '') {
            $condition .= " WHERE DATE(o.created_on) >= '".$_GET['from']."'";
            $from = $_GET['from'];
            if (isset($_GET['to']) && $_GET['to'] != '') {
                $condition .= " AND DATE(o.created_on) <= '".$_GET['to']."'";
                $to = $_GET['to'];
            }
        }
        else if ((!isset($_GET['from']) || $_GET['from'] != '') && isset($_GET['to']) && $_GET['to'] != '') {
            $condition .= " WHERE DATE(o.created_on) <= '".$_GET['to']."'";
        }
        else if (isset($_GET['by'])) {
            if ($_GET['by'] == 'month') {
                $condition .= " WHERE YEAR(o.created_on) = '".date('Y')."' AND MONTH(o.created_on) = '".date('m')."'";
                $other = date('Y-m');
            }
            else if ($_GET['by'] == 'today') {
                $condition .= " WHERE DATE(o.created_on) = '".date('Y-m-d')."'";
                $other = date('Y-m-d');
            }
            else if ($_GET['by'] == 'year') {
                $condition .= " WHERE YEAR(o.created_on) = '".date('Y')."'";
                $other = date('Y');
            }
        } 

        $settings = HSettings::getBasic("'name-in-bill', 'vat-no-in-bill'");

        $data = Query::queryAll("SELECT o.created_on,o.invoice_no,o.customer_name,o.customer_pan, o.taxable_amount,o.total,o.vat_rate,o.vat_amount, o.is_cancel, o.cancel_against_inv, o.cancel_no
                                FROM `order` AS o
                                $condition ORDER BY created_on ASC"); 

        $html = '<html lang="en-US"><head><title></title></head>'.
                '<body style="font-family: arial, sans-serif;">'.
                    '<div style="text-align: center;color: #674933;">'.
                        '<h3>'.$settings['name-in-bill'].'</h3>'.
                        '<p>VAT No: '.$settings['vat-no-in-bill'].'</p>'.
                        (($from == '' && $to == '') ? '<p><span>Date: '.$other.'</span></p>' : '<p><span>From: '.$from.' &nbsp;&nbsp;&nbsp; To: '.$to.'</span></p>').
                    '</div>'.
                    '<div style="margin-top: 3%; text-align: center; color: #674933;">'.
                        '<h3>VAT - Sales (Ledger)</h3>'.
                    '</div>'.
                    '<table style="border: none;border-collapse: collapse; font-size: 8px; margin: 0 auto;" cellpadding="5">'.
                        '<thead>'.
                            '<tr style="background-color: #5f3417;color: #fff;border-bottom: 4px solid white;letter-spacing: 1px;">'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Date</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Invoice No.</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Customer Name</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Customer VAT / PAN No.</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Total Amount</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Tax Exempt Sales</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Zero Rated Sales</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Taxable Amount</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">VAT Amount</th>'.
                            '</tr>'.
                        '</thead>'.
                        '<tbody>';

                        $total = 0;
                        $total_vat = 0;
                        $taxable_amount = 0;

                        if($data != '') {
                            foreach($data as $row):

                                if($row['cancel_against_inv'] == 0) {
                                    $total += $row['total'];
                                    $taxable_amount += $row['taxable_amount'];
                                    $total_vat += $row['vat_amount'];
                                }elseif($row['is_cancel'] == 1 && $row['cancel_against_inv'] != 0) {
                                    $total -= $row['total'];
                                    $taxable_amount -= $row['taxable_amount'];
                                    $total_vat -= $row['vat_amount'];
                                }

                                $html .= '<tr style="border-bottom: 2px solid #5f3417;color: #3f4245;">'.
                                    '<td style="padding: 20px;">'.$row['created_on'].'</td>'.
                                    '<td style="padding: 20px;">';
                                        if($row['cancel_no'] == 0) {
                                            $html .= $row['invoice_no'];
                                        }else {
                                            $html .= 'Sales Return invoice '.$row['cancel_against_inv'];
                                        }
                                $html .='</td>'.
                                    '<td style="padding: 20px;">'.$row['customer_name'].'</td>'.
                                    '<td style="padding: 20px;">'.$row['customer_pan'].'</td>'.
                                    '<td style="padding: 20px;">';
                                        if($row['is_cancel'] == 1) {
                                            $html .= '-'.$row['total'];
                                        }else {
                                            $html .= $row['total'];
                                        }
                                $html .='</td>'.
                                    '<td style="padding: 20px;">0</td>'.
                                    '<td style="padding: 20px;">0</td>'.
                                    '<td style="padding: 20px;">';
                                        if($row['is_cancel'] == 1) {
                                            $html .= '-'.$row['taxable_amount'];
                                        }else {
                                            $html .= $row['taxable_amount'];
                                        }
                                $html .='</td>'.
                                    '<td style="padding: 20px;">';
                                        if($row['is_cancel'] == 1) {
                                            $html .= '-'.$row['vat_amount'];
                                        }else {
                                            $html .= $row['vat_amount'];
                                        }
                                $html .='</td>'.
                                '</tr>';

                            endforeach;
                        }
                        
                $html .= '</tbody>'.
                        '<tfoot>'.
                            '<tr style="background-color: #5f3417;color: #fff;border-bottom: 4px solid white;letter-spacing: 1px;">'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;"></td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;"></td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;"></td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Total Amount</td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Rs. '.number_format($total, 2, '.', ',').'</td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Rs. 0</td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Rs. 0</td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Rs. '.number_format($taxable_amount, 2, '.', ',').'</td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Rs. '.number_format($total_vat, 2, '.', ',').'</td>'.
                            '</tr>'.
                        '</tfoot>'.
                    '</table>'.
                '</body></html>';

        PDF::create('VAT - Sales (Ledger)', $html, 'D');

        return true;
    }

    public function actionPurchaseLedger() 
    {   
        $condition = ''; $from = ''; $to = ''; $other = '';
        if (isset($_GET['from']) && $_GET['from'] != '') {
            $condition .= " WHERE DATE(o.created_on) >= '".$_GET['from']."'";
            $from = $_GET['from'];
            if (isset($_GET['to']) && $_GET['to'] != '') {
                $condition .= " AND DATE(o.created_on) <= '".$_GET['to']."'";
                $to = $_GET['to'];
            }
        }
        else if ((!isset($_GET['from']) || $_GET['from'] != '') && isset($_GET['to']) && $_GET['to'] != '') {
            $condition .= " WHERE DATE(o.created_on) <= '".$_GET['to']."'";
        }
        else if (isset($_GET['by'])) {
            if ($_GET['by'] == 'month') {
                $condition .= " WHERE YEAR(o.created_on) = '".date('Y')."' AND MONTH(o.created_on) = '".date('m')."'";
                $other = date('Y-m');
            }
            else if ($_GET['by'] == 'today') {
                $condition .= " WHERE DATE(o.created_on) = '".date('Y-m-d')."'";
                $other = date('Y-m-d');
            }
            else if ($_GET['by'] == 'year') {
                $condition .= " WHERE YEAR(o.created_on) = '".date('Y')."'";
                $other = date('Y');
            }
        } 

        $settings = HSettings::getBasic("'name-in-bill', 'vat-no-in-bill'");

        $data = ''; 

        $html = '<html lang="en-US"><head><title></title></head>'.
                '<body style="font-family: arial, sans-serif;">'.
                    '<div style="text-align: center;color: #674933;">'.
                        '<h3>'.$settings['name-in-bill'].'</h3>'.
                        '<p>VAT No: '.$settings['vat-no-in-bill'].'</p>'.
                        (($from == '' && $to == '') ? '<p><span>Date: '.$other.'</span></p>' : '<p><span>From: '.$from.' &nbsp;&nbsp;&nbsp; To: '.$to.'</span></p>').
                    '</div>'.
                    '<div style="margin-top: 3%; text-align: center; color: #674933;">'.
                        '<h3>Purchase Ledger</h3>'.
                    '</div>'.
                    '<table style="border: none;border-collapse: collapse; font-size: 8px; margin: 0 auto;" cellpadding="5">'.
                        '<thead>'.
                            '<tr style="background-color: #5f3417;color: #fff;border-bottom: 4px solid white;letter-spacing: 1px;">'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Date</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Invoice No.</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Supplier Name</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Supplier VAT / PAN No.</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Total Amount</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Tax Exempt Purchase</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Taxable Purchase Amount</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Taxable Purchase Tax Amount</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Taxable Import Amount</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Taxable Import Tax Amount</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Taxable Capital Purchase/Import Amount</th>'.
                                '<th style="padding: 20px;text-transform: uppercase;font-weight: 500;text-align: left;">Taxable Capital Purchase/Import Tax Amount</th>'.
                            '</tr>'.
                        '</thead>'.
                        '<tbody>';

                        $total = 0;
                        $total_vat = 0;
                        $taxable_amount = 0;
                        
                $html .= '</tbody>'.
                        '<tfoot>'.
                            '<tr style="background-color: #5f3417;color: #fff;border-bottom: 4px solid white;letter-spacing: 1px;">'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;"></td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;"></td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;"></td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Total Amount</td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Rs. 0</td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Rs. 0</td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Rs. 0</td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Rs. 0</td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Rs. 0</td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Rs. 0</td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Rs. 0</td>'.
                                '<td style="padding: 20px;text-transform: uppercase;font-weight: 500;">Rs. 0</td>'.
                            '</tr>'.
                        '</tfoot>'.
                    '</table>'.
                '</body></html>';

        PDF::create('Purchase Ledger', $html, 'D');

        return true;
    }
}