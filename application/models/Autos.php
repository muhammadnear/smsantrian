<?php
	
	class Autos extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function GetSmsNotProcessed()
		{
			$value = $this->db->query("SELECT * FROM inbox WHERE Processed = 'false' AND DATE(ReceivingDateTime) = DATE(NOW())")->result();
			return $value;
		}
		
		function UpdateUser($data, $id)
		{
			$this->db->where('id', $id);
			$this->db->update('users', $data);
		}
		function tp()
		{
			$this->antrian = $this->load->database('antrian', true);
			$a = $this->antrian->query("SELECT * FROM `tba` where sudah = '1' ORDER BY `tba`.`tgl` DESC, `id` DESC limit 1")->result();
			$b = $this->antrian->query("SELECT * FROM `tbb` where sudah = '1' ORDER BY `tbb`.`tgl` DESC, `id` DESC limit 1")->result();
			$c = $this->antrian->query("SELECT * FROM `tbc` where sudah = '1' ORDER BY `tbc`.`tgl` DESC, `id` DESC limit 1")->result();
			$f = $this->antrian->query("SELECT * FROM `tbf` where sudah = '1' ORDER BY `tbf`.`tgl` DESC, `id` DESC limit 1")->result();
			$value = "A = ".$a[0]->urut." B = ".$b[0]->urut." C = ".$c[0]->urut." F = ".$f[0]->urut;
			return $value;
		}
		function GetABCF()
		{
			$this->antrian = $this->load->database('antrian', true);
			$a = $this->antrian->query("SELECT * FROM `tba` where sudah = '1' ORDER BY `tba`.`tgl` DESC, `id` DESC")->result();
			$b = $this->antrian->query("SELECT * FROM `tbb` where sudah = '1' ORDER BY `tbb`.`tgl` DESC, `id` DESC")->result();
			$c = $this->antrian->query("SELECT * FROM `tbc` where sudah = '1' ORDER BY `tbc`.`tgl` DESC, `id` DESC")->result();
			$f = $this->antrian->query("SELECT * FROM `tbf` where sudah = '1' ORDER BY `tbf`.`tgl` DESC, `id` DESC")->result();
			$value['a'] = $a[0]->urut;
			$value['b'] = $b[0]->urut;
			$value['c'] = $c[0]->urut;
			$value['f'] = $f[0]->urut;

			return $value;
		}
		function GetCache()
		{
			$value = $this->db->query("SELECT * FROM  `cache-autosend`")->result();
			return $value[0];
		}
		function GetDaftarNow($tgl, $bln, $thn)
		{
			$value = $this->db->query("SELECT * FROM `antrian_sms` WHERE sudah_sms=0 and day(created_time) = '$tgl' and month(created_time) = '$bln' and year(created_time) = '$thn'")->result();
			return $value;
		}
		function getWorkflow($id)
		{
			$this->antrian = $this->load->database('antrian', true);
			$value = $this->antrian->query("SELECT * FROM workflowlookup where id = $id");
			return $value;
		}
		function getRecordByNopermohonan($noper)
		{
			$this->data1 = $this->load->database('data1', true);
			$value = $this->data1->query("SELECT * FROM `xlpassportform`")->result();
			return $value;
		}
		function UpdatePesan($data, $id)
		{
			$this->db->where('ID', $id);
			$this->db->update('inbox', $data);
		}
		function insertDaftar($data)
		{
			return $this->db->insert("antrian_sms",$data);
		}
		function insertOut($data)
		{
			return $this->db->insert("outbox",$data);
		}
		function BalasanAntri()
		{
			$value = $this->db->query("SELECT * FROM  `auto-send` WHERE jika = 'ANTRI'")->result();
			return $value;
		}
		function BalasanBilling()
		{
			$value = $this->db->query("SELECT * FROM  `auto-send` WHERE jika = 'BILLING NO_PERMOHONAN'")->result();
			return $value;
		}
		function BalasanPaspor()
		{
			$value = $this->db->query("SELECT * FROM  `auto-send` WHERE jika = 'PASPOR NO_PERMOHONAN'")->result();
			return $value;
		}
		function BalasanDaftar()
		{
			$value = $this->db->query("SELECT * FROM  `auto-send` WHERE jika = 'DAFTAR NO_ANTRIAN'")->result();
			return $value;
		}

		function GetAllAutoSend()
		{
			$value = $this->db->query("SELECT * FROM  `auto-send`")->result();
			return $value;
		}
		function GetAutoByID($id)
		{
			$value = $this->db->query("SELECT * FROM  `auto-send` where id_auto_send = '$id' ")->result();
			return $value[0];
		}
		function UpdateAuto($data, $id)
		{
			$this->db->where('id_auto_send', $id);
			$this->db->update('auto-send', $data);
		}


		function GetAllAutoKirim()
		{
			$value = $this->db->query("SELECT * FROM  `auto-kirim`")->result();
			return $value;
		}
		function GetAutoKirimByID($id)
		{
			$value = $this->db->query("SELECT * FROM  `auto-kirim` where id_auto_kirim = '$id' ")->result();
			return $value[0];
		}
		function UpdateAutoKirim($data, $id)
		{
			$this->db->where('id_auto_kirim', $id);
			$this->db->update('auto-kirim', $data);
		}

		function UpdateCache($data, $id)
		{
			$this->db->where('id', $id);
			$this->db->update('cache-autosend', $data);
		}
		
/*		function GetKota()
		{
			$value = $this->db->query('SELECT * FROM  `kota` WHERE 1')->result();
			return $value;
		}
		function countReg($id)
		{
			$this->db->like('kode_register', $id);
			$this->db->from('register');
			return $this->db->count_all_results();
		}*/
		function hapusUser($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('users');
		}
		function insertUser($data)
		{
			return $this->db->insert("users",$data);
		}
	}
?>
