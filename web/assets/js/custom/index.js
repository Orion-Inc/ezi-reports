$(document).ready(function() {
    var substringMatcher = function(strs) {
        return function findMatches(q, cb) {
        var matches, substringRegex;

        // an array that will be populated with substring matches
        matches = [];

        // regex used to determine if a string contains the substring `q`
        substrRegex = new RegExp(q, 'i');

        // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array
        $.each(strs, function(i, str) {
          if (substrRegex.test(str)) {
            matches.push(str);
          }
        });

        cb(matches);
      };
    };

    $.ajax({
        url:'./includes/actions/school/fetch-schools.php',
        dataType:'json',
        type:'POST',
        data:{},
        success:function(data){
            if (data.error != 'false') {
                var schools = data;

                $('#the-basics .typeahead').typeahead({
                  hint: true,
                  highlight: true,
                  minLength: 1
                },
                {
                  name: 'schools',
                  source: substringMatcher(schools),
                  templates: {
                    empty: [
                      '<div class="tt-suggestion empty-message">',
                        'Sorry, we were unable to find the school you are looking for...',
                      '</div>'
                    ].join('\n')
                  }
                });
            }
        }
    });

    $("#login-form").unbind('submit').bind('submit', function(){
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

	