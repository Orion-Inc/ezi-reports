<?php 
    $student = Student::getStudent($_SESSION['SESS_USER_ID'],"*");
    $student_class = Classes::getClass($student['student_class'],'class_name');
    $school_name = School::getSchool($student['school_code'],'school_name');
    $academic_year = School::getAcademicYear("*");

    $student_school = array_merge(
        array('school_name' => $school_name),
        array('student_class' => $student_class),
        array('academic_term' => $academic_year['academic_term']),
        array('academic_year' => $academic_year['current_academic_year'])
    );
?>
<table class="table table-borderless /table-condensed">
    <tbody>
        <tr>
            <td>Unique Code:</td>
            <td><strong><?php App::show($student['student_code'])?></strong></td>
        </tr>
        <tr>
            <td>Student Name:</td>
            <td><strong><?php App::show($student['student_name'])?></strong></td>
        </tr>
        <tr>
            <td>Date of Birth:</td>
            <td><strong><?php App::show(date_format(date_create($student['student_dob']),"j F Y"))?></strong></td>
        </tr>
        <tr>
            <td>Guardian (<strong><?php App::show($student['guardian_relationship'])?></strong>):</td>
            <td><strong><?php App::show($student['guardian_name'])?></strong></td>
        </tr>
        <tr>
            <td colspan="2">
                <hr>
            </td>
        </tr>
        <tr>
            <td>School:</td>
            <td><strong><?php App::show($student_school['school_name'])?></strong></td>
        </tr>
        <?php if(substr($student_school['student_class'], 0, 3) == "ALU"):?>
        <tr>
            <td>Class:</td>
            <td><strong>Alumini</strong></td>
        </tr>
        <?php else:?>
        <tr>
            <td>Class:</td>
            <td><strong><?php App::show($student_school['student_class']) ?></strong></td>
        </tr>
        <tr>
            <td>Current Term:</td>
            <td><strong><?php App::show($student_school['academic_term']) ?></strong></td>
        </tr>
        <tr>
            <td>Academic Year:</td>
            <td><strong><?php App::show($student_school['academic_year']) ?></strong></td>
        </tr>
        <?php endif?>
    </tbody>
</table>