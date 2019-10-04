@include('layouts._partials.public_head')
@include('layouts._partials.public_navbar')

@include('sweetalert::alert')
<!-- Main content -->
<section class="content" style="margin:10px 0">
    <div class="container">
        @yield('content')
    </div>
</section>
<!-- /.content -->
@include('layouts._partials.public_foot')
