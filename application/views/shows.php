<?php
	require_once("header.php");
	require_once("nav.php");
?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#datepicker").datepicker();
		$("#timepicker").timepicker({ 'scrollDefaultNow': true });
	});
</script>

<div class="container">
	
	<h1 class="text-center"><?= $band_info[0]->band_name ?></h1>
	<h3>Add a show</h3>
	<form action="/shows/add_show" method="post">
		<input type="text" id="datepicker" name="date" placeholder="Date" />
		<input type="text" id="timepicker" name="time" placeholder="Time" />
		<input type="text" name="description" placeholder="Description" />
		<input type="text" name="address" placeholder="Address" /><br />
		<input type="submit" class="btn btn-inverse" value="Add Show" />
	</form>

<?php 
	if(!$shows)
	{
		echo "<p class='text-center'>You haven't scheduled any shows yet.</p>";
	}
	else
	{
?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Date &amp; Time</th>
				<th>Description</th>
				<th>Address</th>
				<th>Setlist</th>
			</tr>
		</thead>
		<tbody>
<?php
		foreach ($shows as $show)
		{
			echo "<tr>
					<td>". date('M jS, Y', strtotime($show->date)) ." at ". date('g:i A', strtotime($show->time)) . "</td>
					<td>". $show->description ."</td>
					<td>". $show->address ."</td>
					<td>Setlist</td>
				</tr>";
		}
	}
?>
		</tbody>
	</table>	
</div>

<?php require_once("footer.php") ?>
