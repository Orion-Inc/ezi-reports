<?php  $school_administration = School::getAdministration($_SESSION['SESS_USER_ID'],"*");?>
<table class="table table-borderless /table-condensed">
	<tbody>
		<tr>
			<td>Title of Head:</td>
			<td><strong><?php App::show($school_administration['school_head_title'])?></strong></td>
		</tr>
		<tr>
			<td>Name of Head:</td>
			<td><strong><?php App::show($school_administration['school_head_fullname'])?></strong></td>
		</tr>
		<tr>
			<td>Title of Asst. Head:</td>
			<td><strong><?php App::show($school_administration['school_ass_head_title'])?></strong></td>
		</tr>
		<tr>
			<td>Name of Asst. Head:</td>
			<td><strong><?php App::show($school_administration['school_ass_head_fullname'])?></strong></td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td>Title of Accountant:</td>
			<td><strong><?php App::show($school_administration['school_accountant_title'])?></strong></td>
		</tr>
		<tr>
			<td>Name of Accountant:</td>
			<td><strong><?php App::show($school_administration['school_accountant_fullname'])?></strong></td>
		</tr>
	</tbody>
</table>
<div class="row">
	<div class="col-xs-12">
		<a href="#" data-toggle="modal" data-target="#edit-administration-info-modal">Edit Administration Information</a>
	</div>
	<div class="col-xs-12">
		<hr class="mt-10 visible-xs">
	</div>
</div>



