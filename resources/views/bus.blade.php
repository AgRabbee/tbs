@extends('layouts.public')
@section('content')

<!--SEARCH-BAR-->
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6">
                <form class="" action="" method="post">
                    {{ csrf_field() }}
                    <h1>Bus tickets booking</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="from">From</label>
                                <input type="text" name="from" class="form-control" id="from">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                            <label for="to">To</label>
                                <input type="text" name="to" class="form-control" id="to">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                            <label for="date1" >Date of Journey</label>
                                <input type="text" name="date_of_journey" class="form-control" id="date1">
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
                            <button type="button" class="btn btn-sm btn-primary" name="button">Reset Dates</button>
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
        $('#date1').daterangepicker()
        $('#date2').daterangepicker()
    </script>
@endsection
