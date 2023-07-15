<?php
/**
 * @abstract This Component Class is created to access TCPDF plugin for generating reports.
 * @example You can refer http://www.tcpdf.org/examples/example_011.phps for more details for this example.
 * @todo you can extend tcpdf class method according to your need here. You can refer http://www.tcpdf.org/examples.php section for 
 *       More working examples.
 * @version 1.0.0
 */
/*

I: send the file inline to the browser (default).
D: send to the browser and force a file download with the name given by name.
F: save to a local server file with the name given by name.
S: return the document as a string (name is ignored).
FI: equivalent to F + I option
FD: equivalent to F + D option
E: return the document as base64 mime multi-part email attachment (RFC 2045)

*/

namespace app\components;

use Yii;
use yii\base\Component;

$path = Yii::getAlias("@vendor/tcpdf/tcpdf.php");
require_once($path);
use TCPDF;

class Pdf extends TCPDF {
 
    // Load table data from file
    public function LoadData($file) 
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach($lines as $line) {
            $data[] = explode(';', chop($line));
        }
        return $data;
    }
 
    // Colored table
    public function ColoredTable($header,$data) 
    {
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(40, 35, 40, 45);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach($data as $row) {
            $this->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, number_format($row[2]), 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, number_format($row[3]), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }

    public static function create_report($title, $html, $mode='F')
    {   
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->SetCreator(PDF_CREATOR);  

        $pdf->SetTitle($title);                
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->SetFont('helvetica', '', 8);
        $pdf->SetTextColor(80,80,80);
        $pdf->AddPage();  
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->lastPage();

        $file = 'truffle-report.pdf';
        
        if (in_array($mode, ['F', 'FI', 'FD'])) {
            $path = Yii::$app->params['upload_path']['reports'];
            $pdf->Output($path.$file, $mode); 
        }
        else {
            $pdf->Output($file, $mode); 
        }
        
        return $file;
        // Yii::$app->end();
    }

    public static function create($title, $html, $mode='F')
    {   
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->SetCreator(PDF_CREATOR);  

        $pdf->SetTitle($title);                
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->SetFont('helvetica', '', 8);
        $pdf->SetTextColor(80,80,80);
        $pdf->AddPage();  
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->lastPage();

        $file = 'export-'.time().'.pdf';
        
        if (in_array($mode, ['F', 'FI', 'FD'])) {
            $path = Yii::$app->params['upload_path']['pdf'];
            $pdf->Output($path.$file, $mode); 
        }
        else {
            $pdf->Output($file, $mode); 
        }
        
        return $file;
    }
}