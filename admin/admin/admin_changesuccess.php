<?
	require('../connectdb.php');
	session_unregister('admin');
	session_destroy();
	redirect('../log/login.php');
?>