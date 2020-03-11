<!-- footer section -->
<section id="footer">
        <div class="container">
            <div class="row">
                
                <div class="col-md-3 footer-box contact-footer-box">
                    <p class="qin_footer-title">{{ trans('admin.Contact_us') }}</p>
                    <P><i class="fa fa-envelope-o"></i> {{ setting()->email }}</P>
                    <P><i class="fa fa-whatsapp"></i> <a class="whatapp_links" href="https://api.whatsapp.com/send?phone={{  setting()->phone }}">{{ setting()->phone }}</a> </P>
                    <P><i class="fa fa-whatsapp"></i><a class="whatapp_links" href="https://api.whatsapp.com/send?phone={{  setting()->phone_2 }}">{{ setting()->phone_2 }}</a></P>
                    
                </div>
                <div class="col-md-3 footer-box">
                    <p class="qin_footer-title">{{ trans('admin.Follow_us') }}</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"> <a href="{{ setting()->facebook }}"><i class="fa fa-facebook"></i></a> </li>
                        <li class="list-inline-item"><a href="{{ setting()->instagram }}"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="{{ setting()->snapshat }}"><i class="fa fa-snapchat"></i></a></li>
                        <li class="list-inline-item"><a href="{{ setting()->snapshat }}"><i class="fa fa-pinterest-square"></i></a></li>
                        <li class="list-inline-item"><a href="{{ setting()->youtube }}"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-box">
                    <p class="qin_footer-title">{{ trans('admin.Location') }}</p>
                    <div class="row">
                        <i class="fa fa-map-marker col-md-1 Location-icon" aria-hidden="true"></i>
                        <P class="col-md-10 qin-pl-5 qin-ml-0">{{ session_lang(setting()->address_en, setting()->address_ar) }}</P>
                    </div>
                </div>
                <div class="col-md-2 footer-box mt-5 mob_qin_m_p_t_0">
                <img src="{{ url('assets/images/qinana/logo.jpg') }}" alt="green qinqna logo footer">
                </div>
            </div>
            <hr>
            @if(direction() == 'ltr')
            <p class="copyright">Infosas &copy; 2020. Copyrights Reserved</p>
            @else
            <p class="copyright">جميع الحقوق محفوظة &copy; infosas </p>
            @endif
        </div>
        
    </section>

   <!-- footer assets jquery and bootstrap -->
    <script src="{{ url('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <!-- pop up images when ckick -->
    <script src="{{ url('assets/js/jquery.magnific-popup.min.js') }}"></script>
     <!-- smmoth scroll js -->
     <script src="{{ url('assets/js/smooth-scroll.min.js') }}"></script>
     <script src="{{ url('assets/js/lozad.min.js') }}"></script>
     <script src="{{ url('assets/js/main.js') }}"></script>
     <!-- <script src="{{url('/assets/js/sweeralert.min.js')}}"></script> -->
    
    @include('sweetalert::alert')

    @stack('js')
    @stack('css')
</body>
</html>



