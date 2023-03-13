<link rel="stylesheet" href="{{ asset('./css/style.css') }}">
<html>
    <body>
    <main class="dashboard-main">

        <header>
            <p>Your invitations</p>

        </header>
        <section>
            <ul>
                @foreach ($user)
                <li>
                    <div>
                        <p>
                            <br>
                            <b>{{ }}</b>
                            <br>
                        </p>
                    </div>
                </li>
                @endforeach
            </ul>
        </section>
    <form method="get" action="/logout">
        <button type="submit">Logout</button>
        @csrf
    </form>
</main>

    </body>
</html>
