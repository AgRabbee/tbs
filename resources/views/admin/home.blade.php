@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3">Name</div>
                            <div class="col-lg-3">Email</div>
                            <div class="col-lg-1">Admin</div>
                            <div class="col-lg-1">Manager</div>
                            <div class="col-lg-1">Customer</div>
                            <div class="col-lg-3">Action</div>
                        </div>
                        @foreach($users as $user)
                        <div class="row">
                            <form action="{{url('/admin/role/assign')}}" method="POST">
                                <div class="col-lg-3">{{$user->name}}</div>
                                <div class="col-lg-3">{{$user->email}}<input type="hidden" name="email" value="{{$user->email}}"></div>
                                <div class="col-lg-1"><input type="checkbox" name="role_admin" {{ $user->hasRole('Admin')? 'checked':'' }} ></div>
                                <div class="col-lg-1"><input type="checkbox" name="role_manager" {{ $user->hasRole('Manager')? 'checked':'' }} ></div>
                                <div class="col-lg-1"><input type="checkbox" name="role_customer" {{ $user->hasRole('Customer')? 'checked':'' }} ></div>
                                {{csrf_field()}}
                                <div class="col-lg-3"><button type="submit">Assign Roles</button></div>
                            </form>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
