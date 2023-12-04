<x-mail::message>
# WELCOME

The body of your message.

<x-mail::button :url="route('one')">
Button Text
</x-mail::button>
<x-mail::table>
    
</x-mail::table>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
