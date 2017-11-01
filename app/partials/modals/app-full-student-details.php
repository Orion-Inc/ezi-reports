
 
<div tabindex="-1" role="dialog" aria-labelledby="full-students-details-label" class="modal fade" id="full-student-details-modal">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <h4 id="full-students-details-label" class="modal-title">Student Details</h4>
            </div>
            <div class="modal-body">
                 <div class="row">
                 	<div class="col-sm-8 col-md-7">
						<div class="panel panel-default">
				                 <div class="panel-heading">
				                   <h3 class="panel-title">Primary Student Details</h3>
				                 </div>
				            <div class="panel-body">
				            	<table class="table table-borderless /table-condensed">
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
						<div class="panel panel-default">
				                 <div class="panel-heading">
				                   <h3 class="panel-title">Primary Guardian Details</h3>
				                 </div>
				            <div class="panel-body">
				            	<table class="table table-borderless /table-condensed">
									<tbody>
										<tr>
											<td>Gaurdian Code:</td>
											<td></td>
										</tr>
										<tr>
											<td>Name:</td>
											<td></td>
										</tr>
										<tr>
											<td>Contact 1:</td>
											<td></td>
										</tr>
										<tr>
											<td>Contact 2:</td>
											<td></td>
										</tr>
										<tr>
											<td>Occupation:</td>
											<td></td>
										</tr>
										<tr>
											<td>City:</td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
                 	</div>
                 	<div class="col-sm-4 col-md-3 col-md-offset-2 hidden-xs">
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
<?php App::ViewPartial('edit-student-picture','modals')?>




