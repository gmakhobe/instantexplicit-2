<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/favicon.png" />
    <title>Explore - Instant Explicit</title>

    <!-- Start: CSS CDN Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- End: CSS CDN Bootstrap 5 -->

    <!-- Start: CSS Style-->
    <link href="/css/style.css" rel="stylesheet">
    <!-- End: CSS Style-->

    <!-- Start: JS Script-->
    <script src="/js/w3.js"></script>
    <!-- End: JS Script-->

</head>

<body>

    <!-- Start: Include Navbar-->
    @include('user/layout/navbar')
    <!-- End: Include Navbar-->

    <div class="container margin-top">

        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">

                @if (!$IsSearch)

                    <div class="row">
                        @for ($index = 0; $index < count($Users); $index++)
                            <div class="col-sm-4">
                                <div onclick="window.location.assign('/user/{{ $Users[$index]->username }}');"
                                    class="card m-4">
                                    <img src="{{ $Users[$index]->url_profile ? $Users[$index]->url_profile : '/user.svg' }}"
                                        class="card-img-top" alt="user icon">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $Users[$index]->username }}</h5>
                                        <p class="card-text">{{ $Users[$index]->full_name }}</p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>

                @else

                    <div class="row">
                        @for ($index = 0; $index < count($SearchedUsers); $index++)
                            <div class="col-sm-4">
                                <div onclick="window.location.assign('/user/{{ $SearchedUsers[$index]->username }}');"
                                    class="card m-4">
                                    <img src="{{ $SearchedUsers[$index]->url_profile ? $SearchedUsers[$index]->url_profile : '/user.svg' }}"
                                        class="card-img-top" alt="user icon">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $SearchedUsers[$index]->username }}</h5>
                                        <p class="card-text">{{ $SearchedUsers[$index]->full_name }}</p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>

                @endif

            </div>

        </div>
    </div>

    </div>
    <div class="col-sm-2"></div>
    </div>

    </div>

    <!-- Start: File Scripts-->
    <script>

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
