<div tabindex="-1" role="dialog" aria-labelledby="add-student-info-label" class="modal in" id="add-student-info-modal">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                 <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                <div role="tabpanel">
                    <ul role="tablist" class="nav nav-pills nav-justified mb-15">
                        <li role="presentation" class="active">
                            <a id="create-student-tab" href="#create-student" role="tab" data-toggle="tab" aria-controls="create-student" aria-expanded="true">
                                <i class="ti-user"></i> Create New Student
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a id="bulk-student-tab" href="#profile" role="tab" data-toggle="tab" aria-controls="bulk-student" aria-expanded="false">
                               <i class="ti-import"></i> Bulk Student Creation
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="create-student" role="tabpanel" aria-labelledby="create-student-tab" class="tab-pane fade active in">
                            <form class="app-form" method="POST" action="../includes/actions/student/add-new-student.php" id="new-student">

                            </form>
                        </div>
                        <div id="bulk-student" role="tabpanel" aria-labelledby="bulk-student-tab" class="tab-pane fade">
                            <form>
                                
                            </form>
                        </div>
                    </div>
                </div>

            </div>
           
            <div class="modal-footer">
              
            </div>
        </div>
    </div>
</div>