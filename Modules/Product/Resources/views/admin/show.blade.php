@extends('admin.panel')
@section('page')


    <section>
        <div class="container  pd-v-3">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#general" role="tab"
                       aria-controls="general"
                       aria-selected="true">مشخصات اصلی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#reviews" role="tab"
                       aria-controls="reviews" aria-selected="false">نقد و بررسی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#specificationslist" role="tab"
                       aria-controls="specificationslist" aria-selected="false">جدول مشخصات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#accessories" role="tab"
                       aria-controls="accessories" aria-selected="false">لوازم جانبی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#varieties" role="tab"
                       aria-controls="varieties" aria-selected="false">گونه های محصول</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">


                <div class="tab-pane fade show pd-v-3 active" id="general" role="tabpanel" aria-labelledby="home-tab">
                    <div class="product-header pd-v-1   ">

                        <div class="row">
                            <div class="col-xl-8">
                                @if((is_null(Cart::count($product))) || (Cart::count($product) < $product->inventory))
                                    <form action="{{route('cart.add',['id'=>$product->id])}}" method="post">
                                        @csrf
                                        <input type="hidden" name="type" value="product">
                                        <input type="submit" class="btn btn-sm btn-outline-success" value="افزودن به سبد خرید">
                                    </form>
                                @endif
                                <h1>عنوان محصول : {{$product->title}}</h1>
                                <h3>قیمت پایه : {{$product->basePrice}}</h3>
                                <h3>تخفیف : {{$product->discount}}%</h3>
                                <h3>
                                    قیمت بعد از تخفیف
                                    : {{$product->basePrice - ($product->basePrice /100 * $product->discount)}}
                                </h3>
                                <h3>موجودی : {{$product->inventory}}</h3>
                            </div>
                            <div class="col-xl-4">
                                <img src="{{$product->thumbnail}}" alt="">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade pd-v-3" id="reviews" role="tabpanel" aria-labelledby="profile-tab">
                    <h3>توضیحات کوتاه:</h3>
                    <p class="pd-v-1">
                        {{$product->description}}
                    </p>
                    <hr class="light-hr">
                    <h3>نقد و بررسی:</h3>
                    <p class="pd-v-1">
                        {!! $product->review !!}
                    </p>
                </div>

                <div class="tab-pane fade pd-v-3" id="specificationslist" role="tabpanel" aria-labelledby="contact-tab">
                    <table class="table table table-striped table-dark table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <td>مشخصات محصول</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if($product->specifications)
                            @foreach($product->specifications as $item)
                                @if(is_array($item) && sizeof($item)==2)
                                    <tr>
                                        <td>{{$item[0]}}</td>
                                        <td>{{$item[1]}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade pd-v-1" id="accessories" role="tabpanel" aria-labelledby="contact-tab">
                    <table class="table table table-striped table-dark table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <td>عنوان</td>
                            <td>قیمت</td>
                            <td>تصویر</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accessories as $accessory)
                            <tr>
                                <td>{{$accessory->title}}</td>
                                <td>{{$accessory->basePrice}}</td>
                                <td><img src="{{$accessory->thumbnail}}" style="width: 100px" alt=""></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade pd-v-3" id="varieties" role="tabpanel" aria-labelledby="contact-tab">
                    @foreach($varieties as $variety)

                        <table class="table table table-striped table-dark table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th>
                                    <form action="{{route('cart.add',['id'=>$variety['id']])}}" method="post">
                                        @csrf
                                        <input type="hidden" name="type" value="variety">
                                        <input type="submit" class="btn btn-sm btn-outline-success" value="افزودن به سبد خرید">
                                    </form>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    قیمت
                                </td>
                                <td>{{$variety['basePrice']}}</td>
                            </tr>
                            <tr>
                                <td>موجودی</td>
                                <td>{{$variety['inventory']}}</td>
                            </tr>
                            <tr>
                                <td>تخفیف</td>
                                <td>{{$variety['discount']}}%</td>
                            </tr>
                            <tr>
                                <td>قیمت پس از تخفیف</td>
                                <td>{{$variety['basePrice']-($variety['basePrice']*$variety['discount']/100)}}</td>
                            </tr>
                                @foreach($variety['specifications'] as $item)
                                    @if(is_array($item) && sizeof($item)==2)
                                        <tr>
                                            <td>{{$item[0]}}</td>
                                            <td>{{$item[1]}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="accessory-form">
        <div class="container">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                افزودن لوازم جانبی به کالا
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <form action="{{route('admin.products.store',['parent'=>$product->id])}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input class="form-control" type="text" name="title" value="{{old('title')}}">
                                </div>

                                <div class="form-group input-group">
                                    <label for="basePrice">قیمت پایه</label>
                                    <input class="form-control" type="number" name="basePrice"
                                           value="{{old('basePrice')}}">
                                </div>
                                <div class="form-group input-group">
                                    <label for="discount">تخفیف</label>
                                    <input class="form-control" type="number" name="discount"
                                           value="{{old('discount')?old('discount'):0}}">
                                </div>
                                <div class="form-group input-group">
                                    <label for="inventory">موجودی</label>
                                    <input class="form-control" type="number" name="inventory"
                                           value="{{old('inventory')?old('inventory'):0}}">
                                </div>


                                <div class="form-group">
                                    <label for="description">توضیح کوتاه</label>
                                    <textarea class="form-control" name="description" id="description" cols="30"
                                              rows="10">{{old('description')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="review"> نقد و بررسی</label>
                                    <textarea class="form-control" name="review" id="review" cols="30"
                                              rows="10">{{old('review')}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">تصویر شاخص</label>
                                    <div class="input-group" style="direction: ltr">
                                        <input type="text" id="image_label" class="form-control" name="thumbnail"
                                               accept=".jpg,.png,.jpeg" value="{{old('thumbnail')}}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="button-image">
                                                انتخاب
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h3>جدول مشخصات</h3>
                                    <label for="key">کلید</label>
                                    <input type="text" id="key">
                                    <lable>مقدار</lable>
                                    <input type="text" id="value">
                                    <a class=" btn btn-sm btn-outline-info" onclick="addItem()">افزودن</a>
                                    <textarea name="specifications" cols="30" rows="10" class="form-control"
                                              id="specifications"></textarea>
                                </div>
                                <script>
                                    CKEDITOR.replace('review', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
                                </script>
                                <input type="submit" value="submit" class="btn btn-outline-success">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="true" aria-controls="collapseTwo">
                                افزودن کونه جدید
                            </button>
                        </h5>
                    </div>

                    <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <form action="{{route('admin.products.addVariety',['parent'=>$product->id])}}"
                                  method="post">
                                @csrf


                                <div class="form-group input-group">
                                    <label for="price">قیمت پایه</label>
                                    <input class="form-control" type="number" name="price"
                                           value="{{old('price')}}">
                                </div>
                                <div class="form-group input-group">
                                    <label for="discount">تخفیف</label>
                                    <input class="form-control" type="number" name="discount"
                                           value="{{old('discount')?old('discount'):0}}">
                                </div>
                                <div class="form-group input-group">
                                    <label for="inventory">موجودی</label>
                                    <input class="form-control" type="number" name="inventory"
                                           value="{{old('inventory')?old('inventory'):0}}">
                                </div>

                                <div class="form-group">
                                    <h3>جدول مشخصات</h3>
                                    <label for="key">کلید</label>
                                    <input type="text" id="v_key">
                                    <lable>مقدار</lable>
                                    <input type="text" id="v_value">
                                    <a class=" btn btn-sm btn-outline-info" onclick="addVarietyItem()">افزودن</a>
                                    <textarea name="v_specifications" cols="30" rows="10" class="form-control"
                                              id="v_specifications"></textarea>
                                </div>
                                <script>
                                    CKEDITOR.replace('review', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
                                </script>
                                <input type="submit" value="submit" class="btn btn-outline-success">
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }
    </script>
    <script>
        function addItem() {
            let key = document.getElementById('key');
            let value = document.getElementById('value');
            let list = document.getElementById('specifications');
            let text = key.value + ':' + value.value;
            list.value += text + '\r\n';
        }

        function addVarietyItem() {
            let v_key = document.getElementById('v_key');
            let v_value = document.getElementById('v_value');
            let v_list = document.getElementById('v_specifications');
            let v_text = v_key.value + ':' + v_value.value;
            v_list.value += v_text + '\r\n';
        }
    </script>

@endsection
