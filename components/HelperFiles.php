<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\models\Tips;
use app\components\Misc;
use app\components\HelperSettings as HSettings;

class HelperFiles extends Component 
{
    public static function downloadXml($query)
    {
        $Result = "<?xml version='1.0' encoding='utf-8'?>\n";
        $Result .= " <vatreport>\n";
        if($query != '') {
            foreach($query as $row) {
                $Result .= " <vatentry>\n";
                if($row['is_cancel'] == 1 && $row['cancel_against_inv'] != 0) {
                    $row['invoice_no'] = 'Sales Return Invoice '.$row['cancel_against_inv'];
                }

                foreach($row as $key => $value) {
                    if($key != 'is_cancel' && $key != 'cancel_against_inv' && $key != 'cancel_no') {
                        $Result .=  "  <$key>$value</$key>\n";
                    }
                    if($key == 'total') {
                        $Result .=  "  <tax_exempt_sales>0</tax_exempt_sales>\n";
                        $Result .=  "  <zero_rated_sales>0</zero_rated_sales>\n";
                    }
                }
                $Result .= " </vatentry>\n";
            }
        }
        $Result .= " </vatreport>\n";

        $xml_file = Yii::getAlias("@webroot/assets/xml/vatreport.xml");
        $fp = fopen($xml_file, 'w');
        fwrite($fp, $Result);
        fclose($fp);
        $fileName = basename($xml_file);
        $xml_path = Yii::$app->params['upload_load_path']['xml'];
        return $xml_path.$fileName;
    }

    public static function downloadTxt($query,$from,$to,$other)
    {  
        $settings = HSettings::getBasic("'name-in-bill','vat-no-in-bill'");
        $company_name = ($settings['name-in-bill'] != null) ? $settings['name-in-bill'] : 'Company Name';
        $vat_no = ($settings['vat-no-in-bill'] != null) ? $settings['vat-no-in-bill'] : 0;
        $Text = '';
        $Text =  $company_name. PHP_EOL;
        $Text .= "VAT NO".$vat_no. PHP_EOL;
        $Text .= "LEDGER JOURNAL" . PHP_EOL;
        if($from != null && $to != null){
            $Text .= "FROM:".$from."\tTo:".$to. PHP_EOL; 
        } 
        else{
            $Text .= "Date:".$other. PHP_EOL;
        }
        $Text .=  "Date, ";
        $Text .=  "Invoice No, ";
        $Text .=  "Customer Name, ";
        $Text .=  "Customer Pan, ";
        $Text .=  "Total, ";
        $Text .=  "Tax Exempt Sales, ";
        $Text .=  "Zero Rated Sales, ";
        $Text .=  "Taxable Amount, ";
        $Text .=  "Vat Amount";
        $Text .= PHP_EOL;
        if ($query != null) {
            foreach($query as $row) {
                if($row['is_cancel'] == 1 && $row['cancel_against_inv'] != 0) {
                    $row['invoice_no'] = 'Sales Return Invoice '.$row['cancel_against_inv'];
                }
                foreach($row as $key => $value) {
                    if($key != 'is_cancel' && $key != 'cancel_against_inv' && $key != 'cancel_no') {
                        if($key == 'total') {
                            $Text .=  "0, ";
                            $Text .=  "0, ";
                        }
                        elseif($key == 'vat_amount') {
                            $Text .=  "$value";
                        }
                        else {
                            $Text .=  "$value, ";
                        }
                    }
                }
                $Text .= PHP_EOL;
            }
        }

        $txt_file =  Yii::getAlias("@webroot/assets/text/vatreport.txt");
        $txt = fopen($txt_file, 'w');
        fwrite($txt, $Text);
        fclose($txt);
        $TextName = basename($txt_file);
        $text_path = Yii::$app->params['upload_load_path']['text'];
        return $text_path.$TextName;
    }  

    public static function downloadCSV($query,$from,$to,$other)
    {   
        $settings = HSettings::getBasic("'name-in-bill','vat-no-in-bill'");
        $company_name = ($settings['name-in-bill'] != null) ? $settings['name-in-bill'] : 'Company Name';
        $vat_no = ($settings['vat-no-in-bill'] != null) ? $settings['vat-no-in-bill'] : 0;
        $CSV = '';
        $CSV = $company_name. PHP_EOL;
        $CSV .= "VAT NO".$vat_no. PHP_EOL;
        $CSV .= "LEDGER JOURNAL" . PHP_EOL;
        if($from != null && $to != null){
            $CSV .= "FROM:".$from."\tTo:".$to. PHP_EOL; 
        } else {
            $CSV .= "Date:".$other. PHP_EOL;
        }
        $CSV .=  "Date, ";
        $CSV .=  "Invoice No, ";
        $CSV .=  "Customer Name, ";
        $CSV .=  "Customer Pan, ";
        $CSV .=  "Total, ";
        $CSV .=  "Tax Exempt Sales, ";
        $CSV .=  "Zero Rated Sales, ";
        $CSV .=  "Taxable Amount, ";
        $CSV .=  "Vat Amount";
        $CSV .= PHP_EOL;
        if ($query != null) {
            foreach( $query as $value ){
                if($value['is_cancel'] == 1 && $value['cancel_against_inv'] != 0) {
                    $value['invoice_no'] = 'Sales Return Invoice '.$value['cancel_against_inv'];
                }
                foreach( $value as $key => $string){
                    if($key != 'is_cancel' && $key != 'cancel_against_inv' && $key != 'cancel_no') {
                        if($key == 'total') {
                            $CSV .=  '"' . $string . '"' . ",\t";
                            $CSV .=  '"0"' . ",\t";
                            $CSV .=  '"0"' . ",\t";
                        }
                        else {
                            $CSV .=  '"' . $string . '"' . ",\t";
                        }
                    }
                }  
                $CSV .= PHP_EOL;                                       
            }
        }
        $csv_file =  Yii::getAlias("@webroot/assets/csv/vatreport.csv");
        $txt = fopen($csv_file, 'w');
        fwrite($txt, $CSV);
        fclose($txt);
        $CSVName = basename($csv_file);
        $text_path = Yii::$app->params['upload_load_path']['csv'];
        return $text_path.$CSVName;
    }

