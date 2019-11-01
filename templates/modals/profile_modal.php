<div class="modal fade text-light" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="avatarModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="avatarModalLongTitle">Change profile avatar</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <i class='fas fa-times'></i>
        </button>
      </div>
      <div class="modal-body text-center">
        <form class="form" id="avatar-form" method='post'>
          <div class="form-group">
            <input type="file" id="avatar-upload" accept="image/*" >
          </div>
        </form>
          <p>Or pick one from ours below</p>
          <div class="border border-dark pt-2">
            <form class="form mb-0" id="default-avatar-form" method='post'>
              {foreach $config.default_avatars as $avatar}
              <label class="avatars-list-avatar rounded-circle">
                  <input class="avatar-radio" type="radio" name="avatar-name" value="{{$avatar}}">
                  <img class="img-fluid rounded-circle avatar-img default-avatar" src="{{$imgdir}}/avatars/default/{{$avatar}}">
              </label>
              {/foreach}
            </form>
            <!-- <img src="https://via.placeholder.com/100" alt="" class="img-fluid rounded-circle avatar-img" />   -->
          </div>
        <p id="result"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-avatar">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
$(function(){
  $('#default-avatar-form input[type="radio"]').click(function(){
    $(".default-avatar").removeClass('border');
    $(this).next().toggleClass('border border-success', $(this).is(':checked'));
  });
});
</script>

<script>
  $(function() {
    $("#save-avatar").click(function(){
      let avatarUploaded = $("#avatar-upload").val() != '';
      if(avatarUploaded)
      {
        alert("yes");
      } else {
        alert("no");
      }
    });
  });
</script>