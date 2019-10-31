<html>
    <head>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://kit.fontawesome.com/10d7a16c5b.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>

        <!-- CUSTOM -->
        <link href="{{$customdir}}/css/style.css" rel="stylesheet" />
        <link href="{{$customdir}}/css/sidebar.css" rel="stylesheet" />
        {if $display_sidebar}
            <link href="{{$customdir}}/css/sidebar_page.css" rel="stylesheet" />
        {/if}
        <script src="{{$customdir}}/js/sidebar.js"></script>
        <script>
            var maindir = '{$maindir}';
            var customdir = '{$customdir}';
            var imgdir = '{$imgdir}';
        </script>

        <script src="{{$customdir}}/js/logout_ajax.js"></script>

        <title>{if isset($video)}{{$video}} - {/if}{{$config.name}}{if isset($page) && !isset($video)} - {{$page|capitalize}}{/if}</title>
    </head>
    <body>