<?php
	//adding "active" class to the navbar, thank you Stack Overflow!
	function echo_active($requestUri)
	{
		$current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

	    if ($current_file_name == $requestUri)
	    {
	    	echo 'class="active"';
	    }  
	}
?>

<div class="navbar row-fluid">
  <div class="navbar-inner">
    <ul class="nav">
      <li <?=echo_active("about")?>><a class="brand" href="/home/about"><em>Epstein</em></a></li>
      <li <?=echo_active("bands")?>><a href="/bands">Bands</a></li>
      <li <?=echo_active("shows")?>><a href="/shows/index/">Shows</a></li>
      <li><a href="/home/log_out">Log Out</a></li>
    </ul>
  </div>
</div>

<div class="clearfix"></div>