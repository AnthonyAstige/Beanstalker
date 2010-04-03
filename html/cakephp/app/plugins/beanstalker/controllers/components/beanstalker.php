<?
class BeanstalkerComponent extends Object {
	private $beanstalker;
	function initialize(&$controller, $settings=array()){
		App::Import('Vendor', 'Beanstalker.Beanstalker', array('file' => 'beanstalker.class.php'));
		$this->beanstalker = new Beanstalker();
	}
	function config($settings){
		$this->beanstalker->config($settings);
	}

	function RepositoryFind(){
		return $this->beanstalker->RepositoryFind();
	}
}
?>
