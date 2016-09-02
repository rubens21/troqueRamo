<?php

class GitRepo
{

    private $root_path;
    const COD_SUCCESS = 0;

    public function __construct($root_path)
    {
        $this->root_path = realpath($root_path);
    }

    public function switchBranch($branche)
    {
    	preg_match_all('/(?<data>[^\/]+)/', $branche, $matchs);
		if(count($matchs['data']) == 3)
   		 	$result = $this->execGitCommand('git checkout '.$matchs['data'][2]);
    	else
    		$result = $this->execGitCommand('git checkout '.$matchs['data'][0]);
		//print_r($matchs);exit;
    	if($result['return'] == self::COD_SUCCESS)
    	{
    		$this->execGitCommand('git pull origin '.$matchs[1][0]);
        	return implode("<br>", $result['output']);
    	}else 
    		throw new Exception($result['erro'], $result['return']);
    	
    }

	private function getLocalBranches()
    {
       $result = $this->execGitCommand('git branch -a');
       if($result['return'] == self::COD_SUCCESS)
        {
        	$branches = array();
        	foreach ($result['output'] as $row)
        	{
        		preg_match('/([\*\s])\s*([^\*]+)/', $row, $matchs);
        		if($matchs[1] == '*')
        		  $branches['*'] = trim($matchs[2]);
        	    else
        		  $branches[] = trim($matchs[2]);
        	}
        	return $branches;
        }else
        	throw new Exception($result['erro'], $result['return']);
    }
    
    private function execGitCommand($command)
    {
    	$base = 'cd '.$this->root_path.'; ';
    	$full_command = $base.$command.' 2>&1';
    	exec($full_command, $output, $return_var);
    	if($return_var == self::COD_SUCCESS)
    	   return array('output' => $output, 'return' =>(int)$return_var);
        else
    	   return array('erro' => implode("\n", $output), 'return' => $return_var);
    }

	public function returnOption(){
		$resposta = "";
		foreach($this->getLocalBranches() as $index => $item){
			if(!preg_match('/(->)/',$item))
				$resposta .= '<option value="'.$item.'" '.($index=='*'?'selected="selected"':null).'>'.$item.'</option>';
		}
		return $resposta;
	}
}

