

$("#login-form, #register-form").submit(function(e) {

    e.preventDefault();
    let form = $(this);
    let url = maindir + "/functions/user_functions.php";
    let signBtn =  $(".sign-modal-btn");

    signBtn.each(function(index) {
        if ($(this).is('.show *')) {
            signBtn = $(this);
        }
    });
    


    let p = $('#login-result');
    if(form.is("#register-form"))
        p = $('#register-result');


    signBtn.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
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
                    result = parseInt(result);
                    if(form.is("#login-form")) {
                        switch(result)
                        {
                            case 0:
                                text = 'Username/Password missmatch.';
                                color += 'danger';
                                break;
                            case 1:
                                text = 'Successful login. The page will be reloaded...';
                                color+= 'success';
                                reload = true;
                                break;
                        }
                    } else {
                        switch(result)
                        {
                            case 0:
                                text = 'Account already exists.';
                                color += 'danger';
                                break;
                            case 1:
                                text = 'Successful register. The page will be reloaded...';
                                color+= 'success';
                                reload = true;
                                break;
                        }
                    }
                }
                
                p.removeClass();
                p.addClass(color);
                p.html(text);
                if(reload)
                {
                    setTimeout(()=>{window.location.reload()}, 175);
                } else {
                    signBtn.html('Try again');
                }
            }
        });
});