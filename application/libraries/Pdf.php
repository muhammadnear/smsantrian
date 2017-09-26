<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
  
class Pdf extends TCPDF
{
	 function __construct()
	 {
		 parent::__construct();
	 }
	 public function Header() {
	        // Logo
	        $image_file = K_PATH_IMAGES.'../../../../../img/pengayoman.jpg';
	        $this->Image($image_file, 20, 13, 25, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
	        // Set font
	        $this->SetFont('helvetica', 'B', 11);
	        // Title
	        $this->Cell(0, 15, 'KEMENTRIAN HUKUM DAN HAK ASASI MANUSIA REPUBLIK INDONESIA', 0, false, 'C', 0, '', 0, false, 'M', 'M');

	        $this ->SetY(18);
	        $this->SetFont('helvetica', 'B', 10);
	        // Title
	        $this->Cell(0, 15, '                    KANTOR WILAYAH SURABAYA', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	        $this ->SetY(24);
	        $this->SetFont('helvetica', 'B', 13);
	        // Title
	        $this->Cell(0, 15, '                KANTOR IMIGRASI KELAS I KHUSUS SURABAYA', 0, false, 'C', 0, '', 0, false, 'M', 'M');


	        $this->SetFont('helvetica', '', 12);
	        $this->SetY(23);
	        // Title
	        $this->Cell(0, 15, '             Jl. Letjen S Parman 58 A, Waru, Sidoarjo', 0, false, 'C', 0, '', 0, false, 'T', 'M');

	        $this->SetFont('helvetica', '', 11);
	        $this->SetY(29);
	        // Title
	        $this->Cell(0, 15, '             Nomor Telepon : (031) 8531785', 0, false, 'C', 0, '', 0, false, 'T', 'M');
	    }

	    // Page footer
	    public function Footer() {
	        // Position at 15 mm from bottom
	        $this->SetY(-15);
	        // Set font
	        $this->SetFont('helvetica', 'I', 8);
	        // Page number
	        $this->Cell(0, 10, 'Halaman  '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	    }
}

/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */?>