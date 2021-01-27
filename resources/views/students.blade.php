<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>name</th>
            <th>lastname</th>
            <th>address</th>
            <th>classroom</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->lastname}}</td>
            <td>{{$student->address}}</td>
            <td>{{$student->classroom->room_name}}</td>
        </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
