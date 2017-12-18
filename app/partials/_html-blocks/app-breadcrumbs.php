<?php if (isset($_GET['dashboard']) || isset($_GET['admin-dashboard'])): ?>
	<h4 class="mt-0 mb-5"><i class="ti-dashboard"></i> Dashboard</h4>
	<ol class="breadcrumb mb-0">
	    <li class="active">{Description}</li>
	</ol>
<?php endif ?>

<?php if (isset($_GET['school']) || isset($_GET['admin-school'])): ?>
	<?php if (isset($_GET['admin-school'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-user"></i> Schools</h4>
	<?php else: ?>
		<h4 class="mt-0 mb-5"><i class="ti-home"></i> School</h4>
	<?php endif ?>
	<ol class="breadcrumb mb-0">
	    <li class="active">{Description}</li>
	</ol>
<?php endif ?>

<?php if (isset($_GET['class'])): ?>
	<h4 class="mt-0 mb-5"><i class="ti-blackboard"></i> Classes</h4>
	<ol class="breadcrumb mb-0">
	    <li class="active">{Description}</li>
	</ol>
<?php endif ?>

<?php if (isset($_GET['student'])): ?>
	<h4 class="mt-0 mb-5"><i class="ti-user"></i> Student</h4>
	<ol class="breadcrumb mb-0">
	    <li class="active">{Description}</li>
	</ol>
<?php endif ?>

<?php if (isset($_GET['bills'])): ?>
	<h4 class="mt-0 mb-5"><i class="ti-credit-card"></i> Bills</h4>
	<ol class="breadcrumb mb-0">
	    <li class="active">{Description}</li>
	</ol>
<?php endif ?>

<?php if (isset($_GET['admin-courses'])): ?>
	<h4 class="mt-0 mb-5"><i class="ti-book"></i> Courses</h4>
	<ol class="breadcrumb mb-0">
	    <li class="active">{Description}</li>
	</ol>
<?php endif ?>

<?php if (isset($_GET['reports']) || isset($_GET['admin-reports'])): ?>
	<h4 class="mt-0 mb-5"><i class="ti-files"></i> Reports</h4>
	<ol class="breadcrumb mb-0">
	    <li class="active">{Description}</li>
	</ol>
<?php endif ?>

<?php if (isset($_GET['search']) || isset($_GET['admin-search'])): ?>
	<h4 class="mt-0 mb-5"><i class="ti-search"></i> Search</h4>
	<ol class="breadcrumb mb-0">
	    <li class="active">{Description}</li>
	</ol>
<?php endif ?>

<?php if (isset($_GET['admin-live-chat'])): ?>
	<h4 class="mt-0 mb-5"><i class="ti-comments"></i> Live Chat</h4>
	<ol class="breadcrumb mb-0">
	    <li class="active">{Description}</li>
	</ol>
<?php endif ?>


