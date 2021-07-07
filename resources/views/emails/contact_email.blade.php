<h2>Hello Admin,</h2>
<br>
@if (empty($company))
...
@else
<h2>buisness :<strong style="color: brown"><em>{{$company}}</em></strong></h2>
@endif

<br>
You received an email from : {{ $name }}
<br>
Here are the details:
<br>
<b>Name:</b> {{ $name }}
<br>
<b>Email:</b> {{ $email }}
<br>
<b>Phone Number:</b> {{ $phone_number }}
<br>
<b>Message:</b> {{ $user_message }}
<br>
Thank You