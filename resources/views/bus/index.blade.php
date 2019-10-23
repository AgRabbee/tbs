@extends('layouts.public')
@section('content')

<!--SEARCH-BAR-->
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6">
                <form class="" action="{{ url('/bus/search') }}" method="post">
                    @csrf
                    <h1>Bus tickets booking</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="from">From</label> <span class="text-danger">*</span>
                            <select class="form-control @error('from') is-invalid @enderror" id="from" name="from" placeholder="Select Destination">
                                <option value="">--Select One--</option>
                                @foreach ($tripsInfo as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            @error('from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                            <label for="to">To</label> <span class="text-danger">*</span>
                            <select class="form-control @error('to') is-invalid @enderror" id="to" name="to" placeholder="Select Destination">
                                <option value="">--Select One--</option>
                                @foreach ($tripsInfo as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            @error('to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                            <label for="date1" >Date of Journey</label> <span class="text-danger">*</span>
                                <input type="text" name="date_of_journey" class="form-control @error('date_of_journey') is-invalid @enderror" id="date1" placeholder="Select Date of journey..">
                                @error('date_of_journey')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                            <label for="date2">Date of Return</label>
                                <input type="text" name="date_of_return" class="form-control" id="date2">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-sm btn-primary" id="reset">Reset Dates</button>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-sm btn-primary" name="" value="Search Buses">
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-6">
                <img src="http://demo.truebus.co.in/assets/images/bus.png">
            </div>
        </div>
        
    </div>

<!--SEARCH-BAR-END-->

@endsection
@section('public_scripts')
    <script type="text/javascript">
        $('#date1').datepicker({
            dateFormat: "yy-m-d",
            minDate: new Date(),
        });
        $('#date2').datepicker({
            dateFormat: "yy-m-d",
            minDate: new Date(),
        });

        $('#reset').click(function(){
            $('#from').val('');
            $('#to').val('');
            $('#date1').datepicker('setDate', null);
        });
    </script>
@endsection
