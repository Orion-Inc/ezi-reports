<?php 
    session_start();
    $page_index = "../"; 

    spl_autoload_register(function ($class_name){
        if (file_exists('../includes/Classes/'.$class_name.'.Class.php')) {//Try and fix the error
            require_once '../includes/Classes/'.$class_name.'.Class.php';//Try and fix the error
        }else if (file_exists('../includes/Controllers/'.$class_name.'.php')) {
            require_once '../includes/Controllers/'.$class_name.'.php';
        }
    }); 

    include $page_index.'partials/html_blocks/app-header.php';
?>
    <body class="template-card animated fadeIn">
        <!-- Header -->
        <header class="hero-app overlay">
            <?php include $page_index.'partials/html_blocks/app-navbar.php';?>
            <div class="pt-190"></div>
        </header>


        <!-- From -->

        <section class="card-section pt-90">
            <div class="container">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile-sidebar">
                                    <!-- SIDEBAR MENU -->
                                    <div class="profile-usermenu">
                                        <ul class="nav">
                                            <li class="active">
                                                <a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">
                                                    <i class="fa fa-home"></i>
                                                    Overview 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#reports" aria-controls="reports" role="tab" data-toggle="tab">
                                                    <i class="fa fa-files-o"></i>
                                                    Reports
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#school-bills" aria-controls="school-bills" role="tab" data-toggle="tab">
                                                    <i class="fa fa-money"></i>
                                                    School Bills
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
                                                    <i class="fa fa-cogs"></i>
                                                    Settings
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- END MENU -->
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="profile-content tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="overview">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <?php App::ViewPartial('student_overview','school');?>
                                            </div>
                                            <div class="col-md-4"> 
                                                <a href="#" class="thumbnail"> 
                                                    <?php App::ViewPartial('student_image','school');?>
                                                </a> 
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="reports">
                                        <div class="row">
                                            <div class="pt-70 col-md-6 col-md-offset-3 animated" id="reports-home">
                                                <button type="button" class="btn btn-warning btn-block" id="report-button" data-loading-text="Loading..." autocomplete="off">
                                                    Terminal Reports
                                                </button>
                                                <button type="button" class="btn btn-info btn-block" id="transcript-button" data-loading-text="Loading..." autocomplete="off">
                                                    Transcripts
                                                </button>
                                                <button type="button" class="btn btn-success btn-block" id="medical-button" data-loading-text="Loading..." autocomplete="off">
                                                    Medical Reports
                                                </button>
                                            </div>

                                            <div class="animated fadeIn" id="terminalReport-home" style="display: none;">
                                                
                                            </div>

                                            <div class="animated fadeIn" id="transcript-home" style="display: none;">
                                                
                                            </div>

                                            <div class="animated fadeIn" id="medical-home" style="display: none;">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="school-bills">
                                        <?php App::ViewPartial('student_bills','school');?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="settings">
                                        <?php App::ViewPartial('student_settings','school');?>
                                    </div>
                                </div>
                            </div>
                        </div>                                 
                    </div>
                </div>
            </div>
        </section>


        <!-- Call To Action -->
        <section class="section">
            
        </section>

        <?php $page_index = "../"; include $page_index.'partials/html_blocks/app-footer.php';?>        
    </body>
</html>
