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
                        <p class="my-profile-padding-15 lead"><span style="background-color:#fff;color:#000">30 Followers</span>
                            <br />
                            <span style="background-color:#fff;color:#000">25 <img src="/images/icons/banana.svg" class="index-post-footer-icon rounded m-2"
                                alt="banana icon">
                            25
                            <img src="/images/icons/peach.svg" class="index-post-footer-icon rounded m-2"
                                alt="peach icon">
                            </span>
                        </p>
                        <p class="my-profile-padding-15 text-end">
                            @if ($UserInfo->url_twitter)
                                <a target="_blank" href="{{ $UserInfo->url_twitter }}">
                                    <img src="/images/twitter.svg" class="my-social-icon" alt="twitter" />
                                </a>
                            @endif

                            @if ($UserInfo->url_instagram)
                                <a target="_blank" href="{{ $UserInfo->url_instagram }}">
                                    <img src="/images/instagram.svg" class="my-social-icon" alt="instagram" />
                                </a>
                            @endif

                            @if ($UserInfo->url_onlyfans)
                                <a target="_blank" href="{{ $UserInfo->url_onlyfans }}">
                                    <img src="/images/onlyfans.png" class="my-social-icon" alt="instagram" />
                                </a>
                            @endif

                        </p>
                    </div>


                @else

                    <div class="user-banner my-social-icon-box" style=" background-image: url('/banner.png');">
                        <p class="my-profile-padding-15 lead">30 Followers
                            <br />
                            25 <img src="/images/icons/banana.svg" class="index-post-footer-icon rounded m-2"
                                alt="banana icon">
                            25
                            <img src="/images/icons/peach.svg" class="index-post-footer-icon rounded m-2"
                                alt="peach icon">
                        </p>
                        <p class="my-profile-padding-15 text-end">
                            @if ($UserInfo->url_twitter)
                                <a target="_blank" href="{{ $UserInfo->url_twitter }}">
                                    <img src="/images/twitter.svg" class="my-social-icon" alt="twitter" />
                                </a>
                            @endif

                            @if ($UserInfo->url_instagram)
                                <a target="_blank" href="{{ $UserInfo->url_instagram }}">
                                    <img src="/images/instagram.svg" class="my-social-icon" alt="instagram" />
                                </a>
                            @endif

                            @if ($UserInfo->url_onlyfans)
                                <a target="_blank" href="{{ $UserInfo->url_onlyfans }}">
                                    <img src="/images/onlyfans.png" class="my-social-icon" alt="instagram" />
                                </a>
                            @endif

                        </p>
                    </div>

                @endif

                @if ($UserInfo->url_profile)

                    <img src="{{ $UserInfo->url_profile }}" class="img-thumbnail user-image" alt="user-icon">

                @else

                    <img src="/user.svg" class="img-thumbnail user-image" alt="user-icon">

                @endif

                @if ($UserInfo->full_name)
                    <h4>{{ $UserInfo->full_name }}</h4>
                @endif
                <p>Online &sdot;
                    @if (!count($isFollowedByMe))
                        <a href="/user/follow/{{ $UserInfo->username }}">Follow: @ {{ $UserInfo->username }}</a>
                    @else
                        <a href="/user/unfollow/{{ $UserInfo->username }}">Unfollow @ {{ $UserInfo->username }}</a>
                    @endif
                </p>
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
                            @if ($UserInfo->url_website)
                                <li>
                                    Website:
                                    <a target="_blank" href="//{{ $UserInfo->url_website }}">
                                        {{ $UserInfo->url_website }}
                                    </a>
                                </li>
                            @endif

                            @if ($UserInfo->category)
                                <li>
                                    Category: {{ $UserInfo->category }}
                                </li>
                            @endif

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

                <h5>Subscription R{{ $UserInfo->subscription_fee }} per month</h5>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button">Subscribe for
                        R{{ $UserInfo->subscription_fee }}</button>
                </div>

                <p class="text-center">Posts</p>

                <div class="row">

                    <div class="row">

                        @for ($index = 0; $index < count($UserPosts); $index++)
                            <div class="col-sm-4"
                                onclick="window.location.assign('/post/{{ $UserInfo->username }}/id/{{ $UserPosts[$index]->Id }}')">
                                <img src="{{ $UserPosts[$index]->path }}" class="img-thumbnail user-posts"
                                    alt="user-posts">
                            </div>
                        @endfor
                    </div>


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
