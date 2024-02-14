
<x-mail::message>
<h2>Contact Details</h2>
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Phone Number:</strong> {{ $contact->phoneno }}</p>
    <p><strong>Address:</strong> {{ $contact->address }}</p>
    <p><strong>Your Comments:</strong> {{ $contact->yourcomments }}</p>

{{--# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>--}}

Thanks,<br>
{{ env('app.name') }}
</x-mail::message>
