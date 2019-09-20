<?php

	include('config.php');

	if(Cliente::logado() == False) {
		include('login.php');
	}else {
		include('main.php');
	}

?>