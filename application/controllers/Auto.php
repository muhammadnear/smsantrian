<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auto extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Autos');
	}

	public function autoreply()
	{
		$now = date('d-m-Y');

		$day = date('D', strtotime(date('Y-m-d')));
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);
		$sekarang = $dayList[$day].", ".$now;

		/*ketik ANTRI otomatis reply
		Antrian :
		A = A001
		B = B002
		C = C022
		F = F011
		*/
		$messages = $this->Autos->GetSmsNotProcessed();
		foreach ($messages as $key)
		{
			$msg = strtoupper($key->TextDecoded);
			$pecah = explode(" ", $msg);
			$reply = "";
			if($pecah[0]=='ANTRI')
			{
				$gets = $this->Autos->tp();
				$balas = $this->Autos->BalasanAntri();

				for($i=0; $i<strlen($balas[0]->maka); $i++)
				{
					if($balas[0]->maka[$i] == '$')
						$reply = $reply.$gets;
					if($balas[0]->maka[$i] == '#')
						$reply = $reply.$sekarang;
					else
					{
						$reply = $reply.$gets;
					}
				}

				$data = array(
					'TextDecoded' => $reply,
					'DestinationNumber' => $key->SenderNumber,
					'Coding' => 'Default_No_Compression'
					//'SenderID' =>  $this->session->userdata('id_login')
					);

				$this->Autos->insertOut($data);

				$dataUpdate = array(
					'status_baca' => 1,
					'Processed' => 'true',
					'klasifikasi' => 3
					);

				$this->Autos->UpdatePesan($dataUpdate, $key->ID);
			}

			/*	ketik BILLING NO_PERMOHONAN otomatis reply
				Billing code anda : 012801820180
			*/
			/*else if($pecah[0]=='BILLING')
			{
				$gets = $this->Autos->getRecordByNopermohonan($pecah[1]);
				$balas = $this->Autos->BalasanBilling();
				if(!empty($gets))
				{
					for($i=0; $i<strlen($balas[0]->maka); $i++)
					{
						if($balas[0]->maka[$i] != '$')
							$reply = $reply.$balas[0]->maka[$i];
						else
						{
							$reply = $reply.$gets[0]->BillingCode;
						}
					}

				}
				else
					$reply = $reply.$balas[0]->salah;

				$data = array(
					'TextDecoded' => $reply,
					'DestinationNumber' => $key->SenderNumber,
					'Coding' => 'Default_No_Compression'
					//'SenderID' =>  $this->session->userdata('id_login')
					);

				$this->Autos->insertOut($data);

				$dataUpdate = array(
					'status_baca' => 1,
					'Processed' => 'true',
					'klasifikasi' => 3
					);

				$this->Autos->UpdatePesan($dataUpdate, $key->ID);
			}

			/*	ketik PASPOR NO_PERMOHONAN otomatis reply
				Papsor sekarang dalam posisi Cetak Paspor
			*/

			/*else if($pecah[0]=='PASPOR')
			{
				$gets = $this->Autos->getRecordByNopermohonan($pecah[1]);
				$flow = $this->Autos->getWorkflow($gets[0]->WorkFlowXID);

				$balas = $this->Autos->BalasanPaspor();
				if(!empty($gets))
				{
					for($i=0; $i<strlen($balas[0]->maka); $i++)
					{
						if($balas[0]->maka[$i] != '$')
							$reply = $reply.$balas[0]->maka[$i];
						else
						{
							$reply = $reply.$flow[0]->Description;
						}
					}

				}
				else
					$reply = $reply.$balas[0]->salah;

				$data = array(
					'TextDecoded' => $reply,
					'DestinationNumber' => $key->SenderNumber,
					'Coding' => 'Default_No_Compression'
					//'SenderID' =>  $this->session->userdata('id_login')
					);

				$this->Autos->insertOut($data);

				$dataUpdate = array(
					'status_baca' => 1,
					'Processed' => 'true',
					'klasifikasi' => 3
					);

				$this->Autos->UpdatePesan($dataUpdate, $key->ID);
			}

			/*	ketik DAFTAR ANTRIAN simpan di tabel antrian_sms dan otomatis reply
				Nomor anda sudah terdaftar dan akan pesan akan dikirim ketika antrian anda akan dipanggil.
			*/
			else if($pecah[0]=='DAFTAR')
			{
				$balas = $this->Autos->BalasanDaftar();

				if(!empty($pecah[1]) && strlen($pecah[1])==4 && ($pecah[1][0]=='A' || $pecah[1][0]=='B' || $pecah[1][0]=='C' || $pecah[1][0]=='F') && is_numeric($pecah[1][1]) && is_numeric($pecah[1][2]) && is_numeric($pecah[1][3]))
				{
					$DATAS = array(
						'no_hp' => $key->SenderNumber,
						'no_antrian' => $pecah[1]
						);
					$a = $this->Autos->insertDaftar($DATAS);
					if($a)
						$reply = $reply.$balas[0]->maka;
					else
						$reply = $reply.$balas[0]->salah;
				}
				else
					$reply = $reply.$balas[0]->salah;

				$data = array(
					'TextDecoded' => $reply,
					'DestinationNumber' => $key->SenderNumber,
					'Coding' => 'Default_No_Compression'
					//'SenderID' =>  $this->session->userdata('id_login')
					);

				$this->Autos->insertOut($data);

				$dataUpdate = array(
					'status_baca' => 1,
					'Processed' => 'true',
					'klasifikasi' => 3
					);

				$this->Autos->UpdatePesan($dataUpdate, $key->ID);
			}
		}
	}

	public function settingrespond()
	{
		$kirim['auto'] = $this->Autos->GetAllAutoSend();
		$this->load->view("header");
		$this->load->view('auto-reply',$kirim);
		$this->load->view("footer");
	}

	public function editrespond($kode)
	{
		$kirim['hasil'] = $this->Autos->GetAutoByID($kode);
		if(empty($kirim['hasil']))
		{
			$kirim['auto'] = $this->Autos->GetAllAutoSend();
			$this->load->view("header");
			$this->load->view('auto-reply',$kirim);
			$this->load->view("footer");		
		}
		else
		{
			$this->load->view("header");
			$this->load->view('edit-auto-reply',$kirim);
			$this->load->view("footer");	
		}
	}	

	public function submitautoreply()
	{
		$data = array(
			'maka' => $_POST['maka'],
			'salah' => $_POST['salah']
			);
		$this->Autos->UpdateAuto($data, $_POST['id_auto_send']);
		//echo var_dump($a);
		$kirim['auto'] = $this->Autos->GetAllAutoSend();
		$kirim['sukses'] = 'Data sukses diupdate.';
		
		$this->load->view("header");
		$this->load->view('auto-reply',$kirim);
		$this->load->view("footer");		
	}

	public function settingsend()
	{
		$kirim['auto'] = $this->Autos->GetAllAutoKirim();
		$this->load->view("header");
		$this->load->view('auto-send',$kirim);
		$this->load->view("footer");
	}

	public function editsend($kode)
	{
		$kirim['hasil'] = $this->Autos->GetAutoKirimByID($kode);
		if(empty($kirim['hasil']))
		{
			$kirim['auto'] = $this->Autos->GetAllAutoKirim();
			$this->load->view("header");
			$this->load->view('auto-send',$kirim);
			$this->load->view("footer");		
		}
		else
		{
			$this->load->view("header");
			$this->load->view('edit-auto-send',$kirim);
			$this->load->view("footer");	
		}
	}	

	public function submitautosend()
	{
		$data = array(
			'maka' => $_POST['maka']
			);
		$this->Autos->UpdateAutoKirim($data, $_POST['id_auto_kirim']);
		//echo var_dump($a);
		$kirim['auto'] = $this->Autos->GetAllAutoKirim();
		$kirim['sukses'] = 'Data sukses diupdate.';
		
		$this->load->view("header");
		$this->load->view('auto-send',$kirim);
		$this->load->view("footer");		
	}

	public function kabarkan($all, $now, $panggil, $kode, $reply)
	{
		$balasan = "";
		$panggil = $panggil+20;
		$sambung = str_pad($panggil, 3, '0', STR_PAD_LEFT);
		$string = $kode.$sambung;

		$sambung_now = str_pad($now, 3, '0', STR_PAD_LEFT);
		$string_now = $kode.$sambung_now;

		for($i=0; $i<strlen($reply->maka); $i++)
		{
			if($reply->maka[$i] == '$')
				$balasan = $balasan.' '.$string_now;
			else	
				$balasan = $balasan.$reply->maka[$i];
		}

		foreach ($all as $key) 
		{
			if($key->no_antrian == $string)
			{
				$data = array(
				'TextDecoded' => $balasan,
				'DestinationNumber' => $key->no_hp,
				'Coding' => 'Default_No_Compression'
				//'SenderID' =>  $this->session->userdata('id_login')
				);
				//echo $balasan;
				//echo "<br/>";
				$this->Autos->insertOut($data);
				//return $data;
			}
		}
	}


	public function autosms()
	{
		/*
			dia disms ketika nomor antriannya akan dipanggil kurang 20 nomor lagi.
		*/
		$now = $this->Autos->GetABCF();
		$cache = $this->Autos->GetCache();

		/*echo var_dump($now);
		echo var_dump($cache);
		*/
		$tgl = date('d');
		$bln = date('m');
		$thn = date('Y');
		$all = $this->Autos->GetDaftarNow($tgl, $bln, $thn);
		
		$reply = $this->Autos->GetAutoKirimByID(1);
		
		$tfp_a = $now['a'];
		$tfp_b = $now['b'];
		$tfp_c = $now['c'];
		$tfp_f = $now['f'];
		$a = $cache->a;
		$b = $cache->b;
		$c = $cache->c;
		$f = $cache->f;
		
		$selisiha = $tfp_a - $a;
		$selisihb = $tfp_b - $b;
		$selisihc = $tfp_c - $c;
		$selisihf = $tfp_f - $f;

		$update = 0;
		if($selisiha!=0)
		{
			if($selisiha < 0 || $selisiha > 20 || $a<20)
			$a = $tfp_a-19;

			while ($a<$tfp_a)
			{
				$this->kabarkan($all, $tfp_a, $a, 'A', $reply);
				//echo var_dump($get);
				//$this->Autos->insertOut($data);
				$a++;
			}
			$update = 1;
		}

		if($selisihb!=0)
		{
			if($selisihb < 0 || $selisihb > 20 || $b<20)
			$b = $tfp_b-19;

			while ($b<$tfp_b)
			{
				$this->kabarkan($all, $tfp_b, $b, 'B', $reply);
				//echo var_dump($data);
				//$this->Autos->insertOut($data);
				$b++;
			}
			$update = 1;
		}

		if($selisihc!=0)
		{
			if($selisihc < 0 || $selisihc > 20 || $c<20)
			$c = $tfp_c-19;

			while ($c<$tfp_c)
			{
				$this->kabarkan($all, $tfp_c, $c, 'C', $reply);
				//echo var_dump($data);
				//$this->Autos->insertOut($data);
				$c++;
			}
			$update = 1;
		}

		if($selisihf!=0)
		{
			if($selisihf < 0 || $selisihf > 20 || $f<20)
			$f = $tfp_f-19;

			while ($f<$tfp_f)
			{
				$this->kabarkan($all, $tfp_f, $f, 'F', $reply);
				//echo var_dump($data);
				//$this->Autos->insertOut($data);
				$f++;
			}
			$update = 1;
		}

		if($update == 1)
		{ 
			$datas = array(
			'a' => $now['a'],
			'b' => $now['b'],
			'c' => $now['c'],
			'f' => $now['f']
			);
			$this->Autos->updateCache($datas, 1);
		}
	} 

	public function baca_lengkap($kode, $id_pesan)
	{
		$this->load->view("header");
		$this->load->view('baca');
		$this->load->view("footer");
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
