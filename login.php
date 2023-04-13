<?php
// error_reporting(E_ALL);
ini_set('display_errors', 1);
require("db.php");
require("my_functions.php");

// Listening To submit button clicks
if (isset($_POST['login'])) {
  $email = $password = $login_success = $login_error = "";

  $email = $_POST['email'];
  $password = $_POST['password'];

  // XSS attacks prevention --> preventing sql attacks
  $email = sanitize($email);
  $password = sanitize($password);


  // Encrypt
  $password = crypt($password, "dollhouse");

  // echo $email, $password;


  // Retrieving data from database
  $sql = "SELECT * FROM users WHERE email = '$email' ";
  $result = mysqli_query($dbconnect, $sql);

  // array containing user details fron the database
  $user = mysqli_fetch_assoc($result);
  if ($user == null) {
    $login_error = "<p style='color:red'>User Not Registered</p>";
  } else {
    // Password of user from database
    $pass_from_db = $user['password'];
    // echo $pass_from_db, "------", $password;

    if ($pass_from_db == $password) {
      $login_success = "<p style='color:green' >Logged In Successfully</p>";
      // save user info on a session
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['name'] = $user['name'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['age'] = $user['age'];

      // Redirecting user to dahsboard once authentication is complete
      header('Location: index.php');
    } else {
      $login_error = "<p style='color:red'>Login Failed. Please try again</p>";
    }
  }

  // Free Memory Result Set 
  mysqli_free_result($result);
  mysqli_close($dbconnect);
}


// assigning variables values once the submit button has been clicked
if (isset($_POST['signup'])) {
  // initialising variables to a default value

  $name = $age = $email = $password = "";

  $name = $_POST['name'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  $password = $_POST['password'];


  // inputs array
  $error = array("name" => "", "age" => "", "email" => "", "password" => "", "general" => "");

  $success = "";

  // Form Validation
  if (empty($name)) {
    $error["name"] = "<p style='color:red;'>Please enter Your Name </p>";
  } else {
    //treats all tags received as normal texts...prevents xss attacks
    $name = htmlspecialchars($name);

    //Checking a parameter by use of regular expressions
    if (!preg_match("/^([a-zA-Z' ]+)$/", "$name")) {
      $error["name"] = "<p style='color:red;'>Please use lettters a to z only </p>";
    }
  }

  if (empty($age)) {
    $error["age"] = "<p style='color:red;'>Please enter Your age</p>";
  } else {
    $age = htmlspecialchars($age);
    // checking whether phone number is a number
    if (!is_numeric($age)) {
      $error["age"] = "<p style='color:red;'>Age must be a valid number</p>";
    }
  }

  if (empty($email)) {
    $error["email"] = "<p style='color:red;'>Please enter Your email </p>";
  } else {
    $email = htmlspecialchars($email);

    // Checking email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error["email"] = "<p style='color:red;'>Invalid email address ,($email) </p>";
    }
  }

  if (empty($password)) {
    $error["password"] = "<p style='color:red;'>Please enter Your password </p>";
  } else {
    $password = htmlspecialchars($password);
    $password = crypt($password, "dollhouse");
  }

  // echo empty($error) ;
  // var_dump($error);
  if (empty($error)) {
    $error["general"] = "<p style='color:red;' > Please handle the errors before proceeding  </p>";
  } else {
    $sql = "INSERT INTO users(name,age,email,password) VALUES('$name','$age','$email','$password')";
    $result = mysqli_query($dbconnect, $sql);
    if ($result) {
      $success = "<p style='color:green;'>Successful Signup!Now you can login" . "</p>";
      header("Location: login.php");
    } else {
      $error['general'] = "<p style='color:red;'> Error: " . $dbconnect->error . "</p>";
    }
    mysqli_close($dbconnect);
  }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Login HERE</title>
  <meta name="description" content="" />
  <link href="css/login.css" rel="stylesheet" />

  <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
  <section class="forms-section">
    <h1 class="section-title">Login</h1>
    <?php if (isset($login_success)) : echo $login_success;
    endif; ?>
    <?php if (isset($login_error)) : echo $login_error;
    endif; ?>
    <div class="forms">
      <div class="form-wrapper is-active">
        <button type="button" class="switcher switcher-login">
          Login
          <span class="underline"></span>
        </button>
        <form class="form form-login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
          <fieldset>
            <legend>Please, enter your email and password for login.</legend>
            <div class="input-block">
              <label for="login-email">E-mail</label>
              <input id="login-email" type="email" name="email" required>
            </div>
            <div class="input-block">
              <label for="login-password">Password</label>
              <input id="login-password" name="password" type="password" required>
            </div>
          </fieldset>
          <button type="submit" id="login" name="login" class="btn-login">Login</button>

        </form>
      </div>
      <div class="form-wrapper">
        <button type="button" class="switcher switcher-signup">
          Sign Up
          <span class="underline"></span>
        </button>

        <form class="form form-signup" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
          <fieldset>
            <legend>Please, enter your email, password and password confirmation for sign up.</legend>
            <div class="input-block">
              <label for="signup-email">E-mail</label>
              <input id="signup-email" name="email" type="email" required>
            </div>
            <div class="input-block">
              <label for="signup-email">Name</label>
              <input id="signup-email" name="name" required>
            </div>
            <div class="input-block">
              <label for="signup-email">Age</label>
              <input id="signup-email" type="number" name="age" required>
            </div>
            <div class="input-block">
              <label for="signup-password">Password</label>
              <input id="signup-password" type="password" name="password" required>
            </div>
          </fieldset>
          <button type="submit" id="signup" name="signup" class="btn-signup">Continue</button>
        </form>
      </div>

    </div>
  </section>
  <script>
    const switchers = [...document.querySelectorAll('.switcher')]
    switchers.forEach(item => {
      item.addEventListener('click', function() {
        switchers.forEach(item => item.parentElement.classList.remove('is-active'))
        this.parentElement.classList.add('is-active')
      })
    })
  </script>

</body>

</html>