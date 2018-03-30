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

        if (!empty($report_array)) {
            foreach ($report_array as $report) {
                $results = '';
                $edit = '<button class="btn btn-outline btn-primary btn-sm" data-toggle="modal" data-target="#edit-report-modal" data-report="' . $report['terminal_report_code'] . '">Edit <i class="ti-pencil"></i></button>';
                $student_results = explode(',', $report['terminal_report_grades']);

                
                foreach ($student_results as $result) {
                    $subject_details = explode(':', $result);
                
                    $results .= '<tr>
                        <th scope="row">'. Course::getSubject($subject_details[0], 'subject_name'). '</th>
                        <td class="text-center">0</td>
                        <td class="text-center">0</td>
                        <td class="text-center">'.$subject_details[1].'</td>
                        <td class="text-center">'.Course::getGrading($subject_details[1],'grade').'</td>
                        <td>'.Course::getGrading($subject_details[1],'interpretation').'</td>
                    </tr>';
                }



                $tablebody .= '
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="' . $report['student_code'] . '-heading">
                            <div class="panel-title">
                                <a class="report-name" role="button" data-toggle="collapse" data-parent="#class-report" href="#' . $report['student_code'] . '" aria-expanded="false" aria-controls="' . $report['student_code'] . '">
                                    <span>' . Student::getStudent($report['student_code'], 'student_name') . ' (' . $report['student_code'] . ')</span>
                                </a>
                                <div class="pull-right" style="margin-top: -6px;">' . $edit . '</div>
                            </div>
                        </div>
                        <div id="' . $report['student_code'] . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="' . $report['student_code'] . '-heading">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th class="text-center">Class(30)</th>
                                                <th class="text-center">Exam(70)</th>
                                                <th class="text-center">Total Score</th>
                                                <th class="text-center">Grade</th>
                                                <th>Interpretation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        '.$results.'
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }

            $tableHeader = '<div class="panel-group" id="class-report" role="tablist" aria-multiselectable="true">';
            $table_controls = '<div class="pb-30">
                        <div class="pull-left">
                            <p class="fw-300">
                                <b>' . Classes::getClass($data['class_code'], 'class_name') . '</b>
                            </p>
                        </div>
                        <div class="pull-right">
                            <a href="javascript:goback()">Go Back</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label for="report-search"><small>Type Student\'s Name or Code to filter</small></label>
                                <input type="search" class="form-control input-sm" id="report-search" placeholder="Search...">
                            </div>
                            <script>
                                $("#report-list").btsListFilter("#report-search", {
                                    itemEl: ".panel.panel-default",
                                    itemChild: \'span\',
                                    emptyNode: function(data) {
                                        return "<div class=\'panel panel-default\'><div class=\'panel-heading\'>No Report Found</div></div>";
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    ';
            $tableFooter = '</div>';

            $page = $tableHeader . $table_controls . "<div class='list-group' id='report-list'>" . $tablebody . "</div>" . $tableFooter;
        }
    }

    if ($data['type'] == '_getStudentReport') {
        $report_array = Database::query("SELECT `terminal_report_code`,`school_code`,`student_code`,`terminal_report_grades` FROM `ezi_terminal_reports` WHERE `student_code` = '{$data['student_code']}' AND `academic_year` = '{$data['academic_year']}' AND `academic_term` = '{$data['academic_term']}'");

        if (!empty($report_array)) {
            $student_results = explode(',', $report_array[0]['terminal_report_grades']);


            foreach ($student_results as $result) {
                $subject_details = explode(':', $result);

                $results .= '<tr>
                            <th scope="row">' . Course::getSubject($subject_details[0], 'subject_name') . '</th>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                            <td class="text-center">' . $subject_details[1] . '</td>
                            <td class="text-center">' . Course::getGrading($subject_details[1], 'grade') . '</td>
                            <td>' . Course::getGrading($subject_details[1], 'interpretation') . '</td>
                        </tr>';
            }

            $table = '<div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th class="text-center">Class(30)</th>
                                <th class="text-center">Exam(70)</th>
                                <th class="text-center">Total Score</th>
                                <th class="text-center">Grade</th>
                                <th>Interpretation</th>
                            </tr>
                        </thead>
                        <tbody>
                        ' . $results . '
                        </tbody>
                    </table>
                </div>';

            $page = $table;
        }
    }

    if (empty($report_array)) {
        $response = array('error' => 'true', 'url' => 'reports', 'message' => "No reports found for this query!");
        echo json_encode($response);
        exit();
    }

    $response = array(
        'error' => 'false', 
        'url' => 'reports', 
        'page' => $page
    );
    
    echo json_encode($response);
?>