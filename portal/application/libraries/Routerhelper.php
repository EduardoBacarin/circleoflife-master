<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RouterHelper{

	public function whichSubRoute()
	{
	    $subs = array(
	                "pioneerpro"=>"pioneerpro/",
	                "demo"=>"pioneerpro/",
	                "webbt"=>"pioneerpro/",
	                "assured"=>"pioneerpro/"
	                );

	    $curr = $_SERVER['HTTP_HOST'];
	    $curr = explode('.', $curr);
	    if(array_key_exists($curr[0], $subs))
	    {
	        return array($curr[0], $subs[$curr[0]]);
	    }
	    return $subs = array(
	                0 => "default",
	                1 =>"pioneerpro/"
	            );
	}
}
?>