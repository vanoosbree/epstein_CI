<?php require_once("header.php") ?>

<div class="container">
	<div class="hero-unit">
		<h1><em>Epstein</em> manages your band</h1>
	</div>

	<!-- spacer div -->
	<div class="span2"></div> 

	<div id="login" class="span4 pull-left">
		<h3>Login</h3>
		<form action="/home/login" method="post">
	
			<input type="text" name="login_email" placeholder="Email" value="<?= set_value('login_email') ?>" />
			<?php echo form_error('login_email') ?>
			<br />
			<input type="password" name="login_password" placeholder="Password" value="<?= set_value('login_password') ?>" /><br />
			<?php echo form_error('login_password') ?>
<?php
	$error = $this->session->userdata('error');
	if (isset($error))
	{
		echo $error . "<br />";
		$this->session->unset_userdata('error');
	}
?>	
			<input type="submit" class="btn btn-inverse" value="Login" />
		</form>
	</div>

	<div id="register" class="span4 pull-left">
		<h3>Register</h3>
		<form action="/home/register" method="post">
			<input type="text" name="name" placeholder="Your Name" value="<?= set_value('name') ?>" />
			<?php echo form_error('name'); ?><br />
			<input type="text" name="email" placeholder="Email" value="<?= set_value('email') ?>"/><br />
			<?php echo form_error('email'); ?>
			<input type="password" name="password" placeholder="Password" /><br />
			<?php echo form_error('password'); ?>
			<input type="password" name="confirm_password" placeholder="Confirm Password" /><br />
			<?php echo form_error('confirm_password'); ?>
			<input type="submit" class="btn btn-inverse" value="Register" />
		</form>
	</div>
</div>

<?php require_once("footer.php") ?>
