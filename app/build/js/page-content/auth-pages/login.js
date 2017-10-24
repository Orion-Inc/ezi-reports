$(document).ready(function() {
    $("#loginForm").unbind('submit').bind('submit', function(){
        var form = $(this);
        var data = form.serialize();
        var url = form.attr('action');

        $.ajax({
            url:url,
            dataType:'json',
            type:'POST',
            data:data,
            success:function(data){
                if (data.error != 'false') {
                    alert(data.message);
                }else{
                    window.location.href = data.url;
                }
            }
        });

        return false;
    });
});

	
