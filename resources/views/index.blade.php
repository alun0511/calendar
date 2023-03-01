@include('errors')
<form method="POST" action="/login">
    <div>
        <label for="email">Enter username:</label>
        <input type="text" name="email">
    </div>
    <div>
        <label for="password">Enter password:</label>
        <input type="password" name="password">
    </div>
    <button type="submit">Login</button>
    @csrf
</form>