    public static function downloadPurchaseLedgerXml($query)
    {
        $Result = "<?xml version='1.0' encoding='utf-8'?>\n";
        $Result .= " <purchaseledger>\n";
        
        $Result .= " </purchaseledger>\n";

        $xml_file = Yii::getAlias("@webroot/assets/xml/purchaseledger.xml");
        $fp = fopen($xml_file, 'w');
        fwrite($fp, $Result);
        fclose($fp);
        $fileName = basename($xml_file);
        $xml_path = Yii::$app->params['upload_load_path']['xml'];
        return $xml_path.$fileName;
    }

    public static function downloadPurchaseLedgerTxt($query,$from,$to,$other)
    {  
        $settings = HSettings::getBasic("'name-in-bill','vat-no-in-bill'");
        $company_name = ($settings['name-in-bill'] != null) ? $settings['name-in-bill'] : 'Company Name';
        $vat_no = ($settings['vat-no-in-bill'] != null) ? $settings['vat-no-in-bill'] : 0;
        $Text = '';
        $Text =  $company_name. PHP_EOL;
        $Text .= "VAT NO".$vat_no. PHP_EOL;
        $Text .= "LEDGER JOURNAL" . PHP_EOL;
        if($from != null && $to != null){
            $Text .= "FROM:".$from."\tTo:".$to. PHP_EOL; 
        } 
        else{
            $Text .= "Date:".$other. PHP_EOL;
        }
        $Text .=  "Date, ";
        $Text .=  "Invoice No, ";
        $Text .=  "Supplier Name, ";
        $Text .=  "Supplier Vat/Pan No., ";
        $Text .=  "Total Amount, ";
        $Text .=  "Tax Exempt Purchase, ";
        $Text .=  "Taxable Purchase Amount, ";
        $Text .=  "Taxable Purchase Tax Amount, ";
        $Text .=  "Taxable Import Amount";
        $Text .=  "Taxable Import Tax Amount";
        $Text .=  "Taxable Capital Purchase/Import Amount";
        $Text .=  "Taxable Capital Purchase/Import Tax Amount";
        $Text .= PHP_EOL;

        $txt_file =  Yii::getAlias("@webroot/assets/text/purchaseledger.txt");
        $txt = fopen($txt_file, 'w');
        fwrite($txt, $Text);
        fclose($txt);
        $TextName = basename($txt_file);
        $text_path = Yii::$app->params['upload_load_path']['text'];
        return $text_path.$TextName;
    }  

    public static function downloadPurchaseLedgerCSV($query,$from,$to,$other)
    {   
        $settings = HSettings::getBasic("'name-in-bill','vat-no-in-bill'");
        $company_name = ($settings['name-in-bill'] != null) ? $settings['name-in-bill'] : 'Company Name';
        $vat_no = ($settings['vat-no-in-bill'] != null) ? $settings['vat-no-in-bill'] : 0;
        $CSV = '';
        $CSV = $company_name. PHP_EOL;
        $CSV .= "VAT NO".$vat_no. PHP_EOL;
        $CSV .= "LEDGER JOURNAL" . PHP_EOL;
        if($from != null && $to != null){
            $CSV .= "FROM:".$from."\tTo:".$to. PHP_EOL; 
        } else {
            $CSV .= "Date:".$other. PHP_EOL;
        }
        $CSV .=  "Date, ";
        $CSV .=  "Invoice No, ";
        $CSV .=  "Supplier Name, ";
        $CSV .=  "Supplier Vat/Pan No., ";
        $CSV .=  "Total Amount, ";
        $CSV .=  "Tax Exempt Purchase, ";
        $CSV .=  "Taxable Purchase Amount, ";
        $CSV .=  "Taxable Purchase Tax Amount, ";
        $CSV .=  "Taxable Import Amount";
        $CSV .=  "Taxable Import Tax Amount";
        $CSV .=  "Taxable Capital Purchase/Import Amount";
        $CSV .=  "Taxable Capital Purchase/Import Tax Amount";
        $CSV .= PHP_EOL;

        $csv_file =  Yii::getAlias("@webroot/assets/csv/purchaseledger.csv");
        $txt = fopen($csv_file, 'w');
        fwrite($txt, $CSV);
        fclose($txt);
        $CSVName = basename($csv_file);
        $text_path = Yii::$app->params['upload_load_path']['csv'];
        return $text_path.$CSVName;
    }
}