<?php
global $config;
$config = array();

if(ENVIRONMENT == "development"){
	$config['dbname'] = "MyYoutube";
	$config['host'] = "localhost";
	$config['dbuser'] = "root";
	$config['dbpass'] = "";
}
else{
	//Informaçoes do servidor externo
	$config['dbname'] = "";
	$config['host'] = "";
	$config['dbuser'] = "";
	$config['dbpass'] = "";
}
?>