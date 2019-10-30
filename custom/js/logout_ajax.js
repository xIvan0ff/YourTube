function logout()
{
    var url = maindir + "/functions/user_functions.php";
    $.ajax({
        type: "POST",
        url: url,
        data: {logout: '1'},
        success: function()
        {
            location.href = maindir;
        }
    });
}