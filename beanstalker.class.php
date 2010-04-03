<?
	class Beanstalker {
		function Beanstalker($settings=null){
			if(isset($settings)){
				$this->config($settings);
			}
		}

		function config($settings){
			if(!isset($settings['format'])){
				$settings['format'] = 'array';
			}
			
			$this->domain	= $settings['domain'];
			$this->login	= $settings['login'];
			$this->password	= $settings['password'];
			$this->format	= $settings['format'];

			switch($this->format){
				case 'array':
					require_once('xml2array.function.php');
					break;
			}
		}

		function RepositoryFind(){
			$url = 'http://'.$this->domain.'.beanstalkapp.com/api/repositories.xml';
			
			$context = stream_context_create(array(
			    'http' => array(
			        'header'  => "Authorization: Basic " . base64_encode("$this->login:$this->password")
				)
			));
			$data = file_get_contents($url, false, $context);
			
			return $this->ret($data);
		}

		function ret($data){
			switch($this->format){
				case 'array';
					return xml2array($data);
				default:
					return $data;
			}
		}

	}
?>
