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

    <!-- Start: JS Script-->
    <script src="/js/w3.js"></script>
    <!-- End: JS Script-->
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="/favicon.png" />
        <title>{{ $Username }} -Instant Explicit</title>

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

        <style>
            #view-biography-after {
                display: none;
            }

        </style>
    </head>

<body>

    <!-- Start: Include Navbar-->
    @include('user/layout/navbar')
    <!-- End: Include Navbar-->

    <!-- End : JS CDN Bootstrap 5 -->
    <div class="container margin-top">
        @if ($IsCurrentUser)
            <ul class="nav nav-tabs nav-justified my-top-space" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Profile</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Profile Edit</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">

                            @if ($UserInfo->url_banner)

                                <div class="user-banner" style="background-image: {{ $UserInfo->url_banner }}"></div>

                            @else

                                <div class="user-banner my-social-icon-box"
                                    style=" background-image: url('/banner.png');">
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
                                                <img src="/images/instagram.svg" class="my-social-icon"
                                                    alt="instagram" />
                                            </a>
                                        @endif

                                        @if ($UserInfo->url_onlyfans)
                                            <a target="_blank" href="{{ $UserInfo->url_onlyfans }}">
                                                <img src="/images/onlyfans.png" class="my-social-icon"
                                                    alt="instagram" />
                                            </a>
                                        @endif

                                    </p>
                                </div>

                            @endif

                            @if ($UserInfo->url_profile)

                                <img src="{{ $UserInfo->url_profile }}" class="img-thumbnail user-image"
                                    alt="user-icon">

                            @else

                                <img src="/user.svg" class="img-thumbnail user-image" alt="user-icon">

                            @endif

                            @if ($UserInfo->fullName)
                                <h4>{{ $UserInfo->fullName }}</h4>
                            @endif
                            <p>Online</p>
                            @if ($UserInfo->fullName)
                                <p><a target="_blank" href="/user/{{ $UserInfo->username }}">@
                                        {{ $UserInfo->username }}</a></p>
                            @endif

                            @if ($UserInfo->biography)
                                <p id="view-biography-initial">{{ substr($UserInfo->biography, 0, 80) }}... <span
                                        onclick="ShowUserUrls()">More Info</span></p>
                                <div id="view-biography-after">
                                    <p>{{ $UserInfo->biography }}</p>
                                    <ul>
                                        @if ($UserInfo->url_website)
                                            <li>
                                                Website:
                                                <a target="_blank" href="{{ $UserInfo->url_website }}">
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

                            <h5>Subscription $19.99 per month</h5>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="button">Subscribe for R19.99</button>
                            </div>

                            <p class="text-center">Posts</p>

                            <div class="row">

                                @for ($index = 0; $index < 30; $index++)
                                    <div class="col-sm-4">
                                        <img src="https://picsum.photos/450/450" class="img-thumbnail user-posts"
                                            alt="user-posts">
                                    </div>
                                @endfor

                            </div>

                        </div>

                    </div>

                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <p class="lead">Profile Images</p>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Profile Picture</td>
                                <td>
                                    <div class="input-group">
                                        <input id="input-profile" accept="image/*" onchange="FileType(event)"
                                            type="file" class="form-control" id="inputGroupFile04"
                                            aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="btn-input-profile">Upload</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Account Banner</td>
                                <td>
                                    <div class="input-group">
                                        <input id="input-banner" accept="image/*" onchange="FileType(event)" type="file"
                                            class="form-control" id="inputGroupFile04"
                                            aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        <button class="btn btn-outline-secondary" type="button"
                                            id="btn-input-banner">Upload</button>
                                    </div>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="lead">Account Information</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Full Name:</label>
                            <input class="form-control" type="text"/>
                        </div>
                        <div class="col-sm-6">
                            <label>Username:</label>
                            <input class="form-control" type="text"/>
                        </div>
                        <div class="col-sm-6">
                            <label>Email Address</label>
                            <input class="form-control" type="text"/>
                        </div>
                        <div class="col-sm-6">
                            <label>Account Type</label>
                            <input class="form-control" type="text"/>
                        </div>
                        <div class="col-sm-6">
                            <label>Biography</label>
                            <input class="form-control" type="text"/>
                        </div>
                        <div class="col-sm-6">
                            <label>Account Category</label>
                            <input class="form-control" type="text"/>
                        </div>
                        <div class="col-sm-6">
                            <label>Twiter Link</label>
                            <input class="form-control" type="text"/>
                        </div>
                        <div class="col-sm-6">
                            <label>Instagram Link</label>
                            <input class="form-control" type="text"/>
                        </div>
                        <div class="col-sm-6">
                            <label>OnlyFans Link</label>
                            <input class="form-control" type="text"/>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-info" type="button">Save Info</button>
                    </div>

                    <br/>
                    <br/>

                    <p class="lead">Change Your Login Password</p>

                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <label>New Password:</label>
                            <input class="form-control" type="text"/>
                            <label>Confirm Password:</label>
                            <input class="form-control" type="text"/>
                            <br/>
                            <div class="d-grid gap-2">
                                <button class="btn btn-info" type="button">Change Password</button>
                            </div>
                            <br/><br/>
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>

                    <p class="lead">Account Subscription Model</p>
                    <p>When the amount is set to 0, we will automatically allow users to subscriber to private content for up to a month for free depending on the day of the month they subscribed in!</p>


                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <h4>Current Subscription Mode: R0.00</h4>
                            <label>Amount:</label>
                            <input class="form-control" type="text"/>
                            <br/>
                            <div class="d-grid gap-2">
                                <button class="btn btn-info" type="button">Apply</button>
                            </div>
                            <br/><br/>
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>

                </div>
            </div>
        @else
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">

                @if ($UserInfo->url_banner)

                    <div class="user-banner" style="background-image: {{ $UserInfo->url_banner }}"></div>

                @else

                    <div class="user-banner my-social-icon-box"
                        style=" background-image: url('/banner.png');">
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
                                    <img src="/images/instagram.svg" class="my-social-icon"
                                        alt="instagram" />
                                </a>
                            @endif

                            @if ($UserInfo->url_onlyfans)
                                <a target="_blank" href="{{ $UserInfo->url_onlyfans }}">
                                    <img src="/images/onlyfans.png" class="my-social-icon"
                                        alt="instagram" />
                                </a>
                            @endif

                        </p>
                    </div>

                @endif

                @if ($UserInfo->url_profile)

                    <img src="{{ $UserInfo->url_profile }}" class="img-thumbnail user-image"
                        alt="user-icon">

                @else

                    <img src="/user.svg" class="img-thumbnail user-image" alt="user-icon">

                @endif

                @if ($UserInfo->fullName)
                    <h4>{{ $UserInfo->fullName }}</h4>
                @endif
                <p>Online</p>
                @if ($UserInfo->fullName)
                    <p><a target="_blank" href="/user/{{ $UserInfo->username }}">@
                            {{ $UserInfo->username }}</a></p>
                @endif

                @if ($UserInfo->biography)
                    <p id="view-biography-initial">{{ substr($UserInfo->biography, 0, 80) }}... <span
                            onclick="ShowUserUrls()">More Info</span></p>
                    <div id="view-biography-after">
                        <p>{{ $UserInfo->biography }}</p>
                        <ul>
                            @if ($UserInfo->url_website)
                                <li>
                                    Website:
                                    <a target="_blank" href="{{ $UserInfo->url_website }}">
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

                <h5>Subscription $19.99 per month</h5>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="button">Subscribe for R19.99</button>
                </div>

                <p class="text-center">Posts</p>

                <div class="row">

                    @for ($index = 0; $index < 30; $index++)
                        <div class="col-sm-4">
                            <img src="https://picsum.photos/450/450" class="img-thumbnail user-posts"
                                alt="user-posts">
                        </div>
                    @endfor

                </div>

            </div>

        </div>

        @endif
    </div>


    <!-- Start: File Scripts-->
    <script>
        function FileType(event) {
            const str = event.target.files[0]["name"];

            console.log(str.indexOf(".png"));
            console.log(str.indexOf(".PNG"));
            console.log(str.indexOf(".jpg"));
            console.log(str.indexOf(".JPG"));

            if (str.indexOf(".png") == -1 && str.indexOf(".PNG") == -1 && str.indexOf(".jpg") == -1 && str.indexOf(
                    ".JPG") == -1) {
                document.getElementById("btn-input-profile").style.display = "none";
                document.getElementById("btn-input-banner").style.display = "none";

                alert("You can only upload PNG and JPG Images!");
                return;
            }

            document.getElementById("btn-input-profile").style.display = "inline";
            document.getElementById("btn-input-banner").style.display = "inline";
        }

    </script>
    <!-- End: File Scripts-->





</body>

</html>
