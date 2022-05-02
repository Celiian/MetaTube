<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Content-Type");
header("content-type:application/json");

require_once __DIR__ . '/helper/Function.php';
require_once  __DIR__ . '/ConfigDb.php';

// Le DSN(data source name) est une chaine de caractere composée d'une partie de la config (sans le user/password)
// https://www.php.net/manual/fr/ref.pdo-mysql.connection.php
$dsn = 'mysql:host=' . $config_db['host'] . ';dbname=' . $config_db['dbname'] . ';port=' . $config_db['port'] . '';

// On essaye de se connecter avec PDO
try {
	$db = new PDO($dsn, $config_db['user'], $config_db['pass']);
}
catch (Exception $e) {
	// sinon on die(), cela fait 'crasher' le site internet avec un message d'erreur
	//die('Erreur MySQL, maintenance en cours.' . $e->getMessage());
}

// si tout est OK, nous avons accès à la variable $db permettant d'intéragir avec la BDD
// ce fichier est à inclure en début de script (souvent dans le init.php)

?>
