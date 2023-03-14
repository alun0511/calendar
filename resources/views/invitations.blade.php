<link rel="stylesheet" href="{{ asset('./css/invite.css') }}">
<section class="invitations">
<?php

/*
Get all invitations sent to this user
*/
$received = $user->receivedInvitations->all();
/*

 */
// $invitation = $events->where('id', $received->user_id)->all();
// $events->where('id', $invite->event_id)->value('id');

$notUpdated = [];

?>

{{-- passes the invite to an array if it hasn't been updated --}}
@foreach ($received as $invite)

@if ($invite->updated === 0)

<?php $notUpdated[] = $invite ?>

@endif
@endforeach

{{-- Informs the user if there are no invitations that hasn't been updated, or no invitations has been sent --}}
@if (empty($notUpdated))

<p>You have no invitations.</p>

@else
{{-- Loops through the not updated invitations and prints them as cards --}}
@foreach ($notUpdated as $invite)
{{-- Loops through each  event where the id matches the invitation.event_id in order to access data from each event --}}
@foreach ($events->where('id', $invite->event_id) as $event)
<div class="invitation-card">
    <p>
        From: {{$event->creator->name}}
    </p>
    <p>
        creator id: {{$event->creator->id}}
    </p>
    <p>
        event id: {{$event->id}}
    </p>
    <form method="post" action="/invitation/<?=$invite->id?>" class="invitation-form">
        @method('patch')
        <input name="accept" type="submit"  value="Accept" />
        <input name="decline" type="submit"  value="Decline" />
            @csrf
    </form>
</div>
</section>
@endforeach
@endforeach
@endif


<script type="text/javascript" src="{{ URL::asset('./js/invite.js') }}"></script>
