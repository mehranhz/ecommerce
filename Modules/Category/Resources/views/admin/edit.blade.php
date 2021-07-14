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

            <form action="{{route('admin.categories.update',['category'=>$category->id])}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" name="title" class="form-control" value="{{$category->title}}">
                </div>
                <div class="form-group">
                    <label for="parent">دسته بندی مادر</label>
                    <select name="parent" id="parent" class="form-control">
                        @foreach($categories as $parent)
                            <option value="{{$parent->id}}"  {{$category->parent == $parent->id ? 'selected' :''}} >{{$parent->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">تگ ها</label>

                    <div class="form-group">
                        <input type="text" id="temp" class="form-control">
                        <button type="button" onclick="addoption()" class="btn btn-outline-primary form-control">افزودن گزینه</button>
                    </div>
                    <textarea name="tags" id="tags" cols="30" rows="10" class="form-control">{{$category->tags}}</textarea>
                </div>

                <input type="submit" class="btn btn-md btn-outline-success" value="ذخیره">
            </form>
        </div>
    </div>

    <script>
        function addoption(){
            var input = document.getElementById('temp').value
            var options = document.getElementById('tags')
            if (options.value===''){
                document.getElementById('tags').value = input
            }else{
                document.getElementById('tags').value=document.getElementById('tags').value+'@'+input
            }
        }
    </script>
@endsection
