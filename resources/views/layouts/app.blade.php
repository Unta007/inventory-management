<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>Home</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    @include('layouts.navbar')

    <div class="main-content">
        @yield('content')
    </div>

    @include('layouts.sidebar')

    @vite('resources/js/app.js')

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            sidebar.classList.toggle('active');
            mainContent.classList.toggle('shifted');
        }
    </script>
</body>

</html>
