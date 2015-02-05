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
    	preg_match('/(?<keyword>remotes\/)*(?<branche>.*)/', $branche, $matchs);
    	$result = $this->execGitCommand('checkout '.$matchs['branche']);
    	if($result['return'] == self::COD_SUCCESS)
    	{
        	return implode("\n", $result['output']);
    	}else 
    		throw new Exception($result['erro'], $result['return']);
    	
    }
    
    public function getLocalBranches()
    {
       $result = $this->execGitCommand('branch -a');
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
    	$base = 'git -C '.$this->root_path.' ';
    	$full_command = $base.$command.' 2>&1';
    	exec($full_command, $output, $return_var);
    	if($return_var == self::COD_SUCCESS)
    	   return array('output' => $output, 'return' =>(int)$return_var);
        else
    	   return array('erro' => implode("\n", $output), 'return' => $return_var);
    }
}
