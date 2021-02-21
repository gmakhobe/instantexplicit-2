<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/favicon.png" />
    <title>Create Post - Instant Explicit</title>

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

        <ul class="nav nav-tabs nav-justified my-top-space" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">

                <a class="nav-link active" id="post-tab" data-bs-toggle="tab" href="#post" role="tab">Post</a>

            </li>
            <li class="nav-item" role="presentation">

                <a class="nav-link" id="story-tab" data-bs-toggle="tab" href="#story" role="tab">Story</a>

            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="post" role="tabpanel">

                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h3 class="h3"> New Post</h3>
                        <form method="post" action="/create-post/post" enctype="multipart/form-data">
                            @csrf
                            <label class="lead">Image To Upload <span style="color:red"> * </span></label>
                            <br />

                            <input name="post_image" id="input-profile" accept="image/*"
                                onchange="FileType(event, 'caption_section')" type="file" class="form-control" d="post_image" />

                            <br />

                            <div id="caption_section">

                                <label class="lead">Caption</label>

                                <br />

                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">Caption</span>
                                    <input name="post_caption" id="post_caption" type="text" class="form-control" placeholder="Having Fun">
                                </div>

                                <input name="post_type" type="text" value="POST" hidden>

                                <br />

                                <div class="d-grid gap-2">
                                    <button class="btn btn-success" type="submit">Create Post</button>
                                </div>

                            </div>

                        </form>
                    </div>
                    <div class="col-sm-3"></div>
                </div>

            </div>

            <div class="tab-pane fade" id="story" role="tabpanel">
                World
            </div>
        </div>


    </div>

    <!-- Start: File Scripts-->
    <script>
        function FileType(event, paramIntOne) {
            const str = event.target.files[0]["name"];

            if (str.indexOf(".png") == -1 && str.indexOf(".PNG") == -1 && str.indexOf(".jpg") == -1 && str.indexOf(
                    ".JPG") == -1) {

                document.getElementById(paramIntOne).style.display = "none";

                alert("You can only upload PNG and JPG Images!");
                return;
            }

            document.getElementById(paramIntOne).style.display = "inline";

        }

        document.getElementById("caption_section").style.display = "none";

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
