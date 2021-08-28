@extends('frontend.layouts.page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
@endsection
@section('content')
    <section class="section1">

    </section>

    <section class="section2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 banner-1">
                    <img src="images/b-1.jpg" alt="">
                </div>
                <div class="col-12 col-md-4 banner-1">
                    <img src="images/b-3.jpg" alt="">
                </div>
                <div class="col-12 col-md-4 banner-1">
                    <img src="images/b-2.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="section4">
        <div class="container">
            <div class=" overflow-auto" style="display: flex">
                <div class=" st">
                    <div class="st-container">
                        <div class="story"
                             style="background-image: url('{{asset('images/bush.jpg')}}');background-size: contain">

                        </div>
                    </div>
                </div>
                <div class=" st">
                    <div class="st-container">
                        <div class="story"
                             style="background-image: url('images/kiridashi.jpg');background-size: contain">

                        </div>
                    </div>
                </div>
                <div class=" st">
                    <div class="st-container">
                        <div class="story" style="background-image: url('images/axe.jpg');background-size: contain">

                        </div>
                    </div>
                </div>
                <div class=" st">
                    <div class="st-container">
                        <div class="story" style="background-image: url('images/4.jpg');background-size: contain">

                        </div>
                    </div>
                </div>
                <div class=" st">
                    <div class="st-container">
                        <div class="story" style="background-image: url('images/bush.jpg');background-size: contain">

                        </div>
                    </div>
                </div>
                <div class=" st">
                    <div class="st-container">
                        <div class="story"
                             style="background-image: url('images/kiridashi.jpg');background-size: contain">

                        </div>
                    </div>
                </div>
                <div class=" st">
                    <div class="st-container">
                        <div class="story" style="background-image: url('images/4.jpg');background-size: contain">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
@endsection
