<?php 
$type		= 'mysql';
$server 	= 'localhost';
$charset	= 'utf8mb4';
$username	= 'root';
$password	= 'aksenzhd123@';

$option		= [
	PDO::ATTR_ERRMODE		=> PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES	=> false,
];


$dsn = "$type:host=$server;dbname=$dbname;charset=$charset";
try{
    $pdo = new PDO($dsn, $username, $password,$option);
}
catch(PDOException $e){
    throw new PDOException($e->getMessage(), $e->getCode());
}
?>
