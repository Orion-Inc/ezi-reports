<?php require_once ('../includes/Autoloader.php');?>

<div class="page-header clearfix animated fadeIn">
    <div class="pull-left">
        <?php App::ViewPartial('breadcrumbs','_html-blocks')?>
    </div>
    <div class="pull-right">
        <?php App::ViewPartial('version','app')?>
    </div>
</div>
<div class="page-content container-fluid animated fadeIn">

    <div class="row">
        <div class="col-md-12">
          	<div class="widget">
            		<div class="widget-body">
            			<div role="tabpanel">
                            <ul role="tablist" class="nav nav-tabs mb-15">
                            	<li role="presentation" class="active">
                                    <a id="overview-tab" href="#student_overview" role="tab" data-toggle="tab" aria-controls="overview_student" aria-expanded="true">
                                        Student Overview
                                    </a>
                                </li>
                                <div class="pull-right">
			            			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-student-info-modal"><i class="ti-plus mr-5"></i> Add Student</button>
            					</div>
                            </ul>



                            <div class="tab-content">
                                <div id="overview_student" role="tabpanel" aria-labelledby="student_overview" class="tab-pane fade active in">
                                    <div class="row">
                                        <div class="col-sm-10 col-md-10">
                                            <?php App::ViewPartial('students-all','student')?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            		</div>
          		</div>
        	</div>
      	</div>
    </div>
</div>
<?php App::ViewPartial('full-student-details','modals')?>
<?php App::ViewPartial('add-student-info','modals/student')?>
<script type="text/javascript">
    

    $(".app-form").unbind('submit').bind('submit', function(){
        var form = $(this);
        var data = form.serialize();
        var url = form.attr('action');

        $.ajax({
            url:url,
            dataType:'json',
            type:'POST',
            data:data,
            beforeSend : function(){
                alert();
            },
            success:function(data){
                if (data.error != 'false') {
                    $('.modal').modal('hide');
                    toastr.error(data.message, 'Error!');
                    $('#page-content').load('../views/app-'+data.url+'.php?'+data.url);
                }else{
                    $('.modal').modal('hide');
                    toastr.success(data.message, 'Success!');
                    $('#page-content').load('../views/app-'+data.url+'.php?'+data.url);
                }
            }
        });

        return false;
    });

    //
</script>
<script type="text/javascript" src="../plugins/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="../build/js/page-content/forms/jquery-validation.js"></script>


