<?php
    if(isset($_POST["create_pdf"]))
    {
        require_once("./assets/tcpdf/tcpdf.php");
        $obj_pdf = new TCPDF('p',PDF_UNIT, PDF_PAGE_FORMAT, true ,'UTF-8',false);
        $obj_pdf->SetCreator(PDF_CREATOR);
        $obj_pdf->SetTitle("Student Report");
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_MAIN));
        $obj_pdf->SETDefaultMonospacedFont('helvetica');
        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT,'5',PDF_MARGIN_RIGHT);
        $obj_pdf->setPrintHeader(false);
        $obj_pdf->setPrintHeader(false);
        $obj_pdf->SetAutoPageBreak(TRUE,10);
        $obj_pdf->SetFont('helvetica','',12);
        $obj_pdf->AddPage(); 

        $content = '';  
        $content .= '
      ';  

    $obj_pdf->writeHTML($content);

    $obj_pdf->Output("sample.pdf","I");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <style>
        .report-box{
            width: 21cm;
            min-height: 29.7cm;
            padding: 1cm;
            margin: 1cm auto;
            border: 1px #eee solid;
            background: white;
            font-size:16px;
            color: #000000;
            line-height:24px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        #sch_details{
            text-align: center;
            margin-left: 25px;
        }
        .report-score {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid black;
            border-collapse: collapse;
        }
        .report-score td,.report-score th{
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            vertical-align:middle;
            padding:8px;
        }
        img {
            border: 1px solid #ddd; /* Gray border */
            border-radius: 4px;  /* Rounded border */
            padding: 5px; /* Some padding */
            width: 200px; /* Set a small width */
        }
        #sch_name{
            font-weight: bold;
        }
        #sch_address{
            margin-top: -10px;
        }
        .rule{
            margin-left: 0;
            text-align: left;
            width: 100%;
            border-color: black;
        }
        .report-remarks {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid black;
            margin-top: 15px;
        }
        .report-remarks td{
            border: 1px solid black;
            border-collapse: collapse;
            vertical-align:middle;
            padding: 8px;
        }
        .report-interpret{
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid black;
            margin-top: 15px;
        }
        .report-interpret td{
            border: 1px solid black;
            border-collapse: collapse;
            vertical-align:middle;
            padding: 8px;
        }
        #footer{
            margin-top: 10px;
            text-align: center;
            color: #3399ff;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class=" pull-right">
            <form method="post">
                <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />
            </form>
        </div>
    </div>
    <div class="report-box">
        <table>
            <tr>
                <td>
                    <a href="#" class="thumbnail"> 
                        <img alt="emblem" src="assets\images\crests\default.png">
                    </a>
                </td>
                <td>
                    <div id="sch_details">
                        <h3 id="sch_name">ACHIMOTA SENIOR HIGH SCHOOL</h3>
                        <h5 id="sch_address">P.O.BOX 189 ACHIMOTA-ACCRA</h5>
                        <div id="address">
                            <p>Telephone <i class="fas fa-phone"></i> : 0302400551</p>
                            <p>Email <i class="fas fa-envelope-square"></i> :<a href="mailto:achimotaedu@gmail.com">achimotaedu@gmail.com</a></p>
                        </div>
                        <h3 id="">STUDENT REPORT</h3>
                    </div>
                </td>
            </tr>
        </table>
        <!-- <div class="row">
            <div class="col-sm-4 col-md-3">
                <a href="#" class="thumbnail"> 
                    <img alt="" style="height: 180px; width: 100%; display: block;" src="assets\images\crests\default.png">
                </a>
            </div>
            <div class="col-sm-8 col-md-8" id="sch_details">
                <h3 id="sch_name">ACHIMOTA SENIOR HIGH SCHOOL</h3>
                <h5 id="sch_address">P.O.BOX 189 ACHIMOTA-ACCRA</h5>
                <div id="address">
                    <p>Telephone <i class="fas fa-phone"></i> : 0302400551</p>
                    <p>Email <i class="fas fa-envelope-square"></i> :<a href="mailto:achimotaedu@gmail.com">achimotaedu@gmail.com</a></p>
                </div>
                <h3 id="">STUDENT REPORT</h3>
            </div>
        </div> -->
        <div class="row">
            <hr class="rule"/>
        </div>
            <table class="student detail" style="width: 100%" >
                <tbody>
                    <tr>
                        <td class="field">Student Name: Tetteh</td>
                        <td class="field">Status: Day</td>
                        <td class="field">Gender: Female</td>
                    </tr>
                    <tr>
                        <td class="field">Programme: General Science</td>
                        <td class="field">Class: 2A3</td>
                        <td class="field">Class Size: 50</td>
                    </tr>
                    <tr>
                        <td class="field">Academic Year: 2017-2018</td>
                        <td class="field">Term: 1</td>
                        <td class="field">Next Term Begins: </td>
                    </tr>
                </tbody>
            </table>
        <div class="row">
            <hr class="rule"/>
        </div>
        <table class="report-score">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Class Score</th>
                    <th>Exam Score</th>
                    <th>Total Score</th>
                    <th>Position</th>
                    <th>Grades</th>
                    <th>Interpretation</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7" style="text-align: left; font-weight: bold;">Core Subjects</td>
                </tr>
                <tr>
                    <td>English Language</td>
                    <td>25</td>
                    <td>55</td>
                    <td>80</td>
                    <td>15</td>
                    <td>A1</td>
                    <td>Excellent</td>
                </tr>
                <tr>
                    <td>Social Studies</td>
                    <td>25</td>
                    <td>50</td>
                    <td>75</td>
                    <td>14</td>
                    <td>B2</td>
                    <td>Very Good</td>
                </tr>
                <tr>
                    <td colspan="7" style="text-align: left; font-weight: bold;" >Elective Subjects</td>
                  </tr>
                  <tr>
                    <td>Biology</td>
                    <td>18</td>
                    <td>42</td>
                    <td>60</td>
                    <td>20</td>
                    <td>C5</td>
                    <td>Credit</td>
                </tr>
                <tr>
                    <td>Chemistry</td>
                    <td>24</td>
                    <td>36</td>
                    <td>60</td>
                    <td>21</td>
                    <td>B2</td>
                    <td>Very Good</td>
                </tr>
            </tbody>
        </table>

        <table class="report-remarks">  
            <tbody>
                <tr>
                    <td style="width : 30%; font-weight: bold;">Total Raw Score</td>
                    <td style="width : 70%;">275.0 OUT OF 400</td>
                </tr>
                <tr>
                    <td style="width : 30%; font-weight: bold;">Form Master/Mistress Remarks</td>
                    <td>Great work</td>
                </tr>
            </tbody>
        </table>

        <table class="report-interpret">  
                <tbody>
                    <tr>
                        <td style="text-align: center;">Grade Interpretation</td>
                    </tr>
                    <tr>
                        <td>80 – 100 = A1: Excellent; 75 – 79 = B2: Very Good……</td>
                    </tr>
                </tbody>
            </table>
        <div id="footer">
            Powered by Ezi.Reports, a product of Orion &copy; Copyright 2018
        </div>
    </div>
    
</body>
</html>