<h1>Hi you</h1>
<p>Token : {{ csrf_token() }}</p>
{{-- comment trong template laravel --}}
{{-- <//?php echo ?> --}}
<form method="post" action="{{ route('demo') }}">
    @csrf
    {{-- tu dong render ma token trong the input type hidden --}}
    <label>email</label>
    <input type="email" name="email"/>
</form>