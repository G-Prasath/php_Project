<?php
  error_reporting(0);
  $username = $_POST['email_address'];
  $password = $_POST['password'];

  // $result = validate($username, $password);
  $result = user::login($username, $password);
  // print_r($result);


  if($result){
    print("Success Login");
  }else{
?> 

<main class="form-signin">
  <form method="POST" action="login.php">

    <img class="mb-4" src="https://img.icons8.com/external-flatarticons-blue-flatarticons/2x/external-login-web-security-flatarticons-blue-flatarticons.png" alt="" width="80" height="80">
    <h1 class="h3 mb-3 fw-normal">Login</h1>

    <div class="form-floating">
      <input name="email_address" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" autocomplete="off">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mt-2">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" autocomplete="off">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mt-3 mb-4">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-m btn-primary" type="submit">Log in</button>
  </form>
</main>

<?php 
}
?>