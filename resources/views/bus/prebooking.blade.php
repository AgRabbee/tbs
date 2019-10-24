@extends('layouts.public')
@section('content')

<!--SEARCH-BAR-->
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6">
                <div class="card card-info">
                      <div class="card-header">
                          <h3 class="card-title">Passenger Details</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                          <form class="" action="" method="post">
                              @csrf
                              <div class="form-group">
                                  <label for="f_name">First Name <span class="text-danger">*</span></label>
                                  <input type="text" name="f_name" id="f_name" class="form-control @error('f_name') is-invalid @enderror" value="{{ old('f_name') }}">
                                  @error('f_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="l_name">last Name <span class="text-danger">*</span></label>
                                  <input type="text" name="l_name" id="l_name" class="form-control @error('l_name') is-invalid @enderror" value="{{ old('l_name') }}">
                                  @error('l_name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="phone">Phone <span class="text-danger">*</span></label>
                                  <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                  @error('phone')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="text-center border rounded py-3">
                                  <h5>Total amount to pay: {{ ($total+21).'/-' }}</h5>
                              </div>

                            <div class="card-body">
                                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-content-below-stripe-tab" data-toggle="pill" href="#custom-content-below-stripe" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Stripe</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-cash-on-delivery" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Cash on delivery</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="custom-content-below-tabContent">
                                    <div class="tab-pane fade show active pt-3" id="custom-content-below-stripe" role="tabpanel" aria-labelledby="custom-content-below-stripe-tab">
                                        stripe
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-success btn-sm" name="" value="Confirm Reservation">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade pt-3" id="custom-content-below-cash-on-delivery" role="tabpanel" aria-labelledby="custom-content-below-cash-on-delivery-tab">
                                        <div class="form-group">
                                            <label for="">Your Address</label>
                                            <textarea name="address" class="form-control" rows="3" cols="80"></textarea>
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-success btn-sm" name="" value="Confirm Reservation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </form>
                      </div>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="card card-info">
                      <div class="card-header">
                          <h3 class="card-title">Journey Details</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                           @foreach ($tripDetails as $value)
                               <p>{{ $value->start_name . ' - ' . $value->end_name}}</p>
                               <p>Company name: {{ $value->company_name }}</p>
                               <p>Journey Date: {{ $value->date .', '. $value->start_time }}</p>
                               <p>Seat(s) no:
                                   @foreach ($seats as $seat)
                                     {{ $seat.', ' }}
                                   @endforeach
                                </p>
                                <p>Boarding at {{ $value->company_name.' bus counter, '.$value->start_name }}</p>
                           @endforeach
                           <br>

                           <h5>Fare Details</h5>
                           <hr>
                           <p>Ticket Price: {{ $total .'/-' }}</p>
                           <p>System fee: 21/-</p>
                           <p>Total: {{ ($total+21).'/-' }} </p>
                      </div>
                  </div>
            </div>
        </div>
    </div>

<!--SEARCH-BAR-END-->

@endsection

@section('public_css')

@endsection



@section('public_scripts')

@endsection
