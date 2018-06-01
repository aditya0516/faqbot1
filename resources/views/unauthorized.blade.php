        <!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.head')
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            You cannot access this page! This is for only '{{$role}}'"
        </div>
    </div>
</div>

<br/>
<br/>
@include('includes.footer')



</body>
</html>
