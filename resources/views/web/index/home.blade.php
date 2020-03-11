@extends('web.layouts.app')

@if(direction() == 'ltr')
@section('title')
   Home
@endsection
@else
@section('title')
   الرئيسة
@endsection
@endif

@push('css')

<style>

.navbar-brand img {
    height: 60px;
    padding-left: 0px;
}

</style>
@endpush

@push('js')

<script>

    $(document).ready(function(){
        $('.order_button').each(function(){
            $(this).click(function(){
                $('.hidden_service_id').val($(this).data('service-id'))
            })
        })

    })
$('#photosCarousel').carousel({
    interval: 2000000,
    toutch: true
})
$('#videosCarousel').carousel({
    interval: 40000000,
    toutch: true
})
</script>

@endpush


@section('content')

<!-- <div class="col-md-6 mx-auto">@include('web.layouts.error')</div> -->

<!-- animation -->

<section id="img-animation">
        <div class="set">
            <div> <img src="{{ url('assets/images/qinana/animation/leaves1.png') }}"></div>
            <div> <img src="{{ url('assets/images/qinana/animation/leaves2.png') }}"></div>



        </div>
        <div class="set set2">
            <div> <img src="{{ url('assets/images/qinana/animation/leaves1.png') }}"></div>
            <div> <img src="{{ url('assets/images/qinana/animation/leaves2.png') }}"></div>



        </div>
        <div class="set set3">
            <div> <img src="{{ url('assets/images/qinana/animation/leaves1.png') }}"></div>
            <div> <img src="{{ url('assets/images/qinana/animation/leaves2.png') }}"></div>


        </div>

    </section>

<!-- animation -->


<main class="site-main">

<!-- slider section -->
<section id="wrapper_main_slider">
    <div class="slider_cover padding-bottom-0 padding-left-0">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="text1 text-left qn-mt-7 mob_qn-mt-3">
                    <h3 class="qin_r_text_align_right slider_head_text mob_qin_alin_center">{{ trans('admin.Welcome_To') }}</h3>
                    <h1 class="qin_r_text_align_right slider_head_big_text mob_qin_alin_center">{{ session_lang( setting()->sitename_en, setting()->sitename_ar )}}</h1>
                    <h2 class="qin_r_text_align_right slider_text mob_qin_alin_center">{{ session_lang( setting()->qinana_added_val_en,setting()->qinana_added_val_ar )}}</h2>
                </div>
            </div>
            <!--Carousel Wrapper-->
            <div class="col-md-9">
                <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        @foreach(slider() as $key=>$slider)
                            <li data-target="#carousel-example-1z" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ' '}}"></li>

                        @endforeach
                    </ol>
                    <a href="#photos" class="take_tower_wrapper row">
                        <img src="{{ url('assets/images/qinana/take_a_tour.png') }}" >
                        <p>{{ trans('admin.take_a_tower') }}</p>
                    </a>
                    <!--/.Indicators-->
                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">

                    @foreach(slider() as $key=>$slider)
                        <div class="main-slider-div slider-img carousel-item {{$key == 0 ? 'active' : ' '}}">
                            <img src="{{asset('public/storage/'. $slider->image)}}" class="d-block w-100 img-slider prevent-selection prevent-drag" alt="green kinana slider image">
                        </div>
                    @endforeach


                    </div>
                    <!--/.Slides-->

                </div>
            </div>

        </div>
    </div>
    </div>

</section>


