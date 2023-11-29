<!--Template of Forget Password Email-->
Hello {{ $user->name }},

<br>
<br>

Your Email ID: <b>{{ $user->email }}</b>

<br><br>

Your Password: <b>{{ $user->password_beforeHash }}</b>

<br><br>

Thank You, <br>

DTP3054N HR System
<!--{{ config('app.name') }}-->
