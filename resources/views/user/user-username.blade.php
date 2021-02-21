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
    <style>
        #view-biography-after{
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

    <!-- End : JS CDN Bootstrap 5 -->
    <div class="container margin-top">
        @if ($IsCurrentUser)
            <ul class="nav nav-tabs nav-justified my-top-space" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">

                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab">Profile</a>

                </li>
                <li class="nav-item" role="presentation">

                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab">Profile
                        Edit</a>

                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel">

                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">

                            @if ($UserInfo->url_banner)

                                <div class="user-banner" style="background-image: url('{{ $UserInfo->url_banner }}')">

                            @else

                                <div class="user-banner my-social-icon-box" style=" background-image: url('/banner.png');">
                                
                            @endif

                                    <p class="my-profile-padding-15 lead"><span class="bg-white"> {{ $NumberOfFollowers }} Followers</span>
                                    <br/>
                                    <span style="background-color:#fff;color:#000">{{ $NumberOfPeaches }} <img src="/images/icons/banana.svg" class="index-post-footer-icon rounded m-2"
                                        alt="banana icon">
                                    {{ $NumberOfBananas }}
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

                            @if ($UserInfo->url_profile)

                                <img src="{{ $UserInfo->url_profile }}" class="img-thumbnail user-image"
                                    alt="user-icon">

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

                                @for ($index = 0; $index < count($UserPosts); $index++)
                                    <div class="col-sm-4" onclick="window.location.assign('/post/{{ $UserInfo->username }}/id/{{ $UserPosts[$index]->Id }}')">
                                        <img src="{{ $UserPosts[$index]->path }}" class="img-thumbnail user-posts"
                                            alt="user-posts">
                                    </div>
                                @endfor

                            </div>

                        </div>
                        <div class="col-sm-2"></div>

                    </div>

                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel">

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
                                    <form action="/user/account/profilepicture" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group">
                                            <input name="username_profile_picture" value="{{ $UserInfo->username }}"
                                                hidden />
                                            <input name="profile_picture" id="input-profile" accept="image/*"
                                                onchange="FileType(event)" type="file" class="form-control"
                                                id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                                                aria-label="Upload">
                                            <button class="btn btn-outline-secondary" type="submit"
                                                id="btn-input-profile">Upload</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Account Banner</td>
                                <td>
                                    <form action="/user/account/profilebanner" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group">
                                            <input name="username_profile_banner" value="{{ $UserInfo->username }}"
                                                hidden />
                                            <input name="profile_banner" id="input-banner" accept="image/*"
                                                onchange="FileType(event)" type="file" class="form-control"
                                                id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                                                aria-label="Upload">
                                            <button class="btn btn-outline-secondary" type="submit"
                                                id="btn-input-banner">Upload</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="lead">Account Information</p>
                    <form method="POST" action="/user/account/profileinfo">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Full Name:</label>
                                <input name="full_name" class="form-control" type="text"
                                    value="{{ $UserInfo->full_name }}" />
                            </div>
                            <div class="col-sm-6">
                                <label>Username:</label>
                                <input class="form-control" type="text" value="{{ $UserInfo->username }}" disabled />
                            </div>
                            <div class="col-sm-6">
                                <label>Email Address</label>
                                <input class="form-control" type="text" value="{{ $UserInfo->email_address }}"
                                    disabled />
                            </div>
                            <div class="col-sm-6">
                                <label>Account Type</label>
                                <input class="form-control" type="text" value="Content Creator" disabled />
                            </div>
                            <div class="col-sm-6">
                                <label>Biography</label>
                                <input name="biography" class="form-control" type="text"
                                    value="{{ $UserInfo->biography }}" />
                            </div>
                            <div class="col-sm-6">
                                <label>Account Category</label>
                                <select name="category" class="form-control">
                                    <option value="{{ $UserInfo->category }}">{{ $UserInfo->category }}</option>

                                    <option value="Artist">Artist</option>
                                    <option value="Escort Profile">Escort Profile</option>
                                    <option value="Erotic Influencer">Erotic Influencer</option>
                                    <option value="Fitness Model/Trainer">Fitness Model/Trainer</option>
                                    <option value="Nude/Sensual Photographer">Nude/Sensual Photographer</option>
                                    <option value="Selfie Model">Selfie Model</option>
                                    <option value="Business">Business</option>
                                    <option value="Entertainment Website">Entertainment Website</option>
                                    <option value="Health Service">Health Service</option>
                                    <option value="Bar/Pub">Bar/Pub</option>
                                    <option value="NightClub/Lounge">NightClub/Lounge</option>
                                    <option value="Product/Service">Product/Service</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Twitter Link</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3">https://twitter.com/</span>
                                    <input name="twitter" type="text" class="form-control" placeholder="username"
                                        value="{{ $UserInfo->url_twitter }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Instagram Link</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3">https://instagram.com/</span>
                                    <input name="instagram" type="text" class="form-control" placeholder="username"
                                        value="{{ $UserInfo->url_instagram }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>OnlyFans Link</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3">https://onlyfans.com/</span>
                                    <input name="onlyfans" type="text" class="form-control" placeholder="username"
                                        value="{{ $UserInfo->url_onlyfans }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Website Link</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3">https://</span>
                                    <input name="website" type="text" class="form-control" placeholder="username"
                                        value="{{ $UserInfo->url_website }}">
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-info" type="submit">Save Info</button>
                        </div>

                    </form>

                    <br />
                    <br />

                    <p class="lead">Change Your Login Password</p>

                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <form action="/user/account/profilepassword" method="POST">
                                @csrf
                                <label>New Password:</label>
                                <input name="password" type="password" id="passwordField1"
                                    onkeyup="ComparePasswordFunc()" class="form-control" type="text" />
                                <label>Confirm Password:</label>
                                <input id="passwordField2" type="password" onkeyup="ComparePasswordFunc()"
                                    class="form-control" type="text" />
                                <br />
                                <div class="d-grid gap-2">
                                    <button id="passwordDisplay1" class="btn btn-info" type="submit">Change
                                        Password</button>
                                </div>
                                <div id="passwordDisplay2">
                                    <p class="text-info">Enter new password and confirm your new password before you can
                                        save. Password should be morethan 6 charectors!</p>
                                </div>

                            </form>

                            <br /><br />
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>

                    <script>
                        function ComparePasswordFunc() {
                            const displayBlock1 = document.getElementById("passwordDisplay1");
                            const displayBlock2 = document.getElementById("passwordDisplay2");
                            const passTxtBox1 = document.getElementById("passwordField1").value;
                            const passTxtBox2 = document.getElementById("passwordField2").value;

                            if (passTxtBox1.length < 6) {
                                displayBlock1.style.display = "none";
                                displayBlock2.style.display = "inline";
                                return;
                            }

                            if (passTxtBox1 != passTxtBox2) {
                                displayBlock1.style.display = "none";
                                displayBlock2.style.display = "inline";
                                return;
                            }

                            if (passTxtBox1 == passTxtBox2) {
                                displayBlock1.style.display = "inline";
                                displayBlock2.style.display = "none";
                                return;
                            }

                            //if (passTxtBox1.length)
                        }

                    </script>

                    <p class="lead">Account Subscription Model</p>
                    <p>When the amount is set to 0, we will automatically allow users to subscriber to private content
                        for
                        up to a month for free depending on the day of the month they subscribed in!</p>


                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                            <form action="/user/account/profilesubfee" method="POST">
                                @csrf
                                <h4>Current Subscription Mode: R{{ $UserInfo->subscription_fee }}</h4>
                                <label>Amount:</label>
                                <input onkeyup="AmountChangeFunction()" name="amount" id="amount" class="form-control"
                                    type="number" value="{{ $UserInfo->subscription_fee }}" />
                                <br />
                                <div class="d-grid gap-2">
                                    <button class="btn btn-info" type="submit">Apply</button>
                                </div>
                            </form>
                            <br /><br />
                            <script>
                                const txtAmount1 = document.getElementById("amount");

                                if (!txtAmount1.value) {
                                    txtAmount1.value = 0;
                                }

                            </script>

                            <script>
                                function AmountChangeFunction() {
                                    const txtAmount1 = document.getElementById("amount");

                                    if (txtAmount1.value < 0) {
                                        txtAmount1.value = 0;
                                    }

                                    if (!txtAmount1.value) {
                                        txtAmount1.value = 0;
                                    }
                                }

                            </script>
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

                        <div class="user-banner" style="background-image: url('{{ $UserInfo->url_banner }}')">

                    @else

                        <div class="user-banner my-social-icon-box" style=" background-image: url('/banner.png');">
                        
                    @endif

                            <p class="my-profile-padding-15 lead"><span class="bg-white"> {{ $NumberOfFollowers }} Followers</span>
                            <br/>
                            <span style="background-color:#fff;color:#000">{{ $NumberOfPeaches }} <img src="/images/icons/banana.svg" class="index-post-footer-icon rounded m-2"
                                alt="banana icon">
                            {{ $NumberOfBananas }}
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

                    @if ($UserInfo->url_profile)

                        <img src="{{ $UserInfo->url_profile }}" class="img-thumbnail user-image"
                            alt="user-icon">

                    @else

                        <img src="/user.svg" class="img-thumbnail user-image" alt="user-icon">

                    @endif

                    @if ($UserInfo->full_name)
                        <h4>{{ $UserInfo->full_name }}</h4>
                    @endif
                    <p>Online &sdot; 
                        @if ($isFollowedByMe)
                            <a href="/user/unfollow/{{ $UserInfo->username }}"> Unfollow @ {{ $UserInfo->username }}</a>
                        @else
                            <a href="/user/follow/{{ $UserInfo->username }}"> Follow @ {{ $UserInfo->username }}</a>
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

                        @for ($index = 0; $index < count($UserPosts); $index++)
                            <div class="col-sm-4" onclick="window.location.assign('/post/{{ $UserInfo->username }}/id/{{ $UserPosts[$index]->Id }}')">
                                <img src="{{ $UserPosts[$index]->path }}" class="img-thumbnail user-posts"
                                    alt="user-posts">
                            </div>
                        @endfor

                    </div>

                </div>
                <div class="col-sm-2"></div>

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
