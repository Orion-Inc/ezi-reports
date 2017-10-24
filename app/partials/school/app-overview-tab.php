<?php  $school = School::getSchool($_SESSION['SESS_USER_ID'],"*"); ?>
<table class="table table-borderless /table-condensed">
	<tbody>
		<tr>
			<td>Unique Code:</td>
			<td><strong><?php App::show($school['school_code'])?></strong></td>
		</tr>
		<tr>
			<td>School Name:</td>
			<td><strong><?php App::show($school['school_name'])?></strong></td>
		</tr>
		<tr>
			<td>Motto:</td>
			<td><strong><?php App::show($school['school_motto'])?></strong></td>
		</tr>
		<tr>
			<td>Address:</td>
			<td><strong><?php App::show($school['school_address'])?></strong></td>
		</tr>
		<tr>
			<td>Telephone:</td>
			<td><strong><?php App::show($school['school_telephone'])?></strong></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><strong><?php App::show($school['school_email'])?></strong></td>
		</tr>
		<tr>
			<td>Website:</td>
			<td><strong><?php App::show($school['school_website'])?></strong></td>
		</tr>
	</tbody>
</table>
<div class="row">
	<div class="col-xs-6 col-sm-12">
		<a href="#" data-toggle="modal" data-target="#edit-school-info-modal">Edit School Information</a>
	</div>
	<span class="col-xs-1 visible-xs">|</span>
	<div class="col-xs-5 visible-xs">
		<a href="#" data-toggle="modal" data-target="#edit-school-crest-modal">Change Crest</a>
	</div>
</div>



