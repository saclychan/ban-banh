<?
	require('../connectdb.php');
	session_unregister('admin');
	session_destroy();
	redirect('login.php');
?>
