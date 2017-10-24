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
    <div class="widget">
        <div class="widget-body">
            <div class="row mb-15">
                <div class="col-md-7">
                    <p class="form-control-static">
                        <strong>{count}</strong> Results found for: 
                        <strong><?php echo urldecode($_GET['search'])?></strong>
                    </p>
                </div>
                <div class="col-md-5">
                    <form class="search-form pull-left hidden-xs" method="GET" action="?">
                        <div class="input-group">
                            <input type="text" placeholder="Search..." required="" class="form-control pr-15" name="search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-outline btn-default"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>