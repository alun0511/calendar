@include('errors')
<form method="POST" action="/login">
    <div>
        <label for="username">Enter username:</label>
        <input type="text" name="username">
    </div>
    <div>
        <label for="password">Enter password:</label>
        <input type="password" name="password">
    </div>
    <button type="submit">Login</button>
    @csrf
</form>