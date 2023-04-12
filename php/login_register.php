<?php

  session_start();

  include("config.php");

  if(isset($_POST['email'])){

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password) && !is_numeric($email))
    {
      $query = "insert into users (name, email, password ) values('$name', '$email', '$password')";
    
      mysqli_query($con, $query);

      /*header("Location: index.php");*/
      echo "<script type='text/javascript'>alert('Success')</script>";
    }
    else{
      echo "<script type='text/javascript'>alert('Please enter valid info')</script>";
    }
  }
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
  
  $name= $_POST['name'];
  $password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE name='$name' AND password='$password'";
	$result = mysqli_query($con, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['name'] = $row['name'];
		header("Location: ");
	} else {
		echo"<script>alert('Username o password sbagliata.')</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in & Sign up Form</title>
    <link rel="stylesheet" href="/climate_change_v4.2/css/login_register.css" />
  </head>
  <body>
    <main>
      <div class="box">
        <div class="inner-box">
          <div class="forms-wrap">
            <form action="/climate_change_v4.2/html/loggedpage.html" autocomplete="off" class="sign-in-form" method="post">
              <div class="logo">
                <img src="/climate_change_v4.2/assets/logo_login.png" alt="easyclass" />
                <h4>easyclass</h4>
              </div>

              <div class="heading">
                <h2>Bentornato</h2>
                <h6>Non sei ancora registrato?</h6>
                <a href="#" class="toggle">Registrati</a>
              </div>

              <!--Login form-->
              <div class="actual-form">
                <div class="input-wrap">
                  <input type="text" name="name" minlength="4" class="input-field" autocomplete="off" required/>
                  <label>Nome</label>
                </div>

                <div class="input-wrap">
                  <input type="password" name="password" minlength="4" class="input-field" autocomplete="off" required/>
                  <label>Password</label>
                </div>

                <input type="submit" value="Accedi" class="sign-btn" />

                <p class="text">
                  Hai dimenticato la password?
                  <a href="#">Clicca qui</a>
                </p>
              </div>
            </form>

            <!--Register form-->

            <form action="login_register.php" autocomplete="off" class="sign-up-form" method="post">
              <div class="logo">
                <img src="/climate_change_v4.2/assets/logo_login.png" alt="easyclass" />
                <h4>easyclass</h4>
              </div>

              <div class="heading">
                <h2>Inizia subito</h2>
                <h6>Hai già un account?</h6>
                <a href="#" class="toggle">Accedi</a>
              </div>

              
              <div class="actual-form">
                <div class="input-wrap">
                  <input type="text" name="name" minlength="4" class="input-field" autocomplete="off" required/>
                  <label>Nome</label>
                </div>

                <div class="input-wrap">
                  <input type="email" name="email" class="input-field" autocomplete="off" required
                  />
                  <label>Email</label>
                </div>

                <div class="input-wrap">
                  <input type="password" name="password" minlength="4" class="input-field" autocomplete="off" required
                  />
                  <label>Password</label>
                </div>

                <input type="submit" value="Registrati" class="sign-btn" />

                <p class="text">
                  Iscrivendomi, accetto i Termini dei servizi e l'Informativa sulla privacy.
                  <a href="#">Terms of Services</a> and
                  <a href="#">Privacy Policy</a>
                </p>
              </div>
            </form>
          </div>

          <div class="carousel">
            <div class="images-wrapper">
              <img src="/climate_change_v4.2/assets/image1_1.png" class="image img-1 show" alt="" />
              <img src="/climate_change_v4.2/assets/image2.png" class="image img-2" alt="" />
              <img src="/climate_change_v4.2/assets/image3.png" class="image img-3" alt="" />
            </div>

            <div class="text-slider">
              <div class="text-wrap">
                <div class="text-group">
                  <h2>Create your own courses</h2>
                  <h2>Customize as you like</h2>
                  <h2>Invite students to your class</h2>
                </div>
              </div>

              <div class="bullets">
                <span class="active" data-value="1"></span>
                <span data-value="2"></span>
                <span data-value="3"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Javascript file -->

    <script src="/climate_change_v4.2/js/login_app.js"></script>
  </body>
  </html>
