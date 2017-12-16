$(document).ready(function() {
	var schoolsTable =  $('#all-schools').DataTable({
        ajax:'../includes/actions/school/admin-fetch-all-schools.php',
        //select:{style:"os"},
        colReorder:true,
        scrollX:true,
        scrollCollapse:true,
        columnDefs: [
            {
            	className: 'dt-center', 
                width:"15%",
                orderable: false,
                targets: 7
            },
            {
                className: 'dt-center', 
                orderable: false,
                targets: 2
            }
        ],
        order: [[ 0, 'asc' ]],
        lengthMenu: [10, 60, 100, 250, 500],
        stateSave: true
    });
/*
    setInterval( function () {
        schoolsTable.ajax.reload( null, false );  
    }, 50000);
*/

    $("#all-schools_length").append(
        '<a href="#" style="margin-left:10px;" data-toggle="modal" data-target="#add-school-modal">'+
            '<span class="hidden-xs">Add </span>New<span class="hidden-xs hidden-sm"> School</span>'+
        '</a>'
    );

	$('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


	$('#view-school-modal').on('shown.bs.modal', function (e) {
        var modal = $(this);
        var url = $(this).attr('data-fetch');
        var button = $(e.relatedTarget);
        var school_code = button.data('school');

        modal.find('.modal-title').html('<i class="ti-user"></i> School Details');
        modal.find('.modal-body').html('<div class="text-center"><img src="../assets/images/loading.gif" width="64px" height="64px"/></div>');
        $.ajax({
            url:url,
            dataType:'json',
            type:'POST',
            data:{school_code:school_code},
            success:function (data) {
                if (data.error != 'false') {
                    modal.find('.modal-body').html(
                        '<div class="fadeIn animated">'+
                            '<p>'+data.message+'</p>'+
                            '<p><a href="#" data-dismiss="modal">Try Again</a></p>'+
                        '</div>');
                }else{
                    modal.find('.modal-body').html(data.school);
                }
            }
        });
    });
});

function deleteSchool(school_code,school_name) {
	swal({
		title:"Are you sure?",
		text:"You are about to delete this school's details",
		type:"warning",
		showCancelButton:!0,
		cancelButtonClass:"btn-default",
		cancelButtonText:"Cancel",
		confirmButtonClass:"btn-danger",
		confirmButtonText:"Delete Student",
		closeOnConfirm:!1
	},function(){
		$.ajax({
            url:'../includes/actions/school/admin-delete-school.php',
            dataType:'json',
            type:'POST',
            data:{school_code:school_code},
            success:function(data){
                if (data.error != 'false') {
                	swal({title:"Oops!",text:data.message,type:"error",confirmButtonClass:"btn-danger",confirmButtonText:"OK"});
                }else{
                	swal({title:"Deleted!",text:data.message,type:"success",confirmButtonClass:"btn-success",confirmButtonText:"OK"});
                    $('#page-content').load('../views/app-'+data.url+'.php?'+data.url);
                }
            }
        });
	}); 
}