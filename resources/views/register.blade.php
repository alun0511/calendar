@include('errors')
<form method="POST" action="/register/attempt">
    @csrf
    <div>
        <label for="username">Enter a username:</label>
        <input type="text" name="username">
    </div>
    <div>
        <label for="email">Enter your email:</label>
        <input type="text" name="email">
    </div>
    <div>
        <label for="password">Enter password</label>
        <input type="password" name="password">
    </div>
    <button type="submit">Register</button>
    <button><a href="/">Back</a></button>
</form>