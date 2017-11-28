<aside data-mcs-theme="minimal-dark" class="main-sidebar mCustomScrollbar">
    <div class="user">
        <div id="app-school-crest" data-percent="100" style="height: 104px; width: 104px; line-height: 80px; padding: 12px;" class="easy-pie-chart">
            <img src="<?php School::getSchoolCrest($_SESSION['SESS_USER_ID'])?>" alt="" class="avatar img-circle">
            <span class="hidden status bg-primary"></span>
        </div>
        <h4 class="fs-14 text-muted mt-15 mb-5 fw-300">
            <?php App::show($_SESSION['SESS_SCHOOL_NAME']);?>
        </h4>
        <p class="fs-13 mb-0 text-muted">
            <?php App::show($_SESSION['SESS_USER_ID']);?>
        </p>
    </div>

    <?php if ($_SESSION['SESS_USER_ID'] != 'eziAdmin'): ?>
        <ul class="list-unstyled navigation mb-0">
            <li>
                <a href="javascript:page('dashboard')" class="bubble">
                    <i class="ion-speedometer"></i> Dashboard
                </a>
            </li>
            <li class="panel">
                <a data-toggle="collapse" href="#school-list" aria-expanded="false" aria-controls="-list" class="collapsed">
                    <i class="ti-home"></i> School
                </a>
                <ul id="school-list" class="list-unstyled collapse">
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

    <?php if ($_SESSION['SESS_USER_ID'] == 'eziAdmin'): ?>
        <ul class="list-unstyled navigation mb-0">
            <li>
                <a href="javascript:page('admin-dashboard')" class="bubble">
                    <i class="ion-speedometer"></i> Dashboard
                </a>
            </li>
            <li class="panel">
                <a data-toggle="collapse" href="#school-list" aria-expanded="false" aria-controls="-list" class="collapsed">
                    <i class="ti-home"></i> School
                </a>
                <ul id="school-list" class="list-unstyled collapse">
                    <li><a href="javascript:page('admin-school')" class="bubble">School List</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:page('admin-subjects')" class="bubble">
                    <i class="ti-wallet"></i> Subjects
                </a>
            </li>
            <li>
                <a href="javascript:page('admin-reports')" class="bubble">
                    <i class="ti-files"></i> Reports
                </a>
            </li>
        </ul>
    <?php endif ?>


    


    <!--App Status-->
        <?php App::ViewPartial('status','app')?>
    <!--/App Status--> 
</aside>