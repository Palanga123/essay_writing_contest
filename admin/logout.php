<?php
	session_start();
	session_destroy();
	header('location: /admin/index.html?=thanks');
?>