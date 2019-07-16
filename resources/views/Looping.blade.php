<html>

<head>

</head>

<body>

Looping Number - {{$LoopingTime}}

<form action="{{route('LetsLoop')}}" name="LetsLoopForm" id="LetsLoopForm" method="POST">

    @for($aa=1; $aa <= $LoopingTime; $aa++)
        <br> {{$aa}}
        Number : <input type="text" name="num" id="num">
    @endfor

    {{ csrf_field() }}
    <input type="submit" value="Submit" name="submit">

</form>

</body>
</html>