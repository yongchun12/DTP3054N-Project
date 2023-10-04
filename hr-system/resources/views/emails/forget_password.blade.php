<!--Template of Forget Password Email-->
Hello {{ $user->name }},

<br>

Your New Password: - <b>{{ $user->random_pass }}</b>

<br>

Thank You, <br>

{{ config('app.name') }}