<!-- banner section -->
    <section id="about-us">
        <div class="cover">
            <div class="row">
                <div class="col-sm-6">
                    <div class="about-us-img-div position-relative">
                        <img src="{{ url('public/storage/'.setting()->abou_us_bg_img) }}" alt="green kinana about us image" class="about-us-img img-fluid">
                        <a href="#about-us" class="take_tower_wrapper wrapper_right-0 row">
                            <p class="upercase_text">{{ trans('admin.About_Us') }}</p>
                        </a>
                        <!-- <span class="sec-title-divider"></span> -->
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="title-style text-center">
                        <h1 class="promo-title">{{ session_lang(setting()->sitename_en, setting()->sitename_ar) }}</h1>
                    </div>
                    <P class="text-justify main-desc offset-1">{{ session_lang(setting()->about_site_en, setting()->about_site_ar)  }}</P>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <form method="post" action="{{ route('ordereStore') }}">
        @csrf

        <input class="hidden_service_id" value="" name="service_id"  type="hidden">

    <section id="services">
        <div class="ser_cover">
            <div class="container">
                <h1 class="mob_heading_center">{{ trans('admin.OUR_SERVICES') }}</h1>
                <span class="sec-title-divider"></span>
                <div class="row text-center justify-content-between">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row ser_section_items">

                            @foreach($services as $key => $service)
                            <div class="mob_qin_ser_p__m_0_col col-md-3 col-12 {{ $key == 0 ? 'offset-3' : ''}} ">
                                <div class="services-box">
                                    <div class="ser-icon blue">

                                        <img src="{{ url('public/storage/'.$service->image)  }}" alt="services image" class="green kinana service-img">
                                    </div>
                                    <div class="ser-content">
                                        <h5>{{ session_lang($service->desc_en,$service->desc_ar ) }}</h5>
                                        <button data-service-id="{{ $service->id }}" data-toggle="modal" data-target="#modalorderForm" type="button" class="btn btn-outline-success order_button"><i class="fa fa-check"></i>{{ trans('admin.Order_now') }}</button>
                                        <!-- <a class="services-pop" href="#web_service"><i class="fa fa-arrow-right"></i></a> -->
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>


                </div>
            </div> <!-- end container -->

        </div>
    </section>


