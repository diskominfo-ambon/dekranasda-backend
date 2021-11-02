<!DOCTYPE html>
<html lang="en" class="js">

<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Crypto Dashboard | DashLite Admin Template</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('css/dashlite/dashlite.min.css?ver=2.2.0') }}">
</head>

<body class="nk-body bg-white has-sidebar">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <x-dashlite.sidebar/>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">

                <x-dashlite.header/>

                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-lg">
                        <div class="nk-content-body">
                           @yield('content')
                        </div>
                    </div>
                </div>
                <!-- content @e -->

                <x-dashlite.footer/>
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('js/dashlite/bundle.js?ver=2.2.0') }}"></script>
    <script src="{{ asset('js/dashlite/scripts.js?ver=2.2.0') }}"></script>
</body>

</html>
