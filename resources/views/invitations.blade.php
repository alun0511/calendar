{{-- <link rel="stylesheet" href="{{ asset('./css/style.css') }}">
<html>
    <body>
    <main class="dashboard-main">

        <header>
            <p>{{$user->name}}'s invitations</p>

        </header>
        <section>
            <ul>
            @foreach ($user->receivedInvitations as $received)
            {{$received}}
            {{$received->event_id}}

            @endforeach

            </ul>
        </section>

    </main>

    </body>
</html> --}}
<link rel="stylesheet" href="{{ asset('./css/invite.css') }}">

<?php

$received = $user->receivedInvitations->all();


$unaccepted = [];
$accepted = [];

// $unaccepted = $received->where('updated', 0);

?>

{{-- user->receivedInvitations->first()->updated !== 1 --}}

@foreach ($received as $invite)

@if ($invite->updated === 0)

<?php $unaccepted[] = $invite ?>

@else

<?php $accepted[] = $invite ?>

@endif

@endforeach

@if ($unaccepted)

<?php
$first = $unaccepted[0]->first();
$invitation = $events->where('id', $first->user_id)->first();
?>

    <section class="invite">
        <p>Hello <b>{{$user->name}}</b></p>
        <p>
            You have a new invite from {{$invitation->creator->name}}
            <br>
            Title: {{$invitation->title}}
            <br>
            Start: {{$invitation->start_date}}
            <br>
            End: {{$invitation->end_date}}
            <br>

            <form method="post" action="/events" class="create-events-form">

        </p>
    </section>
@endif
<script type="text/javascript" src="{{ URL::asset('./js/invite.js') }}"></script>

@foreach ($accepted as $item)

{{$item}}
@endforeach
