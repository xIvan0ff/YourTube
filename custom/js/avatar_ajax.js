$(function(){
    $('#default-avatar-form input[type="radio"]').click(function(){
      $(".default-avatar").removeClass('border');
      $(this).next().toggleClass('border border-success', $(this).is(':checked'));
    });
  });

$(function() {
    $("#save-avatar").click(function(){
        let avatarUploaded = $("#avatar-upload").val() != '';
        let defaultAvatar = $('input[name="avatar-name"]:checked').val();
        if(avatarUploaded && defaultAvatar)
        {
            alert("Both selected");
        } else if (avatarUploaded && !defaultAvatar) {
            alert("Avatar, no default.")
        } else if (!avatarUploaded && defaultAvatar) {
            updateAvatar("defaultavatar", defaultAvatar);
        } else if (!(avatarUploaded && defaultAvatar)) {
            alert("nothing selected");
        }
    });
});

function updateAvatar(avatarType, avatarFile)
{
    var url = maindir + "/functions/user_functions.php";
    var parameters = {};
    parameters[avatarType] =  avatarFile;
    $.ajax({
        type: "POST",
        url: url,
        data: parameters,
        success: function(result)
        {
            result = parseInt(result);
            let text;
            let refresh = false;
            switch(result)
            {
                case 0:
                    text = '<span class="text-danger">Avatar couldn\'t be updated.</span>'
                    break;
                case 1:
                    refresh = true;
                    text = '<span class="text-success">Avatar was updated. Reloading...</span>'
                    break;
            }

            $('#avatar-result').html(text);
            if(!refresh)
                return;

            setTimeout(() => {
                location.reload();
            }, 1000);
        }
    });
}