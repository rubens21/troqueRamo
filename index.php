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
		<label for="repo">Repositorio</label>
		<select id="repo" name="repo">
			<option value="feijo/DevRepo-V3.2">Pedro</option>
			<option value="justina/server" <?php echo $_POST['repo'] == "justina/server" ? 'selected="selected"' : ''?>>Justina</option>
			<option value="ian-dev/bfmf" <?php echo $_POST['repo'] == "ian-dev/bfmf" ? 'selected="selected"' : ''?>>Ian</option>
		</select>
		<input type="submit" name="action" value="Repo" />
	</form>
	</br>
	<form action="" method="post">
		<label for="ramo">Ramo</label>
		<select id="ramo" name="ramo">
			<?php echo $list_options;?>
		</select>
		<input type="hidden" name="repo" value="<?php echo isset($_POST['repo'])?$_POST['repo']:'';?>" />
		<input type="submit" name="action" value="Trocar" />
	</form>
</body>
</html>
