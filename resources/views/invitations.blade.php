<link rel="stylesheet" href="{{ asset('./css/invite.css') }}">

<?php

/* Get all invitations sent to this user */
$received = $user->receivedInvitations->all();

$notUpdated = [];

?>

{{-- passes the invite to an array if it hasn't been updated --}}
@foreach ($received as $invite)

@if (!$invite->updated)
<?php $notUpdated[] = $invite ?>

@endif
@endforeach
<section class="invitations">
{{-- Informs the user if there are no invitations that hasn't been updated, or no invitations has been sent --}}
@if (empty($notUpdated))

<p>You have no invitations.</p>

@else
<p>You have {{count($notUpdated)}} new invitation{{ count($notUpdated) > 1 ? "s" : "" }}!</p>
{{-- Loops through the not updated invitations and prints them as cards --}}
@foreach ($notUpdated as $invite)
{{-- Loops through each  event where the id matches the invitation.event_id in order to access data from each event --}}
@foreach ($events->where('id', $invite->event_id) as $event)
<div class="invitation-card">
    <p>
        From: {{$event->creator->name}}
    </p>
    <p>
        Title: {{$event->title}}
    </p>
    <p>
        Starts: {{$event->start_date}} <br> Ends: {{$event->end_date}}
    </p>
{{-- The form patches the id of the invite as a slug --}}
    <form method="post" action="/invitation/<?=$invite->id?>" class="invitation-form">
        @method('patch')
        <input class="invite-btn decline" name="decline" type="submit"  value="Decline" />
        <input class="invite-btn accept" name="accept" type="submit"  value="Accept" />
            @csrf
    </form>
</div>
@endforeach
@endforeach
@endif
</section>

