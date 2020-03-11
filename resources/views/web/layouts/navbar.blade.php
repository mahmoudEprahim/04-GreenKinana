
<style>
        .header{
            z-index:999;
            background-color:transparent;
            /* position:fixed; */
            width:100%;
            padding:0;
            margin-top:10px;
            -webkit-transition:all ease-in-out .4s;
            -moz-transition:all ease-in-out .4s;
            -o-transition:all ease-in-out .4s;
            transition:all ease-in-out .4s
        }
        
        
        .sticky_header{
            background-color:#fff;
            box-shadow:0 2px 30px 0 rgba(0,0,0,.04);
            width:100%;
            position:fixed;
            top:0;
            margin-top:0;
        }

        .color-nav-Wrapper{ background-color:#fff;}

        .sticky {
          position: fixed;
          top: 0;
          width: 100%;
        }
        
        .font-cairo{
    font-family: 'Cairo', sans-serif;
}
        

    </style>

<section id="nav-bar">
  <nav id="header" class="navbar navbar-expand-lg navbar-light header">
    <div class="container">
        <a class="navbar-brand" href="#">
            <!--<img src="{{ url('assets/images/qinana/logo.jpg') }}"/> -->
            <img src="@if(setting()->logo_en !== null){{asset('public/storage/'.setting()->logo_en)}}@else {{ url('assets/images/qinana/logo.jpg') }} @endif" alt="green kinana logo">
        </a>
        
        
        
        <button class="wrapper__header_menu_btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <i class="fa fa-bars" aria-hidden="true"></i> -->
            <span class="navbar-toggler-icon__wrapper"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">
                  {{ trans('admin.home') }}
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about-us">
                    
                    {{ trans('admin.ABOUT_US') }}
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services">
               
                  {{ trans('admin.SERVICES') }}
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="#photos">
                
                 {{ trans('admin.PHOTOS') }}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#videos">
               
                {{ trans('admin.VIDEOS') }}
                  
            </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact-us">
                
                {{ trans('admin.CONTACT_US') }}
                  
            </a>
            </li>

            <!-- lang links -->
            <li class="nav-item">
                @if(direction() == 'ltr')
                    <a class="nav-link font-cairo" href="{{url('lang/ar')}}"  style="font-family: 'Cairo', sans-serif;"> العربية </a>
                @else
                    <a class="nav-link " href="{{url('lang/en')}}">English</a>
                @endif
            </li>
            <!-- lang links -->
            
            
          </ul>
        </div>
    </div> 
  </nav>
</section>