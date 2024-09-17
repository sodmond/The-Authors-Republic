<x-mail::message>
# Account Approval Update

@if ($status == 1)
Your author profile has been approved, you can now upload books for sale.
@else
Your author profile is either incomplete or inaccurate and has been declined.

Please update your profile properly with accurate data and request for approval again.
@endif


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
