<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="refresh" content="15">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MONITORAMENTO</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php

	$servidores = [
		"UOL" => "www.uol.com.br",
		"ROTEADOR" => "192.168.1.1",
		"DESCONHECIDO" => "www.ontoin.com.us",
		"GLOBO" => "www.globo.com",
		"CELULAR" => "192.168.1.5",
	];

?>
<div class="center">
	<h1>MONITORAMENTO</h1>

	<div class="cards">

	<?php
	foreach($servidores as $servidor => $ip)
	{
		$retorno = shell_exec("C:\Windows\system32\ping -n 1 $ip");

		if (preg_match("/tempo</", $retorno) || preg_match("/tempo=/", $retorno))
		{
			$status = "online";
		} else {
			$status = "offline";
		}
	?>
		<div class="card <?=$status?>">
			<div class="servidor"><?=$servidor?></div>
			<div class="ip"><?=$ip?></div>
			<div class="status"><?=$status?></div>
		</div>

	<?php
	}
	?>

	</div>

</div>
</body>
</html>