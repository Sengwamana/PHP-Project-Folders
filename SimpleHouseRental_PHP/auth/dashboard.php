<?php
	require '../config/config.php';
	if(empty($_SESSION['username']))
		header('Location: login.php');

	if($_SESSION['role'] == 'admin'){
		$stmt = $connect->prepare('SELECT count(*) as register_user FROM users');
		$stmt->execute();
		$count = $stmt->fetch(PDO::FETCH_ASSOC);


		$stmt = $connect->prepare('SELECT count(*) as total_rent FROM room_rental_registrations');
		$stmt->execute();
		$total_rent = $stmt->fetch(PDO::FETCH_ASSOC);

		$stmt = $connect->prepare('SELECT count(*) as total_rent_apartment FROM room_rental_registrations_apartment');
		$stmt->execute();
		$total_rent_apartment = $stmt->fetch(PDO::FETCH_ASSOC);
	}

	$stmt = $connect->prepare('SELECT count(*) as total_auth_user_rent FROM room_rental_registrations WHERE user_id = :user_id');
	$stmt->execute(array(
		':user_id' => $_SESSION['id']
		));
	$total_auth_user_rent = $stmt->fetch(PDO::FETCH_ASSOC);

	$stmt = $connect->prepare('SELECT count(*) as total_auth_user_rent_ap FROM room_rental_registrations_apartment WHERE user_id = :user_id');
	$stmt->execute(array(
		':user_id' => $_SESSION['id']
		));
	$total_auth_user_rent_ap = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php include '../include/header.php';?>	
	<!-- Header nav -->	
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#212529;" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../index.php">SHRS</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"><?php echo $_SESSION['fullname']; ?> <?php if($_SESSION['role'] == 'admin'){ echo "(Admin)"; } ?></a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	<!-- end header nav -->	
<?php include '../include/side-nav.php';?>
	<section class="wrapper" style="margin-left: 16%;margin-top: -11%;">
		<!-- <div class="container"> -->
			<!-- <div class="row"> -->
				<div class="col-md-12">
					<h1>Dashboard</h1>
					<div class="row">						
						<?php 
							if($_SESSION['role'] == 'admin'){ 
								
								echo '<div class="container">';
								echo '<div class="row">';
								echo '<div class="col-md-4">
								<a href="../app/users.php">
								<div class="card-counter primary">
								  <i class="fa fa-user"></i>
								  <span class="count-numbers">'.$count['register_user'].'</span>
								  <span class="count-name">Users</span>
								</div> </a>
							  </div>';
								
							
							} 
						?>	
						<?php 
							if($_SESSION['role'] == 'admin'){ 
								
								echo '<div class="col-md-4">
								<a href="../app/list.php">
								<div class="card-counter danger">
								
								  <i class="fa fa-home"></i>
								  <span class="count-numbers">'.(intval($total_rent['total_rent'])+intval($total_rent_apartment['total_rent_apartment'])).'</span>
								  <span class="count-name">Rentals</span>
								</div></div></a>
							  </div>';

								// echo '<div class="col-md-3">';
								// echo '<a href="../app/list.php"><div class="alert alert-warning" role="alert">';
								// echo '<b>Rooms for Rent: <span class="badge badge-pill badge-success">'.(intval($total_rent['total_rent'])+intval($total_rent_apartment['total_rent_apartment'])).'</span></b>';
								// echo '</div></a>';
								// echo '</div>';
							} 
						?>
						<?php 
							if($_SESSION['role'] == 'user'){ 

								echo '<div class="container">';
								echo '<div class="row">';
								echo '<div class="col-md-4">
								<a href="../app/list.php">
								<div class="card-counter success">
								
								  <i class="fa fa-home"></i>
								  <span class="count-numbers">'.$total_auth_user_rent['total_auth_user_rent'].'</span>
								  <span class="count-name">Registered Rooms</span>
								</div></div> </a>
								</div>
							  </div>';

								// echo '<div class="col-md-3">';
								// echo '<a href="../app/list.php"><div class="alert alert-warning" role="alert">';
								// echo '<b>Registered Rooms: <span class="badge badge-pill badge-success">'.$total_auth_user_rent['total_auth_user_rent'].'</span></b>';
								// echo '</div></a>';
								// echo '</div>';
							} 
						?>
					</div>
				</div>
			<!-- </div> -->
		<!-- </div> -->
	</section>


	<style>
	.card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    text-transform: capitalize;
    opacity: 0.8;
    display: block;
    font-size: 18px;
  }</style>
<?php include '../include/footer.php';?>