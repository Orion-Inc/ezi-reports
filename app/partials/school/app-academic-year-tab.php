<?php  $school_academic_year = School::getAcademicYear($_SESSION['SESS_USER_ID'],"*");?>
<table class="table table-borderless /table-condensed">
	<tbody>
		<tr>
			<td colspan="1">Current Academic Year:</td>
			<td><strong><?php App::show($school_academic_year['school_current_academic_year'])?></strong></td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td colspan="1">Term:</td>
			<td><strong><?php App::show($school_academic_year['school_academic_term'])?></strong></td>
		</tr>
	</tbody>
</table>




