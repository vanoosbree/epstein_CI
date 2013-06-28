<?php require_once("header.php"); require_once("nav.php") ?>

<script type="text/javascript">
	$(document).ready(function(){

		// for giving the songs in the setlist a unique name
		var count = 0;

		$("#sortable").sortable();

		$("#songs li").dblclick(function(){
			$("#setlist ul").append('<li>'+ $(this).html() +'<input type="hidden" name="'+ count +'" value="'+ $(this).html() +'" /></li>').fadeIn();
			count++;
			attachEvent();
		});

		function attachEvent()
		{
			$("#setlist li").dblclick(function(){
				$(this).fadeOut();
			});
		}

	});
</script>

<div class="container">
	<div id="songs" class="pull-left span6">
		<h3>Add a song to your song bank</h3>
		<form action="/users/add_song" method="post" >
			<input type="text" name="title" placeholder="Song Title" />
			<input type="submit" class="btn btn-inverse btn-mini" value="Add Song" >
		</form>
		<h5>Double-click a song to the setlist</h5>
		<ul id="songlist">
			<li>Whoomp, There It Is</li>
			<li>The Wind Beneath My Wings</li>
			<li>Paint It Black</li>
			<li>867-5309</li>
			<li>Everybody Hurts</li>
			<li>Hey, Jude</li>
			<li>He's Alive</li>
			<li>Hotel California</li>
			<li>Believe</li>
		</ul>
		
	</div>

	<div id="setlist" class="pull-left span5">
		<h3>Setlist for Nicki Minaj's Birthday</h3>
		<h5>Double-click to remove it, drag to reorder</h5>
		<form action="/users/update_setlist" method="post" >
			<ul id="sortable">

			</ul>
			<input type="submit" class="btn btn-inverse btn-mini" value="Save Setlist" />
		</form>
	</div>
	<div class="clearfix"></div>
</div>

<?php require_once("footer.php") ?>
