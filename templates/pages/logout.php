{if isset($account)}
    <p>Logging out...</p>
    <script>logout();</script>
{else}
    <p class="not-logged">You cannot logout because you're not logged in. Redirecting</p>
    <script src="{{$customdir}}/js/not_logged.js"></script>
{/if}