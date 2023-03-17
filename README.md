# Alabama Calendar #

### Made by [**Alfred Unenge**](https://github.com/alun0511) and [**Thomas Danielsson**](https://github.com/DanielssonThomas/) ###

## Instructions
1.  
        composer install  
2.  Remove ".example" from the .env.example file   
3.      php artisan migrate  
    
4.      php artisan key:generate  
5.      php artisan serve
6. To test this calendar you preferably need to create atleast two dummy accounts.  
You also need to add atleast one location.  
For example: 

        php artisan tinker
        App\Models\Location::create(['name' => '319']);

This is so that you can test inviting and accepting or declining invites to and from other users (or just invite yourself).

# Code review

Written by [Simon Lövbacka](https://github.com/lovbackan) & [Styrbjörn Nordberg](https://github.com/styrbjorn-n).


Functionality:
1: Instead of receiving an error when filling out the form for an event, you should set "required" on the forms. This ensures that what you have filled in is not reset every time you make a mistake :)

2: If you create an event and invite yourself, two events appear on the dashboard. We believe the first indicates that you created it, and the second indicates that you are attending it but this is not clear, it would be better to label the second one clearly as "participating". 

3: Currently, it's possible to invite the same person to an event multiple times. It would be better if you could only invite each user once to each event.

4: If you want to invite more than four people, it would be better to replace the option menu with an input field that creates as many participant dropdowns as the number entered, using JavaScript.

5: If there was more time, it would be good to implement the entire CRUD functionality, allowing you to update and delete events aswell.

6: It seems a little odd that we had to create locations ourselves through Tinker. It would be better if some locations were already in the database, or if we could create them ourselves without Tinker.

Controllers/Models:

7:

In CreateEventController, the following are not used:
use App\Models\Invite;
use App\Models\Participant;
use Illuminate\Support\Carbon;

In DashboardController, the following is not used:
use Illuminate\Support\Facades\DB;

In InvitationController, the following is not used:
use Illuminate\Http\Response;

In UpdateController, the following is not used:
use App\Models\Event;

In your Invitation model, the following is not used:
use Illuminate\Database\Eloquent\Relations\HasOne;

STRUCTURE:

8: There is a lot of code in your blade files, which makes them less readable. You could create partials where each section could be a separate partial. This would make it more readable and structured.

9: The disadvantage of not including the entire HTML boilerplate in blade views is that you can't name the document, so the browser tab only displays the URL name.

BLADE createEvents.blade.php:

10: In the "enter number of participants" dropdown on the Create Event page, you can't see what you can click on in dark mode until you hover over them as the numbers are white aswell as the background.

11: On your Create Event page, there are two <i> </i> tags when you inspect the page through a browser, one empty and one containing a JavaScript file. However, we can't find where these <i> tags are created or why they are needed.

12: Your JavaScript file is located after </html>, which is not good. You should either have it at the bottom of the body or in the header with defer.

13: These are located outside of <html> when they should be in <head>, and the same thing happens in other views:

<link rel="stylesheet" href="{{ asset('./css/style.css') }}">
<link rel="stylesheet" href="{{ asset('./css/dashboard.css') }}">
<link rel="stylesheet" href="{{ asset('./css/createEvents.css') }}">
<link rel="stylesheet" href="{{ asset('./css/displayBlocks.css') }}">
@include('errors')

14: You also link to:
<link rel="stylesheet" href="{{ asset('./css/dashboard.css') }}"> which is not needed for this view.

15: On lines 61-63, you use a PHP for loop, while in other places, you use blade functionality. It might be better to stick to blade.

BLADE dashboard.blade.php:

16: On lines 126-137, you also include PHP if statements instead of blade statements.

17: You don't seem to include errors here, so you don't need

<link rel="stylesheet" href="{{ asset('./css/error.css') }}">.

BLADE errors.blade.php:

18: We believe it may be an unnecessary risk to have <script type="text/javascript" src="{{ URL::asset('./js/error.js') }}"></script> in your blade file here as it can create problems depending on where you place @error in your views. The same logic can be applied to the stylesheet in error. @error should preferably be placed in the body so when you put it there, the stylesheet and script are also placed in the body, which can create problems.

CSS:

19: Something to consider, in your dashboard.css file there are only these lines of code: 
.dashboard-main {
display: flex;
justify-content: space-evenly;
align-items: flex-start;
}
If you only use this CSS on the dashboard, it might be better to have these as a standalone <style> </style> in your HTML document. Alternatively, the code can be placed in another CSS file as there is very little code to justify a separate CSS file. But this may not necessarily be a problem.

20: You use camelCase throughout the project, but in CSS you use kebab-case. It's probably better to be consistent here and use camelCase in CSS as well.


Great project with nice functionalities, we also appreciate the install guide <3 
