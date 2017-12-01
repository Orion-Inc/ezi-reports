"use strict";$(document).ready(function(){function e(e){$(e).block({message:"<div class='sk-three-bounce'><div class='sk-child sk-bounce1'></div><div class='sk-child sk-bounce2'></div><div class='sk-child sk-bounce3'></div></div>",css:{border:"none",backgroundColor:"transparent"},overlayCSS:{backgroundColor:"#FAFEFF",opacity:.5,cursor:"wait"}})}function n(e){$(e).unblock()}$(".hamburger-menu").on("click",function(){$(this).toggleClass("active"),$(".main-sidebar").toggleClass("opened")}),$(".search-bar-toggle").on("click",function(){$(".search-bar").toggleClass("closed")}),$(".right-sidebar-toggle").on("click",function(){$(".right-sidebar").toggleClass("closed")}),$(".conversation-toggle").on("click",function(){$(".conversation").toggleClass("closed")}),$(".setting-toggle").on("click",function(){$(".setting").toggleClass("closed")}),$(".fullscreen-toggle").on("click",function(){document.fullScreenElement&&null!==document.fullScreenElement||!document.mozFullScreen&&!document.webkitIsFullScreen?document.documentElement.requestFullScreen?document.documentElement.requestFullScreen():document.documentElement.mozRequestFullScreen?document.documentElement.mozRequestFullScreen():document.documentElement.webkitRequestFullScreen&&document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT):document.cancelFullScreen?document.cancelFullScreen():document.mozCancelFullScreen?document.mozCancelFullScreen():document.webkitCancelFullScreen&&document.webkitCancelFullScreen()}),$("[data-toggle='tooltip']").tooltip(),$("[data-toggle='popover']").popover(),$(".widget-collapse").on("click",function(){$(this).closest(".widget").find(".widget-body").slideToggle(300)}),$(".widget-reload").on("click",function(){var o=$(this).closest(".widget");e(o),window.setTimeout(function(){n(o)},3e3)}),$(".widget-remove").on("click",function(){$(this).closest(".widget").hide()}),$(".progress").length>0&&$(".progress .progress-bar").progressbar(),$(".animated").animo({duration:.2})
    $('#page-content').load('../views/app-dashboard.php?dashboard');
    
    $("#logout").on("click",function(){
        swal(
            {
                title:"Are you sure you want to logout?",
                text:"",
                type:"info",
                showCancelButton:!0,
                cancelButtonClass:"btn-default",
                cancelButtonText:"No",
                confirmButtonClass:"btn-info",
                confirmButtonText:"Yes",
                closeOnConfirm:!1
            },
            function(){
                window.location.href="../includes/auth/logout.php";
            }
        )
    });

    $('ul li a.bubble').on('click', function () {
        $(this).addClass('active');
        $('ul li a.bubble').not(this).removeClass('active');
    });

    $('#school-list li a.bubble').on('click', function () {
        $("li.panel").addClass('active');
    });

    $("#app-school-crest").easyPieChart({
        barColor:"#0667D6",
        trackColor:"rgba(0,0,0,0)",
        scaleColor:!1,
        scaleLength:0,
        lineCap:"round",
        lineWidth:2,
        size:104,
        animate:{duration:2e3,enabled:!0}
    });
});

function page(file) {
    $('#page-content').html('<div class="loading-gif"><img src="../assets/images/loading.gif" width="64px" height="64px"/></div>');
    $('#page-content').load('../views/app-'+file+'.php?'+file);
}