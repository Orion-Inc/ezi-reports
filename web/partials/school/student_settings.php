<?php
    $student_code = $_SESSION['SESS_USER_ID'];
    $student = Student::getStudent($student_code,'*');
    $student_details = Student::getStudentDetails($student_code,'*');
?>
<table class="table">
    <tbody>
        <tr>
            <td>STUDENT CODE:</td>
            <td><input type="text" class="form-control no-margin" disabled="" value="<?php App::show($student['student_code']);?>"></td>
        </tr>
        <tr>
            <td>NAME:</td>
            <td><input type="text" class="form-control no-margin" disabled="" value="<?php App::show($student['student_name']);?>"></td>
        </tr>
        <tr>
            <td>PROGRAM OF STUDY:</td>
            <td><input type="text" class="form-control no-margin" disabled="" value="<?php App::show(Course::getCourse($student_details['student_course'],'course_name'));?>"></td>
        </tr>
    </tbody>
</table>