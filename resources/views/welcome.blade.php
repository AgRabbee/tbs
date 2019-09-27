@include('layouts.welcome.public_head')




  <body >
    <!--HEADER-BAR-->
    @include('layouts.welcome.public_navbar')
    <!--HEADER-BAR-END-->
     <!-- Modal -->
    <div class="modal fade" id="myModals" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <!-- Modal content-->
            @include('layouts.welcome.public_modal')


         <!--SEARCH-BAR-->
         <div class="container" ng-controller="search">
            <div class="row" style="min-height:400px;margin-top:120px;">
               <div class="col-md-6">
               <form id="myForm" method="post" data-parsley-validate="" autocomplete="off">
                  <section id="Search" class="LB XXCN  P20">
                     <h1 class="bookTic XCN TextSemiBold" >Online Bus Tickets Booking with Zero Booking Fees</h1>
                     <div class="searchRow clearfix">
                        <div class="LB">
                           <label class="inputLabel">From</label>
                           <input id="board_point"  class="XXinput searching" placeholder="Enter a city" type="text"  data-id="board_point" autocomplete="off" data-parsley-error-message="Please select a source city" tabindex="1" required/>
                           <div class="errorMessageFixed"> </div>
                        </div>
                        <span class="switchButton" id="switchButton"></span>
                        <div class="searchRight NoPaddingRight">
                           <label class="inputLabel">To</label>
                           <input id="Destination" class="XXinput searching" placeholder="Enter a city" type="text" tabindex="2" data-id="drop_point"  autocomplete="off" data-parsley-error-message="Please select a destination city" required />
                           <div class="errorMessageFixed"> </div>
                        </div>
                     </div>
                     <div class="searchRow clearfix">
                        <div class="LB">
                           <label class="inputLabel">Date of Journey</label>
                           <span class="blackTextSmall"></span>
                           <input id="Calenderfrom" class="XXinput calendar date-pick  pickup_date pickup_datef Calenderfrom" placeholder="dd-mm-yyyy" readonly type="text" title="Date in the format dd-mmm-yyyy"  tabindex="3" />
                        </div>
                        <div class="searchRight retJouney">
                           <label class="inputLabel">Date of Return<span class="opt">&nbsp;(Optional)</span></label>
                           <input id="Calenderreturn" class="XXinput calendar date-pick pickup_dater" placeholder="dd-mm-yyyy" type="text" title="Date in the format dd-mmm-yyyy" readonly  tabindex="4" />


                        </div>

                     </div>
                     <div class="dateError">Onward date should be before return date</div>
                      <button class="button reset_new" id="resetBtn" ng-click="resetbtn()">Reset Date</button>
                     <button class="RB Xbutton" id="searchBtn" ng-click="homesearch()">Search Buses</button>
                  </section>
                  </form>
               </div>
               <div class="col-md-6">
                  <div class="tb_bus">
                     <img src="http://demo.truebus.co.in/assets/images/bus.png">
                  </div>
               </div>
            </div>
         </div>

         <!--SEARCH-BAR-END-->

         <!--operator-BAR-->
         <div class="tb_operator">
            <div class="container">
               <div class="tb_inner">
                  <div class="row">
                     <div class="wrapper">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                           <div class="tb_operator">
                              <img src="http://demo.truebus.co.in/assets/images/routte.png"> &nbsp;<span class="tb_operator1">67000 <small class="smalls">ROUTES</small></span>
                           </div>
                        </div>
                        <div class="col-md-4  col-sm-12 col-xs-12">
                           <div class="tb_operator left">
                              <img src="http://demo.truebus.co.in/assets/images/route.png">  &nbsp;<span class="tb_operator2">1800<small class="smalls"> BUS OPERATORS</small></span>
                           </div>
                        </div>
                        <div class="col-md-4  col-sm-12 col-xs-12">
                           <div class="tb_operator right">
                              <img src="http://demo.truebus.co.in/assets/images/ticket.png">  &nbsp;<span class="tb_operator3">6,00,000 + <small class="smalls">TICKETS SOLD</small></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--operator-BAR end-->

         <!--offers-BAR-->
         <div class="tb_offers">
            <div class="shadow"><img src="http://demo.truebus.co.in/assets/images/shadow.png"></div>
            <div class="outer">
               <div class="container">
                  <div class="tb_inner">
                     <div class="row">
                        <div class="wrapper">
                           <div class="col-md-4">
                              <div class="tb_offers1">
                                 <img src="http://demo.truebus.co.in/assets/images/rupees.png">
                                 <div class="tb_list_offer">
                                    <div class="ofer_list">UPTO RS.100 OFF</div>
                                    <div class="ofer_list_bold">TRAVEL SMART</div>
                                    <div class="ofer_list_normal">Code:RBM120</div>
                                    <div class="ofer_list_normal">Book Using Pay Money</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="tb_offers1_top">
                                 <img src="http://demo.truebus.co.in/assets/images/bed.png">
                                 <div class="tb_list_offer" style=" border-right: 1px solid #dddddd;">
                                    <div class="ofer_list">UPTO 70% OFF</div>
                                    <div class="ofer_list_bold">ON HOTELS ACROSS INDIA</div>
                                    <div class="ofer_list_normal"> Offer Code:RBRTM120</div>
                                    <div class="ofer_list_normal">&nbsp;</div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="tb_offers3">
                                 <img src="http://demo.truebus.co.in/assets/images/phone.png">
                                 <div class="tb_list_offer">
                                    <div class="ofer_list"> &nbsp;&nbsp;FLAT Rs.100 OFF</div>
                                    <div class="ofer_list_bold left"> &nbsp;&nbsp;Truebus APP OFFER</div>
                                    <div class="ofer_list_normal">&nbsp;&nbsp; book via the Truebus APP</div>
                                    <div class="ofer_list_normal">&nbsp;&nbsp;  Code:ERHH54</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <hr class="border">
                  </hr>
               </div>
            </div>
         </div><!--list-BAR-->

         <div class="container">
            <div class="rb_list">
               <div class="row">
                  <div class="wrapper">
                     <div class="tb_inner">
                        <div class="col-md-3">
                           <div class="footer_main">
                              <h4 class="tb_head">Top Bus Routers</h4>
                              <div class="tb_route_list">
                                 <ul>
                                    <li><a href="#">Hyderabad to Bangalore</a></li>
                                    <li><a href="#">Pune to Bangalore </a></li>
                                    <li><a href="#">Hyderabad to Chennai</a></li>
                                    <li><a href="#">Coimbatore to Bangalore </a> </li>
                                    <li><a href="#">Chennai to Madurai</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="footer_main">
                              <h4 class="tb_head">Top Cities</h4>
                              <div class="tb_route_list">
                                 <ul>
                                    <li><a href="#">Hyderabad to Bangalore</a></li>
                                    <li><a href="#">Pune to Bangalore </a></li>
                                    <li><a href="#">Hyderabad to Chennai</a></li>
                                    <li><a href="#">Coimbatore to Bangalore </a> </li>
                                    <li><a href="#">Chennai to Madurai</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="footer_main">
                              <h4>&nbsp;</h4>
                              <div class="tb_route_list">
                                 <ul>
                                    <li><a href="#">Hyderabad to Bangalore</a></li>
                                    <li><a href="#">Pune to Bangalore</a></li>
                                    <li><a href="#">Hyderabad to Chennai</a></li>
                                    <li><a href="#">Coimbatore to Bangalore</a>  </li>
                                    <li><a href="#">Chennai to Madurai</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="footer_main">
                              <h4 class="tb_head">Top Bus Operators</h4>
                              <div class="tb_route_list">
                                 <ul>
                                    <li><a href="#">Hyderabad to Bangalore</a></li>
                                    <li><a href="#">Pune to Bangalore</a></li>
                                    <li><a href="#">Hyderabad to Chennai</a></li>
                                    <li><a href="#">Coimbathroe to Bangalore</a></li>
                                    <li>
                                       <a href="#">
                                          Chennai to Madurai
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <hr class="border2">
            </hr>
         </div>
         <!--list-BAR end-->
         <!--footer-BAR-->
         <div class="container">
         <div class="row">
         <div class="tb_inner">
         <div class="col-md-9">
         <div class="tb_footer">
         <ul>
         <li><a href="#">About TrueBus &nbsp;|</a></li>
         <li><a href="#">FAQ   &nbsp;|</a></li>
         <li><a href="#">Careers  &nbsp;|</a></li>
         <li><a href="#">TrueBus Coupons  &nbsp; |</a></li>
         <li><a href="#">Contact Us   &nbsp;|</a></li>
         <li><a href="#">Terms of Use   &nbsp;|</a></li>
         <li><a href="#">Privacy Policy   &nbsp;|</a></li>
         <li><a href="#">TrueBus on Mobilenew .</a></li>
         </ul>
         </div>
         <div class="footer_con">  &#169;  2016 <a href="https://techware.co.in/" style="text-decoration:none;">Techware Solution</a></div>
         </div>
         <div class="col-md-3">
         <div class="tb_social">
         <ul>
         <li>  <a href="#"><img src="http://demo.truebus.co.in/assets/images/facebook.png"></a> </li>
         <li>  <a href="#"> <img src="http://demo.truebus.co.in/assets/images/twitter.png"></a></li>
         <li>  <a href="#">  <img src="http://demo.truebus.co.in/assets/images/google.png"></a></li>
         </ul>
         </div>
		 <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
         </div>
         </div>
         </div>
         </div>

@include('layouts.welcome.public_foot')
