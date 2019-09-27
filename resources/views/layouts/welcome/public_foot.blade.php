<!--   custom JavaScript -->

<!-- Jquery Core Js -->
<script src="{{ asset('AdminBSB/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('AdminBSB/plugins/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{asset('AdminBSB/js/jQuery.form.js')}}"></script>
<script src="{{asset('AdminBSB/js/bus.js')}}"></script>
<script src="{{asset('AdminBSB/js/custom.js')}}"></script>

<script>
$( document ).ready(function() {

    $('#pickDate').click(function (e) {
       $(this).next().datepicker('show');
   });
$(".pickup_date").datepicker({

      minDate: 0//this option for allowing user to select from year range
   });


   $(".returnsd").datepicker({

    minDate: new Date($(".datetimepicker4").val())

//this option for allowing user to select from year range
   });
   $(".pickup_date").on('change',function(e){

   $("#Calenderreturn").datepicker({

    minDate: new Date($(".Calenderfrom").val())

//this option for allowing user to select from year range
   });
   });
   /*$(".date_of_birth").datepicker({
      changeYear: 'true',
       changeMonth: 'true'

   });*/
  /* $(".datepicker").datepicker({
     autoclose:'true',
      changeYear: 'true',
      changeMonth: 'true',
      yearRange: "2005:2015"

   });*/
 /*  var sd = new Date();
    var new_date=sd-60;

    $( ".date_picker" ).datepicker({
       changeMonth: 'true',
        changeYear: true,

        maxDate:  new Date()


   });*/
  /* $('.datepicker').datepicker({
minDate: new Date(2014, 10, 30),
maxDate: new Date(2015, 2, 5),
setDate: new Date(2014, 10, 30)
});*/
   $('ul.tabs li').click(function(){
       var id = $(this).data('id');
       //alert(id);
   var tab_id = $(this).attr('data-tab');

       $('ul.tabs li').removeClass('current');
       $('.tab-content').removeClass('current');

       $(this).addClass('current');
       $("#"+tab_id).addClass('current');

       $('#pament_option').val(id);
  });
});

</script>
</body>
</html>
