<?php require_once("header.php"); require_once("nav.php") ?>

<script type="text/javascript">
	$(document).ready(function(){
		//attach listeners for existing setlist <li>'s
		attachEvent();

		// for giving the songs in the setlist a unique name
		var count = 0;

		$("#sortable").sortable();

		$("#songs li").dblclick(function(){
			$("#setlist ul").append('<li>'+ $(this).html() +'<input type="hidden" name="'+ count +'" value="'+ $(this).html() +'" /></li>');

			$("#no_songs").fadeOut();
			count++;
			attachEvent();
		});

		//attach jQuery to <li>'s that weren't there on page load
		function attachEvent()
		{
			$("#setlist li").dblclick(function(){
				$(this).remove();
			});
		}
	});
</script>

<div class="container">
	<div id="songs" class="pull-left span6">
		<h3>Add a song to your song bank</h3>
		<form action="/setlist/add_song" method="post" >
			<input type="text" name="title" placeholder="Song Title" />
			<input type="submit" class="btn btn-inverse btn-mini" value="Add Song" >
		</form>
<?php
	if($titles)
	{	
		echo "<h5>Double-click a song to the setlist</h5>
			<ul id='songlist'>";
		foreach ($titles as $title)
		{
			echo "<li>".$title->title."</li>";
		}
		echo "</ul>";
	}
	else
	{
		echo "<p>You haven't added any songs yet.</p>";
	}	
?>
	</div>

	<div id="setlist" class="pull-left span5">
		<h3>Setlist for 
<?php
			//name of show
			$description = ($this->session->userdata("description"));
			// var_dump($description);
			// die();

			echo $description[0]->description;
?>		
		</h3>
		<h5>Double-click to remove, drag to reorder</h5>
		<form action="/setlist/update_setlist" method="post" >
			<ul id="sortable">
<?php
		if ($setlist)
		{
			foreach ($setlist as $song)
			{	
				echo "<li>" . $song . "<input type='hidden' name='". $song  ."' value='". $song ."' /></li>";
			}
		}
?>
			</ul>
			<input type="submit" class="btn btn-inverse btn-mini" value="Save Setlist" />
		</form>
	</div>
	<div class="clearfix"></div>
</div>

<?php require_once("footer.php") ?>
