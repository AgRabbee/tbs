@extends('layouts.public')
@section('content')

<!--SEARCH-BAR-->
    <div class="container">
        <div class="row my-5">
            <div class="col-md-12">
                <table id="example1" class="table table-striped display responsive">
                  <thead>
                      <tr>
                          <th>Company name</th>
                          <th>Departure Time</th>
                          <th>Seats Available</th>
                          <th>Fare</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($search_details as $value)
                      <tr>
                          <td>{{ $value->company_name }}</td>
                          <td>{{ $value->start_time }}</td>
                          <td>{{ $value->total_seats }}</td>
                          <td>{{ $value->fare }}</td>
                          <td>
                              <a href="#" class="btn btn-default btn-sm" type="button" data-toggle="modal" data-target="#modal-seats{{ $value->id }}">View Seats</a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Company name</th>
                      <th>Departure Time</th>
                      <th>Seats Available</th>
                      <th>Fare</th>
                      <th>Action</th>
                  </tr>
                  </tfoot>
                </table>


                <!--edit modal-->
                    <div class="modal fade" id="modal-seats{{ $value->id }}" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-xl">
                            <form action="{{ url('/bus/booking') }}" method="post">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Choose your seat(s)</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span id="info" class="px-5">Hold the cursor on seats for seat numbers, click to select or deselect.</span>
                                                <div class="seats-layout">
                                                    <div class="row">
                                                        <i class="far fa-user ml-auto" data-toggle='tooltip' data-placement='bottom' data-original-title="Driver" ></i>
                                                    </div>
                                                    @for ($i='A'; $i < 'J'; $i++)
                                                          <div class="row">
                                                        @for ($y=1; $y < 5; $y++)
                                                            <input type='checkbox' data-toggle='tooltip' name="seats[]" data-placement='bottom' data-original-title="{{$i.$y}}" value="{{$i.$y}}"  id="{{$i.$y}}" class='checkbox'/>
                                                        @endfor
                                                          </div>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="input-group col-md-4">
                                                        <input type="checkbox" name="" value="" disabled id="seatsInfo">
                                                        <label for="">Available</label>
                                                    </div>
                                                    <div class="input-group col-md-4">
                                                        <input type="checkbox" name="" value="" id="seatsInfo" disabled checked>
                                                        <label for="">Selected</label>
                                                    </div>
                                                    <div class="input-group col-md-4">
                                                        <input type="checkbox" name="" value="" id="seatsInfo" disabled>
                                                        <label for="">Booked</label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <table class="table table-striped" >
                                                        <thead>
                                                            <tr>
                                                                <th>Seats</th>
                                                                <th>Fare</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="seatsTable">
                                                            {{-- <tr><td id="seatNumber"></td></tr>
                                                            <tr><td>{{ $value->fare }}</td></tr> --}}
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <p><strong>Total:</strong> <span id="totalCost"></span></p>
                                                    <input type="hidden" name="total" id="total" value="">
                                                    <input type="hidden" name="trip_id" value="{{ $value->t_id }}">
                                                </div>
                                                <div class="row">
                                                    <label for="">Choose your boarding point <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="boarding_point">
                                                        <option value="">--select one--</option>
                                                        <option value="">{{ $value->company_name.' bus counter, '.$value->start_name }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" name="" value="Continue">
                                    </div>
                                </div>
                            <!-- /.modal-content -->
                            </form>
                        </div>
                    <!-- /.modal-dialog -->
                    </div>
                <!--modal-->
            </div>
        </div>
    </div>

<!--SEARCH-BAR-END-->

@endsection

@section('public_css')
    <style media="screen">
        .seats-layout {
           width: 50%;
           margin: auto;
           border: 1px solid;
           padding: 20px 42px;
       }

       .seats-layout input.checkbox, #seatsInfo {
           width: 20px;
           height: 20px;
           margin: 5px 10px;
           cursor: pointer;
       }

       .seats-layout input.checkbox:nth-child(2) {
           margin-right: 50px;
       }

       .seats-layout i {
           margin: 20px;
           margin-right: 14px;
           font-size: 20px;
       }
       #info{
           font-size:13px;
       }
       #seatsTable{
           min-height: 100px;
       }
    </style>
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

        $(function () {
            $("[data-toggle='tooltip']").tooltip();
        });
// ====================================================================
    //seats selections
// ====================================================================
        $('.checkbox').on( "click", function() {
            var count;
             if($(this).is(":checked")){
                 var value = $(this).val();
                $("#seatsTable").append("<tr><td id='seatNumber'>"+value+"</td><td>{{ $value->fare }}</td></tr>");
                count = $( "#seatsTable tr" ).length;
            }
            else if($(this).is(":not(:checked)")){
                var value = $(this).val();
                $("td").filter(function() {
                    return $(this).text() == value;
                }).closest("tr").remove();
                count = $( "#seatsTable tr" ).length ;
            }
            var totalCost = {{ $value->fare }}*count;
            $('#totalCost').text(totalCost);
            $('#total').val(totalCost);
        });

    </script>
@endsection
