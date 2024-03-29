            </div>
        </div>
        {if !isset($account) && $config.installed}
            {include file="modals/login_register_modal.php"}
            <script src="{{$customdir}}/js/login_register_ajax.js"></script>
        {/if}
        {if (isset($account) && $account->isAdmin())}
        <script src="{{$customdir}}/js/migrations_ajax.js"></script>
        {/if}
        <script src="{{$customdir}}/js/counter.js"></script>
        {if $config.display_footer}
        <footer id="footer" class="footer footer-dark bg-dark fixed-bottom">
            <div class="container d-block d-md-none">
                <div class="row justify-content-center text-center">
                    <div class="col">
                        <a class="btn btn-main" href="{{$maindir}}"><i class="fas fa-home"></i></a>
                    </div>
                    {if isset($account)}
                        <div class="col">
                            <a class="btn btn-main" href="{{$maindir}}/profile"><i class="fas fa-user"></i></a>
                        </div>
                        {if $account->isAdmin()}
                            <div class="col">
                                <a class="btn btn-main" href="{{$maindir}}/admin"><i class="fas fa-cog"></i></a>
                            </div>
                        {/if}
                    {/if}
                </div>
            </div>
            <div class="container-fluid d-none d-md-block py-1">
                <div class="row justify-content-between">
                    <div class="col text-left">
                    <span><i class="far fa-copyright"></i> Copyright 2019 - {'Y'|date} <a class="text-danger" href="{{$maindir}}">{{$config.name}}</a>. All rights reserved.</span>
                    </div>
                    <div class="col text-right">
                    <span><a href="http://www.github.com/xIvan0ff/YourTube" class="text-danger">YourTube</a> v{{$config.version}} by <a href="http://www.github.com/xIvan0ff" class="text-danger">xIvan0ff</a>.</span>
                    </div>
                </div>
            </div>
        </footer>
        {/if}
    </body>
</html>