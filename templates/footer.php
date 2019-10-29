            </div>
        </div>
        {if isset($smarty.session.account)}
        {else}
            {include file="modals/login_register_modal.php"}
            <script src="{{$customdir}}/js/login_register_ajax.js"></script>
        {/if}
        <footer class="footer footer-dark bg-dark fixed-bottom">
            <div class="container d-block d-md-none">
                <div class="row justify-content-center text-center">
                    <div class="col">
                     <a class="btn btn-main"><i class="fas fa-adjust"></i></a>
                    </div>
                </div>
            </div>
            <div class="container-fluid d-none d-md-block py-1">
                <div class="row">
                    <div class="col text-left">
                    &copy; Copyright {'Y'|date} <a href="http://www.github.com/xIvan0ff/YourTube" class="text-info">YourTube</a>. All rights reserved.	
                    </div>
                    <div class="col text-right">
                       v{{$version}}
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>