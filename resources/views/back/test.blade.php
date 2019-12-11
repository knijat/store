<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <input type="file" name="image"><br><br>
    <input type="submit" name="submit" value="Submit">


</form><br><br>


{{$data}}

<a href="/changelang/az"><button>Aze</button></a><br><br>
<a href="/changelang/en"><button>Eng</button></a><br><br>

    </body>
</html>