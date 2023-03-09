@include('errors')

<html>
    <body>

        <h1>Calendar</h1>
        <p>{{ $user->name }}</p>

    <form method="post" action="/events">
        <div>
            <label for="title">Title of event</label>
            <input name="title" type="text" />
            <label for="start_date">Start date</label>
            <input name="start_date"type="date">
            <label for="end_date">Start date</label>
            <input name="end_date"type="date">
            <label for="location_id">Location Test</label>
            <input name="location_id"type="text">
        </div>
        <button type="submit">Add</button>
        @csrf
    </form>
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
                </p>
            </div>
        </li>
        @endforeach
    </ul>
    <form method="get" action="/logout">
        <button type="submit">Logout</button>
        @csrf
    </form>

    </body>
</html>
