{if isset($account)}
    <div class="row justify-content-center">
        <div class="col">
            <div class="card bg-dark">
                <div class="card-body">
                    <h5 class="card-title">Account settings for <a class="text-info">{{$account->username}}</a></h5>
                    <div class="row">
                        <div class="col">
                            <span>E-mail:</span>
                            <input type="text" class="form-control bg-dark border-dark" readonly value="{{$account->email}}">
                            <span>Registered IP:</span>
                            <input type="text" class="form-control bg-dark border-dark" readonly value="{{$account->regip}}">
                        </div>
                        <div class="col">
                            <div class="text-right">
                                <button type="button" class="avatar-btn-big rounded-circle border border-dark">
                                    <img src="https://via.placeholder.com/100" alt="" class="img-fluid rounded-circle avatar-img" />
                                </button>
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
{else}
    <p class="not-logged">You're not logged in. Redirecting</p>
    <script src="{{$customdir}}/js/not_logged.js"></script>
{/if}