$(document).ready(function() {
	var schoolsTable =  $('#all-schools').DataTable({
        ajax:'../includes/actions/school/fetch-all-schools.php',
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


});