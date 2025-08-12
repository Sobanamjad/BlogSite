<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>All Users</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h1>All Users</h1>
                <table class="table table-bordered table-striped">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Email Verified</th>
                    <th>Password</th>
                    <th>Age</th>
                    <th>gender</th>
                    <th>Country ID</th>
                    <th>Role ID</th>
                    <th>View</th>
                    <th>Delete</th>
                    @foreach ($data as $id => $user)
                    <tr>
                        <td>{{ $user ->id }}</td>
                        <td>{{ $user ->name }}</td>
                        <td>{{ $user ->email }}</td>
                        <td>{{ $user ->email_verified_at }}</td>
                        <td>{{ $user ->password }}</td>
                        <td>{{ $user ->age }}</td>
                        <td>{{ $user ->gender }}</td>
                        <td>{{ $user ->country_id }}</td>
                        <td>{{ $user ->role_id }}</td>
                        <td><a href="{{ route('view.user',$user->id) }}" class="btn btn-primary btn-sm">View</a></td>
                        <td><a href="{{ route('delete.user',$user->id) }}" class="btn btn-danger btn-sm">Delete</a></td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</body>
</html>