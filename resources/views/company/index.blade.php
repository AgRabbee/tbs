@extends('layouts.public')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <h3>Register your company</h3>
                <hr>
                <form class="" action="" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="company_name">Company name</label>
                        <div class="form-line">
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}"  autocomplete="company_name" placeholder="Type your company name...">

                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company_description">Company Description</label>
                        <div class="form-line">
                            <textarea id="company_description" class="form-control @error('company_description') is-invalid @enderror" name="company_description" value="{{ old('company_description') }}"  autocomplete="company_description" rows="3" placeholder="Type your company description..."></textarea>
                            @error('company_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Company Address</label>
                        <div class="form-line">
                            <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address" rows="3" placeholder="Type your company address...">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reg_no">Company Registration No</label>
                        <div class="form-line">
                            <input type="text" id="reg_no" class="form-control @error('reg_no') is-invalid @enderror" name="reg_no" value="{{ old('reg_no') }}"  autocomplete="reg_no" rows="3" placeholder="Type your company registration no...">
                            @error('reg_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company_image">Upload Company Image</label>
                        <input type="file" id="company_image" name="company_image">
                    </div>


                    <input type="submit" class="btn btn-default" name="submit" value="Register Company">
                </form>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="well">
                <div id="carousel-example-generic_2" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic_2" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic_2" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic_2" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="../../images/image-gallery/1.jpg" width="100"/>
                            <div class="carousel-caption">
                                <h3>Advertisement label one</h3>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="../../images/image-gallery/4.jpg" />
                            <div class="carousel-caption">
                                <h3>Advertisement label two</h3>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="../../images/image-gallery/5.jpg" />
                            <div class="carousel-caption">
                                <h3>Advertisement label three</h3>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic_2" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic_2" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
