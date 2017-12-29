<aside data-mcs-theme="minimal-dark" class="main-sidebar mCustomScrollbar animated fadeIn">
    <div class="user">
        <div id="app-school-crest" data-percent="100" style="height: 104px; width: 104px; line-height: 80px; padding: 12px;" class="easy-pie-chart">
            <?php if ($_SESSION['SESS_USER_TYP'] == 'school'): ?>
                <img src="<?php School::getSchoolCrest($_SESSION['SESS_USER_ID'])?>" alt="" class="avatar img-circle">
                <span class="hidden status bg-primary"></span>
            <?php endif ?>

            <?php if ($_SESSION['SESS_USER_TYP'] == 'eziAdmin'): ?>
                <img src="../assets/images/users/user-profile.png" alt="" class="avatar img-circle">
                <?php 
                $conn = new Database();
                if ($conn->connect()): ?>
                    <span class="status bg-primary"></span>
                <?php else: ?>
                    <span class="status bg-danger"></span>
                <?php endif ?>
            <?php endif ?>
        </div>

        <?php if ($_SESSION['SESS_USER_TYP'] == 'school'): ?>
            <h4 class="fs-14 text-muted mt-15 mb-5 fw-300">
                <?php App::show($_SESSION['SESS_SCHOOL_NAME']);?>
            </h4>
            <p class="fs-13 mb-0 text-muted">
                <?php App::show($_SESSION['SESS_USER_ID']);?>
            </p>
        <?php endif ?>

        <?php if ($_SESSION['SESS_USER_TYP'] == 'eziAdmin'): ?>
            <h4 class="fs-14 text-muted mt-15 mb-5 fw-300">
                Administrator
            </h4>
            <p class="fs-13 mb-0 text-muted">
                eziAdmin
            </p>
        <?php endif ?>
        
    </div>

    <?php if ($_SESSION['SESS_USER_TYP'] == 'school'): ?>
        <ul class="list-unstyled navigation mb-0">
            <li>
                <a href="javascript:page('dashboard')" class="bubble">
                    <i class="ti-dashboard"></i> Dashboard
                </a>
            </li>
            <li class="panel">
                <a data-toggle="collapse" href="#school-list" aria-expanded="true" aria-controls="-list" class="collapse">
                    <i class="ti-home"></i> School
                </a>
                <ul id="school-list" class="list-unstyled collapse in">
                    <li><a href="javascript:page('school')" class="bubble">Overview</a></li>
                    <li><a href="javascript:page('class')" class="bubble">Classes</a></li>
                    <li><a href="javascript:page('student')" class="bubble">Students</a></li>
                </ul>
            </li>
            <li class="hidden">
                <a href="javascript:page('bills')" class="bubble">
                    <i class="ti-wallet"></i> Bills
                </a>
            </li>
            <li>
                <a href="javascript:page('reports')" class="bubble">
                    <i class="ti-files"></i> Reports
                </a>
            </li>
        </ul>
    <?php endif ?>

    <?php if ($_SESSION['SESS_USER_TYP'] == 'eziAdmin'): ?>
        <ul class="list-unstyled navigation mb-0">
            <li>
                <a href="javascript:page('admin-dashboard')" class="bubble">
                    <i class="ti-dashboard"></i> Dashboard
                </a>
            </li>
            <li>
               <a href="javascript:page('admin-school')" class="bubble">
                    <i class="ti-home"></i>Schools
                </a>
            </li>
            <li>
                <a href="javascript:page('admin-courses')" class="bubble">
                    <i class="ti-book"></i> Courses
                </a>
            </li>
            <li>
                <a href="javascript:page('admin-reports')" class="bubble">
                    <i class="ti-files"></i> Reports
                </a>
            </li>
            <li class="hidden">
                <a href="javascript:page('admin-live-chat')" class="bubble">
                    <i class="ti-comments"></i> Live Chat
                </a>
            </li>
        </ul>
    <?php endif ?>

    <!--App Status-->
        <?php App::ViewPartial('status','app')?>
    <!--/App Status--> 
</aside>