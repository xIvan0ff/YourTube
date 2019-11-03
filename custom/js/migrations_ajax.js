(function() {
    let url = maindir + "/functions/migrations_functions.php";
    $("#database-form").submit(function(e) {
    
        e.preventDefault();
    
        var form = $(this);
    
        $.ajax({
            type: "POST",
            url: url,
            data: {run: '1'},
            success: function(data)
            {
                $('#migrations-result').html(data);
            }
        });
    
        var nextUrl = form.attr('action');
        if(typeof nextUrl !== 'undefined')
        {
            setTimeout(() => {
                location.href = nextUrl;
            }, 2500);
        }
    });
    
    function updateMigrationsData()
    {
        $.ajax({
            type: "POST",
            url: url,
            data: {count: '1'},
            success: function(data)
            {
                let counts = data.split('|');
                if((typeof $('#all-migrations') !== 'undefined') && (typeof $('#ran-migrations') !== 'undefined'))
                {
                    $('#all-migrations').attr('data-count', counts[0]);
                    $('#ran-migrations').attr('data-count', counts[1]);
                    $('#run-migrations').attr("disabled", !(counts[0]>counts[1] && (typeof $('#run-migrations') !== 'undefined')));
                }
            }
        });
    }
    
    $(window).on('load', updateMigrationsData);
    $("#database-form").submit(updateMigrationsData);
 })();