<?php
    $student_code = $_SESSION['SESS_USER_ID'];
    $student = Student::getStudent($student_code,'*');
    $student_details = Student::getStudentDetails($student_code,'*');
?>
<table class="table">
    <tbody>
        <tr>
            <td>SCHOOL:</td>
            <td><?php App::show($student['school_code']);?></td>
        </tr>
        <tr>
            <td>STUDENT CODE:</td>
            <td><?php App::show($student['student_code']);?></td>
        </tr>
        <tr>
            <td>NAME:</td>
            <td><?php App::show($student['student_name']);?></td>
        </tr>
        <tr>
            <td>PROGRAM OF STUDY:</td>
            <td>
                <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="Course Description" data-placement="bottom" data-content='<?php App::show(Course::getCourse($student_details['student_course'],'course_description'));?>'>
                <?php 
                    @App::show(Course::getCourse($student_details['student_course'],'course_name'));
                ?>
                </a>
                <a href="#" data-toggle="modal" data-target="#subjects-modal" aria-expanded="false" aria-controls="subjects-modal">
                    <i class="fa fa-circle-o"></i>
                </a>   
            </td>
        </tr>
        <tr>
            <td>CLASS:</td>
            <td><?php App::show($student_details['student_class']);?></td>
        </tr>
        <tr>
            <td>STATUS:</td>
            <td><?php App::show(ucwords($student_details['student_status']));?></td>
        </tr>
        <tr>
            <td>HOUSE:</td>
            <td><?php App::show($student_details['student_house']);?></td>
        </tr>
    </tbody>
</table>


<!-- Student Subjects -->
    <div id="subjects-modal" class="modal animated fadeIn" tabindex="-1" role="dialog" aria-labelledby="subjects-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="subjects-modal"> Subjects</h4> 
                </div>
                <div class="modal-body">
                    <?php //App::ViewPartial('student_subjects','school');?>
                </div>
            </div>
        </div>
    </div>
<!-- /Student Subjects -->