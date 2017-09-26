<?php	
	class Messages extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function HitungAllMasuk()
		{
			return $this->db->count_all_results('inbox');
		}
		function HitungAllKeluar()
		{
			return $this->db->count_all_results('outbox');
		}
		function HitungAllTerkirim()
		{
			return $this->db->count_all_results('sentitems');
		}
		function countQ($no_hp, $isi, $tgl, $klasifikasi, $status, $limit, $start)
		{
			$this->db->from('inbox');
			$this->db->join('klasifikasi', 'inbox.klasifikasi = klasifikasi.id_klasifikasi');
			$this->db->like('SenderNumber', $no_hp); 
			$this->db->like('TextDecoded', $isi); 
			$this->db->like('ReceivingDateTime', $tgl);
			$this->db->like('keterangan',$klasifikasi);
			$this->db->like('status_baca',$status);
			return $this->db->count_all_results();
		}
		function GetInboxLimit($no_hp, $isi, $tgl, $klasifikasi, $status, $limit, $start)
		{
			$this->db->select('*');
			$this->db->from('inbox');
			$this->db->join('klasifikasi', 'inbox.klasifikasi = klasifikasi.id_klasifikasi');
			$this->db->like('SenderNumber', $no_hp); 
			$this->db->like('TextDecoded', $isi); 
			$this->db->like('ReceivingDateTime', $tgl);
			$this->db->like('keterangan',$klasifikasi);
			$this->db->like('status_baca',$status);
			$this->db->limit($start,$limit);
			$this->db->order_by("ReceivingDateTime", "desc"); 

			$query = $this->db->get()->result();
			//$query = $query->row_array();
			return $query;
		}
		function countOut($no_hp, $isi, $tgl, $limit, $start)
		{
			$this->db->from('outbox');
			$this->db->like('DestinationNumber', $no_hp); 
			$this->db->like('TextDecoded', $isi); 
			$this->db->like('SendingDateTime', $tgl);
			return $this->db->count_all_results();
		}
		function GetOutboxLimit($no_hp, $isi, $tgl, $limit, $start)
		{
			$this->db->select('*');
			$this->db->from('outbox');
			$this->db->like('DestinationNumber', $no_hp); 
			$this->db->like('TextDecoded', $isi); 
			$this->db->like('SendingDateTime', $tgl);
			$this->db->limit($start,$limit);
			$this->db->order_by("SendingDateTime", "desc"); 

			$query = $this->db->get()->result();
			//$query = $query->row_array();
			return $query;
		}

		function countTerkirim($no_hp, $isi, $tgl, $limit, $start)
		{
			$this->db->from('sentitems');
			$this->db->like('DestinationNumber', $no_hp); 
			$this->db->like('TextDecoded', $isi); 
			$this->db->like('SendingDateTime', $tgl);
			return $this->db->count_all_results();
		}
		function GetTerkirimLimit($no_hp, $isi, $tgl, $limit, $start)
		{
			$this->db->select('*');
			$this->db->from('sentitems');
			$this->db->like('DestinationNumber', $no_hp); 
			$this->db->like('TextDecoded', $isi); 
			$this->db->like('SendingDateTime', $tgl);
			$this->db->limit($start,$limit);
			$this->db->order_by("SendingDateTime", "desc"); 

			$query = $this->db->get()->result();
			//$query = $query->row_array();
			return $query;
		}

		function Get_KotakMasuk($tahun)
		{
			$value = $this->db->query("SELECT * FROM  `inbox` WHERE year(ReceivingDateTime) = $tahun order by ReceivingDateTime desc")->result();
			return $value;
		}
		function Get_Terkirim($tahun)
		{
			$value = $this->db->query("SELECT * FROM  `sentitems` WHERE year(SendingDateTime) = $tahun order by SendingDateTime desc")->result();
			return $value;
		}
		function Get_AllKotakMasuk()
		{
			$value = $this->db->query("SELECT * FROM  `inbox` order by ReceivingDateTime desc")->result();
			return $value;
		}
		function GetKlasifikasi()
		{
			$value = $this->db->query("SELECT * FROM  `klasifikasi`")->result();
			return $value;	
		}
		function Get_PesanMasukByKode($id_kotak_masuk)
		{
			$value = $this->db->query("SELECT * FROM  `inbox` WHERE ID = $id_kotak_masuk")->result();
			return $value[0];
		}
		function Get_PesanKeluarByKode($id_kotak_keluar)
		{
			$value = $this->db->query("SELECT * FROM  `outbox` WHERE ID = $id_kotak_keluar")->result();
			return $value[0];
		}
		function Get_PesanTerkirimByKode($id_sent)
		{
			$value = $this->db->query("SELECT * FROM  `sentitems` WHERE ID = $id_sent")->result();
			return $value[0];
		}
		function Get_KotakKeluar($tahun)
		{
			$value = $this->db->query("SELECT * FROM  `outbox` WHERE year(SendingDateTime) = $tahun")->result();
			return $value;
		}
		function Get_AllOutbox()
		{
			$value = $this->db->query("SELECT * FROM  `outbox`")->result();
			return $value;
		}
		function Get_AllSent()
		{
			$value = $this->db->query("SELECT * FROM  `sentitems`")->result();
			return $value;
		}
		function GetTerkirim($date1, $date2)
		{
			$value = $this->db->query("SELECT * FROM `sentitems` WHERE SendingDateTime >= '$date1' and SendingDateTime <= '$date2'")->result();
			return $value;	
		}
		function GetTerkirim2($date1)
		{
			$value = $this->db->query("SELECT * FROM `sentitems` WHERE SendingDateTime between '".$date1." 00:00:00' and '".$date1." 23:59:59';")->result();
			return $value;	
		}
		function GetOutbox($date1, $date2)
		{
			$value = $this->db->query("SELECT * FROM `outbox` WHERE SendingDateTime >= '$date1' and SendingDateTime <= '$date2'")->result();
			return $value;	
		}
		function GetOutbox2($date1)
		{
			$value = $this->db->query("SELECT * FROM `outbox` WHERE SendingDateTime between '".$date1." 00:00:00' and '".$date1." 23:59:59';")->result();
			return $value;	
		}
		function GetQuery($query)
		{
			$value = $this->db->query($query)->result();
			return $value;		
		}
		function UpdatePesan($data, $id)
		{
			$this->db->where('ID', $id);
			$this->db->update('inbox', $data);
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
		function insertPesan($data)
		{
			return $this->db->insert("outbox",$data);
		}
		function PesanDiterima($data)
		{
			return $this->db->insert("inbox",$data);
		}
	}
?>