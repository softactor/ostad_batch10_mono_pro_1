<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <table>
        <thead>
            <tr>
                <th>sl</th>
                <th>name</th>
                <th>email</th>
            </tr>
        </thead>

        <tbody>

            @foreach()

            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>

            @endforeach
        </tbody>

    </table>


</body>
</html>