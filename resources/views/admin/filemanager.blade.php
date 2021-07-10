
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body >
<div class="alert alert-info" style="text-align: right;">
    <a href="{{route('admin.panel')}}" class="btn btn-md btn-outline-info">بازگشت به پنل ادمین</a>
</div>
<div style="height: 600px;">
    <div  id="fm"></div>
</div>
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

</body>
</html>


