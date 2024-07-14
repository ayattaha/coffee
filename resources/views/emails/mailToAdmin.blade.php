@component('mail::message')
# New Contact Message

**Name:** {{ $data['name'] }}  
**Email:** {{ $data['email'] }}

**Message:**  
{{ $data['message'] }}

Thanks,<br>

@endcomponent
