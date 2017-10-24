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
                                    <a id="overview-tab" href="#overview" role="tab" data-toggle="tab" aria-controls="overview" aria-expanded="true">
                                        Overview
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a id="administration-tab" href="#administration" role="tab" data-toggle="tab" aria-controls="administration" aria-expanded="true">
                                        Administration
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a id="academic-year-tab" href="#academic-year" role="tab" data-toggle="tab" aria-controls="academic-year" aria-expanded="true">
                                        Academic Year
                                    </a>
                                </li>
                              
                            </ul>



                            <div class="tab-content">
                                <div id="overview" role="tabpanel" aria-labelledby="overview-tab" class="tab-pane fade active in">
                                    <div class="row">
                                        <div class="col-sm-8 col-md-7">
                                            <?php App::ViewPartial('overview-tab','school')?>
                                        </div>
                                        <div class="col-sm-4 col-md-3 col-md-offset-2 hidden-xs">
                                            <?php App::ViewPartial('school-crest','school')?>
                                            <button type="button" class="btn btn-outline btn-info btn-block" data-toggle="modal" data-target="#edit-school-crest-modal">
                                                Change Crest
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="administration" role="tabpanel" aria-labelledby="administration-tab" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-sm-7 col-md-6">
                                            <?php App::ViewPartial('administration-tab','school')?>
                                        </div>
                                        <div class="col-sm-5 col-md-5 col-md-offset-1">
                                            <?php @App::ViewPartial('school-signatories','school')?>
                                        </div>
                                    </div>
                                </div>

                                <div id="academic-year" role="tabpanel" aria-labelledby="academic-year-tab" class="tab-pane fade in">
                                    <div class="row">
                                        <div class="col-sm-8 col-md-7">
                                            <?php App::ViewPartial('academic-year-tab','school')?>
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
<?php App::ViewPartial('edit-school-crest','modals')?>
<?php App::ViewPartial('edit-school-info','modals')?>
<?php App::ViewPartial('edit-administration-info','modals')?>
<?php App::ViewPartial('edit-academic-year','modals')?>
<script type="text/javascript">
    $('.modal').on('show.bs.modal', function (e) {
        var modal = $(this);
        var url = $(this).attr('data-fetch');
        $.ajax({
            url:url,
            dataType:'json',
            type:'POST',
            success:function(data){
                if (data.error != 'false') {
                    toastr.error(data.message, 'Error!');
                }else{
                    $.each( data.array, function( key, value ) {
                        modal.find('form #'+key).val(value);
                    });
                }
            }
        });
    });

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
