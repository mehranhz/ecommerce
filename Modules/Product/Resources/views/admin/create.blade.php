@extends('admin.panel')
@section('page')
    <div class="container">
        <div class="form-container pd-v-1">
            <form action="{{route('admin.products.store')}}" method="post">
                @csrf

                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input class="form-control" type="text" name="title">
                </div>

                <div class="form-group input-group">
                    <label for="basePrice">قیمت پایه</label>
                    <input class="form-control" type="number" name="basePrice">
                    <label for="discount">تخفیف</label>
                    <input class="form-control" type="number" name="discount">
                    <label for="inventory">موجودی</label>
                    <input class="form-control" type="number" name="inventory">
                </div>


                <div class="form-group">
                    <label for="description">توضیح کوتاه</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="review"> نقد و بررسی</label>
                    <textarea class="form-control" name="review" id="review" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="thumbnail">تصویر شاخص</label>
                    <div class="input-group" style="direction: ltr">
                        <input type="text" id="image_label" class="form-control" name="thumbnail" accept=".jpg,.png,.jpeg">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب</button>
                        </div>
                    </div>
                </div>
                <script>
                    CKEDITOR.replace('review', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
                </script>
                <input type="submit" value="submit">
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

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
@endsection
