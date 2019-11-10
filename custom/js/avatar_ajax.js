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
        if ((avatarUploaded && !defaultAvatar) || (avatarUploaded && defaultAvatar)) {
            updateAvatar("customavatar", '');
        } else if (!avatarUploaded && defaultAvatar) {
            updateAvatar("defaultavatar", defaultAvatar);
        } else if (!(avatarUploaded && defaultAvatar)) {
            $('#avatar-result').html('<span class="text-warning">Please, either select a photo from your gallery or a default one.</span>');
        }
    });
});

function updateAvatar(avatarType, avatarFile)
{
    var url = maindir + "/functions/user_functions.php";     
    var parameters = new FormData();
    parameters.append(avatarType, avatarFile)
    if(avatarType == "customavatar") { 
        parameters.append('avatar-file', $('#avatar-upload')[0].files[0]);
    }
    $.ajax({
        type: "POST",
        url: url,
        data: parameters,
        processData: false,
        contentType: false,
        success: function(result)
        {
            let text;
            let refresh = false;
            console.log(result);
            if (result.length > 1) {
                text = '<span class="text-warning">' + result + '</span>';
            } else {
                result = parseInt(result);
                switch(result)
                {
                    case 0:
                        text = '<span class="text-danger">Avatar was not updated.</span>'
                        break;
                    case 1:
                        refresh = true;
                        text = '<span class="text-success">Avatar was updated. Reloading...</span>'
                        break;
                }
            }

            $('#avatar-result').html(text);
            if(!refresh)
                return;

            setTimeout(() => {
                location.reload();
            }, 500);
        }
    });
}

$('#avatar-change').click(()=>{$('#avatar-upload').click()});

$('#avatar-upload').change(function(e) {
    var file = this.files[0];
    var fileType = file["type"];
    var validImageTypes = ["image/gif", "image/jpeg", "image/png"];
    if ($.inArray(fileType, validImageTypes) < 0) {
        $('#avatar-warning').html('<span class="text-danger">Uploaded file is not an image!</span>');  
   } else {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#display-avatar')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
        $('#avatar-warning').html('<span class="text-success">Avatar uploaded. Save changes when you are done.</span>');
    }
  });
