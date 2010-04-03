<?require_once('header.html')?>

<?
	// All code required to get list of repositories
	require_once('../../beanstalker.class.php');
	require_once('config.php');	// Place your configuration here in a copy of config.php.default
	$beanstalker = new Beanstalker(BEANSTALKER_CONFIG::$default);
	$repositories = $beanstalker->RepositoryFind();
?>

<h1>Demo connecting to beanstalk and retrieving repositories list</h1>
<h2>Returns data in array format by default</h2>
<?="<pre>".print_r($repositories, true)."</pre>";?>

<?require_once('footer.html')?>
