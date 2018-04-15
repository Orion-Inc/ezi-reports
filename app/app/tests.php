<?php
require_once '../Autoloader.php';
require "../../FPDF/fpdf.php";
$app = new App();

$transact = Database::connect();

$errors = array();
$data = $_POST;

$report_array = Database::query("SELECT `terminal_report_code`,`school_code`,`student_code`,`terminal_report_grades` FROM `ezi_terminal_reports` WHERE `student_code` = '{$data['student_code']}' AND `academic_year` = '{$data['academic_year']}' AND `academic_term` = '{$data['academic_term']}'");

$results = '';
$student_details = Student::getStudent($data['student_code'], "*");
$school_details = School::getSchool($student_details['school_code'], "*");

$student_results = explode(',', $report_array[0]['terminal_report_grades']);
foreach ($student_results as $result) {
    $subject_details = explode(':', $result);
    /*
            $results .= '<tr>
                                    <th scope="row">' . Course::getSubject($subject_details[0], 'subject_name') . '</th>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">' . $subject_details[1] . '</td>
                                    <td class="text-center">' . Course::getGrading($subject_details[1], 'grade') . '</td>
                                    <td>' . Course::getGrading($subject_details[1], 'interpretation') . '</td>
                                </tr>';
     */
}

class Report extends FPDF
{
    protected $student;
    protected $school;
    protected $report;

    function __construct($student, $school, $report)
    {
        $this->student = $student;
        $this->school = $school;
        $this->report = $report;
    }

    public function header()
    {
        $this->Image('', 5, 5, -400);//Set image path(string),width and height
        $this->SetFont('Times', 'B', 16);//Set font to Times New Roman, bold and size to 16
        $this->Cell(200, 5, $this->school['school_name'], 0, 1, 'C');//set cell width, height, string,0(no borders),1(move cursor to new line after string) and center text
        $this->Ln();//new line
        $this->SetFont('Times', '', 12);//'' signifies remove bold params and set fontsize to 12
        $this->Cell(200, 5, $this->school['school_address'], 0, 1, 'C');
        $this->Ln();//new line
        $this->Cell(200, 5, 'Telephone: ' . $this->school['school_telephone'], 0, 1, 'C');
        $this->Cell(200, 5, 'Email: ' . $this->school['school_email'], 0, 1, 'C');
        $this->Ln();
        $this->SetFont('Times', 'B', 14);
        $this->Cell(200, 5, 'TERMINAL REPORT', 0, 1, 'C');
        $this->Line(0, 52, 300, 52);
    }

    public function studentDetails()
    {
        $this->SetXY(5, 52);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(30, 5, 'Student Name:', 0, 1, 'L');
        $this->Ln();
        $this->SetX(5);
        $this->Cell(33, 5, 'Programme:', 0, 1, 'L');
        $this->Ln();
        $this->SetX(5);
        $this->Cell(33, 5, 'Accademic Year:', 0, 1, 'L');
        $this->SetXY(33, 52);
        $this->SetFont('Times', '', 12);
        $this->Cell(69, 5, $this->student['student_name'], 0, 1, 'L');
        $this->Ln();
        $this->SetX(29);
        $this->Cell(40, 5, Course::getCourse($this->student['student_class'], 'course_name'), 0, 1, 'L');
        $this->Ln();
        $this->SetX(37);
        $this->Cell(34, 5, School::getAcademicYear('current_academic_year'), 0, 1, 'L');

                //Second column
        $this->SetXY(95, 52);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(15, 5, 'Status:', 0, 1, 'L');
        $this->Ln();
        $this->SetX(95);
        $this->Cell(15, 5, 'Class:', 0, 1, 'L');
        $this->Ln();
        $this->SetX(95);
        $this->Cell(15, 5, 'Term:', 0, 1, 'L');
        $this->SetXY(108, 52);
                //database info--farid
        $this->SetFont('Times', '', 12);
        $this->Cell(15, 5, $this->student['student_status'], 0, 1, 'L');
        $this->Ln();
        $this->SetX(108);
        $this->Cell(15, 5, Classes::getClass($this->student['student_class'], 'class_name'), 0, 1, 'L');
        $this->Ln();
        $this->SetX(108);
        $this->Cell(15, 5, School::getAcademicYear('academic_term'), 0, 1, 'L');

                //Third  column
        $this->SetXY(150, 52);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(20, 5, 'Gender:', 0, 1, 'L');
        $this->Ln();
        $this->SetX(150);
        $this->Cell(20, 5, 'Class Size:', 0, 1, 'L');
        $this->Ln();
        $this->SetX(150);
        $this->Cell(33, 5, 'Next Term Starts:', 0, 1, 'L');
        $this->SetXY(166, 52);
            //database info--farid
        $this->SetFont('Times', '', 12);
        $this->Cell(15, 5, ucwords($this->student['student_gender']), 0, 1, 'L');
        $this->Ln();
        $this->SetX(170);
        $this->Cell(15, 5, Classes::getClassEnrollment($this->student['student_class']), 0, 1, 'L');
        $this->Ln();
        $this->SetX(184);
        $this->Cell(15, 5, '17-04-18', 0, 1, 'L');
        $this->Line(0, 79, 300, 79);

    }


