$(document).ready(function() {
	$(function () {
  		$('[data-toggle="tooltip"]').tooltip()
	});

	$(function () {
	  	$('[data-toggle="popover"]').popover()
	});

	$('#report-button').on('click', function () {
    	$.ajax({
	        url:'../partials/school/terminalReport_menu.php',
	        type:'GET',
	        data:{},
	        beforeSend: function(){
	            var $btn = $(this).button('loading');
	        },
	        success:function(data){
	        	$('#reports-home').addClass('fadeOut').hide();
	            $('#terminalReport-home').removeClass('fadeOut').addClass('fadeIn').show().html(data);
	        }
	    });
  	});

  	$('#transcript-button').on('click', function () {
    	$.ajax({
	        url:'../partials/school/transcript_menu.php',
	        type:'GET',
	        data:{},
	        beforeSend: function(){
	            var $btn = $(this).button('loading');
	        },
	        success:function(data){
	        	$('#reports-home').addClass('fadeOut').hide();
	            $('#transcript-home').removeClass('fadeOut').addClass('fadeIn').show().html(data);
	        }
	    });
    });

  	$('#medical-button').on('click', function () {
    	$.ajax({
	        url:'../partials/school/medical_menu.php',
	        type:'GET',
	        data:{},
	        beforeSend: function(){
	            var $btn = $(this).button('loading');
	        },
	        success:function(data){
	        	$('#reports-home').addClass('fadeOut').hide();
	            $('#medical-home').removeClass('fadeOut').addClass('fadeIn').show().html(data);
	        }
	    });
    });
});

function goBack(page) {
	$('#'+page).removeClass('fadeIn').addClass('fadeOut').hide();
	$('#reports-home').removeClass('fadeOut').addClass('fadeIn').show();
}