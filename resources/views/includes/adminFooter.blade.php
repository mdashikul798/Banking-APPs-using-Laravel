<div class="clearfix"></div>
<footer>
    <div class="container-fluid">
        <p class="copyright">&copy; <a href="#" target="_blank"></a>All Rights Reserved By Cadi Bank.</p>
    </div>
</footer>
</div>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="{{URL::asset('admindashboard/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{URL::asset('admindashboard/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('admindashboard/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{URL::asset('admindashboard/assets/scripts/klorofil-common.js')}}"></script>










<script src="{{URL::asset('userdashboard/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('userdashboard/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('userdashboard/plugins/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('userdashboard/plugins/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{URL::asset('userdashboard/plugins/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{URL::asset('userdashboard/plugins/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('userdashboard/plugins/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('userdashboard/plugins/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{URL::asset('userdashboard/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{URL::asset('userdashboard/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('userdashboard/plugins/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{URL::asset('userdashboard/plugins/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap-formhelpers.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap-formhelpers-countries.js')}}"></script>

<script src="{{URL::asset('userdashboard/build/js/custom.min.js')}}"></script>
<script>

    function ajaxCall() {
        $.ajax({
            type: 'GET',
            url: '/checkNotifications',
            data: '',
            success: function (data) {

                var check=$(".badge").html();

                if(check < data){

                    $(".badge").css("background-color", "green");
                    $(".badge").html(data);
                    audio.play();



                }

            }
        });
    }
    setInterval(ajaxCall, 25000);

</script>
@yield('scripts')

</body>

</html>
