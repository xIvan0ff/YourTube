let migrationsUrl = maindir + "/functions/migrations_functions.php";
$("#database-form").submit(function(e) {

    e.preventDefault();

    var form = $(this);

    $.ajax({
        type: "POST",
        url: migrationsUrl,
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
    updateMigrationsData();
});

function updateMigrationsData()
{
    $.ajax({
        type: "POST",
        url: migrationsUrl,
        data: {count: '1'},
        success: function(data)
        {
            let counts = data.split('|');
            let unmigratedCheck = (parseInt(counts[0])>parseInt(counts[1]) &&  $('#run-migrations').length);
            if( $('#all-migrations').length && $('#ran-migrations').length)
            {
                $('#all-migrations').attr('data-count', counts[0]);
                $('#ran-migrations').attr('data-count', counts[1]);
                $('#run-migrations').attr("disabled", !unmigratedCheck);
            } else if(unmigratedCheck) {
                location.href = maindir + "/admin#migrations";
            }
        }
    });
}

$(window).on('load', updateMigrationsData);
