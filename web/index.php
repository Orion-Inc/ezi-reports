<?php
    $page_index = "./";

    spl_autoload_register(function ($class_name){
        if (file_exists('./includes/Classes/'.$class_name.'.Class.php')) {//Try and fix the error
            require_once './includes/Classes/'.$class_name.'.Class.php';//Try and fix the error
        }else if (file_exists('./includes/Controllers/'.$class_name.'.php')) {
            require_once './includes/Controllers/'.$class_name.'.php';
        }
    });    

    if (isset($_GET['login'])): 
        $getSchool = addslashes($_GET['login']);
        $school_code = Database::query("SELECT * FROM `ezi_school` WHERE `school_code` = '{$getSchool}'");
?>
    <?php if (empty($school_code)): ?>
        <script type="text/javascript">
            window.location.href="browse/";
        </script>
    <?php endif ?>
    <?php include $page_index.'partials/html_blocks/header.php';?>
        <body class="template-card animated fadeIn">
            <!-- Header -->
            <header class="hero overlay">
                <?php include $page_index.'partials/html_blocks/navbar.php';?>
                <div class="masthead">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h2>
                                    <?php echo School::getSchool(addslashes($_GET['login']),'school_name')?>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </header>


            <!-- From -->

            <section class="card-section pb-40">
                <div class="container">
                    <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
                        <div class="card text-center">

                            <header class="text-center">
                                <div class="section-subtitle"></div>
                            </header>
                            <form action="<?php echo $page_index?>includes/auth/login.php" method="POST" id="login-form">
                                <div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" name="school_code" class="search-field" readonly="" value="<?php echo addslashes($_GET['login']);?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">   
                                            <input type="text" name="student_code" class="search-field" placeholder="Student Code"/>
                                        </div>
                                        <div class="col-md-6">   
                                            <input type="password" name="access_key" class="search-field" placeholder="Access Key"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success btn-block">Login</button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Call To Action -->
            <section class="section">
                
            </section>

                <?php include $page_index.'partials/html_blocks/footer.php';?>
                <script src="<?php echo $page_index?>assets/js/custom/index.js"></script>
        </body>
    </html>

<?php else: ?>

    <?php $page_index = "./"; include $page_index.'partials/html_blocks/header.php';?>
        <body class="animated fadeIn">
            <!-- Header -->
            <header id="hero" class="hero overlay">
                <?php include $page_index.'partials/html_blocks/navbar.php';?>
                <div class="masthead text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h1></h1>
                                <p class="lead text-muted"></p>
                                <form  action="<?php echo $page_index?>includes/actions/search/search.php" method="POST">
                                    <div id="the-basics">
                                        <input type="text" class="typeahead search-field" placeholder="Enter Name of Your School..." name="q" id="q" />
                                    </div>
                                    <button type="submit"><i class="fa fa-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <section id="features" class="features bgc-light-gray">
                <div class="container ">
                    <div class="row features-section">
                        <div class="text-center col-sm-4">
                            <div class="media-body">
                                <span class="icon"><img src="assets/images/icon/icon1.png" alt=""></span>
                                <h3></h3>
                                <p class="text-muted"></p>
                            </div>
                        </div>
                        <div class="text-center col-sm-4">
                            <div class="media-body">
                                <span class="icon"><img src="assets/images/icon/icon-files.png" alt=""></span>
                                <h3></h3>
                                <p class="text-muted"></p>
                            </div>
                        </div>
                        <div class="text-center col-sm-4">
                            <div class="media-body">
                                <span class="icon"><img src="assets/images/icon/icon-forum.png" alt=""></span>
                                <h3></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="support-section text-white section hidden">
                <div class="container">
                    <div class="row">
                        <div class="divider"><i class="fa fa-support"></i></div>
                        <header class="text-center">
                            <h2 class="section-title">Get Support From Real People</h2>
                            <p class="section-subtitle">When you are stuck in something don’t waste your time just let us know we are here to help you</p>
                        </header>
                            <ul class="members">
                                <li><img src="assets/images/u1.png" alt=""></li>
                                <li><img src="assets/images/u2.png" alt=""></li>
                                <li><img src="assets/images/u3.png" alt=""></li>
                                <li><img src="assets/images/u4.png" alt=""></li>
                                <li><img src="assets/images/u5.png" alt=""></li>
                            </ul>
                    </div>
                </div>
            </section>
                <?php include $page_index.'partials/html_blocks/footer.php';?>
                <script src="<?php echo $page_index?>assets/js/custom/index.js"></script>
        </body>
    </html>

<?php endif ?>