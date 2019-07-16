<html>

<head>

</head>

<body>

<form action="{{route('CountFromNumbers')}}" name="ForLoopForm" id="ForLoopForm" method="POST">

    Number : <input type="text" name="num" id="num">

    {{ csrf_field() }}
    <input type="submit" value="Submit" name="submit">

</form>

</body>
</html>