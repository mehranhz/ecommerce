@extends('admin.panel')
@section('page')
    <div class="container">
        <div class="form-container pd-v-1">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('admin.products.update',['product'=>$product->id])}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input class="form-control" type="text" name="title" value="{{$product->title}}">
                </div>

                <div class="form-group input-group">
                    <label for="basePrice">قیمت پایه</label>
                    <input class="form-control" type="number" name="basePrice" value="{{$product->basePrice}}">
                    <label for="discount">تخفیف</label>
                    <input class="form-control" type="number" name="discount" value="{{$product->discount}}">
                    <label for="inventory">موجودی</label>
                    <input class="form-control" type="number" name="inventory" value="{{$product->inventory}}">
                </div>


                <div class="form-group">
                    <label for="description">توضیح کوتاه</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$product->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="review"> نقد و بررسی</label>
                    <textarea class="form-control" name="review" id="review" cols="30" rows="10">{{$product->review}}</textarea>
                </div>

                <div class="form-group">
                    <label for="thumbnail">تصویر شاخص</label>
                    <div class="input-group" style="direction: ltr">
                        <input type="text" id="image_label" class="form-control" name="thumbnail"
                               accept=".jpg,.png,.jpeg" value="{{$product->thumbnail}}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب</button>
                        </div>

                    </div>
                    <img class="pd-v-1" src="{{$product->thumbnail}}" alt="" style="width: 300px">
                </div>

                <div class="form-group">
                    @php
                        $productCategories = $product->categories;
                    @endphp
                    <label for="categories">دسته بندی </label>
                    <select name="categories[]" id="categories" multiple class="form-control">
                        @foreach($categories as $category)
                            <option {{$productCategories->where('id',$category->id)->count() ===0 ? '' : 'selected'}}  value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <h3>جدول مشخصات</h3>
                    <label for="key">کلید</label>
                    <input type="text" id="key">
                    <lable>مقدار</lable>
                    <input type="text" id="value">
                    <a class=" btn btn-sm btn-outline-info" onclick="addItem()" >افزودن</a>
                    <textarea name="specifications"  cols="30" rows="10" class="form-control" id="specifications">{{$product->specifications}}</textarea>
                </div>
                <script>
                    CKEDITOR.replace('review', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
                </script>
                <input type="submit" value="submit">
            </form>
        </div>
    </div>
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
        function addItem(){
            let key = document.getElementById('key');
            let value = document.getElementById('value');
            let list = document.getElementById('specifications');
            let text = key.value + ' : ' + value.value;
            list.value += text+'\r\n';
        }
    </script>
@endsection
