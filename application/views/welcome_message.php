<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>css/styles.css">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>css/jquery-ui.min.css">
</head>

<body>
	<div id="container">
		<h1>Task magnement list</h1>
		<div class="row">
			<div class="panel-wrapper">
				<form>
					<div class="form-field">
						<div class="col-grid-1">
							<label for="txtTaskName">Task Name : </label>
						</div>
						<div class="col-grid-3">
							<input type="text" class="txtTaskName form-input" id="txtTaskName" placeholder="Task Name" autocomplete="false" />
						</div>
					</div>
					<div class="form-field">
						<div class="col-grid-1">
							<label for="txtTaskDate">Task Date : </label>
						</div>
						<div class="col-grid-3">
							<input type="text" class="txtTaskDate form-input" id="txtTaskDate" placeholder="Task Date" autocomplete="false" />
						</div>
					</div>
					<div class="form-field">
						<div class="col-grid-1">
							<label for="txtTaskDescription">Task Description : </label>
						</div>
						<div class="col-grid-3">
							<textarea class="txtTaskDescription form-input" id="txtTaskDescription" placeholder="Task Description">
							</textarea>
						</div>
					</div>
					<div class="form-field">
						<button type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="column" style="background-color:#aaa;">
				<h2>Column 1</h2>
				<p>Some text..</p>
			</div>
			<div class="column" style="background-color:#bbb;">
				<h2>Column 2</h2>
				<p>Some text..</p>
			</div>
			<div class="column" style="background-color:#ccc;">
				<h2>Column 3</h2>
				<p>Some text..</p>
			</div>
			<div class="column" style="background-color:#ddd;">
				<h2>Column 4</h2>
				<p>Some text..</p>
			</div>
		</div>
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>
	<script type="text/javascript" src="<?php echo site_url(); ?>js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>js/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$(".txtTaskDate").datepicker();
		});
	</script>
</body>

</html>