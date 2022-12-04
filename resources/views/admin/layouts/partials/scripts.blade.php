<!-- REQUIRED JS SCRIPTS -->

    <script type="text/javascript" src="{{ asset('/admin_asset/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('/admin_asset/js/bootstrap.min.js') }}"></script>
    <!-- nice scroll -->
    <script src="{{ asset('/admin_asset/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('/admin_asset/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="{{ asset('/admin_asset/assets/jquery-knob/js/jquery.knob.js') }}"></script>
    <script src="{{ asset('/admin_asset/js/jquery.sparkline.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin_asset/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
    <script src="{{ asset('/admin_asset/js/owl.carousel.js') }}" ></script>
    <!-- jQuery full calendar -->
    <script src="{{ asset('/admin_asset/assets/fullcalendar/fullcalendar/fullcalendar.min.js') }}"></script>
    <!--script for this page only-->
    <script src="{{ asset('/admin_asset/js/calendar-custom.js') }}"></script>
    <!-- custom select -->
    <script src="{{ asset('/admin_asset/js/jquery.customSelect.min.js') }}" ></script>
    <!--custome script for all page-->
    <script src="{{ asset('/admin_asset/js/scripts.js') }}"></script>
    <!-- custom script for this page-->
    <script src="{{ asset('/admin_asset/js/sparkline-chart.js') }}"></script>
    <script src="{{ asset('/admin_asset/js/easy-pie-chart.js') }}"></script>

  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>




