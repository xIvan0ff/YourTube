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
            <input type="file" class="image-upload" accept="image/*" >
          </div>
        </form>
          <p>Or pick one from ours</p>
          <div class="border border-dark p-2">
            <form class="form" id="default-avatar-form" method='post'>
              {foreach $config.default_avatars as $avatar}
              <label class="avatars-list-avatar">
                  <input class="avatar-radio" type="radio" name="avatar-name" value="{{$avatar}}" checked>
                  <img class="img-fluid rounded-circle avatar-img" src="{{$imgdir}}/avatars/default/{{$avatar}}">
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
