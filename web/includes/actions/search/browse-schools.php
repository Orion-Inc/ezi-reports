<?php
	require_once("../../Classes/Database.Class.php");
	require_once("../../Classes/Pagination.Class.php");

	$perPage = new PerPage();

	if (empty($_GET["query"])) {
		$sql = "SELECT * FROM `ezi_school`";
	}else{
		$sql = "SELECT * FROM `ezi_school` WHERE `school_name` = '".addslashes($_GET['query'])."'";
	}

	$paginationlink = "../includes/actions/search/browse-schools.php?page=";	
	$pagination_setting = "all-links";
					
	
	if(!empty($_GET["page"])) {
		$page = $_GET["page"];
	}else{
		$page = 1;
	}

	$start = ($page-1)*$perPage->perpage;
	if($start < 0) $start = 0;


	$getSchools =  Database::query($sql . " LIMIT " . $start . "," . $perPage->perpage); 
	

	if(empty($_GET["rowcount"])) {
		$_GET["rowcount"] = count(Database::query($sql));
	}

	if($pagination_setting == "prev-next") {
		$perpageresult = $perPage->getPrevNext($_GET["rowcount"], $paginationlink,$pagination_setting);	
	} else {
		$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink,$pagination_setting);	
	}


	$output = '';
	foreach ($getSchools as $school) {
		$output .= '<div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="javascript:void(0)" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" data-target="#collapse-'.$school['school_code'].'">
                                    '.$school['school_name'].'
                                </a>
                            </h4>
                        </div>
                        <div id="collapse-'.$school['school_code'].'" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>School Code: <b><a href="../?login='.$school['school_code'].'">'.$school['school_code'].'</a></b></p>
                                <div class="btn-group btn-group-xs pull-right">
                                    <a class="btn btn-primary pull-right" href="#">Wrong Infomation?</a>
                                </div>
                            </div>
                        </div>
                    </div>';
	}

	if(!empty($perpageresult)) {
		$output .= '<div id="pagination">' . $perpageresult . '</div>';
	}

	echo json_encode($output);
?>

