<form method="post" action="{{ route('test.login.user') }}">
    @csrf
    <label>username</label>
    <input type="text" name="username"/>
    <br/>
    <label>password</label>
    <input type="password" name="password"/>
    <br/>
    <button type="submit" name="btnSubmit">Submit</button>
</form>