<link rel="stylesheet" href="{{ asset('./css/login.css') }}">
<link rel="stylesheet" href="{{ asset('./css/style.css') }}">
@include('errors')
<body>
<main class="login-main">
    <section class="account-form">
        <form method="POST" action="/login" class="">
            <div>
                <label for="email">Enter email:</label>
                <br>
                <input type="text" name="email">
            </div>
            <div>
                <label for="password">Enter password:</label>
                <br>
                <input type="password" name="password">
            </div>
            <button type="submit">Login</button>
            @csrf
        </form>
        <div>
            <h2>Dont have an account? create one!</h2>
            <button><a href="/register">Register</a></button>
        </div>
    </section>
</main>
</body>