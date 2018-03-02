<?php 

function db_connect() {
	// Тут работает переменная connection  которая будет потом соединением 

	static $connection;

	// проверяем есть ли у нас такая переменная и все ли с ней норм
	if(!isset($connection)) {
		// подклюаем конфиг
		// если тут не работает - то надо проверять через трассировку
		$config = parse_ini_file('./config/config.ini');
		// подключаемся к базе данных
		$connection = mysqli_connect($config['servername'],$config['username'],$config['password'],$config['dbname']);
	}
// проверяем как там наше подключение - если нет будет ошибка 
	if($connection === false) {

		return mysqli_connect_error();	
	}
// возвращаем нашу переменную которая будет мостом с БД
	return $connection;
}
 // вызываем и закачиваем в новую переменную 
$connection = db_connect();
// тут задаем кодировку для русских букв - иначе все будет не по порядку 
mysqli_query($connection,"SET NAMES 'utf8' ");
// еще одна проверка 
if ($connection->connect_error) {

	die("Connection failed: " . $connection->connect_error);
}

?>