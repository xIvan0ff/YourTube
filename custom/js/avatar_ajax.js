$(function(){
    $('#default-avatar-form input[type="radio"]').click(function(){
      $(".default-avatar").removeClass('border');
      $(this).next().toggleClass('border border-success', $(this).is(':checked'));
    });
  });

  $(function() {
    $("#save-avatar").click(function(){
      let avatarUploaded = $("#avatar-upload").val() != '';
    //   let defaultAvatar = $('');
      if(avatarUploaded)
      {
        alert("yes");
      } else {
        alert("no");
      }
    });
  });