@extends('layouts.app')

@section('page_header')
<h1 class="m-0 text-dark">Add new trip</h1>
@endsection

@section('breadcrumb_list')
<li class="breadcrumb-item active">New trip</li>
@endsection

@section('content')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->

        <!-- form start -->
        <form role="form" action="{{ url('/company/dashboard/add/trip') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Trip Date</label>
                            <div class="form-line">
                                <input type="text" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}"  autocomplete="date"  id="date" placeholder="Enter date">

                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="time">Trip Time</label>
                            <div class="form-line">
                                <input type="text" class="form-control @error('time') is-invalid @enderror" name="time"  value="{{ old('time') }}"  autocomplete="time"  id="time" placeholder="time">
                            @error('time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="time">Starting Point</label>
                            <div class="form-line">
                                <select class="form-control @error('starting_point') is-invalid @enderror"  value="{{ old('starting_point') }}"  autocomplete="starting_point"  name="starting_point">
                                    <option value="">--Select one--</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            @error('starting_point')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="time">End Point</label>
                            <div class="form-line">
                                <select class="form-control @error('end_point') is-invalid @enderror"  value="{{ old('end_point') }}"  autocomplete="end_point"  name="end_point">
                                    <option value="">--Select one--</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            @error('end_point')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group @error('fare') is-invalid @enderror">
                            <label for="date">Trip Fare</label>
                            <div class="form-line">
                                <input type="number" class="form-control" id="fare" name="fare" value="{{ old('fare') }}"  autocomplete="fare"   placeholder="Enter fare">
                            @error('fare')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>

@endsection



@section('admin_css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

@endsection


@section('admin_scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script type="text/javascript">
        $('#date').datepicker({
            dateFormat: "yy-m-d",
            minDate: new Date(),
        });

        $('#time').timepicker({
            'interval': '60',
            'minTime': '6:00am',
            'maxTime': '11:30pm',
            'showDuration': true
        });


    </script>

@endsection
