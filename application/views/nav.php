<?php
	//add "active" class to the navbar. Thank you, Stack Overflow!

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
      <!-- display 'shows' nav tab if a band is selected -->
<?php
      if($this->session->userdata("band_id"))
      {
        $band_id = $this->session->userdata("band_id");
        $uri = "/shows/index/" . $band_id;
?>
      <li <?=echo_active($band_id)?>><a href="<?=$uri?>">Shows</a></li>
<?php
      }
?>      
    </ul>
    <ul class="nav pull-right">
      <li><a href="/home/log_out">Log Out</a></li>
    </ul>
  </div>
</div>

<div class="clearfix"></div>