<link rel="stylesheet" href="{{ asset('./css/style.css') }}">
<link rel="stylesheet" href="{{ asset('./css/dashboard.css') }}">
@include('errors')
<html>
    <body>
    <main class="dashboard-main">

        <header>

        <h1>Calendar</h1>
        <p>{{ $user->name }}</p>
        </header>
        <section>
            <form method="post" action="/events">
                <div>
                    <label for="title">Title of event</label>
                    <input name="title" type="text" />
                    <label for="start_date">Start date</label>
                    <input name="start_date"type="date">
                    <label for="end_date">Start date</label>
                    <input name="end_date"type="date">
                    <label for="location">Location</label>
                        <select name="location">
                            <option value="">--Please choose a location--
                            @foreach($locations as $location)
                             <option value={{ $location->id}}>{{ $location->name}}</option>
                            @endforeach
                        </select>
                </div>
                <button type="submit">Add</button>
                @csrf
            </form>
        </section>

    <ul>
        @foreach ($user->events as $event)
        <li>
            <div>
                <p>
                    <br>
                    <b>{{ $event->title }}</b>
                    <br>
                    From: {{ $event->start_date}}
                    <br>
                    To: {{ $event->end_date}}
                    <br>
                    Location: {{ $event->location->name}}
                </p>
            </div>
        </li>
        @endforeach
    </ul>
    <form method="get" action="/logout">
        <button type="submit">Logout</button>
        @csrf
    </form>
</main>

    </body>
</html>
