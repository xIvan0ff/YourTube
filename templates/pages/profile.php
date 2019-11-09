{if isset($user) && !empty($user)}
    {assign var="profile" value=$user}
    {assign var="editable" value=false}
{elseif isset($user) && empty($user)}

    <div class="row h-75 justify-content-center text-center">
        <div class="col-8 col-md-6 my-auto">
            <div class="card bg-dark">
                <img class="card-img-top" src="{{$imgdir}}/404_new.jpg" alt="Profile Not Found">
                <div class="card-body">
                    <h5 class="card-title">Profile not found</h5>
                    <p class="card-text">The profile you were looking for was not found. Maybe it was deleted?</p>
                    <a href="{{$maindir}}" class="btn btn-back">Go home</a>
                </div>
            </div>
        </div>
    </div>

{elseif isset($account) && !isset($user)}
    {assign var="profile" value=$account}
    {assign var="editable" value=true}
{/if}
{if isset($profile)}
    <div class="row justify-content-center">
        <div class="col">
            <div class="card bg-dark">
                <div class="card-body text-center">
                    <h5 class="card-title">Account details for <a class="text-info">{{$profile->username}}</a></h5>
                    <div class="row">
                        <div class="col-sm-8 col-md-10 col-12 text-center text-sm-left justify-content-center justify-content-sm-start d-flex">
                            <div class="form w-50">
                                <div class="form-group">
                                    <span>E-mail:</span>
                                    <input type="text" class="form-control bg-dark border-dark" readonly value="{{$profile->email}}">
                                </div>
                                <div class="form-group">
                                    <span>Registered IP:</span>
                                    <input type="text" class="form-control bg-dark border-dark" readonly value="{if empty($profile->regip)}Manually created account.{else}{{$profile->regip}}{/if}">
                                </div>
                                <div class="form-group">
                                    <span>Rank:</span>
                                    <input type="text" class="form-control bg-dark border-dark" readonly value="{{$profile->getRank(1)}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-2 col-12 text-center">
                            <div>
                                <button type="button" class="avatar-btn-md rounded-circle border border-dark" {if $editable}data-toggle="modal" data-target="#avatarModal"{else}disabled{/if}>
                                    <img src="{{$profile->avatar}}" alt="" class="img-fluid rounded-circle avatar-img" />
                                </button>
                                {if $editable}
                                <p class="text-light">Change Avatar</p>
                                {/if}
                            </div>
                        </div>
                    </div>
                </div>
                {if $editable}
                <div class="card-footer text-right">
                    <a href="" class="text-danger logout-btn">Log out <i class="fas fa-sign-out-alt"></i></a>
                </div>
                {/if}
            </div>
        </div>
    </div>
    {if $editable}
    {include file="modals/avatar_modal.php"}
    <script src="{{$customdir}}/js/avatar_ajax.js"></script>
    {/if}
{elseif !isset($profile) && !isset($account)}
    <p class="not-logged">You're not logged in. Redirecting</p>
    <script src="{{$customdir}}/js/not_logged.js"></script>
{else}

{/if}