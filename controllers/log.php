<?php
class Log extends Controller{
	
	function __construct(){
		parent::__construct();
		Session::start();
		$this->getModel('index');
		if(Session::get('log')==true) {
			$this->direct(X);
		}
	}
	function index(){
		$this->view->single('login');
	}
	function in(){
		$result = $this->index->log();
		if (!empty($result)) {
			extract($result);
			Session::set('log',true);
			Session::set('id',$id);
			Session::set('id_jurusan',$id_jurusan);
			Session::set('jurusan',$jurusan);
			Session::set('nama',$nama);
			Session::set('nip',$nip);
			Session::set('lokasi',$lokasi);
			Session::set('status',$status);
			$this->direct(X);
		} else {
			$this->direct(X.'log');
		}
	}
	function out(){
		Session::destroy();
		$this->direct(X.'log');
	}
}