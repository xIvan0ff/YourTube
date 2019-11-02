
var url = maindir + "/functions/migrations_functions.php";
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