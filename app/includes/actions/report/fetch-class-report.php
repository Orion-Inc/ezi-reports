<?php
    require_once('../Autoloader.php');
    $app = new App();
    $transact = Database::connect();
    $school_code = User::userSession('SESS_USER_ID');
    $school_type = School::getSchool($school_code,'school_type');

    $errors = array();
    $data = $_GET;
    $page = '';
    $tablebody = '';

    if ($data['type'] == '_getClassReport') {
        $report_array = Database::query("SELECT `terminal_report_code`,`school_code`,`student_code`,`terminal_report_grades` FROM `ezi_terminal_reports` WHERE `class_code` = '{$data['class_code']}' AND `academic_year` = '{$data['academic_year']}' AND `academic_term` = '{$data['academic_term']}'");
    }

    if ($data['type'] == '_getStudentReport') {
        $report_array = Database::query("SELECT `terminal_report_code`,`school_code`,`student_code`,`terminal_report_grades` FROM `ezi_terminal_reports` WHERE `student_code` = '{$data['student_code']}' AND `academic_year` = '{$data['academic_year']}' AND `academic_term` = '{$data['academic_term']}'");
    }

    if (empty($report_array)) {
        $response = array('error' => 'true', 'url' => 'reports', 'message' => "No reports found for this query!");
        echo json_encode($response);
        exit();
    }

    if (!empty($report_array)) {
        foreach ($report_array as $report) {
            $edit = '<button class="btn btn-outline btn-primary btn-sm" data-toggle="modal" data-target="#admin-edit-report-modal" data-report="' . $report['terminal_report_code'] . '">Edit <i class="ti-pencil"></i></button>';


            
            $tablebody .= '
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="'.$report['student_code']. '-heading">
                        <div class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#class-report" href="#' . $report['student_code'] . '" aria-expanded="false" aria-controls="' . $report['student_code'] . '">
                                ' . Student::getStudent($report['student_code'], 'student_name') . ' (' . $report['student_code'] . ')
                            </a>
                            <div class="pull-right" style="margin-top: -6px;">' . $edit . '</div>
                        </div>
                    </div>
                    <div id="'.$report['student_code'].'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="'.$report['student_code'].'-heading">
                        <div class="panel-body">

                            
                        </div>
                    </div>
                </div>
            '; 
        }
    }

    
    if ($data['type'] == '_getClassReport') {
        $tableHeader = '<div class="panel-group" id="class-report" role="tablist" aria-multiselectable="true">';
        $table_controls = '<div class="pb-30">
                <div class="pull-left">
                    <p class="fw-300">
                        ' .Classes::getClass($data['class_code'],'class_name'). '
                    </p>
                </div>
                <div class="pull-right">
                    <a href="javascript:goback()">Go Back</a>
                </div>
            </div>';
        $tableFooter = '</div>';

        $page = $tableHeader . $table_controls . $tablebody . $tableFooter;
    }

/*
    switch ($school_type) {
        case 'secondary':
            $tablehead = "<th>STUDENT</th>
                        <th>Mathematics</th>
                                <th>English Language</th>
                                <th>Intergerated Science</th>
                                <th>Socail Studies</th>";
            break;

        case 'basic':
             $tablehead = "<th>STUDENT</th>
                                <th>Mathematics</th>
                                <th>English Language</th>
                                <th>Intergerated Science</th>
                                <th>Environmental Studies</th>";
            break;

    }

    
    
    $classSubjects = Course::getClassSujects($data['class_code']);
    foreach($classSubjects as $subject){
        $tablehead .= '<th>'.$subject['subject_name'].'</th>';
    }
 */
    

    $response = array(
        'error' => 'false', 
        'url' => 'reports', 
        'page' => $page
    );
    
    echo json_encode($response);
?>