    public function headerTable()
    {
        $this->SetXY(5, 82);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(40, 10, 'Subject', 1, 0, 'L');
        $this->Cell(30, 10, 'Class Score (30%)', 1, 0, 'L');
        $this->Cell(30, 10, 'Exam Score (70%)', 1, 0, 'L');
        $this->Cell(32, 10, 'Total Score (100%)', 1, 0, 'L');
        $this->Cell(20, 10, 'Position', 1, 0, 'L');
        $this->Cell(18, 10, 'Grades', 1, 0, 'L');
        $this->Cell(30, 10, 'Interpretation', 1, 0, 'L');
        $this->Ln();
    }

    function viewReport($db)
    {
        $this->SetFont('Times', '', 10);
                //for farid
        $info = $db->query('string');
        while ($data = $info->fetch(PDO::FETCH_OBJ)) {
            $this->Cell(40, 10, $data->Subject, 1, 0, 'L');
            $this->Cell(30, 10, $data->Class_Score, 1, 0, 'L');
            $this->Cell(30, 10, $data->Exam_Score, 1, 0, 'L');
            $this->Cell(32, 10, $data->Total_Score, 1, 0, 'L');
            $this->Cell(20, 10, $data->Position, 1, 0, 'L');
            $this->Cell(18, 10, $data->Grades, 1, 0, 'L');
            $this->Cell(30, 10, $data->Interpretation, 1, 0, 'L');
            $this->Ln();
        }
    }

    public function footer()
    {
            //Remarks table
        $this->SetXY(5, -35);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(70, 5, 'Total Raw Score', 1, 1, 'L');
        $this->SetX(5);
        $this->Cell(70, 5, "Teacher's Remarks", 1, 1, 'L');
        $this->SetXY(75, -35);
        $this->SetFont('Times', '', 12);
                //for farid(string)
        $this->Cell(130, 5, '275 Out Of 400', 1, 1, 'C');
        $this->SetX(75);
                //for Farid(string)
        $this->Cell(130, 5, 'Great Work', 1, 1, 'C');
                //Grade Table
        $this->SetXY(5, -20);
        $this->SetFont('Times', 'b', 12);
        $this->Cell(200, 5, 'Grade Interpretation', 1, 1, 'C');
        $this->SetFont('Times', '', 8);
        $this->SetX(5);
        $this->Cell(200, 5, '75-100 (A1:Excellent); 70-74 (B2:Very Good); 65-69 (B3:Good); 60-64 (C4:Credit); 55-59 (C5:Credit); 50-54 (C6:Credit); 45-49 (D7:Pass); 40-45 (E8:Pass); 0-39 (F9:Fail)', 1, 1, 'C');
                //Actual footer
        $this->SetY(-8);
        $this->SetFont('Times', 'B', 10);
        $this->Cell(0, 5, 'Powered by eziReports, a product of Orion.', 0, 0, 'C');
    }
}
$pdf = new Report($student_details, $school_details, '');

$pdf->AliasNbPages();
$pdf->SetX(5);
$pdf->AddPage('P', 'A4', 0);//Set page to potrait,A4,0-No rotation of page
$pdf->SetMargins(0.5, 0.5, 0.5);//Set left,top and right page margins
$pdf->studentDetails();
$pdf->headerTable();
$pdf->Output('D', 'Terminal Report.pdf');//output report to browser and force a download with the specified name.

?>

<?php
require_once '../Autoloader.php';
$app = new App();

$transact = Database::connect();

$errors = array();
$data = $_POST;

$report_array = Database::query("SELECT `terminal_report_code`,`school_code`,`student_code`,`terminal_report_grades` FROM `ezi_terminal_reports` WHERE `student_code` = '{$data['student_code']}' AND `academic_year` = '{$data['academic_year']}' AND `academic_term` = '{$data['academic_term']}'");

$results = '';
$student_details = Student::getStudent($data['student_code'], "*");
$school_details = School::getSchool($student_details['school_code'], "*");

$student_results = explode(',', $report_array[0]['terminal_report_grades']);
foreach ($student_results as $result) {
    $subject_details = explode(':', $result);
    /*
            $results .= '<tr>
                                    <th scope="row">' . Course::getSubject($subject_details[0], 'subject_name') . '</th>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">' . $subject_details[1] . '</td>
                                    <td class="text-center">' . Course::getGrading($subject_details[1], 'grade') . '</td>
                                    <td>' . Course::getGrading($subject_details[1], 'interpretation') . '</td>
                                </tr>';
     */
}

?>