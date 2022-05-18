<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add user</title>
</head>
<body>
    <form method="post" action="{{ route('eloquent.add.user') }}">
        @csrf
        <label>username</label>
        <input type="text" name="username" />
        <br/>
        <label>password</label>
        <input type="password" name="password" />
        <br/>
        <label>Email</label>
        <input type="email" name="email" />
        <br/>
        <label>phone</label>
        <input type="text" name="phone" />
        <br/>
        <label>fullname</label>
        <input type="text" name="fullname" />
        <br/>
        <label>address</label>
        <input type="text" name="address" />
        <br/>
        <label>birthday</label>
        <input type="date" name="birthday" />
        <br/>
        <br/>
        <button type="submit" name="btnAdd"> Submit</button>
    </form>
</body>
</html>