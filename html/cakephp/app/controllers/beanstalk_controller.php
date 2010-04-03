<?php
class BeanstalkController extends AppController {
	var $uses = null;
	var $components = array('Beanstalker.Beanstalker');

	function beforeFilter(){
		Configure::load('beanstalker');
		$this->Beanstalker->config(Configure::read('Beanstalker'));
	}

	function index(){
		$data = $this->Beanstalker->RepositoryFind();
		$this->set('data', $data);
	}
}
?>
