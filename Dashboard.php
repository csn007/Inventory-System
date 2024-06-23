<?php

    session_start();
    if(!isset($_SESSION['user'])) header('location: Login.php');
    $user =$_SESSION['user'];
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard - Inventory Management System</title>
        <link rel="stylesheet" type="text/css" href="Css/login.css">
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <div id="dashboardmaincontainer">
            <div class="dashboard_sidebar" id="dashboard_sidebar">
                    <h3 class="dashboard_logo" id   ="dashboard_logo">FALCON</h3>
                    <div class="dashboard_sidebar_user">
                        <img src="Image/pfpng.png" alt="User image." id="userImage"/>
                        <span><?= $user['first_name'] . ' ' . $user['last_name'] ?></span>
                    </div>
                
                <div class="dashboard_sidebar_menu">
                    <ul class="dashboard_menu_lists">
                        <li class="menuActive">
                            <a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Dashboard</span></a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Dashboard</span></a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Dashboard</span></a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Dashboard</span></a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-dashboard"></i> <span class="menuText">Dashboard</span></a>
                        </li>
                    </ul>
                </div>
        </div>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <div class="dashboard_topnav">
                <a href="" id="toggleBtn"><i class="fa fa-navicon"></i></a>
                <a href="database/logout.php" id="LogoutBtn"><i class="fa fa-power-off">Log-out</i></a>

            </div>
            <div class="dashboard_content">
                <div class="dashboard_content_main"></div>
            </div>
        </div>
    </div>

    <script>
        var sideBarIsOpen = true;

        toggleBtn.addEventListener( 'click', (event) => {
            event.preventDefault();

            if(sideBarIsOpen){
                dashboard_sidebar.style.width = '18%';
                dashboard_sidebar.style.transition = '0.3s all';
                dashboard_content_container.style.width = '90%';
                dashboard_logo.style.fontSize = '50px';
                userImage.style.width = '60px';

                menuIcons = document.getElementsByClassName('menuText');
                for(var i=0; i < menuIcons.length;i++){
                    menuIcons[i].style.display = 'none';
                }
                document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'center';
                sideBarIsOpen = false;
            } else {
                dashboard_sidebar.style.width = '30%';
                dashboard_content_container.style.width = '90%';
                dashboard_logo.style.fontSize = '50px';
                userImage.style.width = '60px';

                menuIcons = document.getElementsByClassName('menuText');
                for(var i=0; i < menuIcons.length;i++){
                    menuIcons[i].style.display = 'inline-block';
                }
                document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'left';
                sideBarIsOpen = true;
            }
            
        });
    </script>
    </body>
</html>