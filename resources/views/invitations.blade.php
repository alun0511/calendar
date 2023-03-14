<link rel="stylesheet" href="{{ asset('./css/invite.css') }}">

<?php

$received = $user->receivedInvitations->all();


$unaccepted = [];
$accepted = [];

?>

@foreach ($received as $invite)

@if ($invite->updated === 0)

<?php $unaccepted[] = $invite ?>

@else

<?php $accepted[] = $invite ?>

@endif

@endforeach

@if ($unaccepted)

<?php
$last = $unaccepted[0]->all()->last();
$invitation = $events->where('id', $last->user_id)->last();
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

            <form method="post" action="/event" class="invitation-form">
                <input name="accept" type="submit"  value="Accept" />
                <input name="decline" type="submit"  value="Decline" />
                    @csrf
            </form>
        </p>
    </section>
@endif
<script type="text/javascript" src="{{ URL::asset('./js/invite.js') }}"></script>

@foreach ($accepted as $item)

{{$item}}
@endforeach
