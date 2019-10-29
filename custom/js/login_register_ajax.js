
var url = maindir + "/functions/user_functions.php";

var p = $('#result');

$("#login-form").submit(function(e) {

    e.preventDefault();
    var form = $(this);

    $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(),
            success: function(result)
            {
                let text;
                let reload = false;
                let color = 'text-';

                if (result.length > 1) {
                    color += 'warning';
                    text = result;
                } else {
                    switch(result)
                    {
                        case '0':
                            text = 'Username/Password missmatch.';
                            color += 'danger';
                            break;
                        case '1':
                            text = 'Successful login. The page will be reloaded...';
                            color+= 'success';
                            reload = true;
                            break;
                    }
                }
                
                p.removeClass();
                p.addClass(color);
                p.html(text);
                if(reload)
                    setTimeout(()=>{window.location.reload()}, 150);
            }
        });
});