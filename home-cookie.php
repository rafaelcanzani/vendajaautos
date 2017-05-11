<?php
	$nomeCookie = 'index';
	$valorDoCookie = isset($_COOKIE[$nomeCookie]) ? $_COOKIE[$nomeCookie]:0;
	if($paginaAtual == $valorDoCookie)
	{
		if($valorDoCookie == 1)
		{
			 header("Location: /index2");
			 exit();
		}
		else if($valorDoCookie == 2)
		{
			header("Location: /index");
			 exit();
		}
	}
	setcookie($nomeCookie, $paginaAtual, time() + (86400 * 30), "/");
?>