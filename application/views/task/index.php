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
    <script type="text/javascript">
        let base_url = '<?php echo base_url();?>';
    </script>
</head>

<body>
    <div id="container">
        <h1>Task magnement list</h1>
        <div class="row">
            <div class="panel-wrapper">
                <div class="alert alert-danger print-error-msg" style="display:none"></div>
                <form method="POST">
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
                            <textarea class="txtTaskDescription form-input" id="txtTaskDescription" placeholder="Task Description" name="txtTaskDescription" autocomplete="off"></textarea>
                        </div>
                    </div>
                    <div class="form-field">
                        <input type="submit" name="save" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
        <div class="row task-grid-lists">
            <?php if (isset($data) && $data && count($data) > 0) : ?>
                <?php foreach ($data as $row) : ?>
                    <div class="column">
                        <h4>Task Name: <?php echo $row->task_name; ?></h4>
                        <p>Task Date : <?php echo $row->task_date; ?></p>
                        <p><?php echo $row->task_description; ?></p>
                        <span><button class="delete-task" data-delete-id="<?php echo $row->id; ?>" onclick="delete_task(<?php echo $row->id; ?>)">X</button><span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>js/scripts.js"></script>
</body>
</html>