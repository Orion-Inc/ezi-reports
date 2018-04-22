<?php
    require "../../FPDF/fpdf.php";

    class Report extends FPDF
    {
        public function header()
        {
            $this->Image($this->crest, 10, 10, -200);//Set image path(string),width and height
            $this->SetFont('Times', 'B', 16);//Set font to Times New Roman, bold and size to 16
            $this->Cell(200, 5, ucwords($this->school['school_name']), 0, 1, 'C');//set cell width, height, string,0(no borders),1(move cursor to new line after string) and center text
            $this->Ln();//new line
            $this->SetFont('Times', '', 12);//'' signifies remove bold params and set fontsize to 12
            $this->Cell(200, 5, $this->school['school_address'], 0, 1, 'C');
            $this->Ln();//new line
            $this->Cell(200, 5, 'Telephone: ' . $this->school['school_telephone'], 0, 1, 'C');
            $this->Cell(200, 5, 'Email: ' . $this->school['school_email'], 0, 1, 'C');
            $this->Ln();
            $this->SetFont('Times', 'B', 14);
            $this->Cell(200, 5, 'TERMINAL REPORT', 0, 1, 'C');
            $this->Line(0, 57, 300, 57);
        }

        public function studentDetails()
        {
            $this->SetXY(5, 59);
            $this->SetFont('Times', 'B', 12);
            $this->Cell(30, 5, 'Student Name:', 0, 1, 'L');
            $this->Ln();
            $this->SetX(5);
            $this->Cell(33, 5, 'Programme:', 0, 1, 'L');
            $this->Ln();
            $this->SetX(5);
            $this->Cell(33, 5, 'Accademic Year:', 0, 1, 'L');
            $this->SetXY(33, 59);
            $this->SetFont('Times', '', 12);
            $this->Cell(69, 5, ucwords($this->student['student_name']), 0, 1, 'L');
            $this->Ln();
            $this->SetX(29);
            $this->Cell(40, 5, Course::getCourse(ucwords($this->student['student_class']), 'course_name'), 0, 1, 'L');
            $this->Ln();
            $this->SetX(37);
            $this->Cell(34, 5, School::getAcademicYear('current_academic_year'), 0, 1, 'L');
            $this->SetXY(95, 59);
            $this->SetFont('Times', 'B', 12);
            $this->Cell(15, 5, 'Status:', 0, 1, 'L');
            $this->Ln();
            $this->SetX(95);
            $this->Cell(15, 5, 'Class:', 0, 1, 'L');
            $this->Ln();
            $this->SetX(95);
            $this->Cell(15, 5, 'Term:', 0, 1, 'L');
            $this->SetXY(108, 59);
            $this->SetFont('Times', '', 12);
            $this->setXY(108, 59);
            $this->Cell(15, 5, ucwords($this->student['student_status']), 0, 1, 'L');
            $this->Ln();
            $this->SetX(108);
            $this->Cell(15, 5, Classes::getClass(ucwords($this->student['student_class']), 'class_name'), 0, 1, 'L');
            $this->Ln();
            $this->SetX(108);
            $this->Cell(15, 5, School::getAcademicYear('academic_term'), 0, 1, 'L');
            $this->SetXY(150, 59);
            $this->SetFont('Times', 'B', 12);
            $this->Cell(20, 5, 'Gender:', 0, 1, 'L');
            $this->Ln();
            $this->SetX(150);
            $this->Cell(20, 5, 'Class Size:', 0, 1, 'L');
            $this->Ln();
            $this->SetX(150);
            $this->Cell(33, 5, 'Next Term Starts:', 0, 1, 'L');
            $this->SetXY(166, 59);
            $this->SetFont('Times', '', 12);
            $this->Cell(15, 5, ucwords($this->student['student_gender']), 0, 1, 'L');
            $this->Ln();
            $this->SetX(170);
            $this->Cell(15, 5, Classes::getClassEnrollment(ucwords($this->student['student_class'])), 0, 1, 'L');
            $this->Ln();
            $this->SetX(184);
            $this->Cell(15, 5, '17-04-18', 0, 1, 'L');
            $this->Line(0, 88, 300, 88);
        }

        public function headerTable()
        {
            $this->SetXY(5, 100);
            $this->SetFont('Times', 'B', 10);
            $this->Cell(40, 10, 'Subject', 1, 0, 'L');
            $this->Cell(30, 10, 'Class Score (30%)', 1, 0, 'L');
            $this->Cell(30, 10, 'Exam Score (70%)', 1, 0, 'L');
            $this->Cell(32, 10, 'Total Score (100%)', 1, 0, 'L');
            $this->Cell(20, 10, 'Position', 1, 0, 'L');
            $this->Cell(18, 10, 'Grade', 1, 0, 'L');
            $this->Cell(30, 10, 'Interpretation', 1, 1, 'L');
            $this->setX(5);
            $this->SetFont('Times', 'I', 12);
            $this->Cell(200, 10, 'Core Subjects', 1, 0, 'L');
            $this->Ln();
        }

        public function viewReport()
        {
            $this->SetFont('Times', '', 10);
            $counter = 0;
            foreach ($this->report as $row) {
                $this->setX(5);
                $this->Cell(40, 10, $row['subject_name'], 1, 0, 'L');
                $this->Cell(30, 10, $row['30'], 1, 0, 'C');
                $this->Cell(30, 10, $row['70'], 1, 0, 'C');
                $this->Cell(32, 10, $row['total_score'], 1, 0, 'C');
                $this->Cell(20, 10, $row['position'], 1, 0, 'C');
                $this->Cell(18, 10, $row['grade'], 1, 0, 'C');
                $this->Cell(30, 10, $row['interpretation'], 1, 0, 'C');
                $this->Ln();
                if ($counter == 3) {
                    $this->setX(5);
                    $this->SetFont('Times', 'I', 12);
                    $this->Cell(200, 10, 'Elective Subjects', 1, 0, 'L');
                    $this->Ln();
                    $this->SetFont('Times', '', 10);
                }
                $counter++;
            }
        }

        public function footer()
        {
            $this->SetXY(5, -55);
            $this->SetFont('Times', 'B', 12);
            $this->Cell(50, 5, 'Total Raw Score', 1, 1, 'L');
            $this->SetX(5);
            $this->Cell(50, 5, "Strength", 1, 1, 'L');
            $this->SetX(5);
            $this->Cell(50, 5, "Weakness", 1, 1, 'L');
            $this->SetX(5);
            $this->Cell(50, 5, "Remarks", 1, 1, 'L');
            $this->SetXY(55, -55);
            $this->SetFont('Times', '', 12);
            $this->Cell(150, 5, $this->raw_score, 1, 1, 'C');
            $this->SetX(55);
            $this->Cell(150, 5, $this->strength, 1, 1, 'C');
            $this->SetX(55);
            $this->Cell(150, 5, $this->weakness, 1, 1, 'C');
            $this->SetX(55);
            $this->Cell(150, 5, $this->teachers_remarks, 1, 1, 'C');
            $this->SetXY(5, -20);
            $this->SetFont('Times', 'B', 12);
            $this->Cell(200, 5, 'Grade Interpretation', 1, 1, 'C');
            $this->SetFont('Times', '', 8);
            $this->SetX(5);
            $this->Cell(200, 5, '75-100 (A1:Excellent); 70-74 (B2:Very Good); 65-69 (B3:Good); 60-64 (C4:Credit); 55-59 (C5:Credit); 50-54 (C6:Credit); 45-49 (D7:Pass); 40-45 (E8:Pass); 0-39 (F9:Fail)', 1, 1, 'C');
            $this->SetY(-8);
            $this->SetFont('Times', 'B', 10);
            $this->Cell(0, 5, 'Powered by eziReports, a product of Orion.', 0, 0, 'C');
        }
    }
?>

