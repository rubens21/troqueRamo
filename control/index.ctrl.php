<?php
require 'class/GitRepo.class.php';

if(isset($_POST['repo'])){
	define('PATH_REPO', "/var/www/".$_POST['repo']);
}else{
	define('PATH_REPO', "/var/www/feijo/DevRepo-V3.2");
}

switch ($_REQUEST['action']) {
	case 'Trocar':
		try{
			$Repo = new GitRepo(PATH_REPO);
			$resposta = $Repo->switchBranch($_POST['ramo']);
		}catch (Exception $e){
			$resposta =  $e->getMessage();
		}
	default :
		
		try{
			$Repo = new GitRepo(PATH_REPO);
			foreach($Repo->getLocalBranches() as $index => $item){
				$list_options .= '<option value="'.$item.'" '.($index=='*'?'selected="selected"':null).'>'.$item.'</option>';
			}
		}catch (Exception $e){
			$resposta =  $e->getMessage();
		}
	break;
}


