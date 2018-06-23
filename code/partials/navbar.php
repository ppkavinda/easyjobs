 

<div>
<ul class="navul" id="navBar">
	<div class="flleft">
		<li class="title"><a href="index.php"><span class="navHead1">S</span><span class="navHead2">eekers</span></a></li>
        <li class="navItem"><a href="contact.php">Contact</a></li>
        <li class="navItem"><a href="about.php">About</a></li>
	</div>
	  
	<div class="flright">
        <?php
            if (isAdmin() ) {
                echo "<li class='navItem'><a href='admin.php'>Admin</a></li>";
            } else if (isEmployer()) {
                echo "<li class='navItem'><a href='addJob.php'>New Vacancy</a></li>";
                echo "<li class='navItem'><a href='myVacancies.php'>My Vacancies</a></li>";
            } else if (isEmployee()){
                echo "<li class='navItem'><a href='profile.php'>My Profile</a></li>";
            }

            if (isLoggedIn()) {
                echo "<li class='navItem'><a href='logout.php'>Logout</a></li>";
            } else {
                echo "<li class='navItem'><a href='register.php'>Register</a></li>";
                echo "<li class='navItem'><a href='login.php'>Login</a></li>";
            }
        ?>
	</div>
</ul>
</div>
<div class="clearfix"></div>


<style>
	
.navul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #ff704d;
}

.title{
	margin-top:-5px;
}

.navHead1{
	font-size:30px;
}

.navHead2{
	font-size:20px !important;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
    background-color: #ff0000;
}

.active {
    background-color: #4CAF50;
}

.flleft{
    margin-left: 150px;
}
.flleft .navItem{
    margin-top: 5px;
}
.flright{
	margin-top:5px;
    margin-left: 1100px;
}
</style>