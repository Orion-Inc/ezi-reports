<aside data-mcs-theme="minimal-dark" class="main-sidebar mCustomScrollbar">
    <div class="user">
        <div id="esp-user-profile" data-percent="100" style="height: 104px; width: 104px; line-height: 80px; padding: 12px;" class="easy-pie-chart">
            <img src="../build/images/users/user.png" alt="" class="avatar img-circle">
            <span class="status bg-primary"></span>
        </div>
        <h4 class="fs-14 text-muted mt-15 mb-5 fw-300">
            <?php App::show($_SESSION['SESS_SCHOOL_NAME']);?>
        </h4>
        <p class="fs-13 mb-0 text-muted">
            <?php App::show($_SESSION['SESS_USER_ID']);?>
        </p>
    </div>

    <ul class="list-unstyled navigation mb-0">
        <li>
            <a href="javascript:page('home')" class="bubble">
                <i class="ti-home"></i> Home
            </a>
        </li>
        <li>
            <a href="javascript:page('school')" class="bubble">
                <i class="ti-book"></i> School
            </a>
        </li>
        <li>
            <a href="javascript:page('student')" class="bubble">
                <i class="ti-user"></i> Student
            </a>
        </li>
        <li>
            <a href="javascript:page('bills')" class="bubble">
                <i class="ti-credit-card"></i> Bills
            </a>
        </li>
        <li>
            <a href="javascript:page('reports')" class="bubble">
                <i class="ti-files"></i> Reports
            </a>
        </li>
        <li>
            <a href="javascript:page('settings')" class="bubble">
                <i class="ti-settings"></i> Settings
            </a>
        </li>
    </ul>


    <!--App Status-->
        <?php App::ViewPartial('status','app')?>
    <!--/App Status--> 
</aside>