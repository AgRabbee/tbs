@include('layouts.welcome.public_head')
@include('layouts.welcome.public_navbar')
<!-- Main content -->
<section class="content" style="margin:10px 0">
    <div class="container">
        @yield('content')
    </div>
</section>
<!-- /.content -->
@include('layouts.welcome.public_foot')
