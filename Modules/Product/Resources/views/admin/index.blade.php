@extends('admin.panel')
@section('page')
    <div class="container control-container">
        <a href="{{route('admin.products.create')}}" class="btn btn-md btn-outline-info">ایجاد محصول جدید</a>
    </div>
    <section style="min-height: 100vh">
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>عنوان</th>
                    <th>قیمت</th>
                    <th>موجودی</th>
                    <th>کاربر</th>
                    <th>تخفیف</th>
                    <th>تصویر شاخص</th>
                    <th>کنترل</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            {{$product->id}}
                        </td>
                        <td>
                            <a href="{{route('admin.products.show',['product'=>$product->id])}}">{{$product->title}}</a>
                        </td>
                        <td>
                            {{$product->basePrice}}
                        </td>
                        <td>
                            {{$product->inventory}}
                        </td>
                        <td>
                            {{$product->user_id}}
                        </td>
                        <td>
                            {{$product->discount}}
                        </td>
                        <td>
                            <img src="{{$product->thumbnail}}" alt="" style="width: 100px">
                        </td>
                        <td>
                            <div class="btn-group " style="direction: ltr">
                                <a href="{{route('admin.products.edit',['product'=>$product->id])}}" class="btn btn-sm btn-warning">ویرایش</a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#myModal">حذف
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p>حذف محصول؟</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{route('admin.products.destroy',['product'=>$product->id])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-outline-info" data-dismiss="modal">
                                                            انصراف
                                                        </button>
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            حذف
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>


        </div>
        <div class="container" style="direction: ltr">
            {{$products->links()}}
        </div>
    </section>

    <hr>
    <section>

        <div class="container">
            <h2>لوازم جانبی محصولات</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>عنوان</th>
                    <th>قیمت</th>
                    <th>موجودی</th>
                    <th>کالای اصلی</th>
                    <th>کاربر</th>
                    <th>تخفیف</th>
                    <th>تصویر شاخص</th>
                    <th>کنترل</th>
                </tr>
                </thead>
                <tbody>
                @foreach($accessories  as $accessory)
                    <tr>
                        <td>
                            {{$accessory->id}}
                        </td>
                        <td>
                            <a href="{{route('admin.products.show',['product'=>$accessory->id])}}">{{$accessory->title}}</a>
                        </td>
                        <td>
                            {{$accessory->basePrice}}
                        </td>
                        <td>
                            {{$accessory->inventory}}
                        </td>
                        <td>{{$accessory->parent()->title}}</td>
                        <td>
                            {{$accessory->user->name}}
                        </td>
                        <td>
                            {{$accessory->discount}}
                        </td>
                        <td>
                            <img src="{{$accessory->thumbnail}}" alt="" style="width: 100px">
                        </td>
                        <td>
                            <div class="btn-group " style="direction: ltr">
                                <a href="{{route('admin.products.edit',['product'=>$accessory->id])}}"
                                   class="btn btn-sm btn-warning">ویرایش</a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#myModal">حذف
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p>حذف محصول؟</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form
                                                    action="{{route('admin.products.destroy',['product'=>$accessory->id])}}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-outline-info"
                                                                data-dismiss="modal">
                                                            انصراف
                                                        </button>
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                                            حذف
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        </div>
        <div class="container" style="direction: ltr">
            {{$accessories->links()}}
        </div>
    </section>

@endsection
