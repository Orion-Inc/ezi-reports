<header>
    <div class="search-bar closed hidden">
        <form method="GET" action="?search">
            <div class="input-group input-group-lg">
                <input type="text" placeholder="Search for..." class="form-control" name="search">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default search-bar-toggle">
                        <i class="ti-close"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>
    <a href="javascript:void(0)" class="brand pull-left">
        <h2>eziReports</h2>
    </a>
    <a href="javascript:;" role="button" class="hamburger-menu pull-left visible-xs"><span></span></a>
    <form class="search-form pull-left hidden-xs hidden" method="GET" action="?search">
        <div class="form-group has-feedback mb-0">
            <input type="text" aria-describedby="inputSearchFor" placeholder="Search for..." style="width: 200px" class="form-control rounded" name="search">
            <span aria-hidden="true" class="ti-search form-control-feedback"></span>
            <span id="inputSearchFor" class="sr-only">(default)</span>
        </div>
    </form>


    <ul class="notification-bar list-inline pull-right">
        <li class="visible-xss hidden">
            <a href="javascript:void(0)" role="button" class="header-icon search-bar-toggle">
                <i class="ti-search"></i>
            </a>
        </li>
        <li class="hidden">
            <a href="javascript:void(0)" role="button" class="header-icon fullscreen-toggle">
                <i class="ti-fullscreen"></i>
            </a>
        </li>   

        <?php if ($_SESSION['SESS_USER_TYP'] == 'school'): ?>
            <li>
                <a href="javascript:;" role="button" class="right-sidebar-toggle bubble header-icon">
                    <i class="ti-layout-sidebar-right"></i>
                </a>
            </li>
        <?php endif ?>
        
        <li>
            <a href="javascript:void(0)" role="button" class="header-icon" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Logout" id="logout">
                <i class="ti-power-off"></i> Logout
            </a>
        </li>
    </ul>
</header>