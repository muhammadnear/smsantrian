<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Messages');
	}
	
	public function get_inbox()
	{
		$dataArray = [];
		$no_hp = "";
		$isi = "";
		$tgl = "";
		$klasifikasi = "";
		$status = "";

		$dataRes['recordsTotal'] = $this->Messages->HitungAllMasuk();

		if(!empty($_POST['columns'][0]['search']['value']))
			$no_hp = $_POST['columns'][0]['search']['value'];
		if(!empty($_POST['columns'][1]['search']['value']))
			$isi = $_POST['columns'][1]['search']['value'];
		if(!empty($_POST['columns'][2]['search']['value']))
		{
			for($i=0; $i<strlen($_POST['columns'][2]['search']['value']); $i++)
			{
				if($_POST['columns'][2]['search']['value'][$i] == '/')
					$tgl = $tgl.'-';
				else
					$tgl = $tgl.$_POST['columns'][2]['search']['value'][$i];
			}
		}
		if(!empty($_POST['columns'][3]['search']['value']))
			$klasifikasi = $_POST['columns'][3]['search']['value'];
		if(!empty($_POST['columns'][4]['search']['value']))
			$status = $_POST['columns'][4]['search']['value'];

		//$masuk = $this->Messages->GetInboxLimit("", "", "", "", "", 0, 10);

		$masuk = $this->Messages->GetInboxLimit($no_hp, $isi, $tgl, $klasifikasi, $status, $_POST['start'], $_POST['length']);
		
		$dataRes['recordsFiltered'] = $this->Messages->countQ($no_hp, $isi, $tgl, $klasifikasi, $status, $_POST['start'], $_POST['length']);
		//$masuk = $this->Messages->GetInboxLimit($_POST['length'], $_POST['start']);
		$klasifikasi = $this->Messages->Getklasifikasi();

		foreach ($masuk as $key) 
		{
			$string = "";
			if(strlen($key->TextDecoded)>70) 
        	{
        		for($i=0; $i<70; $i++)
        			$string = $string.$key->TextDecoded[$i];
        		$string = $string."......";
        	}
            else
            	$string=$string.$key->TextDecoded;

            $receive = "";
            for($i=0; $i<strlen($key->ReceivingDateTime); $i++)
            {
            	if($i==4 || $i==7)
            		$receive = $receive."/";
            	else
            		$receive = $receive.$key->ReceivingDateTime[$i];
            }

            $keterangan = "";
			foreach ($klasifikasi as $key2) 
			{
				if($key->klasifikasi == $key2->id_klasifikasi)	
					$keterangan = $key2->keterangan;
			}

			$tombol = '<center><a href="'.base_url().'index.php/pesan/baca_lengkap/1/'.$key->ID.'" class="btn btn-info" style="width:40%; height:125%">edit</a></center>';

			$dataArray[] = [
				$key->SenderNumber,
				'<a href="'.base_url().'index.php/pesan/baca_lengkap/1/'.$key->ID.'" style="color: black;">'.$string.'</a>',
				$receive,
				$keterangan,
				$key->status_baca,
				$tombol
			];
		}
		$dataRes['data'] = $dataArray;
		echo json_encode($dataRes);
	}

	public function get_outbox()
	{
		$dataArray = [];

		$no_hp = "";
		$isi = "";
		$tgl = "";
		$dataRes['recordsTotal'] = $this->Messages->HitungAllKeluar();
		if(!empty($_POST['columns'][0]['search']['value']))
			$no_hp = $_POST['columns'][0]['search']['value'];
		if(!empty($_POST['columns'][1]['search']['value']))
			$isi = $_POST['columns'][1]['search']['value'];
		if(!empty($_POST['columns'][2]['search']['value']))
		{
			for($i=0; $i<strlen($_POST['columns'][2]['search']['value']); $i++)
			{
				if($_POST['columns'][2]['search']['value'][$i] == '/')
					$tgl = $tgl.'-';
				else
					$tgl = $tgl.$_POST['columns'][2]['search']['value'][$i];
			}
		}

		$keluar = $this->Messages->GetOutboxLimit($no_hp, $isi, $tgl, $_POST['start'], $_POST['length']);
		
		$dataRes['recordsFiltered'] = $this->Messages->countOut($no_hp, $isi, $tgl, $_POST['start'], $_POST['length']);

		foreach ($keluar as $key) 
		{
			$string = "";
			if(strlen($key->TextDecoded)>70) 
        	{
        		for($i=0; $i<70; $i++)
        			$string = $string.$key->TextDecoded[$i];
        		$string = $string."......";
        	}
            else
            	$string=$string.$key->TextDecoded;

            $send = "";
            for($i=0; $i<strlen($key->SendingDateTime); $i++)
            {
            	if($i==4 || $i==7)
            		$send = $send."/";
            	else
            		$send = $send.$key->SendingDateTime[$i];
            }

			$tombol = '<center><a href="'.base_url().'index.php/pesan/baca_lengkap/2/'.$key->ID.'" class="btn btn-info" style="width:40%; height:125%">baca</a></center>';

			$dataArray[] = [
				$key->DestinationNumber,
				'<a href="'.base_url().'index.php/pesan/baca_lengkap/2/'.$key->ID.'" style="color: black;">'.$string.'</a>',
				$send,
				$tombol
			];
		}
		$dataRes['data'] = $dataArray;
		echo json_encode($dataRes);	
	}

	public function get_terkirim()
	{
		$dataArray = [];

		$no_hp = "";
		$isi = "";
		$tgl = "";
		$dataRes['recordsTotal'] = $this->Messages->HitungAllTerkirim();
		if(!empty($_POST['columns'][0]['search']['value']))
			$no_hp = $_POST['columns'][0]['search']['value'];
		if(!empty($_POST['columns'][1]['search']['value']))
			$isi = $_POST['columns'][1]['search']['value'];
		if(!empty($_POST['columns'][2]['search']['value']))
		{
			for($i=0; $i<strlen($_POST['columns'][2]['search']['value']); $i++)
			{
				if($_POST['columns'][2]['search']['value'][$i] == '/')
					$tgl = $tgl.'-';
				else
					$tgl = $tgl.$_POST['columns'][2]['search']['value'][$i];
			}
		}

		$terkirim = $this->Messages->GetTerkirimLimit($no_hp, $isi, $tgl, $_POST['start'], $_POST['length']);
		
		$dataRes['recordsFiltered'] = $this->Messages->countTerkirim($no_hp, $isi, $tgl, $_POST['start'], $_POST['length']);

		foreach ($terkirim as $key) 
		{
			$string = "";
			if(strlen($key->TextDecoded)>70) 
        	{
        		for($i=0; $i<70; $i++)
        			$string = $string.$key->TextDecoded[$i];
        		$string = $string."......";
        	}
            else
            	$string=$string.$key->TextDecoded;

            $send = "";
            for($i=0; $i<strlen($key->SendingDateTime); $i++)
            {
            	if($i==4 || $i==7)
            		$send = $send."/";
            	else
            		$send = $send.$key->SendingDateTime[$i];
            }

			$tombol = '<center><a href="'.base_url().'index.php/pesan/baca_lengkap/3/'.$key->ID.'" class="btn btn-info" style="width:40%; height:125%">baca</a></center>';

			$dataArray[] = [
				$key->DestinationNumber,
				'<a href="'.base_url().'index.php/pesan/baca_lengkap/3/'.$key->ID.'" style="color: black;">'.$string.'</a>',
				$send,
				$tombol
			];
		}
		$dataRes['data'] = $dataArray;
		echo json_encode($dataRes);	
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
