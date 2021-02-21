<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/favicon.png" />
    <title>Explore -Instant Explicit</title>

    <!-- Start: CSS CDN Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- End: CSS CDN Bootstrap 5 -->

    <!-- Start: CSS Style-->
    <link href="/css/style.css" rel="stylesheet">
    <!-- End: CSS Style-->
    <style>
        #view-biography-after {
            display: none;
        }
        .bg-white {
            background-color: #fff;
        }
    </style>
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

                <br /><br /><br /><br />

                @if ($UserInfo->url_banner)

                    <div class="user-banner my-social-icon-box" style=" background-image: url('{{ $UserInfo->url_banner }}');">

                @else

                    <div class="user-banner my-social-icon-box" style=" background-image: url('/banner.png');">

                @endif
                        <p class="my-profile-padding-15 lead"><span class="bg-white">{{ $NumberOfFollowing }} Following</span></p>

                    </div>


                @if ($UserInfo->url_profile)

                    <img src="{{ $UserInfo->url_profile }}" class="img-thumbnail user-image" alt="user-icon">

                @else

                    <img src="/user.svg" class="img-thumbnail user-image" alt="user-icon">

                @endif

                @if ($UserInfo->full_name)
                    <h4>{{ $UserInfo->full_name }}</h4>
                @endif
                <p>Online</p>
                @if ($UserInfo->full_name)
                    <p><a target="_blank" href="/user/{{ $UserInfo->username }}">@
                            {{ $UserInfo->username }}</a></p>
                @endif

                @if ($UserInfo->biography)
                    <p id="view-biography-initial">{{ substr($UserInfo->biography, 0, 80) }}... <span
                            onclick="ShowUserUrls()">More Info</span></p>
                    <div id="view-biography-after">
                        <p>{{ $UserInfo->biography }}</p>
                        <ul>
                            <li>
                                Registration Date: {{ $UserInfo->registration_date }}
                            </li>

                        </ul>
                    </div>
                    <br />

                    <script>
                        function ShowUserUrls() {
                            document.getElementById("view-biography-initial").style.display = "none";
                            document.getElementById("view-biography-after").style.display = "inline";
                        }

                    </script>
                @endif

                <h5 class="text-center">Content Creators Following</h5>
                
                <div class="row">

                    @for ($index = 0; $index < count($FollowingBase); $index++)
                        <div class="col-sm-4">
                            <div onclick="window.location.assign('/user/{{ $FollowingBase[$index]->username }}');"
                                class="card m-4">
                                <img src="{{ $FollowingBase[$index]->url_profile ? $FollowingBase[$index]->url_profile : '/user.svg' }}"
                                    class="card-img-top" alt="user icon">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $FollowingBase[$index]->username }}</h5>
                                    <p class="card-text">{{ $FollowingBase[$index]->full_name }}</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                    
                </div>

            </div>

        </div>

    </div>

    <!-- Start: File Scripts-->
    <script>

    </script>
    <!-- End: File Scripts-->

    <!-- Start: JS CDN Bootstrap 5 -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" <!DOCTYPE html>
        integrity = "sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
        crossorigin = "anonymous" >

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous">
    </script>
    <!-- End : JS CDN Bootstrap 5 -->

</body>

</html>
