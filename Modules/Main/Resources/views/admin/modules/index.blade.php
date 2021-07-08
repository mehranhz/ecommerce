@extends('admin.panel')
@section('page')
    @foreach($modules as $module)
        <span>{{$module->getName( )}}</span>
    @endforeach
@endsection
