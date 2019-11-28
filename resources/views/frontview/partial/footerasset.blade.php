<!-- jquery latest version -->
    <script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- Bootstrap Framework js -->
    <script src="{{asset('frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{asset('frontend/js/plugins.js')}}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{asset('frontend/js/main.js')}}"></script>

    <script type="text/javascript">
    	$(window).load(function(){          
            $("#preloaders").fadeOut(2000);
   		});
    </script>
    @include('sweetalert::alert')