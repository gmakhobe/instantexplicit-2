<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/favicon.png" />
    <title>Post: {{ $PostInfo[0]->caption }} -Instant Explicit</title>

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

    <!-- End : JS CDN Bootstrap 5 -->
    <div class="container margin-top">

        <div class="row">
            <div class="col-sm-2"></div>
            <div class="row">
                <div class="col-sm-7">
                    <center>
                        <img src="{{ $PostInfo[0]->path }}" class="post-info-image" />
                    </center>
                </div>
                <div class="col-sm-5">
                    <div class="float-start">
                        <img onclick="window.location.assign('/user/{{ $PostInfo[0]->username }}')"
                            src="{{ $PostInfo[0]->url_profile }}" class="rounded post-info-header-icon"
                            alt="creator icon" />
                    </div>
                    <div class="float-start">
                        <p class="m-3"> <a href="/user/{{ $PostInfo[0]->username }}">{{ $PostInfo[0]->username }}</a>
                            &sdot; {{ $PostInfo[0]->created_date }} <br /> From Device</p>
                    </div>
                    <div class="post-info-comments-block">

                        @if (!count($Comments))
                            <center>
                                <p class="lead text-primary">No Comments</p>
                            </center>
                        @endif

                        @for ($index = 0; $index < count($Comments); $index++)
                            <div class="card">
                                <div class="card-body">
                                    <div class="float-start">
                                        <img onclick="window.location.assign('/user/{{ $Comments[$index]->username }}')"
                                            src="{{ $Comments[$index]->url_profile ? $Comments[$index]->url_profile : '/user.svg' }}"
                                            class="rounded post-info-header-icon" alt="creator icon">
                                    </div>
                                    <div class="float-start">
                                        <p class="m-3"> <a
                                                href="/user/{{ $Comments[$index]->username }}">{{ $Comments[$index]->username }}</a>
                                            &sdot;
                                            {{ $Comments[$index]->created_date }} <br />
                                            {{ $Comments[$index]->comment }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endfor

                    </div>
                    <form action="/post/{{ $PostInfo[0]->username }}/comment/{{ $PostId }}" method="POST">
                        @csrf
                        <input name="comment" type="text" class="form-control" placeholder="Comment" />
                    </form>

                </div>
                <center>
                    <div class="width-100-percent p-20">
                        <p class="lead">{{ $PostInfo[0]->caption }}</p>
                            
                        @if (!$HasBananad)
                            
                            <img onclick="window.location.assign('/post/{{ $PostInfo[0]->username }}/banana/{{ $PostId }}')" src="/images/icons/banana.svg" class="index-post-footer-icon rounded m-2" alt="banana icon"> ({{ count($TotalBananas) }})

                        @else

                            <img src="/images/icons/banana.svg" class="index-post-footer-icon rounded m-2" alt="banana icon"> &#10003; ({{ count($TotalBananas) }})

                        @endif

                        @if (!$HasPeachd)

                            <img onclick="window.location.assign('/post/{{ $PostInfo[0]->username }}/peach/{{ $PostId }}')" src="/images/icons/peach.svg" class="index-post-footer-icon rounded m-2" alt="peach icon"> ({{ count($TotalPeachs) }})

                        @else

                            <img src="/images/icons/peach.svg" class="index-post-footer-icon rounded m-2" alt="peach icon"> &#10003; ({{ count($TotalPeachs) }})

                        @endif

                            <img onclick="window.location.assign('/inbox')" src="/images/icons/send.svg" class="index-post-footer-icon rounded m-2" alt="peach icon">

                            <img onclick="copyToClipboard()" src="/images/icons/share.svg" class="index-post-footer-icon rounded m-2" alt="banana icon">

                            <input type="text" id="linkToPost" value="http://localhost:8000/post/{{ $PostInfo[0]->username }}/id/{{ $PostId }}" hidden/>

                    </div>
                </center>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>

    </div>


    <!-- Start: File Scripts-->
    <script>
        function copyToClipboard() {
          var copyText = document.getElementById("linkToPost");
          copyText.select();
          copyText.setSelectionRange(0, 99999)
          document.execCommand("copy");
          alert("Copied the link to clipboard: " + copyText.value);
        }
    </script>
    <script></script>
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
