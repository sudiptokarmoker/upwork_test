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
				<form method="POST" enctype="multipart/form-data">
					<div class="form-field">
						<div class="col-grid-1">
							<label for="txtTaskName">Task Name : </label>
						</div>
						<div class="col-grid-3">
							<input type="text" class="txtTaskName form-input" id="txtTaskName" placeholder="Task Name" autocomplete="off" name="txtTaskName" />
						</div>
					</div>
					<div class="form-field">
						<div class="col-grid-1">
							<label for="txtTaskDate">Task Date : </label>
						</div>
						<div class="col-grid-3">
							<input type="text" class="txtTaskDate form-input" id="txtTaskDate" placeholder="Task Date" autocomplete="off" name="txtTaskDate" />
						</div>
					</div>
					<div class="form-field">
						<div class="col-grid-1">
							<label for="txtTaskDescription">Task Description : </label>
						</div>
						<div class="col-grid-3">
							<textarea class="txtTaskDescription form-input" id="txtTaskDescription" placeholder="Task Description" name="txtTaskDescription" autocomplete="off">
							</textarea>
						</div>
					</div>
					<div class="form-field">
						<input type="submit" name="save" value="Submit" />
					</div>
				</form>
			</div>
		</div>
		<?php if (isset($data) && $data && count($data) > 0) : ?>
			<div class="row">
				<?php foreach ($data as $row) : ?>
					<div class="column" style="background-color:#aaa;">
						<h2><?php echo $row->task_name; ?></h2>
						<p><?php echo $row->task_description; ?></p>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>
	<script type="text/javascript" src="<?php echo site_url(); ?>js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="<?php echo site_url(); ?>js/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$(".txtTaskDate").datepicker({
				dateFormat: "yy-mm-dd",
				altFormat: "yy-mm-dd"
			});
			/**
			 * Form post handle
			 */
			// process the form
			$('form').submit(function(event) {
				// get the form data
				// there are many ways to get this data using jQuery (you can use the class or id also)
				var formData = {
					'task_name': $('input[name=txtTaskName]').val(),
					'task_date': $('input[name=txtTaskDate]').val(),
					'task_description': $('input[name=txtTaskDescription]').val()
				};
				// process the form
				$.ajax({
						type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
						url: '<?php echo base_url()."index.php/tasks/test/"; ?>', // the url where we want to POST
						data: formData, // our data object
						dataType: 'json', // what type of data do we expect back from the server
						//encode: true
					})
					// using the done promise callback
					.done(function(data) {
						// log data to the console so we can see
						console.log(data);
						// here we will handle errors and validation messages
					});
				// stop the form from submitting the normal way and refreshing the page
				event.preventDefault();
			});
			/**
			 * end of form post
			 */
		});
	</script>
</body>

</html>