<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/

class Pdf_m extends CI_Controller {
  
    function __construct()
    {
        parent::__construct();
        $this->load->library("Pdf");
    }
    
    public function create_pdf_t()
    {
        echo var_dump($_POST);
    }
    public function create_pdf() {

    // create new PDF document
    $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Kantor Imigrasi Kelas I Khusus Surabaya');
    $pdf->SetTitle('Laporan Kotak Masuk');
    $pdf->SetSubject('Laporan SMS');
    

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    //$pdf->setPrintHeader(true);

    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set font
    $pdf->SetFont('times', 'B', 14);

    // add a page
    $pdf->AddPage();

    // set some text to print
    /*$txt = <<<EOD
    TCPDF Example 003

    Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
EOD;
*/  
    $pdf->SetY(45);
    $txt = <<<EOD
    Laporan Kotak Masuk per tanggal
EOD;
    $txt = $txt." ".date('d-m-Y');
    // print a block of text using Write()
    $pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);  
    
$pdf->SetFont('times', '', 14);

$a = '';
for($i=0; $i<$_POST['datatable_tabletools_length']; $i++)
{
    $j = $i+1;
    $a = $a.'
    <tr>
        <td width="40" align="center" style="font-size: 12px;">'.$j.'</td>
        <td width="140" align="center" style="font-size: 12px;">'.$_POST['SenderNumber'][$i].'</td>
        <td width="270" style="font-size: 12px;">'.$_POST['Text'][$i].'</td>
         <td width="100" align="center" style="font-size: 12px;">'.$_POST['ReceivingDateTime'][$i].'</td>
        <td width="80" align="center" style="font-size: 12px;">'.$_POST['Klasifikasi'][$i].'</td>
    </tr>
    ';    
}

    $tbl = <<<EOD
<br/><br/><table border="1" cellpadding="2" cellspacing="2">
<thead>
 <tr style="background-color:#4876FF;color:#F0FFFF;">
  <td width="40" align="center" style="font-size: 15px;"><b>No</b></td>
  <td width="140" align="center" style="font-size: 15px;"><b>No HP</b></td>
  <td width="270" align="center" style="font-size: 15px;"><b>Isi Pesan</b></td>
  <td width="100" align="center" style="font-size: 15px;"><b>Tgl Masuk</b></td>
  <td width="80" align="center" style="font-size: 15px;"> <b>Klasifikasi</b></td>
 </tr>
</thead>
<tbody>
    {$a}    
</tbody>
</table>
EOD;

    $pdf->writeHTML($tbl, true, false, false, false, '');

    /*for($i=0; $i<$_POST['datatable_tabletools_length']; $i++)
    {
        if(empty($klasifikasi))
        {
            $klasifikasi[$i][0] = $_POST['Klasifikasi'][$i];
            $klasifikasi[$i][1] = 1;   
        }
        else if(in_array($_POST['Klasifikasi'][$i], $klasifikasi[$i][0]))
        {
            $klasifikasi[$i][1]++;
            continue;
        }
        else
        {
            array_push($klasifikasi[$i][0], $_POST['Klasifikasi'][$i]);
            $klasifikasi[$i][1] = 1;
        }
    }*/
    //echo var_dump($klasifikasi);
    // ---------------------------------------------------------

    //Close and output PDF document
    $pdf->Output('Laporan_Kotak_Masuk.pdf');

    //============================================================+
    // END OF FILE
    //============================================================+
    }
}
  
/* End of file c_test.php */
/* Location: ./application/controllers/c_test.php */