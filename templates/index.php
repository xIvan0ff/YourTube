<div class="row">
    <div class="col">
    <span class="text-justify">index
    {$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}
    </span>
    <p>
    {if isset($account)}
        {{$account->id}}
        {{$account->username}}
        {{$account->email}}
        {{$account->password}}
        {{$account->getRank(1)}}
        !{{($account->isAdmin()) ? "yes":"no"}}!
    {/if}
    </p>
    </div>
</div>