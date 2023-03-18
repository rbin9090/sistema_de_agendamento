<?php date_default_timezone_set('America/Sao_Paulo'); 
require'config.php';?>
<?php

$pdo = new PDO('mysql:host=localhost;dbname=sistema_agendamento','root','');
?>
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
		<?php

		if (isset($_POST['acao'])) {
					$nome = $_POST['nome'];
					$horario = $_POST['datahora'];
					

			
			try {
				                   $date = DateTime::createFromFormat('d/m/Y H:i:s', $horario);
   								$horario = $date->format("Y-m-d H:i:s");
				//$pdo = new PDO('mysql:host='.HOST.';'.'dbname='.DATABASE.','.USER.','.PASS.'');
				
				$sql = $pdo->prepare("INSERT INTO `agendados` VALUES (null,?,?)");
				$sql->execute(array($nome,$horario));
				echo('<div class="sucesso">Seu Horário foi agendado com sucesso!</div>');

			} catch (Exception $e) {
				echo "falha na conexao";
			}
			

			//quero fazer uma reserva ou um agendamento


		}

		?>
		<form method="POST">
			<input type="text" name="nome" placeholder="Qual é o seu nome?">
			<select name="datahora">
				<?php

				for ($i=0; $i <= 23; $i++) {
					$hora = $i;
					if ($i < 10) {
						$hora = '0'.$hora;
					}
					$hora.=':00:00';

					$verify = date('Y-m-d').' '.$hora;
					$sql = $pdo->prepare("SELECT * FROM `agendados` WHERE horario = '$verify'");
					$sql->execute();

					if ($sql->rowCount() == 0 && strtotime($verify) > time()) {
					$dateTime = date('d/m/Y').' '.$hora;
					echo '<option value="'.$dateTime.'">'.$dateTime.'</option>';
					}



				 }		
				?>

			</select>
			<input type="submit" name="acao" value="Agendar">
		</form>
	</div>

</section>




</body>
</html>