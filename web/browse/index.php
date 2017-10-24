<?php $page_index = "../"; include $page_index.'partials/html_blocks/header.php';?>
    <body class="archive animated fadeIn">

        <!-- Header -->
        <header class="hero overlay">
            <?php include $page_index.'partials/html_blocks/navbar.php';?>
            <div class="masthead">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <form method="POST" action="<?php echo $page_index;?>includes/actions/search/browse.php" id="browse-form">
                                <div id="the-basics">
                                    <input type="text" class="typeahead search-field" placeholder="Enter Name of Your School..." name="q" id="q" />
                                    <button type="submit"><i class="fa fa-arrow-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="<?php echo $page_index;?>">Home</a></li>
                    <li class="active">Browse</li>
                </ol>
            </div>
        </div>


        <!-- Topics -->

        <section class="topics">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        
                        <header>
                            <h2>School List</h2>
                            <p>We've done our best to get you a list of all schools signed up to our service. Simply go through the list to find your school.</p>
                        </header>

                        <div class="panel-group pt-50" id="accordion">
                            <div id="browse-schools">
                                <input type="hidden" name="rowcount" id="rowcount" />
                                <div id="overlay" class="row">
                                    <div>
                                        <img src="<?php echo $page_index?>assets/images/loading.gif" width="64px" height="64px"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4 hidden-xs">
                        <div class="sidebar">
                            <div class="widget widget-support-forum">
                                <span class="icon icon-info"></span>
                                <h4>Can't find your way Around?</h4>

                                <p>Couldn’t find what your school?<br>Why not contact us.<br>If you are a school owner, let us help you get your school listed.</p>
                                <a href="<?php echo $page_index?>contact/" class="btn btn-success">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <?php include $page_index.'partials/html_blocks/footer.php';?>
        <script src="<?php echo $page_index?>assets/js/custom/browse.js"></script>
    </body>
</html>



