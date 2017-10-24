<?php 
	$student_code = $_SESSION['SESS_USER_ID'];
    $subjects = Subject::getStudentSubjects($student_code);
?>

<?php if (isset($subjects['msg'])): ?>
	<p class="no-margin">
		<strong><?php App::show($subjects['msg'])?></strong>
	</p>
<?php else: ?>
	<p class="no-margin">
		<strong>Subject 1: </strong> 
			<?php 
				App::show(
					Subject::getSubject(
						$subjects['subject_1'],
						'subject_name'
					)
				);
			?>
	</p>
	<p class="no-margin">
		<strong>Subject 2: </strong> 
			<?php 
				App::show(
					Subject::getSubject(
						$subjects['subject_2'],
						'subject_name'
					)
				);
			?>
	</p>
	<p class="no-margin">
		<strong>Subject 3: </strong> 
			<?php 
				App::show(
					Subject::getSubject(
						$subjects['subject_3'],
						'subject_name'
					)
				);
			?>
	</p>
	<p class="no-margin">
		<strong>Subject 4: </strong> 
			<?php 
				App::show(
					Subject::getSubject(
						$subjects['subject_4'],
						'subject_name'
					)
				);
			?>
	</p>
	<p class="no-margin">
		<strong>Subject 5: </strong> 
			<?php 
				App::show(
					Subject::getSubject(
						$subjects['subject_5'],
						'subject_name'
					)
				);
			?>
	</p>
	<p class="no-margin">
		<strong>Subject 6: </strong> 
			<?php 
				App::show(
					Subject::getSubject(
						$subjects['subject_6'],
						'subject_name'
					)
				);
			?>
	</p>
	<p class="no-margin">
		<strong>Subject 7: </strong> 
			<?php 
				App::show(
					Subject::getSubject(
						$subjects['subject_7'],
						'subject_name'
					)
				);
			?>
	</p>
	<p class="no-margin">
		<strong>Subject 8: </strong> 
			<?php 
				App::show(
					Subject::getSubject(
						$subjects['subject_8'],
						'subject_name'
					)
				);
			?>
	</p>
	<p class="no-margin">
		<strong>Subject 9: </strong> 
			<?php 
				App::show(
					Subject::getSubject(
						$subjects['subject_9'],
						'subject_name'
					)
				);
			?>
	</p>
	<p class="no-margin">
		<strong>Subject 10: </strong> 
			<?php 
				App::show(
					Subject::getSubject(
						$subjects['subject_10'],
						'subject_name'
					)
				);
			?>
	</p>
<?php endif ?>
