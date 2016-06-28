<?php
class Index extends Controller{

	function __construct(){
		parent::__construct();
		Session::start();
		if(Session::get('log')==false) {
			Session::destroy();
			$this->direct(X.'log');
		}
	}

	function index($id = null){
		$month = (is_null(Session::get('month'))) ? date('m') : Session::get('month') ;
		$link = X.'index/read/'.date('Y').'/'.$month.'/'.$id;
		Session::set('link',$link);
		$this->direct($link);
	}

	function delete_akun($id){
		$this->model->delete('pengurus',$id);
		$this->direct(X);
	}

	function jurusan($id = null){
		$_REQUEST['id'] = (isset($id)) ? $id : null ;

		if (is_null($id)) {
			$this->model->create('jurusan');
		} else {
			$this->model->update('jurusan','id = :id');
		}
		$this->direct(X);
	}

	function delete_jurusan(){

	}

	function akun($id = null){
		$_REQUEST['id'] = (isset($id)) ? $id : null ;
		$_REQUEST['password'] = (empty($_REQUEST['password'])) ? Session::get('password') : $_REQUEST['password'];

		if (is_null($id)) {
			$this->model->create('pengurus');
		} else {
			$this->model->update('pengurus','id = :id');
		}
		$this->direct(X);
	}

	function read($tahun, $month = "00", $id = null){
		
		$id_jurusan = Session::get('id_jurusan');
		$data['jurus'] = ucwords(strtolower(Session::get('jurusan')));
		$data['nama'] = Session::get('nama');

		$status = (isset($id)) ? 'form' : 'list' ;
		
		if (isset($_GET['id']) || isset($_GET['jur'])){
			$status = '';
		}

		Session::set('page',$status);

		Session::set('month',$month);

		$data['dinas'] = $this->model->detail('dinas',1);
		$data['skpd'] = $this->model->detail('skpd',1);
		$data['atad'] = (isset($id)) ? $this->model->detail('inventori',$id) : null ;
		$data['barang'] = (isset($id)) ? $this->model->detail('barang',$data['atad']['id_barang']) : null;
		$data['akun'] = (Session::get('status') != 2) ? $this->model->detail('pengurus',Session::get('id')) : $this->model->detail('pengurus',$_GET['id']) ;

		Session::set('password',$data['akun']['password']);

		$data['nuka'] = (Session::get('status') == 2) ? $this->model->read('pengurus','JOIN jurusan ON id_jurusan = jurusan.id','pengurus.nama, pengurus.lokasi , pengurus.id ,pengurus.status, jurusan.nama jurusan') : null ;
		$data['jurusan'] = (Session::get('status') == 2) ? $this->model->read('jurusan') : null ;
		$data['suruj'] = (isset($_GET['jur'])) ? $this->model->detail('jurusan', $_GET['jur']) : null ;

		$data['link'] = Session::get('link');
		
		$bln = ["01"=>"Januari","02"=>"Februari","03"=>"Maret","04"=>"April","05"=>"Mei","06"=>"Juni","07"=>"Juli","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"November","12"=>"Desember"];

		$bulan = ($month == "00") ? null : "AND MONTH(tanggal) = '$month'" ;

		
		$year = $this->model->read('inventori',"WHERE id_jurusan = '$id_jurusan' ORDER BY tahun ASC",'DISTINCT(YEAR(tanggal)) tahun');
		$data['datas'] = $this->model->read('inventori',"JOIN barang ON barang.id = inventori.id_barang WHERE YEAR(tanggal) = '$tahun' $bulan AND id_jurusan = '$id_jurusan'",'*, inventori.id ini');
		
		$data['tahun'] = '';
		$data['bulan'] = '<option value="00">Semua Bulan</option>';
		
		foreach ($year as $val){
			$select = ($tahun == $val['tahun']) ? 'selected' : null ;
			$data['tahun'] .= '<option value="'.$val['tahun'].'" '.$select.'>'.$val['tahun'].'</option>';
		}

		foreach ($bln as $key => $value) {
			$select = ($month == $key) ? 'selected' : null ;
			$data['bulan'] .= '<option value="'.$key.'" '.$select.'>'.$value.'</option>';
		}
		/*echo "<pre>";
		print_r($data);*/
		$this->view->render('index/body',$data);
	}

	function dinas(){
		extract($_REQUEST);
		$this->model->update('skpd','id = :id',$skpd);
		$this->model->update('dinas','id = :id',$dinas);
		$this->direct(X);
	}

	function cu($id = null){
		$_REQUEST['id_jurusan'] = Session::get('id_jurusan');
		$_REQUEST['tanggal'] = $this->view->dates($_REQUEST['tanggal']);
		$_REQUEST['id'] = (isset($id)) ? $id : null ;

		if (isset($id)) {
			$this->model->update('inventori','id = :id');
		} else {
			$this->model->create('inventori');
		}
		$this->direct(X);
	}

	function item(){
		$datas = $this->model->read('barang');
		$term = trim(strip_tags($_GET['term']));
        $matches = array();
        foreach($datas as $data){
            if(stripos($data['nama'], $term) !== false){
                $data['id'] = $data['id'];
                $data['kode'] = $data['kode'];
                $data['label'] = "{$data['nama']}";
                $matches[] = $data;
            }
        }
        $matches = array_slice($matches, 0, 5);
        print json_encode($matches);
	}

	function delete($id){
		$this->model->delete('inventori',$id);
		$this->direct(X);
	}

	function report($report, $tahun, $month = "00"){
		$id_jurusan = Session::get('id_jurusan');
		
		$data['nama'] = Session::get('nama');
		$data['nip'] = Session::get('nip');
		$data['lokasi'] = Session::get('lokasi');

		$bln = ["Januari"=>"01","Februari"=>"02","Maret"=>"03","April"=>"04","Mei"=>"05","Juni"=>"06","Juli"=>"07","Agustus"=>"08","September"=>"09","Oktober"=>"10","November"=>"11","Desember"=>"12"];
		
		$bulan = ($month == "00" ) ? null : "AND MONTH(tanggal) = '$month'" ;
		
		$data['bulan'] = ($month == "00" ) ? array_search(date('m'), $bln) : array_search($month, $bln) ;
		
		$data['tahun'] = $tahun ;

		$data['dinas'] = $this->model->detail('dinas',1);
		$data['skpd'] = $this->model->detail('skpd',1);
		$data['data'] = $this->model->read('inventori',"JOIN barang ON barang.id = inventori.id_barang WHERE YEAR(tanggal) = '$tahun' $bulan AND id_jurusan = '$id_jurusan' ORDER BY tanggal ASC",'*, inventori.id ini');
		if($_REQUEST['exp']=='export') {
            header("Content-type: application/vnd.ms-excel; name='excel'");
            header("Content-Disposition:filename=$report.xls");
        } else if($_REQUEST['exp']=="print"){
            ?><script>window.print();</script><?php
        }
		$this->view->single('report/'.$report,$data);
	}

}