<!DOCTYPE html>
<html lang="en">
<head>

    @include('layout.partials.head')

</head>

<body >
@include('layout.partials.navbar')
<div id="wrap">
    <div id="main" class="clear-top px-0">

        @yield('content')
    </div>
</div>

    @include('layout.partials.footer')
</body>
</html>
