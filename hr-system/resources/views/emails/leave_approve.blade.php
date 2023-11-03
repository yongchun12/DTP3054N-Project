<!--Template of Forget Password Email-->
Hello {{ $data->name }},

<br>
<br>

Your Leave Request created at {{ date('d F Y', strtotime($data->created_at)) }}:

<br><br>

From: <b>{{ date('d F Y', strtotime($data->from_leaveDate)) }}</b> <br>
To: <b>{{ date('d F Y', strtotime($data->to_leaveDate)) }}</b>

<br><br>

Have been Approved

<br><br>

Thank You, <br>

DTP3054N HR System
<!--{{ config('app.name') }}-->
