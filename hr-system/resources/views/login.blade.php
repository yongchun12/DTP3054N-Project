<!DOCTYPE html>
<html lang="en">

<!--Header-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Website Icon-->
    <link rel="icon" href="{{ asset('img/Project Logo.png/') }}">

    <!--Boostrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--Title-->
    <title>HR System | Login</title>
</head>

<!--Body-->
<body>

<section class="vh-100" style="background-color: whitesmoke;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">

            <!--Size of Center-->
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">

                        <!--Left Site-->
                        <div class="col-md-5 col-lg-5 d-md-block">
                            <img src="../img/pexels-mikhail-nilov-8297030.jpg"
                                 alt="Wallpaper" class="img-fluid" style="border-radius: 1rem 0 0 1rem;"/>
                        </div>

                        <!--Right Site-->
                        <div class="col-md-6 col-lg-7 d-flex">
                            <div class="card-body p-3 p-lg-5 text-black">

                                <!--Alert Message-->
                                @if(!empty(session('success')))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if(!empty(session('error')))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <!--Action in this form section-->
                                <form action="{{  url('login_post') }}" method="post">

                                    <!--Cross Site Request Forgery (CSRF) Protection-->
                                    {{ csrf_field() }}

                                        <div class="container text-center">
                                            <div class="row align-items-center">

                                                <!--Logo-->
                                                <div class="col-2 mb-4">
                                                    <img src="../img/Project%20Logo.png" alt="Logo" width="100" height="100">
                                                </div>

                                                <div class="col-8" style="margin-bottom: 14px; font-family: 'Avenir', Sans-Serif; ">
                                                    <h2>Potato HR System</h2>
                                                </div>

                                            </div>
                                        </div>


                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                        account</h5>

                                    <div class="form-outline mb-4">
                                        <label class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control form-control-lg"/>
                                    </div>

                                    <!--Error message (Email)-->
                                    <span style="color: red">{{ $errors->first('email') }}</span>

                                    <div class="form-outline mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control form-control-lg"/>
                                    </div>

                                    <!--Error message (Password)-->
                                    <span style="color: red">{{ $errors->first('password') }}</span>

                                    <!--Need to type:submit to submit this form to server-->
                                    <div class="pt-1 mb-3 d-grid">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                    </div>

                                </form>

                                <a class="small text-muted" href={{ url('forget_password') }}>Forgot password?</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>
