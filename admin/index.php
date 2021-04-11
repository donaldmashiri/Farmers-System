<?php include('../includes/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>Admin Side</title>

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
							<h2>Admin</h2>
						</div>
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Login</h4>
								<?php
                if(isset($_POST['login'])) {
                    $passcode = $_POST['passcode'];
					if($passcode === '12345'){
						header("Location: home.php" );
					}else{
					echo "<p class='alert alert-danger'>Invalid Passcode</p>";
					}
                   
                }
                ?>
								<form action="" method="post">
								
									<div class="form-group">
										<label for="password">PASSCODE
										</label>
										<input id="password" type="password" class="form-control" name="passcode" required="">
									</div>

									<div class="form-group no-margin">
										<button name="login" type="submit" class="btn btn-primary btn-block">
											Sign In
										</button>
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
