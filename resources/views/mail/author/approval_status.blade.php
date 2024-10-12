<x-mail::message>
# Account Approval Update

@if ($status == 1)
Congratulations! Your author profile has been approved, and you can now enjoy a range of benefits. Upload your books for sale, start a podcast, share new book alerts, promote your book events, and engage in other literary activities to enrich the community.
@else
Your author profile is either incomplete or inaccurate and has been declined.

Please update your profile properly with accurate data and request for approval again.
@endif


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
