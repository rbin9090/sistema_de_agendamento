<?php require'config.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistema de reserva v: 0.1 </title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital@1&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH;?>/css/style.css">
	
</head>
<body>
<header>
	<div class="context-center">
	<div class="logotipo">
		<h2>Robson Barros</h2>
	</div>
	<nav class="menu-desktop">
		<ul>
			<li><a href="#">Agendamento</a></li>
			<li><a href="#" style="color: green;">Datas Disponiveis</a></li>
			<li><a href="#">Especialistas</a></li>
		</ul>
	</nav><!--menu desktop-->
</div><!--context-center-->
</header>
<section class="reserva">
	<div class="context-center">
		<form method="POST">
			<select>
				<?php

				for ($i=0; $i <= 23; $i++) {
					$hora = $i;
					if ($i < 10) {
						$hora = '0'.$hora;
					}
					$hora.=':00:00';
					$dateTime = date('d/m/Y').' '.$hora;
					echo '<option value="'.$dateTime.'">'.$dateTime.'</option>';

				 }		
				?>

			</select>
			<input type="submit" name="acao" value="enviar">
		</form>
	</div>

</section>




</body>
</html>