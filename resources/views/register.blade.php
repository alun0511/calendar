<link rel="stylesheet" href="{{ asset('./css/login.css') }}">
<link rel="stylesheet" href="{{ asset('./css/style.css') }}">
@include('errors')
<body>

<main class="login-main">
    <section class="account-form">
        <form method="POST" action="/register/attempt">
            @csrf
            <div>
                <label for="username">Enter a username:</label>
                <br>
                <input type="text" name="username" placeholder="username">
            </div>
            <div>
                <label for="email">Enter your email:</label>
                <br>
                <input type="text" name="email" placeholder="example@gmail.com">
            </div>
            <div>
                <label for="password">Enter password</label>
                <br>
                <input type="password" name="password" placeholder="password">
            </div>
            <button><a href="/">Back</a></button>
            <button type="submit">Register</button>
        </form>
    </section>
</main>
</body>