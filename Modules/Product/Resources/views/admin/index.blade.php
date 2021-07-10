@extends('admin.panel')
@section('page')
    <div class="container control-container">
        <a href="{{route('admin.products.create')}}" class="btn btn-md btn-outline-info">ایجاد محصول جدید</a>
    </div>
    <section>
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
                            {{$product->title}}
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
                        <td >
                           <div class="btn-group " style="direction: ltr">
                               <a href="" class="btn btn-sm btn-warning">ویرایش</a>
                               <a href="" class="btn btn-sm btn-danger">حذف</a>
                           </div>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

