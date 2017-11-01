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
    <form>
    	<h1>students</h1>
    </form>
</div>


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
                    toastr.error(data.message, 'Error!');
                    $('#page-content').load();
                }else{
                    toastr.success(data.message, 'Success!');
                    $('#page-content').load();
                }
            }
        });

        return false;
    });

    //
</script>


