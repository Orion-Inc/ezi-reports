
 
<div tabindex="-1" role="dialog" aria-labelledby="full-students-details-label" class="modal fade" id="full-student-details-modal">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 id="full-students-details-label" class="modal-title">Student Details</h4>
            </div>
            <div class="modal-body">
                 <div class="row">
                 	<div class="col-sm-8 col-md-9">
	                	<div class="widget">
		            		<div class="widget-body">
		            			<div role="tabpanel">
		                            <ul role="tablist" class="nav nav-tabs mb-15">
		                            	<li role="presentation" class="active">
		                                    <a id="primary_tab" href="#primary_details" role="tab" data-toggle="tab" aria-controls="primary_details" aria-expanded="true">
		                                        Primary Details
		                                    </a>
		                                </li>
		                                <li role="presentation" class="active">
		                                    <a id="gaurdian-tab" href="#gaurdian_details" role="tab" data-toggle="tab" aria-controls="gaurdian_details" aria-expanded="true">
		                                        Gaurdian Details
		                                    </a>
		                                </li>
		                                
		                            </ul>



		                            <div class="tab-content">
		                                <div id="primary_details" role="tabpanel" aria-labelledby="primary_tab" class="tab-pane fade active in">
		                                    <div class="row">
		                                    	<div class="col-sm-12 col-md-12">  
	                                        		<table class="table table-borderless/table-condensed">
														<tbody>
															<tr>
																<td>Student Code:</td>
																<td></td>
															</tr>
															<tr>
																<td>Student Name:</td>
																<td></td>
															</tr>
															<tr>
																<td>Date Of Birth:</td>
																<td></td>
															</tr>
															<tr>
																<td>Gender:</td>
																<td></td>
															</tr>
															<tr>
																<td>Class:</td>
																<td></td>
															</tr>
															<tr>
																<td>Course:</td>
																<td></td>
															</tr>
															<tr>
																<td>Status:</td>
																<td></td>
															</tr>
															<tr>
																<td>House:</td>
																<td></td>
															</tr>
														</tbody>
													</table>
												</div>
		                                    </div>
		                                </div>

		                                <div id="gaurdian_details" role="tabpanel" aria-labelledby="gaurdian-tab" class="tab-pane fade active in">
		                                    
		                                </div>
		                            </div>
		                        </div>
		            		</div>
      					</div>      
                 	</div>
                 	<div class="col-sm-4 col-md-3  hidden-xs">
                        <?php App::ViewPartial('student-picture','student')?>
                        <button type="button" class="btn btn-outline btn-info btn-block" data-toggle="modal" data-target="#edit-student-picture-modal">
                            Change Picture
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-outline btn-warning" data-toggle="modal" data-target="#edit-student-info-modal">Edit Student Information</button>
                    <button type="button" data-dismiss="modal" class="btn btn-outline btn-default">Close</button>
            </div>  
        </div>
    </div>
</div>
<?php App::ViewPartial('edit-student-picture','modals/student')?>