<!-- order form modal -->
<div class="modal fade bd-example-modal-lg" id="modalorderForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">{{ trans('admin.Drop_Us_A_Message') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input value="{{old('name')}}" name="name" type="text" name="name" class="form-control" placeholder="{{ trans('admin.Your_Name') }} *" required/>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input value="{{old('email')}}" name="email" type="email"  class="form-control" placeholder="{{ trans('admin.Your_Email') }} *" required/>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                    </div>
                    <div class="form-group">
                        <input value="{{old('phone')}}" type="text" name="phone" class="form-control" placeholder="{{ trans('admin.phone_no') }} *" required/>
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="message" class="form-control" placeholder="{{ trans('admin.Your_Message') }} *" style="width: 100%; height: 150px;" required>{{ old('message') }}</textarea>
                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" class="qin_no-float pull-right btnContact" value="{{ trans('admin.send_order') }}" />
                    </div>
                </div>

            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--

{{ trans('admin.Your_Name') }}
{{ trans('admin.Your_Email') }} *
{{ trans('admin.Your_Message') }} *
{{ trans('admin.Send') }}
 -->


<!--  -->
<section id="photo_video_sliders">
    <div class="photo_slider_video_cover">
        <div class="photos  mb-5 mt-5" id="photos">
            <div class="container-fluid ">
            <!-- Grid row -->
                <div class="row ">
                    <!-- Grid column -->
                    <div class="col-md-12 mb-5 ">
                        <div class="container my-3 position-relative">
                            <h2 class="mt-5 mb-5 mob_heading_center mob_qin_m_b_8">{{ trans('admin.PHOTOS') }}</h2>
                            <!-- <span class="sec-title-divider"></span> -->
                            <div class="row mx-auto my-auto mob_qin_m_t_2r">
                                <div id="photosCarousel" class="carousel slide w-100 " data-ride="carousel">
                                    <div class="carousel-inner w-100 vv-3" role="listbox">
                                        <div class="container">
                                            @foreach($photos as $key => $photo)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : ''}}">
                                                <div class="col-12 col-md-3">
                                                    <div class="card mb-2 p-2 wrapper_card">

                                                        <a class="image-popup-vertical-fit" href="{{ $photo->image }}" title="qinqa portofolio image">
                                                            <img class="lozad card-img-top img-fluid p-3 w-photo img-thumbnail" src="{{ $photo->image }}" alt="qinqa portofolio image">
                                                        </a>
                                                        <div class="card-body text-center p-2 card_overide_height">
                                                        <h4 class="card-title font-weight-bold">{{ session_lang($photo->name_en,$photo->name_ar) }}</h4>
                                                        <p class="card-text">{{ session_lang($photo->desc_en,$photo->desc_ar) }}</p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="wrapper_left_minus_2 wrapper_carousel-control carousel-control-prev" href="#photosCarousel" role="button" data-slide="prev">
                                <span class="wrapper_carousel_control_icon carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="wrapper_right_minus_2 wrapper_carousel-control carousel-control-next" href="#photosCarousel" role="button" data-slide="next">
                                <span class="wrapper_carousel_control_icon carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <!-- Grid column -->
                </div>
            <!-- Grid row -->
            </div>
        </div>


        <div id="videos" class="photos">
            <div class="container-fluid ">

                <div class="row ">

                    <div class="col-md-12 mb-4">
                        <div class="container my-3 position-relative">
                            <h2 class="mt-5 mb-5 mob_heading_center">{{ trans('admin.videos') }}</h2>
                            <!-- <span class="sec-title-divider"></span> -->
                            <div class="row mx-auto my-auto">
                                <div id="videosCarousel" class="carousel slide w-100 " data-ride="carousel">
                                    <div class="carousel-inner w-100 vv-3" role="listbox">
                                        <div class="container">
                                            @foreach($videos as $key => $video)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : ''}}">
                                                <div class="col-12 col-md-3">
                                                    <div class="card mb-2 p-2 wrapper_card">
                                                    <iframe class="w-photo" width="100%" height="100%" src="{{ $video->video_src }}" style="margin-top: 10px" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        <div class="card-body text-center p-2 card_overide_height">
                                                        <h4 class="card-title font-weight-bold">{{ session_lang($video->name_en, $video->name_ar) }}</h4>
                                                        <p class="card-text">{{ session_lang($video->desc_en,$video->desc_ar) }}</p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="wrapper_left_minus_2 wrapper_carousel-control carousel-control-prev" href="#videosCarousel" role="button" data-slide="prev">
                                <span class="wrapper_carousel_control_icon carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="wrapper_right_minus_2 wrapper_carousel-control carousel-control-next" href="#videosCarousel" role="button" data-slide="next">
                                <span class="wrapper_carousel_control_icon carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>



    <!-- contact us -->

        <div id="contact-us" class="text-center contact-form">
            <h3 class="upercase_text qin_rotate_deg_180">{{ trans('admin.Contact_us') }}</h3>
            <p class="qin_contac-us-text qin_rotate_deg_180">{{ trans('admin.contac_us_message') }}</p>

            <form method="post" action="{{ route('contact.store') }}" class="offset-8 text-center">
                @csrf
                <div class="row">
                    <div class="col-md-12 qin_rotate_deg_180">
                        <div class="form-group">
                            <input value="{{old('name')}}" name="name" type="text" name="name" class="qin-input form-control" placeholder="{{ trans('admin.Your_Name') }} *" required/>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{  $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input value="{{old('email')}}" name="email" type="email"  class="qin-input form-control" placeholder="{{ trans('admin.Your_Email') }} *" required/>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                        </div>


                        <div class="form-group">
                            <textarea name="message" class="qin-input form-control" placeholder="{{ trans('admin.Your_Message') }} *" style="width: 100%; height: 150px;" required>{{ old('message') }}</textarea>
                            @if ($errors->has('message'))
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                        </div>


                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btnContact" value="{{ trans('admin.Send') }}" />
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <a href="#top" class="ease back-to-top "><i class="fa fa-arrow-up"></i></a>




    </main>

    @endsection
