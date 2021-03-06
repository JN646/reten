<?php
 /**
  * Project:		Retention Management System
  * Copyright:		(C) JGinn 2017
  * FileCreated:	171203
  */
?>
<div class="col-md-1">
	<h3>LINKS</h3>
	<h5>Jobs</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>jobs/index.php">List</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>jobs/details.php">Details</a></li>
	</ul>
	<h5>Inbox & Tasks</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>inbox/mail.php">Inbox</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>inbox/todo.php">Todo</a></li>
	</ul>
	<h5>Data</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>import/import_index.php">Import</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>export/export_index.php">Export</a></li>
	</ul>
	<h5>User</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>dashboard/dashboard.php">Dash</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>rota/rota.php">Rota</a></li>
	</ul>
	<hr>
	<h5>Admin</h5>
	<ul class="nav flex-column">
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>admin/users.php">Users</a></li>
		<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>admin/clients.php">Clients</a></li>
	</ul>
</div>