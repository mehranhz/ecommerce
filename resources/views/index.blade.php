@extends('frontend.layouts.page')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
@endsection
@section('content')
    <section class="section1 pb-4">
        <div class="container">
            <div class="d-flex justify-content-center overflow-hidden">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 1440px;overflow: hidden;border-radius: 15px">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" >
                        <div class="carousel-item active">
                            <img class="d-block w-100 " src="{{asset('images/slides/1.jpg')}}" alt="First slide" style="max-height: 480px">
                            <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0,0,0,0.64)">
                                <h3 style="color: white">پیش فروش محصول جدید اینفرنو</h3>
                                <p>...</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 responsive-image" src="{{asset('images/slides/2.jpg')}}" alt="Second slide" style="max-height: 480px">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 responsive-image" src="{{asset('images/slides/3.jpg')}}" alt="Third slide" style="max-height: 480px">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
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
    <script>
        $('.carousel').carousel({
            interval: 1000
        })
    </script>
@endsection
