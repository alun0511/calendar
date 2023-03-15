<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('./css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/error.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/displayBlocks.css') }}">
    <title>dashboard</title>
</head>
<body>

    <header>
        <button><a href="/createEvents">Create event</a></button>
        <h1>Calendar</h1>

        <button><a href="/logout">Logout</a></button>


    </header>

    <main class="dashboard-main">
    <section class="invitations">
        @include('invitations')
    </section>
    <section class="user-posts">
        <h2>Your events:</h2>
        <div class="posts-container">

            {{--
                - Loops through each invite received by the user that is logged in
                - Checks if it has been accepted and prints the event that is correlated to the event_ids of $receivedEvent
            --}}

            @foreach($user->receivedInvitations as $receivedInvitation)
            @if ($receivedInvitation->accepted === 1)
            <?php
                $recievedEvent = $events->where('id', $receivedInvitation->event_id)->first();
            ?>
            <section class="post-container">

                <section class="post-info-section">
                    <div class="post-info">
                        <h2>{{$recievedEvent->title}}</h2>
                        <div>
                            <i>Created by: {{$recievedEvent->creator->name}}</i>
                            <p>Location: {{$recievedEvent->location->name}}</p>
                        </div>
                    </div>

                    <div class="post-dates">
                        <ul>
                            <li>From: {{$recievedEvent->start_date}}</li>
                            <li>To: {{$recievedEvent->end_date}}</li>
                        </ul>
                    </div>
                </section>

                <section class="participants-list">
                    <h3>Invited users</h3>
                    <ul>
                    {{--
                        - loops through the invites and checks wether they've been accepted or not and styles them accordingly.
                     --}}
                        @foreach ($recievedEvent->invitations as $invite)
                        <?php if($invite->accepted):?>
                            <li class="invite-accepted">{{DB::table('users')->where('id', $invite->user_id)->value('name')}}</li>
                        <?php endif?>

                        <?php if(!$invite->accepted && $invite->updated):?>
                            <li class="invite-declined">{{DB::table('users')->where('id', $invite->user_id)->value('name')}}</li>
                        <?php endif?>

                        <?php if(!$invite->accepted && !$invite->updated):?>
                            <li class="invite-pending">{{DB::table('users')->where('id', $invite->user_id)->value('name')}}</li>

                        <?php endif?>
                        @endforeach
                    </ul>
                </section>
            </section>
            @endif
            @endforeach

            @foreach($user->events as $event)
            @foreach ($event->invitations as $invite)

            {{--
                loops through each invitation connected to the events

             --}}

            @if ($invite->accepted === 1)

            {{--
                Displays accepted invites:
                If the invite has been accepted
                and isn't created by the logged in user
            --}}

            <section class="post-container">

                <section class="post-info-section">
                    <div class="post-info">
                        <h2>{{$event->title}}</h2>
                        <div>
                            <i>Created by: {{$event->creator->name}}</i>
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
                        @foreach ($event->invitations as $invite)
                        <?php if($invite->accepted):?>
                            <li class="invite-accepted">{{DB::table('users')->where('id', $invite->user_id)->value('name')}}</li>
                        <?php endif?>

                        <?php if(!$invite->accepted && $invite->updated):?>
                            <li class="invite-declined">{{DB::table('users')->where('id', $invite->user_id)->value('name')}}</li>
                        <?php endif?>

                        <?php if(!$invite->accepted && !$invite->updated):?>
                            <li class="invite-pending">{{DB::table('users')->where('id', $invite->user_id)->value('name')}}</li>

                        <?php endif?>
                        @endforeach
                    </ul>
                </section>
            </section>

            @endif
            @endforeach

            @endforeach
        </div>
    </section>
    </main>
</body>
</html>
