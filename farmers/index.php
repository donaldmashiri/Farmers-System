<?php include('../includes/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>Farmers Side</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="public/img/favicon.ico">


    <!-- DEMO CHARTS -->
    <link rel="stylesheet" href="public/demo/chartist.css">
    <link rel="stylesheet" href="public/demo/chartist-plugin-tooltip.css">

    <!-- Template -->
    <link rel="stylesheet" href="public/graindashboard/css/graindashboard.css">

</head>

  <body class="">

    <main class="main">

      <div class="content">

			<div class="container-fluid pb-5">

				<div class="row justify-content-md-center">
					<div class="card-wrapper col-12 col-md-4 mt-5">
						<div class="brand text-center mb-3">
							<a href="/"><img src="public/img/logo.png"></a>
							<h2>Farmers</h2>
						</div>
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Login</h4>
								<?php
                if(isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $query = "select * from farmers where farmer_email = '$email' and farmer_password = '$password'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $count = mysqli_num_rows($result);

                    if ($count == 1) {
                        $_SESSION['farmer_id'] = $row['farmer_id'];
                        echo "<script>window.location.href='home.php';</script>";
//                            echo   $_SESSION['company_id'];
                    } else {
                        echo "<a class='bg-light nav-link text-danger'>Invalid email and password</a>";
                    }
                }
                ?>
								<form action="" method="post">
									<div class="form-group">
										<label for="email">E-Mail Address</label>
										<input id="email" type="email" class="form-control" name="email" required="" autofocus="">
									</div>

									<div class="form-group">
										<label for="password">Password
										</label>
										<input id="password" type="password" class="form-control" name="password" required="">
									</div>

									<div class="form-group no-margin">
										<button name="login" type="submit" class="btn btn-primary btn-block">
											Sign In
										</button>
									</div>
									<div class="text-center mt-3 small">
										Don't have an account? <a href="register.php">Sign Up</a>
									</div>
								</form>
							</div>
						</div>
						<footer class="footer mt-3">
							<div class="container-fluid">
								<div class="footer-content text-center small">
									<span class="text-muted">&copy; 2019 Graindashboard. All Rights Reserved.</span>
								</div>
							</div>
						</footer>
					</div>
				</div>



			</div>

      </div>
    </main>

	<script src="public/graindashboard/js/graindashboard.js"></script>
    <script src="public/graindashboard/js/graindashboard.vendor.js"></script>
  </body>
</html>