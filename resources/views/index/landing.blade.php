<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/favicon.png" />
    <title>Instant Explicit</title>

    <!-- Start: CSS CDN Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- End: CSS CDN Bootstrap 5 -->

    <!-- Start: CSS Style-->
    <link href="/css/style.css" rel="stylesheet">
    <!-- End: CSS Style-->

    <!-- Start: JS Script-->
    <script src="/js/w3.js"></script>
    <script src="/js/index.js"></script>
    <!-- End: JS Script-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img class="index-device rounded mx-auto d-block" src="/images/index-phone.png" alt="Device Image" />
            </div>
            <div class="col-sm-6">
                <div class="mx-auto">
                    <img class="index-logo rounded mx-auto d-block" src="/images/logo.png" alt="Device Image" />
                    <div id="access-control">
                        <div class="access-control" id="log-container">
                            <input type="email" class="form-control index-form-control mt-5" id="log-email"
                                placeholder="Email Address">

                            <input type="password" class="form-control index-form-control mt-3" id="log-password"
                                placeholder="Password">

                            <p class="m-3 text-center pointer" onclick="fogortPassword()">Forgot Password?</p>

                            <button id="log-btn" type="button" onclick="AppLogin()" class="btn btn-primary mt-3 index-form-control mx-auto d-block">Log
                                In</button>

                            <p class="text-center m-5">OR</p>

                            <p class="text-center m-2">Don't have an account? <br />
                                <button type="button" onclick="myShow.next()" class="btn btn-link m-2">Sign Up</button>
                            </p>

                        </div>

                        <div class="access-control" id="reg-container">

                            <input type="email" class="form-control index-form-control mt-5" id="reg-email"
                                placeholder="Email Address">

                            <input type="text" class="form-control index-form-control mt-3" id="reg-fullname"
                                placeholder="Full Name">

                            <input type="text" class="form-control index-form-control mt-3" id="reg-username"
                                placeholder="Username">

                            <input type="password" class="form-control index-form-control mt-3" id="reg-password"
                                placeholder="Password">

                            <button onclick="AppRegister()" id="reg-btn" type="button" class="btn btn-primary mt-3 index-form-control mx-auto d-block">Sign
                                Up</button>

                            <p class="text-center m-5">OR</p>

                           <p class="text-center m-2">Already have an account? <br />
                                <button type="button" onclick="myShow.previous()" class="btn btn-link m-2">Log
                                    In</button>

                            </p>

                        </div>
                    </div>
                    <div id="forgot-password">

                        <p class="text-center m-4">Enter your email address below to send forgot password link to your
                            email address.</p>

                        <input type="email" class="form-control index-form-control mt-5" id="fog-email"
                            placeholder="Email Address">

                        <button type="button" class="btn btn-primary mt-3 index-form-control mx-auto d-block">Send link</button>

                        <p class="text-center m-5">OR</p>

                        <p class="text-center m-2">Have your password? <br />
                            <button type="button" onclick="accessControl()" class="btn btn-link m-2">Log
                                In</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start: File Scripts-->
    <script>
        myShow = w3.slideshow(".access-control", 0);

        function accessControl(){
            document.getElementById("access-control").style.display = "block";
            document.getElementById("forgot-password").style.display = "none";
        }

        function fogortPassword(){
            document.getElementById("access-control").style.display = "none";
            document.getElementById("forgot-password").style.display = "block";
        }
    </script>
    <!-- End: File Scripts-->

    <!-- Start: JS CDN Bootstrap 5 -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>
    <!-- End : JS CDN Bootstrap 5 -->

</body>

</html>
