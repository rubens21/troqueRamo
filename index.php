<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Troque meu ramo</title>
	</head>
	<body>
		<h1>Trocar ramo</h1>
		<div><pre><code id="res"></code></pre></div>
		</br>
		<form action="" method="post">
			<label for="ramo">Ramo</label>
			</br></br>
			<select id="devel" name="devel" onchange="changeDevel($(this))">
				<option value=""></option>
				<option value="feijo">Feijó</option>
				<option value="ian">Ian</option>
				<option value="justina">Justina</option>
				<option value="rubens">Rubens</option>
			</select>
			</br></br>
			<select id="ramo" name="ramo"></select>
			</br></br>
			<input type="hidden" name="repo" id="repo" value="<?php echo isset($_POST['repo'])?$_POST['repo']:'';?>" />
			<button type="button" name="action" onclick="changeBranch()">Trocar</button>
		</form>
		</br>
		<script type="text/javascript" src="static/js/jquery-2.0.3.js"></script>
		<script type="text/javascript" src="static/js/script.js"></script>
	</body>
</html>
