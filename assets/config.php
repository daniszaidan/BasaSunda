<?php
// Aplikasi Android dapat didownload dari https://s.id/4nyOy
// Pastikan script PHP disimpan di htdocs folder "rest"
// karena aplikasi melakukan request ke http://10.0.3.2/rest/

$server = 'localhost';
$user = 'dosen';
$pass = 'dosen';
$db = 'basasunda2';

$conn = mysqli_connect($server, $user, $pass, $db);
if (!$conn) {
	die('Connection error: '. mysqli_connect_error());
}
?>