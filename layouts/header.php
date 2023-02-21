<?php
	session_start();
	require_once('utils/utility.php');
	require_once('database/dbhelper.php');

	$sql = "select * from Category";
	$menuItems = executeResult($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang Chủ - Shop Thời Trang</title>
	<link rel="shortcut icon" href="https://t004.gokisoft.com/uploads/2021/07/1-s-1637-ico-web.jpg">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

	<style type="text/css">
		body {
			background-color: #82dbf7;
		}
		.nav {
			background-color: #FFFFCC;
			justify-content: center;
			text-align: center;
		}
		.nav li {
			text-transform: uppercase;
			color: #28a745;
			margin-top: 10px;
			margin-bottom: 10px;
		}
		.nav li a:hover {
			background-color:#FF66CC;
		}
		.nav li a {
			color: #28a745;
			font-weight: bold;
			text-align: center;
			justify-content: center;
			margin-top: 15px;
		}

		.carousel-inner img {
			height: 420px;
			width: 100%;
		}

		.product-item:hover {
			background-color: #f5f6f7;
			cursor: pointer;
			margin-bottom: 10px;
		}

		footer {
			padding-top: 20px;
		}

		footer ul {
			list-style-type: none;
			padding: 0px;
			margin: 0px;
			padding-top: 10px;
			padding-bottom: 10px;
		}

		.cart_icon {
			position: fixed;
			z-index: 999999;
			right: 0px;
			top: 45%;
		}

		.cart_icon img {
			width: 45px;
		}

		.cart_icon .cart_count {
			background-color: red;
			color: white;
			font-size: 16px;
			padding-top: 2px;
			padding-bottom: 2px;
			padding-left: 10px;
			padding-right: 10px;
			font-weight: bold;
			border-radius: 12px;
			position: fixed;
			right: 40px;
		}
		.services__card {
			background-image: linear-gradient(to right, #00dbde 0%, #fc00ff 100%);
			border-radius: 4px;
			height: 425px;
		    width: 500px;
			margin: 30px;
		}
		.services__card:hover {
		    transform: scale(1.075);
		    transition: 0.3s ease-in;
		    cursor: pointer;
		}
		.services__card img {
			margin-top : 10px;
		}
		.navbar {
    background: #131313;
    height: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.2rem;
    position: sticky;
    top: 0;
    z-index: 999;
  }
  
  .navbar__container {
    display: flex;
    justify-content: space-between;
    height: 80px;
    z-index: 1;
    width: 100%;
    max-width: 1300px;
    margin: 0 auto;
    padding: 0 50px;
  }
  
  #navbar__logo {
    background-color: #ff8177;
    background-image: linear-gradient(to top, #ff0844 0%, #ffb199 100%);
    background-size: 100%;
    -webkit-background-clip: text;
    -moz-background-clip: text;
    -webkit-text-fill-color: transparent;
    -moz-text-fill-color: transparent;
    display: flex;
    align-items: center;
    cursor: pointer;
    text-decoration: none;
    font-size: 2rem;
  }
  
  .navbar__menu {
    display: flex;
    align-items: center;
    list-style: none;
  }
  
  .navbar__item {
    height: 80px;
  }
  
  .navbar__links {
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 125px;
    text-decoration: none;
    height: 100%;
    transition: all 0.3s ease;
  }
  
  .navbar__btn {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 1rem;
    width: 100%;
  }
  
  .button {
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    padding: 10px 20px;
    height: 100%;
    width: 100%;
    border: none;
    outline: none;
    border-radius: 4px;
    background: #833ab4;
    background: -webkit-linear-gradient(to right, #fcb045, #fd1d1d, #833ab4);
    background: linear-gradient(to right, #fcb045, #fd1d1d, #833ab4);
    color: #fff;
    transition: all 0.3s ease;
  }
  
  .navbar__links:hover {
    color: #9518fc;
    transition: all 0.3s ease;
  }
  
  @media screen and (max-width: 960px) {
    .navbar__container {
      display: flex;
      justify-content: space-between;
      height: 80px;
      z-index: 1;
      width: 100%;
      max-width: 1300px;
      padding: 0;
    }
  
    .navbar__menu {
      display: grid;
      grid-template-columns: auto;
      margin: 0;
      width: 100%;
      position: absolute;
      top: -1000px;
      opacity: 1;
      transition: all 0.5s ease;
      z-index: -1;
    }
  
    .navbar__menu.active {
      background: #131313;
      top: 100%;
      opacity: 1;
      transition: all 0.5s ease;
      z-index: 99;
      height: 60vh;
      font-size: 1.6rem;
    }
  
    #navbar__logo {
      padding-left: 25px;
    }
  
    .navbar__toggle .bar {
      width: 25px;
      height: 3px;
      margin: 5px auto;
      transition: all 0.3s ease-in-out;
      background: #fff;
    }
  
    .navbar__item {
      width: 100%;
    }
  
    .navbar__links {
      text-align: center;
      padding: 2rem;
      width: 100%;
      display: table;
    }
  
    .navbar__btn {
      padding-bottom: 2rem;
    }
  
    .button {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 80%;
      height: 80px;
      margin: 0;
    }
  
    #mobile-menu {
      position: absolute;
      top: 20%;
      right: 5%;
      transform: translate(5%, 20%);
    }
  
    .navbar__toggle .bar {
      display: block;
      cursor: pointer;
    }
  
    #mobile-menu.is-active .bar:nth-child(2) {
      opacity: 0;
    }
  
    #mobile-menu.is-active .bar:nth-child(1) {
      transform: translateY(8px) rotate(45deg);
    }
  
    #mobile-menu.is-active .bar:nth-child(3) {
      transform: translateY(-8px) rotate(-45deg);
    }
  }
	</style>
</head>
<body>
<!-- Menu START -->
<nav class="navbar">
      <div class="navbar__container">
        <a href="index.php" id="navbar__logo">Teams DHD</a>
        <div class="navbar__toggle" id="mobile-menu">
          <span class="bar"></span> <span class="bar"></span>
          <span class="bar"></span>
        </div>
	  <ul class="navbar__menu">
          <li class="navbar__item">
            <a href="index.php" class="navbar__links" id="home-page">Home</a>
          </li>
	  <?php
	  	foreach($menuItems as $item) {
	  		echo '<li class="navbar__item">
            		<a class="navbar__links" id="about-page" href="category.php?id='.$item['id'].'">'.$item['name'].'</a>
          		</li>';
	  	}
	  ?>
	  
	  	<li class="navbar__item">
            <a href="contact.php" class="navbar__links" id="services-page">Liên hệ</a>
          </li>
          <!-- <li class="navbar__btn">
            <a href="admin/authen/login.php" class="button" id="signup">Đăng nhập</a>
          </li> -->
        </ul>
      </div>
</nav>
<!-- Menu Stop -->