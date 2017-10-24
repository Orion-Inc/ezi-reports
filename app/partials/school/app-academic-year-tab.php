<?php  $school_academic_year = School::getAcademicYear($_SESSION['SESS_USER_ID'],"*");?>
<table class="table table-borderless /table-condensed">
	<tbody>
		<tr>
			<td>Current Academic Year:</td>
			<td><strong><?php App::show($school_academic_year['school_current_academic_year'])?></strong></td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td>Term:</td>
			<td><strong><?php App::show($school_academic_year['school_academic_term'])?></strong></td>
		</tr>
	</tbody>
</table>
<div class="row">
	<div class="col-xs-6">
		<a href="#" data-toggle="modal" data-target="#edit-academic-year-modal">Edit Academic Year</a>
	</div>
</div>



