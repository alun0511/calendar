<?php
    use App\Models\Event;
    use App\Models\Invitation;
    use App\Models\Location;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
    use Illuminate\Support\Facades\DB;
    $user = Auth::user();
    $users = User::All();
    $events = Event::all();
    $locations = Location::all();
    $invitations = Invitation::all();
?>
<link rel="stylesheet" href="{{ asset('./css/style.css') }}">
<link rel="stylesheet" href="{{ asset('./css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('./css/createEvents.css') }}">
<link rel="stylesheet" href="{{ asset('./css/displayBlocks.css') }}">
@include('errors')
<html>
    <body>
        <header>
                <button>
                    <a href="/dashboard">
                        Back
                    </a>
                </button>
            <h1>Create a calendar event</h1>
            <button>
                <a href="/logout">Logout</a>
            </button>
        </header>
    <main class="create-events-main">
        <section class="create-events-container">
            <form method="post" action="/events" class="create-events-form">
                <div>
                    <label for="title">Title of event</label>
                    <input name="title" type="text" />
                </div>
                <div>
                    <label for="start_date">Start date</label>
                    <input name="start_date"type="date">
                </div>
                <div>
                    <label for="end_date">End date</label>
                    <input name="end_date"type="date">
                </div>
                <div>
                    <label for="location">Location</label>
                        <select name="location">
                            <option value="">--Please choose a location--
                            @foreach($locations as $location)
                             <option value={{ $location->id}}>{{ $location->name}}</option>
                            @endforeach
                        </select>
                </div>
                <section class="participant-section">

                        <label for="numberOfparticipants">Enter number of participants</label>
                        <select name="numberOfParticipants" class="numberOfParticipants-selection">
                            <?php for ($i=0; $i <= 4; $i++):?>
                                <option value=<?=$i?>><?=$i?></option>
                            <?php endfor?>
                        </select>

                        <div class="participants-container"></div>
                </section>
                <button type="submit">Add</button>
                @csrf
            </form>
        </section>
</section>
<section class="user-posts">
        <h2>Your posts</h2>
        <div class="posts-container">
            @foreach($user->events as $event)
            <section class="post-container">

                <section class="post-info-section">
                    <div class="post-info">
                        <h2>{{$event->title}}</h2>
                        <div>
                            <i>Created by: {{$event->creator->name}}
                            <p>Location: {{$event->location->name}}</p>
                        </div>
                    </div>

                    <div class="post-dates">
                        <ul>
                            <li>From: {{$event->start_date}}</li>
                            <li>To: {{$event->end_date}}</li>
                        </ul>
                    </div>
                </section>

                <section class="participants-list">
                    <h3>Invited users</h3>
                    <ul>
                        @foreach ($event->invitedUsers as $invited)
                        <li>{{$invited->name}}</li>
                        @endforeach
                    </ul>
                </section>
            </section>

            @endforeach
        </div>
</section>
</main>

    </body>
</html>
<script type="text/javascript" src="{{ URL::asset('./js/createEvents.js') }}"></script>
