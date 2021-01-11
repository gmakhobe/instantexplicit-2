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

</head>

<body>

    <!-- Start: Include Navbar-->
    @include('user/layout/navbar')
    <!-- End: Include Navbar--> 

    <div class="container margin-top">

        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">

                <div class="card m-5">
                    <div class="card-body">
                        <div class="row">
                            
                                <?php //Load stories
                                //Load stories
                                    for ($index = 0; $index < 11; $index++) { 
                                ?> 
                                    <div class="col-sm-1">
                                        <img src="https://picsum.photos/250/250" class="stories-explore-icon rounded float-start" alt="...">
                                    </div>

                                <?php } ?>

                                <div class="col-sm-1">
                                    <img src="/images/icons/right-arrow.svg" class="stories-explore-icon rounded float-start" alt="...">
                                </div>
                            
                        </div>
                    </div>
                </div>

                <?php 
                    //Load stories
                    //Load stories
                    for ($index = 0; $index < 20; $index++) { 
                ?>
                
                <div class="card m-5">
                    <div class="card-body">
                        
                        <div class="index-post-header">
                            <div class="float-start">
                                <img src="https://picsum.photos/250/250" class="index-post-header-icon rounded float-start" alt="creator icon"> <span class="m-3">Creator_Username</span><br/><span class="m-3">1 Hour Ago &sdot; From Android</span>
                            </div>
                            <div class="float-end">
                                <img src="/images/icons/more.svg" class="index-post-header-icon rounded float-start" alt="creator icon">
                            </div>
                        </div>
                        
                        <figure class="figure width-100-percent mt-3">

                            <p class="lead">Hellow World bjbjbb hbhjbhjb  jbkbk bkjbkjb bbhbh nnkn</p>

                            <img src="https://picsum.photos/450/650" class="figure-img img-fluid rounded index-post-content-attachment" alt="...">
                            
                        </figure>
                        <div class="width-100-percent">
                            <div class="float-start">
                                <img src="/images/icons/banana.svg" class="index-post-footer-icon rounded m-2" alt="banana icon">
                                <img src="/images/icons/peach.svg" class="index-post-footer-icon rounded m-2" alt="peach icon">
                                <img onclick="window.location.assign('/inbox')" src="/images/icons/send.svg" class="index-post-footer-icon rounded m-2" alt="peach icon">
                            </div>
                            <div class="float-end">
                                <img src="/images/icons/share.svg" class="index-post-footer-icon rounded m-2" alt="banana icon">
                            </div>
                        </div>
                        
                        <!--<p class="m-auto width-100-percent">Image Caption</p>-->
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                        
                    </div>
                </div>
                
                <?php 
                    } 
                ?>

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