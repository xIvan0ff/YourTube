
var url = maindir + "/functions/run_migrations.php";
$("#database-form").submit(function(e) {

    e.preventDefault();

    var form = $(this);

    $.ajax({
        type: "POST",
        url: url,
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