@extends('frontend.layouts.mobile.mobilePage')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">
    <link rel="stylesheet" href="{{asset('css/slider.css')}}">
@endsection
@section('content')
    <div class="spacer">
        &nbsp;
    </div>
    <section class="section4">
            <div class="overflow-auto story-container" style="display: flex">
                <div class="st">
                    <div class="story-ring">
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

    </section>
    <section class="section1">
        <div class="slider">
            <div class="wrapper">

                <div class="content">
                    <div class="bg-shape">
                        <h3 style="text-align: center;color: lightgray;font-style: oblique;font-family: gypsy">INFERNO
                            KNIVES</h3>
                        <!--                    <img src="https://res.cloudinary.com/muhammederdem/image/upload/v1536405214/starwars/logo.png"-->
                        <!--                         alt="">-->
                    </div>


                    <div class="product-img">

                        <div class="product-img__item" id="img1">
                            <img src="images/1.png"
                                 alt="star wars" class="product-img__img">
                        </div>

                        <div class="product-img__item" id="img2">
                            <img src="images/2.png"
                                 alt="star wars" class="product-img__img">
                        </div>

                        <div class="product-img__item" id="img3">
                            <img src="images/3.png"
                                 alt="star wars" class="product-img__img">
                        </div>

                        <div class="product-img__item" id="img4">
                            <img src="images/4.png"
                                 alt="star wars" class="product-img__img">
                        </div>


                    </div>


                    <div class="product-slider">
                        <button class="prev disabled">
        <span class="icon">
          <svg class="icon icon-arrow-right"><use xlink:href="#icon-arrow-left"></use></svg>
        </span>
                        </button>
                        <button class="next">
        <span class="icon">
          <svg class="icon icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg>
        </span>
                        </button>

                        <div class="product-slider__wrp swiper-wrapper">
                            <div class="product-slider__item swiper-slide" data-target="img4">
                                <div class="product-slider__card">
                                    <img
                                        src="https://res.cloudinary.com/muhammederdem/image/upload/v1536405223/starwars/item-4-bg.jpg"
                                        alt="star wars" class="product-slider__cover">
                                    <div class="product-slider__content">
                                        <h1 class="product-slider__title">
                                            Knife model <br>
                                        </h1>
                                        <span class="product-slider__price">225000<sup>TM</sup></span>
                                        <div class="product-ctr">
                                            <div class="product-labels">
                                                <div class="product-labels__title">نوع دسته</div>

                                                <div class="product-labels__group">
                                                    <label class="product-labels__item">
                                                        <input type="radio" class="product-labels__checkbox"
                                                               name="type5">
                                                        <span class="product-labels__txt">چوب گردو</span>
                                                    </label>

                                                    <label class="product-labels__item">
                                                        <input type="radio" class="product-labels__checkbox"
                                                               name="type5"
                                                               checked>
                                                        <span class="product-labels__txt">چوب شمشاد</span>
                                                    </label>

                                                    <label class="product-labels__item">
                                                        <input type="radio" class="product-labels__checkbox"
                                                               name="type5">
                                                        <span class="product-labels__txt">پلاستیک فشرده</span>
                                                    </label>

                                                    <!--                                                <label class="product-labels__item">-->
                                                    <!--                                                    <input type="radio" class="product-labels__checkbox" name="type5">-->
                                                    <!--                                                    <span class="product-labels__txt">XL</span>-->
                                                    <!--                                                </label>-->

                                                </div>

                                            </div>

                                            <span class="hr-vertical"></span>

                                            <div class="product-inf">
                                                <div class="product-inf__percent">
                                                    <div class="product-inf__percent-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                                             viewBox="0 0 100 100">
                                                            <defs>
                                                                <linearGradient id="gradient" x1="0%" y1="0%" x2="0%"
                                                                                y2="100%">
                                                                    <stop offset="0%" stop-color="#0c1e2c"
                                                                          stop-opacity="0"/>
                                                                    <stop offset="100%" stop-color="#cb2240"
                                                                          stop-opacity="1"/>
                                                                </linearGradient>
                                                            </defs>
                                                            <circle cx="50" cy="50" r="47" stroke-dasharray="240, 300"
                                                                    stroke="#cb2240" stroke-width="4" fill="none"/>
                                                        </svg>
                                                    </div>
                                                    <div class="product-inf__percent-txt">
                                                        98%
                                                    </div>
                                                </div>

                                                <span class="product-inf__title">میزان رضایت</span>
                                            </div>

                                        </div>

                                        <div class="product-slider__bottom">
                                            <button class="product-slider__cart">
                                                افزودن به سبد خرید
                                            </button>

                                            <button class="product-slider__fav js-fav"><span class="heart"></span>
                                                افزودن به علاقه مندی ها
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-slider__item swiper-slide" data-target="img1">
                                <div class="product-slider__card">
                                    <img
                                        src="https://res.cloudinary.com/muhammederdem/image/upload/v1536405223/starwars/item-4-bg.jpg"
                                        alt="star wars" class="product-slider__cover">
                                    <div class="product-slider__content">
                                        <h1 class="product-slider__title">
                                            Knife model <br>
                                        </h1>
                                        <span class="product-slider__price">225000<sup>TM</sup></span>
                                        <div class="product-ctr">
                                            <div class="product-labels">
                                                <div class="product-labels__title">نوع دسته</div>

                                                <div class="product-labels__group">
                                                    <label class="product-labels__item">
                                                        <input type="radio" class="product-labels__checkbox"
                                                               name="type5">
                                                        <span class="product-labels__txt">چوب گردو</span>
                                                    </label>

                                                    <label class="product-labels__item">
                                                        <input type="radio" class="product-labels__checkbox"
                                                               name="type5"
                                                               checked>
                                                        <span class="product-labels__txt">چوب شمشاد</span>
                                                    </label>

                                                    <label class="product-labels__item">
                                                        <input type="radio" class="product-labels__checkbox"
                                                               name="type5">
                                                        <span class="product-labels__txt">پلاستیک فشرده</span>
                                                    </label>

                                                    <!--                                                <label class="product-labels__item">-->
                                                    <!--                                                    <input type="radio" class="product-labels__checkbox" name="type5">-->
                                                    <!--                                                    <span class="product-labels__txt">XL</span>-->
                                                    <!--                                                </label>-->

                                                </div>

                                            </div>

                                            <span class="hr-vertical"></span>

                                            <div class="product-inf">
                                                <div class="product-inf__percent">
                                                    <div class="product-inf__percent-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                                             viewBox="0 0 100 100">
                                                            <defs>
                                                                <linearGradient id="gradient" x1="0%" y1="0%" x2="0%"
                                                                                y2="100%">
                                                                    <stop offset="0%" stop-color="#0c1e2c"
                                                                          stop-opacity="0"/>
                                                                    <stop offset="100%" stop-color="#cb2240"
                                                                          stop-opacity="1"/>
                                                                </linearGradient>
                                                            </defs>
                                                            <circle cx="50" cy="50" r="47" stroke-dasharray="240, 300"
                                                                    stroke="#cb2240" stroke-width="4" fill="none"/>
                                                        </svg>
                                                    </div>
                                                    <div class="product-inf__percent-txt">
                                                        98%
                                                    </div>
                                                </div>

                                                <span class="product-inf__title">میزان رضایت</span>
                                            </div>

                                        </div>

                                        <div class="product-slider__bottom">
                                            <button class="product-slider__cart">
                                                افزودن به سبد خرید
                                            </button>

                                            <button class="product-slider__fav js-fav"><span class="heart"></span>
                                                افزودن به علاقه مندی ها
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-slider__item swiper-slide" data-target="img2">
                                <div class="product-slider__card">
                                    <img
                                        src="https://res.cloudinary.com/muhammederdem/image/upload/v1536405223/starwars/item-4-bg.jpg"
                                        alt="star wars" class="product-slider__cover">
                                    <div class="product-slider__content">
                                        <h1 class="product-slider__title">
                                            Knife model <br>
                                        </h1>
                                        <span class="product-slider__price">225000<sup>TM</sup></span>
                                        <div class="product-ctr">
                                            <div class="product-labels">
                                                <div class="product-labels__title">نوع دسته</div>

                                                <div class="product-labels__group">
                                                    <label class="product-labels__item">
                                                        <input type="radio" class="product-labels__checkbox"
                                                               name="type5">
                                                        <span class="product-labels__txt">چوب گردو</span>
                                                    </label>

                                                    <label class="product-labels__item">
                                                        <input type="radio" class="product-labels__checkbox"
                                                               name="type5"
                                                               checked>
                                                        <span class="product-labels__txt">چوب شمشاد</span>
                                                    </label>

                                                    <label class="product-labels__item">
                                                        <input type="radio" class="product-labels__checkbox"
                                                               name="type5">
                                                        <span class="product-labels__txt">پلاستیک فشرده</span>
                                                    </label>

                                                    <!--                                                <label class="product-labels__item">-->
                                                    <!--                                                    <input type="radio" class="product-labels__checkbox" name="type5">-->
                                                    <!--                                                    <span class="product-labels__txt">XL</span>-->
                                                    <!--                                                </label>-->

                                                </div>

                                            </div>

                                            <span class="hr-vertical"></span>

                                            <div class="product-inf">
                                                <div class="product-inf__percent">
                                                    <div class="product-inf__percent-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                                             viewBox="0 0 100 100">
                                                            <defs>
                                                                <linearGradient id="gradient" x1="0%" y1="0%" x2="0%"
                                                                                y2="100%">
                                                                    <stop offset="0%" stop-color="#0c1e2c"
                                                                          stop-opacity="0"/>
                                                                    <stop offset="100%" stop-color="#cb2240"
                                                                          stop-opacity="1"/>
                                                                </linearGradient>
                                                            </defs>
                                                            <circle cx="50" cy="50" r="47" stroke-dasharray="240, 300"
                                                                    stroke="#cb2240" stroke-width="4" fill="none"/>
                                                        </svg>
                                                    </div>
                                                    <div class="product-inf__percent-txt">
                                                        98%
                                                    </div>
                                                </div>

                                                <span class="product-inf__title">میزان رضایت</span>
                                            </div>

                                        </div>

                                        <div class="product-slider__bottom">
                                            <button class="product-slider__cart">
                                                افزودن به سبد خرید
                                            </button>

                                            <button class="product-slider__fav js-fav"><span class="heart"></span>
                                                افزودن به علاقه مندی ها
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-slider__item swiper-slide" data-target="img3">
                                <div class="product-slider__card">
                                    <img
                                        src="https://res.cloudinary.com/muhammederdem/image/upload/v1536405223/starwars/item-4-bg.jpg"
                                        alt="star wars" class="product-slider__cover">
                                    <div class="product-slider__content">
                                        <h1 class="product-slider__title">
                                            Knife model <br>
                                        </h1>
                                        <span class="product-slider__price">225000<sup>TM</sup></span>
                                        <div class="product-ctr">
                                            <div class="product-labels">
                                                <div class="product-labels__title">نوع دسته</div>

                                                <div class="product-labels__group">
                                                    <label class="product-labels__item">
                                                        <input type="radio" class="product-labels__checkbox"
                                                               name="type5">
                                                        <span class="product-labels__txt">چوب گردو</span>
                                                    </label>

                                                    <label class="product-labels__item">
                                                        <input type="radio" class="product-labels__checkbox"
                                                               name="type5"
                                                               checked>
                                                        <span class="product-labels__txt">چوب شمشاد</span>
                                                    </label>

                                                    <label class="product-labels__item">
                                                        <input type="radio" class="product-labels__checkbox"
                                                               name="type5">
                                                        <span class="product-labels__txt">پلاستیک فشرده</span>
                                                    </label>

                                                    <!--                                                <label class="product-labels__item">-->
                                                    <!--                                                    <input type="radio" class="product-labels__checkbox" name="type5">-->
                                                    <!--                                                    <span class="product-labels__txt">XL</span>-->
                                                    <!--                                                </label>-->

                                                </div>

                                            </div>

                                            <span class="hr-vertical"></span>

                                            <div class="product-inf">
                                                <div class="product-inf__percent">
                                                    <div class="product-inf__percent-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                                             viewBox="0 0 100 100">
                                                            <defs>
                                                                <linearGradient id="gradient" x1="0%" y1="0%" x2="0%"
                                                                                y2="100%">
                                                                    <stop offset="0%" stop-color="#0c1e2c"
                                                                          stop-opacity="0"/>
                                                                    <stop offset="100%" stop-color="#cb2240"
                                                                          stop-opacity="1"/>
                                                                </linearGradient>
                                                            </defs>
                                                            <circle cx="50" cy="50" r="47" stroke-dasharray="240, 300"
                                                                    stroke="#cb2240" stroke-width="4" fill="none"/>
                                                        </svg>
                                                    </div>
                                                    <div class="product-inf__percent-txt">
                                                        98%
                                                    </div>
                                                </div>

                                                <span class="product-inf__title">میزان رضایت</span>
                                            </div>

                                        </div>

                                        <div class="product-slider__bottom">
                                            <button class="product-slider__cart">
                                                افزودن به سبد خرید
                                            </button>

                                            <button class="product-slider__fav js-fav"><span class="heart"></span>
                                                افزودن به علاقه مندی ها
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>


            </div>
            <svg class="hidden" hidden>
                <symbol id="icon-arrow-left" viewBox="0 0 32 32">
                    <path
                        d="M0.704 17.696l9.856 9.856c0.896 0.896 2.432 0.896 3.328 0s0.896-2.432 0-3.328l-5.792-5.856h21.568c1.312 0 2.368-1.056 2.368-2.368s-1.056-2.368-2.368-2.368h-21.568l5.824-5.824c0.896-0.896 0.896-2.432 0-3.328-0.48-0.48-1.088-0.704-1.696-0.704s-1.216 0.224-1.696 0.704l-9.824 9.824c-0.448 0.448-0.704 1.056-0.704 1.696s0.224 1.248 0.704 1.696z"></path>
                    -->
                </symbol>
                <symbol id="icon-arrow-right" viewBox="0 0 32 32">
                    <path
                        d="M31.296 14.336l-9.888-9.888c-0.896-0.896-2.432-0.896-3.328 0s-0.896 2.432 0 3.328l5.824 5.856h-21.536c-1.312 0-2.368 1.056-2.368 2.368s1.056 2.368 2.368 2.368h21.568l-5.856 5.824c-0.896 0.896-0.896 2.432 0 3.328 0.48 0.48 1.088 0.704 1.696 0.704s1.216-0.224 1.696-0.704l9.824-9.824c0.448-0.448 0.704-1.056 0.704-1.696s-0.224-1.248-0.704-1.664z"></path>
                    -->
                </symbol>
            </svg>
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
    <div class="spacer">
        &nbsp;
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>
@endsection
