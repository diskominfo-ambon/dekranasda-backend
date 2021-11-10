<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Home</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('css/dashlite/dashlite.min.css?ver=2.2.0') }}">
    <link rel="stylesheet" href="{{ asset('css/dashlite/theme.css?ver=2.2.7') }}">
    @yield('head')
</head>

<body class="nk-body bg-white has-sidebar">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            @role('admin')
            <x-dashlite.sidebar.admin/>
            @else
            <x-dashlite.sidebar.user/>
            @endrole
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap">

                <x-dashlite.header/>

                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                            @if (session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                            @endif
                           @yield('content')
                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('js/dashlite/bundle.js?ver=2.2.0') }}"></script>
    <script src="{{ asset('js/dashlite/scripts.js?ver=2.2.1') }}"></script>

    @yield('script')
</body>

</html>
