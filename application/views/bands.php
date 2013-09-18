<?php require_once("header.php"); require_once("nav.php") ?>

<div class="container">
	<div class="span5 pull-left">
		<!-- singular or plural -->
		<h3>Your band<?php if(gettype($names["names"]) == "array" && count($names["names"]) > 1) echo "s" ?></h3>	
<?php
		if(gettype($names["names"]) == "string")
		{
			echo $names["names"];
		}
		else
		{
			echo "<ul>";
			foreach ($names["names"] as $band_name)
			{
				echo $band_name;
			}
			echo "</ul>";
		}		
?>
		<h4>Create a new band</h4>
		<form action="/bands/add_band" method="post">
			<input type="text" name="band_name" placeholder="Band Name" /><br />
			<input type="submit" class="btn btn-inverse" value="Create" />
		</form>
	</div>

	<div class="span5 pull-left">
		<h3>Join an existing band</h3>
		<ul>
<?php
	// var_dump($all_names);
			foreach ($all_names as $band_name)
			{
				echo "<li><a href='/shows/index/". $band_name->id ."'>". $band_name->band_name ."</a></li>";
			}

?>
			<!-- <li><a href="/shows">Sweetie Bird</a></li>
			<li><a href="/shows">Cool Mountain Boys</a></li>
			<li><a href="/shows">Singin' 'n' Swingin'</a></li>
			<li><a href="/shows">Cheeseball and Socket Joint</a></li> -->
		</ul>
	</div>

</div>

<?php require_once("footer.php") ?>