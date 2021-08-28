@extends('frontend.layouts.mobile.mobilePage')
@section('css')
    <link rel="stylesheet" href="{{asset('css//mobile/product.css')}}">
@endsection
@section('content')

    <section class="product-info-section">
        <div class="spacer"></div>
        <div class="container">
            <div class="product-card">
                @if(isset($category))
                    <div class="product-categories-breadcrumb">
                        @if(isset($category->parentCategory))
                            <a href="{{route('category',['category'=>$category->parentCategory->id])}}"
                               class="clickable">{{$category->parentCategory->title}}</a>
                            <pre class="white-text">/</pre>
                        @endif
                        <a href="{{route('category',['category'=>$category->id])}}"
                           class="clickable">{{$category->title}}</a>
                    </div>
                    <hr style="background-color: white">
                @endif

                <h1 class="product-title">{{$product->title}}</h1>

                <img src="{{$product->thumbnail}}" alt="" class="responsive-image">
                <div class="product-icons-ribbon">
                    <div class="product-action-btns">
                        {{--                        <a href="" class="action-btn">--}}
                        <img style="display: {{$product->savedItem()?'none':'block'}}"
                             src="{{asset('images/mobile/18-save.png')}}" alt="" onclick="link({{$product->id}})"
                             id="save">
                        <img style="display: {{$product->savedItem()?'block':'none'}}"
                             src="{{asset('images/mobile/18-saved.png')}}" alt="" onclick="unlink({{$product->id}})"
                             id="saved">
                        {{--                        </a>--}}
                        <a href="#" class="action-btn">
                            <img src="{{asset('images/mobile/share.png')}}" alt="" id="shareBtn">
                        </a>
                        @if($product->inventory < 1)
                            <a href="#" class="action-btn">
                                <img style="display: {{$product->hasReminder()?'none':'block'}}"
                                     src="{{asset('images/mobile/bell.png')}}" alt="" id="reminder"
                                     onclick="setReminder({{$product->id}})">
                                <img style="display: {{$product->hasReminder()?'block':'none'}}"
                                     src="{{asset('images/mobile/ringed.png')}}" alt="" id="ringed"
                                     onclick="unsetReminder({{$product->id}})">
                            </a>
                        @endif
                    </div>
                    <div class="product-stars">
                        <img src="{{asset('images/mobile/18-star.png')}}" alt="">
                        <span>4.2(150)</span>
                    </div>
                </div>
                <div class="product-recommendations action-btn">
                    <img src="{{asset('images/mobile/18-like.png')}}" alt="">
                    <a style=""> 99% از خریداران این محصول را پیشنهاد داده اند</a>
                </div>
            </div>

            <div class="product-card">
                <div class="vrieties">
                    @php
                        $keys=[]
                    @endphp
                    @foreach($varieties as $variety)
                        @foreach($variety->specifications() as $specification)
                            @php
                                if (array_key_exists($specification[0],$keys)){
                                    array_push($keys[$specification[0]],$specification[1]);
                                }else{
                                     $keys[$specification[0]] =[$specification[1],];
                                }

                            @endphp
                        @endforeach
                    @endforeach

                </div>
                <div class="product-price-container">


                    @if($product->inventory>0)
                        @if($product->discount > 0)
                            <div class="product-discount">
                                <span class="product-discount">{{$product->discount}} %</span>
                                <span class="product-old-price">{{$product->basePrice}} تومان</span>
                            </div>
                        @endif
                        <div class="d-flex space-between">
                            <p class="product-price">{{$product->basePrice -(( $product->basePrice/100)*$product->discount)}}
                                تومان</p>

                            <form action="{{route('cart.add',['id'=>$product->id])}}" method="post">
                                @csrf
                                <input type="hidden" name="type" value="product">
                                <input type="submit" value="افزودن به سبد خرید" class="btn btn-md clickable-btn">
                            </form>
                        </div>
                    @else
                        <div class="out-of-stock">
                            <h4 class="dark-theme" style="">ناموجود</h4>
                            <span>متاسفانه این کالا در حال حاضر موجود نیست</span>
                        </div>


                    @endif


                </div>
            </div>

            <div class="product-card">
                @if(count($product->specifications())>0)

                    <div class="product-review">
                        <div class="review-header">
                            <a href="#" class="clickable" data-toggle="modal" data-target="#myModal"> بیشتر </a>
                            <h3>نقد و بررسی تخصصی</h3>
                        </div>
                        <div>
                            {!! \Illuminate\Support\Str::limit($product->review,250) !!}
                        </div>
                    </div>
                    <hr class="light-hr">
                    <div class="product-specifications">
                        <h3>مشخصات محصول</h3>
                        <table class="table table-striped table-dark table-bordered">
                            <tbody>
                            @foreach($product->specifications() as $specification)
                                <tr>
                                    <td>{{$specification[0]}}</td>
                                </tr>
                                <tr>
                                    <td>{{$specification[1]}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <div class="product-card">
                <div class="product-comments">
                    <div class="comments-header">
                        <a class="add-comment-btn" href="#" data-toggle="modal" data-target="#commentModal">افزودن
                            نظر</a>
                        <h3>نظرات کاربران</h3>
                    </div>

                    <div class="comments">
                        @foreach($comments->take(3) as $commentDemo)
                            <div class="comment">
                                <div class="comment-header">
                                    <span>{{$commentDemo->user->name}}</span>
                                    <span>{{$commentDemo->created_at}}</span>
                                </div>
                                <p class="comment-body">{{ \Illuminate\Support\Str::limit($commentDemo->comment,120,'...')}}</p>
                            </div>
                        @endforeach


                    </div>
                    <a class="clickable" href="#" data-toggle="modal" data-target="#commentsModal">نمایش همه نظرات</a>
                </div>

            </div>
        </div>

    </section>




    <div id="myModal" class="modal fade dark-theme" role="dialog"
         style="height: 100vh !important;background-color: black">
        <div class="modal-dialog dark-theme" style="height: 100vh !important;">
            <!-- Modal content-->
            <div class="modal-content dark-theme" style="height: 100% !important;background-color: black">
                <div class="modal-header dark-theme"
                     style="align-items: flex-end;justify-content: flex-end;padding: 1rem 0">
                    <h4 class="modal-title dark-theme">نقد و بررسی تخصصی</h4>
                    <a href="#" class="clickable" data-dismiss="modal"
                       style="font-size: 20px;font-weight: 800;padding:0 1rem !important;margin:0 !important ">
                        &#8594;</a>
                </div>
                <div class="modal-body dark-theme full-review" style="padding: .5rem;font-size: 16px">
                    {!! $product->review !!}
                </div>
            </div>

        </div>
    </div>




    <div id="commentModal" class="modal fade dark-theme" role="dialog"
         style="height: 100vh !important;background-color: black">
        <div class="modal-dialog dark-theme" style="height: 100vh !important;">
            <!-- Modal content-->
            <div class="modal-content dark-theme" style="height: 100% !important;background-color: black">
                <div class="modal-header dark-theme"
                     style="align-items: flex-end;justify-content: flex-end;padding: 1rem 0">
                    <h4 class="modal-title dark-theme">ثبت نظر</h4>
                    <a href="#" class="clickable" data-dismiss="modal"
                       style="font-size: 20px;font-weight: 800;padding:0 1rem !important;margin:0 !important ">
                        &#8594;</a>
                </div>
                <div class="modal-body dark-theme full-review" style="padding: .5rem;font-size: 16px">
                    <form action="{{route('comment.add')}}" style="text-align: right" method="post">
                        @csrf
                        <input type="hidden" name="commentable" value="Product">
                        <input type="hidden" name="commentable_id" value="{{$product->id}}">
                        <div class="form-group" style="padding: 1rem">
                            <label for="comment" style="padding: 0 .5rem">نظر شما</label>
                            <textarea name="comment" id="" cols="30" rows="10" class="form-control"></textarea>
                            <input type="submit" class="btn btn-md btn-outline-warning" value="ثبت نظر"
                                   style="margin: .5rem 0">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <div id="commentsModal" class="modal fade dark-theme" role="dialog"
         style="height: 100vh !important;background-color: black">
        <div class="modal-dialog dark-theme" style="height: 100vh !important;">
            <!-- Modal content-->
            <div class="modal-content dark-theme" style="height: 100% !important;background-color: black">
                <div class="modal-header dark-theme"
                     style="align-items: flex-end;justify-content: flex-end;padding: 1rem 0">
                    <h4 class="modal-title dark-theme">نظر کاربران</h4>
                    <a href="#" class="clickable" data-dismiss="modal"
                       style="font-size: 20px;font-weight: 800;padding:0 1rem !important;margin:0 !important ">
                        &#8594;</a>
                </div>
                <div class="modal-body dark-theme full-review" style="padding: .5rem;font-size: 16px;text-align: right">
                    <div class="modal-comments">
                        @foreach($comments as $comment)
                            <div class="modal-comment">
                                <div class="comment-header">
                                    <span>{{$comment->user->name}}</span>
                                    <span>{{$comment->created_at}}</span>
                                </div>
                                <p class="comment-body">{{$comment->comment}}</p>
                                <div style="display: flex;align-items: center;width: fit-content">
                                    <a href="" style="padding: 0 .25rem">
                                        <img src="{{asset('images/mobile/report.png')}}" alt="">
                                    </a>
                                    <a href="" style="padding: 0 .25rem">
                                        <img src="{{asset('images/mobile/18-heart.png')}}" alt="">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script>
        document.querySelector('#shareBtn')
            .addEventListener('click', event => {

                // Fallback, Tries to use API only
                // if navigator.share function is
                // available
                if (navigator.share) {
                    navigator.share({

                        // Title that occurs over
                        // web share dialog
                        title: 'knife hub',

                        // URL to share
                        url: "{{$product->path()}}"
                    }).then(() => {
                        console.log('Thanks for sharing!');
                    }).catch(err => {

                        // Handle errors, if occured
                        console.log(
                            "Error while using Web share API:");
                        console.log(err);
                    });
                } else {

                    // Alerts user if API not available
                    alert("Browser doesn't support this API !");
                }
            })

        function unlink(id) {
            document.getElementById('saved').style.display = "none"
            document.getElementById('save').style.display = "block"
            axios.delete('http://localhost:8000/profile/deleteProduct/' + id).then(response => {

                swal({
                    text: 'محصول از لیست شما حذف شد',
                    icon: 'warning',
                    button: false,
                    timer: 1500
                })
            });
        }

        function link(id) {
            document.getElementById('save').style.display = "none"
            document.getElementById('saved').style.display = "block"
            axios.post('http://localhost:8000/profile/saveProduct/' + id).then(response => {

                swal({
                    text: 'محصول به لیست شما اضافه شد',
                    icon: 'success',
                    button: false,
                    timer: 1500
                })
            });
        }

        function setReminder(id) {
            document.getElementById('reminder').style.display = "none"
            document.getElementById('ringed').style.display = "block"
            axios.post('http://localhost:8000/profile/setReminder/' + id).then(response => {
                swal({
                    text: 'موجود شد بهت خبر میدیم',
                    icon: 'success',
                    button: false,
                    timer: 1500
                })
            });
        }

        function unsetReminder(id) {
            document.getElementById('reminder').style.display = "block"
            document.getElementById('ringed').style.display = "none"
            axios.delete('http://localhost:8000/profile/unsetReminder/' + id).then(response => {
                swal({
                    text: 'یادآور حذف شد',
                    icon: 'warning',
                    button: false,
                    timer: 1500
                })
            });
        }
    </script>
@endsection


