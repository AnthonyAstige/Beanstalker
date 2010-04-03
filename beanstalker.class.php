<?
	class Beanstalker {
		/* Params
		 *	Useage:
		 *
		 *		$beanstalker = new Beanstalker(array(
		 *			'domain'	=> 'your_beanstalk_account_subdomain',
		 *			'login'		=> 'login',
		 *			'password'	=> 'password'
		 *		));
		 *
		 */
		function Beanstalker($params){
			if(!isset($params['format'])){
				$params['format'] = 'array';
			}
			
			$this->domain	= $params['domain'];
			$this->login	= $params['login'];
			$this->password	= $params['password'];
			$this->format	= $params['format'];

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
