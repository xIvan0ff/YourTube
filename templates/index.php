index
{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}
{if isset($account)}
    {{$account->id}}
    {{$account->username}}
    {{$account->email}}
    {{$account->password}}
{/if}