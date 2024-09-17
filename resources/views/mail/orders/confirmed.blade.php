<x-mail::message>
# Order Confirmation

We have received your order #{{$order_code}} and payment has been processed.

<x-mail::button :url="$url">
View Order
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
