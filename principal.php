<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="estilos_principal.css">
		<title>Mi Página Web</title>
	</head>
	<body>
		<!-- Sección de inicio del código php -->
		<?php
			session_start();
			if (isset($_SESSION["usuario"])){
				$usuario=$_SESSION["usuario"];
		?>
		
		<div align='center'>
			<table>
				<tr>
					<td><?php echo "Usuario:".$usuario ?></td>
					<td>
						<img src="img/lang/eng.gif" alt="Inglés" height="25px">
						<img src="img/lang/es.gif" alt="Español" height="25px">
					</td>
					<td>
						<!-- Imprime el número de visitantes -->
						<p>Número de visitantes:
							<?php
								$archivo_visitantes = "visitantes.txt";
								$f = fopen($archivo_visitantes, "r"); 
								if($f)
								{
									$visitantes = fread($f, filesize($archivo_visitantes));
									++$visitantes;
									echo $visitantes;
									fclose($f);
								}
								$f = fopen($archivo_visitantes, "w+");
								if($f)
								{
									fwrite($f, $visitantes);
									fclose($f);
								}
							?>
						</p>
						<a href='cerrar_sesion.php'>Cerrar sesión</a></td>
					<td></td>
				</tr>
			</table>
		</div>
		<br><br>
		<div align='center'>
		<table class='tabla1'>
			<tr>
				<td class='celda1_t1'><h1>BIENVENIDOS A MI PAGINA PRINCIPAL</h1></td>
			</tr>
		</table>
		</div>
		<br><br>

		<div class='tabla2'>
			<h2>La frase del día es:</h2>
		<!-- Lee e imprime las frases -->
			<?php
			$archivo = "frases.txt";
			$frases = file($archivo);
			shuffle($frases);
			//echo $frases[0];
			$columnas = explode("&",$frases[0]);
			echo "<q>".$columnas[0]."</q>"."<br>";
			echo "<i>".$columnas[1]."</i>";
			?>
		</div>
		<br><br>
		<div>
			<table class='tabla3'>
				<tr>
					<td class='celda1_t3'>
						<!-- Lee e imprime los lugares -->
						<?php
							$archivo2 = "lugares.txt";
							$lugares = file($archivo2);
							shuffle($lugares);
							//echo $frases[0];
							$columnas = explode("&",$lugares[0]);
							echo "<p>Uno de mi lugares favoritos es:<br>";
							echo "<p>".$columnas[1]."</p>";
							echo "<img src='img/lugares/".$columnas[0]."'>"."<br>";
						?>
					</td>
					<td>
						<button onclick="location.reload()">Continuar</button>
					</td>
					<td class='celda2_t3'>
						<!-- Lee e imprime las mascotas -->
						<?php
							$archivo3 = "mascotas.txt";
							$mascotas = file($archivo3);
							shuffle($mascotas);
							//echo $frases[0];
							$columnas = explode("&",$mascotas[0]);
							echo "<p>Unas de mi mascotas favoritas son:<br>";
							echo "<p>".$columnas[1]."</p>";
							echo "<img src='img/mascotas/".$columnas[0]."'>"."<br>";
						?>
					</td>
				</tr>
			</table>
		</div>
		<!-- Fin el if-else -->
		<?php
			}else{
				$prog='acceso.php';
				header("Location: $prog");
			}
		?>
</body>
</html>