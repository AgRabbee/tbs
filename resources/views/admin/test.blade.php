@extends('layouts.app')

@section('content')


<div class="row">

    <ul>
        @foreach($roles as $user)
        <li>{{ $user->name }}</li>

        @endforeach
    </ul>

</div>

@endsection
