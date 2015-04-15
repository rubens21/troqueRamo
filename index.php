<?php 
require 'control/index.ctrl.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Troque meu ramo</title>
</head>
<body>
	<h1>Trocar ramo</h1>
	<div><pre><code><?php echo $resposta;?></code></pre></div>
	<form action="" method="post">
		<label for="ramo">Ramo</label>
		<select id="ramo" name="ramo">
			<?php echo $list_options;?>
		</select>
		
		<input type="submit" name="action" value="Trocar" />
	</form>
</body>
</html>