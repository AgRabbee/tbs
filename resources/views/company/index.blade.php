@extends('layouts.public')

@section('content')
    <div class="row">
        <div class="col-md-8 ">
            <div class="well">
                <h3>Register your company</h3>
                <hr>
                <form class="" action="" method="post">
                    <div class="form-group">
                        <label for="company_name">Company name</label>
                        <input type="text" class="form-control" id="company_name" placeholder="Type your company name...">
                    </div>
                    <div class="form-group">
                        <label for="company_description">Company Description</label>
                        <textarea class="form-control" id="company_description" rows="3" placeholder="Type your company description..."></textarea>
                    </div>

                    <input type="submit" class="btn btn-default" name="submit" value="Register Company">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <p>Advertisement will display Here</p>
            </div>
        </div>
    </div>
@endsection
