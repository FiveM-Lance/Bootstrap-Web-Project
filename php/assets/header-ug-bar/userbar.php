<li class="nav-item dropdown" style="list-style: none">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black;"><img src="<?php echo "http://localhost/" . $_SESSION['profile_picture'] ?>" style="border-radius: 50%; width: 40px; height: 40px;"></a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: -95px">
        <div class="dropdown-header"><b>@<?php echo $_SESSION['username']?></b></div>
        <div class="dropdown-header"><b><?php echo $_SESSION['displayname']?></b></div>
        <a class="dropdown-item" href="http://localhost/settings">Settings</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="http://localhost/signout">Sign Out</a>
    </div>
</li>
