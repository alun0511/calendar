<link rel="stylesheet" href="{{ asset('./css/style.css') }}">
@include('errors')
<html>
    <body>
    <main class="dashboard-main">

        <header>
        <h1>Your invitations</h1>
        <p>{{ $user->name }}</p>
        </header>
        <section>
            <p>{{ $receivedEvents }}</p>
            <ul>
                {{-- @foreach ($user-> as $)
                <li>
                    <div>
                        <p>
                            <br>
                            <b>{{ }}</b>
                            <br>
                        </p>
                    </div>
                </li>
                @endforeach --}}
            </ul>
        </section>
    <form method="get" action="/logout">
        <button type="submit">Logout</button>
        @csrf
    </form>
</main>

    </body>
</html>
