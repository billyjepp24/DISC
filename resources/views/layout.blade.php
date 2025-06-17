<!DOCTYPE html>
<html>
@include('components.header')

<body>
<div>
    @yield('content')

    @include('notification.toast')

</div>
     @yield('footer-scripts')
</body>
</html>
