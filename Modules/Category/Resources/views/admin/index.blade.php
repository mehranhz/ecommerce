@extends('admin.panel')
@section('page')
    <div class="container control-container">
        <a href="{{route('admin.categories.create')}}" class="btn btn-md btn-outline-info">ایجاد دسته بندی جدید</a>
    </div>
    <section>
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>عنوان</th>
                    <th>سریال</th>
                    <th>کنترل</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{$category->id}}
                        </td>
                        <td>
                            <a href="{{route('admin.categories.show',['category'=>$category->id])}}">{{$category->title}}</a>
                        </td>
                        <td>
                            {{$category->serial}}
                        </td>

                        <td>
                            <div class="btn-group " style="direction: ltr">
                                <a href="{{route('admin.categories.edit',['category'=>$category->id])}}" class="btn btn-sm btn-warning">ویرایش</a>
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
                                                <form action="{{route('admin.categories.destroy',['category'=>$category->id])}}" method="post">
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
            {{$categories->links()}}
        </div>
    </section>
@endsection
