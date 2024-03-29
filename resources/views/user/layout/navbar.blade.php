<!-- include alertify.css -->
<link rel="stylesheet" href="/public/libs/alertifyjs/css/alertify.css">

<!-- include boostrap theme  -->
<link rel="stylesheet" href="/public/libs/alertifyjs/css/themes/bootstrap.css">

<!-- include alertify script -->
<script src="/public/libs/alertifyjs/alertify.js"></script>

<div class="container-fluid p-3 fixed-top bg-white">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-4">
                    <p class="float-start nav-title h6">Instant Explicit</p>
                </div>
                <div class="col-sm-4">
                    <form action="/explorer/search" method="GET">
                        <center>
                            <input name="Keyword" type="text" class="form-control" placeholder="Search" />
                        </center>
                    </form>
                </div>
                <div class="col-sm-4">
                    <div class="dropdown">
                        <img id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"
                            class="nav-icon float-end" src="/images/icons/user.svg" alt="user icon" />
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="/user/{{ $Username }}">
                                    <img src="/images/icons/user.svg" class="img-thumbnail nav-dropdown-icon" alt="...">
                                    Profile
                                </a></li>
                            <li><a class="dropdown-item" href="#">
                                    <img src="/images/icons/save-button.svg" class="img-thumbnail nav-dropdown-icon"
                                        alt="..."> Saved
                                </a></li>
                            <li><a class="dropdown-item" href="#">
                                    <img src="/images/icons/settings.svg" class="img-thumbnail nav-dropdown-icon"
                                        alt="..."> Settings
                                </a></li>
                            <li><a class="dropdown-item" href="javascript:window.location.assign('/logout');">
                                    Logout
                                </a></li>
                        </ul>
                    </div>

                    <img data-bs-toggle="modal" data-bs-target="#notificationsModal" class="nav-icon float-end"
                        src="/images/icons/bell.svg" alt="notifications icon" />
                    <img onclick="window.location.assign('/explorer')" class="nav-icon float-end"
                        src="/images/icons/direction.svg" alt="explore icon" />
                    <img onclick="window.location.assign('/inbox')" class="nav-icon float-end"
                        src="/images/icons/send.svg" alt="messages icon" />
                    <img onclick="window.location.assign('/explore')" class="nav-icon float-end"
                        src="/images/icons/home.svg" alt="home icon" />
                    <img onclick="window.location.assign('/create-post')" class="nav-icon float-end"
                        src="/images/icons/add.svg" alt="add icon" />

                </div>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="notificationsModal" tabindex="-1" aria-labelledby="notificationsModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">0 Notification</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
