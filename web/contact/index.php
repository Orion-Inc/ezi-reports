<?php $page_index = "../"; include $page_index.'partials/html_blocks/header.php';?>
    <body class="template-card animated fadeIn">
        <!-- Header -->
        <header class="hero overlay">
            <?php include $page_index.'partials/html_blocks/navbar.php';?>
            <div class="pt-90"></div>
        </header>


        <!-- From -->

        <section class="card-section pt-70">
            <div class="container">
                <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                    <div class="card text-center">

                        <header class="text-center">
                            <h5 class="section-title">Contact Us</h5>
                            <div class="section-subtitle"></div>
                        </header>
                        <form>
                            <div class="row">
                                <div class="col-md-6">   
                                    <input type="text" name="contact_name" class="search-field" placeholder="Enter Your Full Name" required="" />
                                </div>
                                <div class="col-md-6">   
                                    <input type="email" name="contact_email" class="search-field" placeholder="Enter Your Email" required="" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">   
                                    <input type="text" name="contact_school" class="search-field" placeholder="School"/>
                                </div>
                                <div class="col-md-6">   
                                    <input type="text" name="contact_website" class="search-field" placeholder="Website(Optional)"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <textarea name="contact_message" class="search-field" placeholder="Message" rows="8" required="" ></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-block">Submit</button>
                                </div>
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
    </body>
</html>