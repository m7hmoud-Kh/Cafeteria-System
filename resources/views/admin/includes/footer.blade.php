<!--=================================
 footer -->

<footer class="bg-white p-4">
    <div class="row">
        <div class="col-md-6">
            <div class="text-center text-md-left">
                <p class="mb-0"> &copy; Copyright <span id="copyright">
                        <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                        </script>
                    </span>. <a href="#"> Webmin </a> All Rights Reserved. </p>
            </div>
        </div>
        <div class="col-md-6">
            <ul class="text-center text-md-right">
                <li class="list-inline-item"><a href="#">Terms & Conditions </a> </li>
                <li class="list-inline-item"><a href="#">API Use Policy </a> </li>
                <li class="list-inline-item"><a href="#">Privacy Policy </a> </li>
            </ul>
        </div>
    </div>
</footer>
</div><!-- main content wrapper end-->
</div>
</div>

<!--=================================
footer -->


<!--=================================jquery -->






<!-- jquery -->
<script src="{{asset('assets/admin/js/jquery-3.3.1.min.js')}}"></script>

<!-- plugins-jquery -->
<script src="{{asset('assets/admin/js/plugins-jquery.js')}}"></script>

<!-- plugin_path -->
<script>
    var plugin_path = 'js/';
</script>

<!-- chart -->
<script src="{{asset('assets/admin/js/chart-init.js')}}"></script>

<!-- calendar -->
<script src="{{asset('assets/admin/js/calendar.init.js')}}"></script>

<!-- charts sparkline -->
<script src="{{asset('assets/admin/js/sparkline.init.js')}}"></script>

<!-- charts morris -->
<script src="{{asset('assets/admin/js/morris.init.js')}}"></script>

<!-- datepicker -->
<script src="{{asset('assets/admin/js/datepicker.js')}}"></script>

{{-- <!-- sweetalert2 -->
<script src="{{asset('assets/admin/js/sweetalert2.js')}}"></script>

<!-- toastr -->
<script src="{{asset('assets/admin/js/toastr.js')}}"></script> --}}

{{-- <!-- validation -->
<script src="{{asset('assets/admin/js/validation.js')}}"></script>

<!-- lobilist -->
<script src="{{asset('assets/admin/js/lobilist.js')}}"></script> --}}

<!-- custom -->
<script src="{{asset('assets/admin/js/custom.js')}}"></script>

<script src="{{asset('assets/admin/js/app.js')}}"></script>
@yield('script')

@include('sweetalert::alert')
@livewireScripts
</body>

</html>
