
var url = maindir + "/functions/run_migrations.php";
$("#database-form").submit(function(e) {

    e.preventDefault();

    var form = $(this);
    var nextUrl = form.attr('action');

    $.ajax({
        type: "POST",
        url: url,
        success: function(data)
        {
            $('#result').html(data);
        }
    });

    setTimeout(() => {
        location.href = nextUrl;
    }, 2500);
});