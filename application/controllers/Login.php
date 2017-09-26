<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('User');
		$this->load->model('Messages');

	}
	public function index()
	{
		$kirim["error"] = "";
		$this->load->view('login',$kirim);
	}
	public function signin()
	{
		//echo var_dump($_POST);
		$flag = 0;
		$hasil = $this->User->getLogin();
		if(empty($_POST['username']) || empty($_POST['password']))
		{
			$kirim["error"] = "Masukkan Username dan Password Anda..";
			$this->load->view('login',$kirim);	
		}
		else
		{
			$username = $_POST['username'];
			//$password = md5($_POST['password']);
			$password = $_POST['password'];
			foreach ($hasil as $key) 
			{
				if($username == $key->username)
				{
					if( $password == $key->password)
					{
						$this->session->set_userdata('username',$key->username);
						$this->session->set_userdata('id_login',$key->id);
						$this->session->set_userdata('role',$key->id_role);
						$this->session->set_userdata('lastvisit_at',$key->lastvisit_at);
						$role = $key->id_role;
						$flag=1;
						break;
					}
				}
			}
			if($flag==1)
			{
				$data = array('lastvisit_at' => date('Y-m-d H:i:s'));
				$this->User->LastVisit($data,$this->session->userdata('id_login'));
				if($role == 2)
					header("Location: beranda_pegawai");
			}
			else
			{
				$kirim["error"] = "Maaf, Username atau Password yang anda masukkan salah..";
				$this->load->view('login',$kirim);	
			}
		}
		
	}

	public function GetAjax()
	{

		$masuk = $this->Messages->Get_KotakMasuk(date("Y"));
		$keluar = $this->Messages->Get_KotakKeluar(date("Y"));

		$masuk_det = array();
		$keluar_det = array();

		for($i=0; $i<12; $i++)
		{
			$masuk_det[$i]['tahun'] = $i+1;
			$keluar_det[$i]['tahun'] = $i+1;
			$masuk_det[$i]['value'] = 0;
			$keluar_det[$i]['value'] = 0;
		}
		//echo var_dump($masuk_det);
		foreach ($masuk as $key) 
		{
			for($i=0; $i<12; $i++)
			{
				if(date("m", strtotime($key->ReceivingDateTime)) == $i+1)
				{
					$masuk_det[$i]['value']++;
				}
			}
		}

		foreach ($keluar as $key) 
		{
			for($i=0; $i<12; $i++)
			{
				if(date("m", strtotime($key->SendingDateTime)) == $i+1)
				{
					$keluar_det[$i]['value']++;
				}
			}
		}

		/*klasifikasi*/
		$class = $this->Messages->GetKlasifikasi();
		
		$kelas = array();
		$count = 0;
		foreach ($class as $key) 
		{
			$kelas[$count]['nama'] = $key->keterangan;
			for($i=0; $i<12; $i++)
			{
				$kelas[$count][$i][0] = $i+1;
				$kelas[$count][$i][1] = 0;
			}
			$count++;
		}

		foreach ($masuk as $key) 
		{
			foreach ($class as $key2) 
			{
				if($key->klasifikasi == $key2->id_klasifikasi)
				{
					for($i=0; $i<12; $i++)
					{
						if(date("m", strtotime($key->ReceivingDateTime)) == $i+1)
						{
							$kelas[$key2->id_klasifikasi][$i][1]++;
						}
					}
				}
			}
		}

		print json_encode(array("masuk_det"=>$masuk_det,"keluar_det"=>$keluar_det,"kelas"=>$kelas));
	}

	public function beranda_pegawai()
	{
		$id = $this->session->userdata('username');
		if(!$id)
        	redirect(base_url());
		else
		{
			/*$masuk = $this->Messages->Get_KotakMasuk(date("Y"));
			$keluar = $this->Messages->Get_KotakKeluar(date("Y"));
			$terkirim = $this->Messages->Get_Terkirim(date("Y"));*/

			$kirim['masuk'] = $this->Messages->CountMasuk(date("Y"));
			$kirim['keluar'] = $this->Messages->CountKeluar(date("Y"));
			$kirim['terkirim'] = $this->Messages->CountTerkirimA(date("Y"));
			
			$this->load->view("header");
			$this->load->view('index_pegawai',$kirim);
			$this->load->view("footer");
		}
	}
	public function signout()
	{
		$data = array('lastvisit_at' => date('Y-m-d h:i:s'));
		$this->User->LastVisit($data, $this->session->userdata('id_login'));
		$kirim["error"] = "";
		$this->session->sess_destroy();
		$this->load->view("login", $kirim);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */