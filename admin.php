<?php
	date_default_timezone_set('America/Sao_Paulo');
	require 'config.php';
	$pdo = new PDO('mysql:host=localhost;dbname=sistema_agendamento','root','');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Reserva</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH ?>/css/styleAdmin.css">
<body>
	<header>
		<div class="center">
		<div class="logo">
			<h2>Robson Barros Amin</h2>
		</div>

		<nav class="menu">
			<ul>
				<li><a href="">Reservas Atuais</a></li>
			</ul>
		</nav>
		<div class="clear"></div>
		</div>
	</header>

	<section class="agendamentos">
		<div class="center">

			<?php
				if(isset($_GET['excluir'])){
					$id = (int)$_GET['excluir'];
					$pdo->exec("DELETE FROM `agendados` WHERE id = $id");
					echo '<div class="sucesso">O agendamento foi deletado com sucesso!</div>';
				}
				$info = $pdo->prepare("SELECT * FROM `agendados`");
				$info->execute();
				$info = $info->fetchAll();
				foreach ($info as $key => $value) {
			?>
			<div class="box-single-horario">
				<div class="box-single-wraper">
					Nome: <?php echo $value['nome_pessoa'] ?><br />
					Data e Horário: <?php echo date('d/m/Y H:i:s',strtotime($value['horario'])); ?>
					<br />
					<a href="?excluir=<?php echo $value['id']; ?>">Excluir!</a>
				</div>
			</div>
			<?php } ?>
			<div class="clear"></div>
		</div>
	</section>

	
		</div>
	</section>
</body>
</html>