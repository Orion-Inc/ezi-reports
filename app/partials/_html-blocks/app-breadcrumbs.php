<?php if (User::userSession('SESS_USER_TYP') == 'eziAdmin'): ?>
	<?php if (isset($_GET['admin-dashboard'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-dashboard"></i> Dashboard</h4>
		<ol class="breadcrumb mb-0">
			<li class="active">{Description}</li>
		</ol>
	<?php endif ?>

	<?php if (isset($_GET['admin-school'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-home"></i> Schools</h4>
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

	<?php if (isset($_GET['admin-subjects'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-book"></i> Subjects</h4>
		<ol class="breadcrumb mb-0">
			<li class="active">{Description}</li>
		</ol>
	<?php endif ?>

	<?php if (isset($_GET['admin-reports'])): ?>
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
<?php endif ?>

<?php if (User::userSession('SESS_USER_TYP') == 'school'): ?>
	<?php if (isset($_GET['dashboard'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-dashboard"></i> Dashboard</h4>
		<ol class="breadcrumb mb-0">
			<li class="active">{Description}</li>
		</ol>
	<?php endif ?>

	<?php if (isset($_GET['school'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-home"></i> School</h4>
		<ol class="breadcrumb mb-0">
			<li class="active">{Description}</li>
		</ol>
	<?php endif ?>

	<?php if (isset($_GET['class'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-blackboard"></i> Class Room</h4>
		<ol class="breadcrumb mb-0">
			<li class="active">{Description}</li>
		</ol>
	<?php endif ?>

	<?php if (isset($_GET['student'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-user"></i> Students</h4>
		<ol class="breadcrumb mb-0">
			<li class="active">{Description}</li>
		</ol>
	<?php endif ?>

	<?php if (isset($_GET['bills'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-wallet"></i> Bills</h4>
		<ol class="breadcrumb mb-0">
			<li class="active">{Description}</li>
		</ol>
	<?php endif ?>

	<?php if (isset($_GET['reports'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-files"></i> Reports</h4>
		<ol class="breadcrumb mb-0">
			<li class="active">{Description}</li>
		</ol>
	<?php endif ?>

	<?php if (isset($_GET['settings'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-settings"></i> Settings</h4>
		<ol class="breadcrumb mb-0">
			<li class="active">{Description}</li>
		</ol>
	<?php endif ?>
<?php endif ?>

<?php if (User::userSession('SESS_USER_TYP') == 'student'): ?>
	<?php if (isset($_GET['student-overview'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-briefcase"></i> Overview</h4>
		<ol class="breadcrumb mb-0">
			<li class="active">{Description}</li>
		</ol>
	<?php endif ?>

	<?php if (isset($_GET['student-reports'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-files"></i> Reports</h4>
		<ol class="breadcrumb mb-0">
			<li class="active">{Description}</li>
		</ol>
	<?php endif ?>

	<?php if (isset($_GET['student-bills'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-wallet"></i> Bills</h4>
		<ol class="breadcrumb mb-0">
			<li class="active">{Description}</li>
		</ol>
	<?php endif ?>

	<?php if (isset($_GET['student-settings'])): ?>
		<h4 class="mt-0 mb-5"><i class="ti-settings"></i> Settings</h4>
		<ol class="breadcrumb mb-0">
			<li class="active">{Description}</li>
		</ol>
	<?php endif ?>
<?php endif ?>










