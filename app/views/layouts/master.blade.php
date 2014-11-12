<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Homes Store - @yield('title')</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type='text/css' href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" type='text/css' href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type='text/css' href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" type='text/css' href='http://fonts.googleapis.com/css?family=Oxygen:400,300|Indie+Flower|Inconsolata|Open+Sans+Condensed:300italic'>
        <link rel="stylesheet" type='text/css' href="/styles/jquery-ui.min.css">
        <link rel="stylesheet" type='text/css' href="/styles/jquery-ui.structure.min.css">
        <link rel="stylesheet" type='text/css' href="/styles/jquery-ui.theme.min.css">
        <link rel="stylesheet" type='text/css' href="/styles/main.min.css">
        @yield('localStyles')
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body id=@yield('bodyId')>
        @include('layouts.partials._flash')
        @include('layouts.partials.navigation')
        <section class="container">
            <header>@yield('PageHeader')</header>
            @yield('PageContent')
            @include('layouts.partials.footer')
        </section>
        <script src="/scripts/jquery.min.js"></script>
        <script src="/scripts/jquery-ui.min.js"></script>
        <script src="/scripts/bootstrap.min.js"></script>
        <script src="/scripts/main.min.js"></script>
        @yield('localScripts')
    </body>
</html>