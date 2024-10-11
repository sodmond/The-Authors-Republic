<x-mail::message>
# Account Approval Update

@if ($status == 1)
Congratulations, your author's profile has been aporoved, you can now enjoy the benefits. Upload books for sale, start a podcast, new book alert, advertise your book events, and other literary related activities beneficial to the republic.
@else
Your author profile is either incomplete or inaccurate and has been declined.

Please update your profile properly with accurate data and request for approval again.
@endif


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
