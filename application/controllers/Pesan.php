<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesan extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Messages');
	}
	
	public function notif()
	{
		header("Access-Control-Allow-Origin: *");
		$masuk = $this->Messages->Get_AllKotakMasuk();

		$unread = 0;
		foreach ($masuk as $key) 
		{
			if(!$key->status_baca)
				$unread++;
		}
		echo $unread;
	}

	public function Graph()
	{
		$masuk = $this->Messages->Get_KotakMasuk(date("Y"));

		for ($i=1; $i<=12 ; $i++) 
		{
			$count = 0;		
			foreach ($masuk as $key) 
			{
				$a = $key->ReceivingDateTime[5].$key->ReceivingDateTime[6];
				$number = intval($a);
				if($i==$number)
					$count++;
			}
			if($i==1)
				echo $count;
			else
				echo ", ".$count;
		}
	}

	public function tulis()
	{
		/*
		$masuk = $this->Messages->Get_AllKotakMasuk();
		$keluar = $this->Messages->Get_AllSent();

		$output = array();
		foreach ($masuk as $key) 
		{
			array_push($output, $key->SenderNumber);
		}
		foreach ($keluar as $key) 
		{
			array_push($output, $key->DestinationNumber);
		}

		$kirim['output'] = array_unique($output);
		*/
		$this->load->view("header");
		$this->load->view('tulis_pesan');
		$this->load->view("footer");
	}

	public function sent()
	{
		$kirim['keluar'] = $this->Messages->Get_AllSent();
		$this->load->view("header");
		$this->load->view('pesan_terkirim',$kirim);
		$this->load->view("footer");
	}

	public function tulis_multiple()
	{
		$this->load->view("header");
		$this->load->view('tulis_pesan_multiple');
		$this->load->view("footer");
	}

	public function submitmultiple()
	{
		$no_hp = explode(",",$_POST['no_hp']);
		$kirim['count_sukses'] = 0;
		$kirim['count_gagal'] = 0;
		$kirim['kegagalan'] = array();
		foreach ($no_hp as $key) 
		{
			if(!is_numeric($key))
			{
				$kirim['count_gagal']++;
				$string = "pesan pada nomor ".$key." gagal dikirim. Silahkan cek nomor dan kirim ulang kembali.";
				array_push($kirim['kegagalan'], $string);
				continue;
			}
			if(strlen($key)<9 || strlen($key)>14)
			{
				$kirim['count_gagal']++;
				$string = "pesan pada nomor ".$key." gagal dikirim. Silahkan cek nomor dan kirim ulang kembali.";
				array_push($kirim['kegagalan'], $string);	
				continue;
			}
			$data = array(
			'DestinationNumber' => $key, 
			'TextDecoded' => $_POST['pesan'],
			'Coding' => 'Default_No_Compression'
//			'CreatorID' => $this->session->userdata('id_login')
			);
			if($this->Messages->insertPesan($data) == 1)
				$kirim['count_sukses']++;
			else
			{
				$kirim['count_gagal']++;
				$string = "pesan pada nomor ".$key." gagal dikirim. Silahkan cek nomor dan kirim ulang kembali.";
				array_push($kirim['kegagalan'], $string);	
			}
		}
		$this->load->view("header");
		$this->load->view('tulis_pesan_multiple',$kirim);
		$this->load->view("footer");
	}

	public function send()
	{
		//echo var_dump($_POST);
		$data = array(
			'DestinationNumber' => $_POST['no_hp'], 
			'TextDecoded' => $_POST['isi_pesan'], 
			'Coding' => 'Default_No_Compression'
			//'CreatorID' => $this->session->userdata('id_login')
			);
		if($this->Messages->insertPesan($data) == 1)
			$kirim['sukses'] = 1;
		else
			$kirim['error'] = 1;
		
		$masuk = $this->Messages->Get_AllKotakMasuk();
		$keluar = $this->Messages->Get_AllSent();

		$output = array();
		foreach ($masuk as $key) 
		{
			array_push($output, $key->SenderNumber);
		}
		foreach ($keluar as $key) 
		{
			array_push($output, $key->DestinationNumber);
		}

		$kirim['output'] = array_unique($output);
		
		$this->load->view("header");
		$this->load->view('tulis_pesan',$kirim);
		$this->load->view("footer");
	}

	public function inbox()
	{
		$kirim['masuk'] = $this->Messages->Get_AllKotakMasuk();
		$kirim['klasifikasi'] = $this->Messages->Getklasifikasi();
		$this->load->view("header");
		$this->load->view('pesan_masuk',$kirim);
		$this->load->view("footer");
		
	}

	public function outbox()
	{
		$kirim['keluar'] = $this->Messages->Get_AllOutbox();
		$this->load->view("header");
		$this->load->view('pesan_keluar',$kirim);
		$this->load->view("footer");
	}

	public function edit()
	{
		//echo var_dump($_POST);
		$data = array(
			'klasifikasi' => $_POST['klasifikasi']
			);
		$datas = array(
			'DestinationNumber' => $_POST['no_hape'], 
			'TextDecoded' => $_POST['balas_pesan'], 
			'Coding' => 'Default_No_Compression'
			//'CreatorID' => $this->session->userdata('id_login')
			);

		if($_POST['klasifikasi'] != 4)
		{
			if($this->Messages->insertPesan($datas) == 1)
				$kirim['sukses'] = 1;
			else
				$kirim['error'] = 1;
		}
		
		$this->Messages->UpdatePesan($data, $_POST['id_kotak_masuk']);
		$kirim['klasifikasi'] = $this->Messages->Getklasifikasi();
		$kirim['masuk'] = $this->Messages->Get_AllKotakMasuk();
		$this->load->view("header");
		$this->load->view('pesan_masuk',$kirim);
		$this->load->view("footer");
	}

	public function baca_lengkap($kode, $id_pesan)
	{
		if($kode==1)
		{
			$data = array(
				'status_baca' => 1,
				'Processed' => 'true'
				);
			$a = $this->Messages->UpdatePesan($data, $id_pesan);
			
			$kirim['pesan'] = $this->Messages->Get_PesanMasukByKode($id_pesan);
			$kirim['klasifikasi'] = $this->Messages->Getklasifikasi();
		}
		else if($kode==2)
		{
			$kirim['pesan'] = $this->Messages->Get_PesanKeluarByKode($id_pesan);
		}
		else if($kode==3)
		{
			$kirim['pesan'] = $this->Messages->Get_PesanTerkirimByKode($id_pesan);
		}
		$kirim['kode'] = $kode;

		$this->load->view("header");
		$this->load->view('baca',$kirim);
		$this->load->view("footer");
	}

	public function laporan()
	{
		$this->load->view("header");
		$this->load->view('laporan');
		$this->load->view("footer");	
	}

	public function submitlaporan()
	{
		//echo var_dump($_POST);
		if(!empty($_POST['pesan_terkirim']))
		{
			if(strcmp($_POST['tgl_awal'], $_POST['tgl_akhir']) != 0)
				$kirim['terkirim'] = $this->Messages->GetTerkirim($_POST['tgl_awal'], $_POST['tgl_akhir']);
			else
				$kirim['terkirim'] = $this->Messages->GetTerkirim2($_POST['tgl_awal']);	
		}
		else
			$kirim['terkirim'] = null;
		if(!empty($_POST['kotak_keluar']))
		{
			if(strcmp($_POST['tgl_awal'], $_POST['tgl_akhir']) != 0)
				$kirim['keluar'] = $this->Messages->GetOutbox($_POST['tgl_awal'], $_POST['tgl_akhir']);
			else
				$kirim['keluar'] = $this->Messages->GetOutbox2($_POST['tgl_awal']);
		}
		else
			$kirim['keluar'] = null;

		if(!empty($_POST['kotak_masuk']))
		{
			$query = "SELECT * FROM inbox where (";

			if(!empty($_POST['belum_terjawab']))
			{
				$query = $query."inbox.klasifikasi=0";
				if(!empty($_POST['pertanyaan']) || !empty($_POST['keluhan']) || !empty($_POST['jawaban_mesin']) || !empty($_POST['spam']))
				{
					$query = $query." or ";
				}
			}

			if(!empty($_POST['pertanyaan']))
			{
				$query = $query."inbox.klasifikasi=1";
				if(!empty($_POST['keluhan']) || !empty($_POST['jawaban_mesin']) || !empty($_POST['spam']))
				{
					$query = $query." or ";
				}
			}

			if(!empty($_POST['keluhan']))
			{
				$query = $query."inbox.klasifikasi=2";
				if(!empty($_POST['jawaban_mesin']) || !empty($_POST['spam']))
				{
					$query = $query." or ";
				}
			}			

			if(!empty($_POST['jawaban_mesin']))
			{
				$query = $query."inbox.klasifikasi=3";
				if(!empty($_POST['spam']))
				{
					$query = $query." or ";
				}
			}

			if(!empty($_POST['spam']))
			{
				$query = $query."inbox.klasifikasi=4";
			}
			$date1 = $_POST['tgl_awal'];
			$date2 = $_POST['tgl_akhir'];
			if(strcmp($date1, $date2) != 0)
				$query = $query.") and ReceivingDateTime >= '".$date1."' and ReceivingDateTime <= '".$date2."';";
			else
				$query = $query.") and ReceivingDateTime between '".$date1." 00:00:00' and '".$date1." 23:59:59';";
			//echo $query;
			$kirim['masuk'] = $this->Messages->GetQuery($query);
		}
		else $kirim['masuk'] = null;
		$kirim['klasifikasi'] = $this->Messages->Getklasifikasi();
			$this->load->view("header");
			$this->load->view('laporan_submit',$kirim);
			$this->load->view("footer");
		/*echo $query;
		echo var_dump($kirim);*/
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
