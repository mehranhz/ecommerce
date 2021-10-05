@extends('frontend.layouts.page')
@section('css')
    <link rel="stylesheet" href="{{asset('css/shop.css')}}">
@endsection
@section('content')
    <section class="products-section pd-v-3">

        <div class="container-fluid d-flex flex-md-row-reverse">
            <aside style="height: 100vh;width: 20%;" class="p-4">
                <div class="side-section">
                    <div class="side-section-header">
                        <span>
                            دسته بندی ها
                        </span>
                    </div>
                    <ul>
                        <li>سته بندی</li>
                        <li>سته بندی</li>
                        <li>سته بندی</li>
                        <li>سته بندی</li>
                        <li>سته بندی</li>
                    </ul>
                </div>
            </aside>
            <div class="row products-wrapper mt-4 " style="width: 80%;">
                <div class="col-12 shop-sort-filter d-flex flex-md-row-reverse">
                    <p>مرتب سازی بر اساس :</p>
                    <a href="" class="shop-sort-item"><span style="background:  #afa2fa;padding: 0 5px;border-radius: 7px">پربازدیدترین</span></a>
                    <a href="" class="shop-sort-item">پرفروش ترین</a>
                    <a href="" class="shop-sort-item">محبوب ترین</a>
                    <a href="" class="shop-sort-item">گران ترین</a>
                    <a href="" class="shop-sort-item">ارزان ترین</a>
                </div>
                @foreach($products as $product)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 product">
                        <a href="{{route('product.show',['product'=>$product->id])}}">
                            <img src="{{$product->thumbnail}}" class="c-product-img" alt="">
                        </a>

                        <div class="c-product-info">

                            <form style="display: {{$product->savedItem()?'none':''}}" action="{{route('profile.saveProduct',['product'=>$product->id])}}"
                                  id="save-{{$product->id}}" method="post">
                                @csrf
                                <img src="{{asset('images/mobile/save.png')}}" alt=""
                                     onclick='link({{$product->id}})' id="s-i-{{$product->id}}">
                                {{--                                    document.getElementById("save-{{$product->id}}").submit()--}}
                            </form>

                            <form style="display: {{$product->savedItem()?'':'none'}}" action="{{route('profile.deleteProduct',['product'=>$product->id])}}"
                                  id="delete-{{$product->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <img src="{{asset('images/mobile/saved.png')}}" alt=""
                                     onclick='unlink({{$product->id}})' id="us-i-{{$product->id}}">
                                {{--                                    document.getElementById("delete-{{$product->id}}").submit()--}}
                            </form>

                            <h3>
                                <a href="{{route('product.show',['product'=>$product->id])}}"
                                   class="product-tile-title">{{$product->title}}</a>
                            </h3>
                            @if((is_null(Cart::count($product))) || (Cart::count($product) < $product->inventory))
                                <form action="{{route('cart.add',['id'=>$product->id])}}" method="post"
                                      id="add-to-cart-{{$product->id}}">
                                    @csrf
                                    <input type="hidden" name="type" value="product">
                                    <img src="{{asset('images/mobile/add-to-cart.png')}}" class="add-to-cart-btn" alt=""
                                         onclick='document.getElementById("add-to-cart-{{$product->id}}").submit()'>
                                </form>
                            @else
                                <img src="" alt="">
                            @endif


                        </div>
                        <h4 class="c-product-price">
                            {{$product->basePrice}} TM
                        </h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>

        function unlink(id){
            document.getElementById('delete-'+id).style.display= "none"
            document.getElementById('save-'+id).style.display= "block"
            axios.delete('http://localhost:8000/profile/deleteProduct/'+id).then(response=>{

                swal({
                    text: 'محصول از لیست شما حذف شد',
                    icon:'warning',
                    button:false,
                    timer:1500
                })
            });
        }
        function link(id){
            document.getElementById('save-'+id).style.display= "none"
            document.getElementById('delete-'+id).style.display= "block"
            axios.post('http://localhost:8000/profile/saveProduct/'+id).then(response=>{

                swal({
                    text: 'محصول به لیست شما اضافه شد',
                    icon:'success',
                    button:false,
                    timer:1500
                })
            });
        }

    </script>
@endsection
