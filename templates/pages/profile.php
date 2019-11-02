{if isset($account)}
    <div class="row justify-content-center">
        <div class="col">
            <div class="card bg-dark">
                <div class="card-body">
                    <h5 class="card-title">Account settings for <a class="text-info">{{$account->username}}</a></h5>
                    <div class="row">
                        <div class="col-md-10 col-12 text-center text-md-left justify-content-center justify-content-md-start d-flex">
                            <div class="form w-50">
                                <div class="form-group">
                                    <span>E-mail:</span>
                                    <input type="text" class="form-control bg-dark border-dark" readonly value="{{$account->email}}">
                                </div>
                                <div class="form-group">
                                    <span>Registered IP:</span>
                                    <input type="text" class="form-control bg-dark border-dark" readonly value="{{$account->regip}}">
                                </div>
                                <div class="form-group">
                                    <span>Rank:</span>
                                    <input type="text" class="form-control bg-dark border-dark" readonly value="{{$account->getRank(1)}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-12 text-center">
                            <div>
                                <button type="button" class="avatar-btn-big rounded-circle border border-dark" data-toggle="modal" data-target="#avatarModal">
                                    <img src="{{$account->avatar}}" alt="" class="img-fluid rounded-circle avatar-img" />
                                </button>
                                <p class="text-light">Change Avatar</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a onclick="logout()" href="" class="text-danger">Log out <i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>
    </div>

    {include file="modals/avatar_modal.php"}
    <script src="{{$customdir}}/js/avatar_ajax.js"></script>
{else}
    <p class="not-logged">You're not logged in. Redirecting</p>
    <script src="{{$customdir}}/js/not_logged.js"></script>
{/if}