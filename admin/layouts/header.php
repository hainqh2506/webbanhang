<?php
  session_start();
  require_once($baseUrl.'../utils/utility.php');
  require_once($baseUrl.'../database/dbhelper.php');

  $user = getUserToken();
  if($user == null) {
    header('Location: '.$baseUrl.'authen/login.php');
    die();
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="https://gokisoft.com/uploads/2021/03/s-568-ico-web.jpg" />

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>../assets/css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</head>
<body>
  <nav class="sidebar close">
    <header>
      <div class="image-text">
          <span class="image">
              <img src="logo.png" alt="">
          </span>

          <div class="text logo-text">
              <span class="name"><?=$user['fullname']?></span>
              <span class="profession">Web developer</span>
          </div>
      </div>
      <i class='bx bx-chevron-right toggle'></i>
    </header>
    <div class="menu-bar">
      <div class="menu">
        <li class="search-box">
          <i class='bx bx-search icon'></i>
          <input type="text" placeholder="Search...">
        </li>
        <ul class="menu-links">
          <li class="nav-link">
              <a href="<?=$baseUrl?>">
                <i class='bx bxs-home icon' ></i>
                <span class="text nav-text">Dashboard</span>
              </a>
          </li>

          <li class="nav-link">
              <a href="<?=$baseUrl?>category">
                <i class='bx bxs-category icon' ></i>
                <span class="text nav-text">Category</span>
              </a>
          </li>

          <li class="nav-link">
              <a href="<?=$baseUrl?>product">
                <i class='bx bxl-product-hunt icon' ></i>
                <span class="text nav-text">Product</span>
              </a>
          </li>

          <li class="nav-link">
              <a href="<?=$baseUrl?>order">
                <i class='bx bxs-paper-plane icon' ></i>
                <span class="text nav-text">Order</span>
              </a>
          </li>

          <li class="nav-link">
              <a href="<?=$baseUrl?>feedback">
                <i class='bx bx-message-square-detail icon' ></i>
                <span class="text nav-text">Feedback</span>
              </a>
          </li>
          <li class="nav-link">
              <a href="<?=$baseUrl?>user">
                <i class='bx bxs-user-circle icon' ></i>
                <span class="text nav-text">User</span>
              </a>
          </li>
        </ul>
      </div>
      <div class="bottom-content">
        <li class="">
            <a href="<?=$baseUrl?>authen/logout.php">
                <i class='bx bx-log-out icon' ></i>
                <span class="text nav-text">Logout</span>
            </a>
        </li>

        <li class="mode">
            <div class="sun-moon">
                <i class='bx bx-moon icon moon'></i>
                <i class='bx bx-sun icon sun'></i>
            </div>
            <span class="mode-text text">Dark mode</span>

            <div class="toggle-switch">
                <span class="switch"></span>
            </div>
        </li>
                
            </div>
    </div>
  </nav>

    <script>
        const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
    </script>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <!-- hien thi tung chuc nang cua trang quan tri START-->