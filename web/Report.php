<?php

require_once 'assets/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$document = new Dompdf();
    
if(isset($_POST["create_pdf"]))
{

    $html = '
    <style>
        .report-box{
            background: white;
            font-size:16px;
            color: #000000;
            font-family: "Times New Roman", Times, serif;
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
            margin-top: 40px;
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
            font-size: 24px;
        }
        #sch_address{
            margin-top: -10px;
        }
        #report_title{
            font-weight: bold;
            font-size: 24px;
        }
        .rule{
            margin-left: 0;
            text-align: left;
            width: 100%;
            border-color: black;
            height: 1px;
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
            font-size: 10px;

        }
    </style>
    <div class="report-box">
            <table style="width: 100%">
                <tr>
                    <td style="width : 30%;">
                        <a href="#" class="thumbnail"> 
                            <img alt="emblem" src="assets\images\crests\default.png">
                        </a>
                    </td>
                    <td style="width : 70%;">
                        <div id="sch_details">
                            <h3 id="sch_name">ACHIMOTA SENIOR HIGH SCHOOL</h3>
                            <h5 id="sch_address">P.O.BOX 189 ACHIMOTA-ACCRA</h5>
                            <div id="address">
                                <p>Telephone <i class="fas fa-phone"></i> : 0302400551</p>
                                <p>Email <i class="fas fa-envelope-square"></i> :<a href="mailto:achimotaedu@gmail.com">achimotaedu@gmail.com</a></p>
                            </div>
                            <h3 id="report_title">STUDENTS REPORT</h3>
                        </div>
                    </td>
                </tr>
            </table>
            <hr class="rule"/>
                <table class="student detail" style="width: 100%; padding: 10px;" >
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
            <hr class="rule"/>
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
    ';

    $document->loadHtml($html);

    $document->setPaper('A4','portrait');

    // Render the HTML as PDF
    $document->render();

    // Output the generated PDF to Browser
    $document->stream("Report",array("Attachment"=>0));

}

   



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            font-family: "Times New Roman", Times, serif;
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
            margin-top: 40px;
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
            font-size: 24px;
        }
        #sch_address{
            margin-top: -10px;
        }
        #report_title{
            font-weight: bold;
            font-size: 24px;
        }
        .rule{
            margin-left: 0;
            text-align: left;
            width: 100%;
            border-color: black;
            height: 1px;
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
            font-size: 10px;

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
        <table style="width: 100%">
            <tr>
                <td style="width : 30%;">
                    <a href="#" class="thumbnail"> 
                        <img alt="emblem" src="assets\images\crests\default.png">
                    </a>
                </td>
                <td style="width : 70%;">
                    <div id="sch_details">
                        <h3 id="sch_name">ACHIMOTA SENIOR HIGH SCHOOL</h3>
                        <h5 id="sch_address">P.O.BOX 189 ACHIMOTA-ACCRA</h5>
                        <div id="address">
                            <p>Telephone <i class="fas fa-phone"></i> : 0302400551</p>
                            <p>Email <i class="fas fa-envelope-square"></i> :<a href="mailto:achimotaedu@gmail.com">achimotaedu@gmail.com</a></p>
                        </div>
                        <h3 id="report_title">STUDENT'S REPORT</h3>
                    </div>
                </td>
            </tr>
        </table>
        <hr class="rule"/>
            <table class="student detail" style="width: 100%; padding: 10px;" >
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
        <hr class="rule"/>
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