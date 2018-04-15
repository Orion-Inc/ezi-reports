<?php 
	$academic_year = School::getAcademicYear();
?>
<table class="table table-borderless /table-condensed">
	<tbody>
		<tr>
			<td colspan="1">Current Academic Year:</td>
			<td><strong><?php App::show($academic_year['current_academic_year'])?></strong></td>
		</tr>
	</tbody>
	<tbody>
		<tr>
			<td colspan="1">Term:</td>
			<td><strong><?php App::show($academic_year['academic_term'])?></strong></td>
		</tr>
	</tbody>
</table>




