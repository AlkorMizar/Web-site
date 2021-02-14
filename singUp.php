<!DOCTYPE html>
<html lang="eng">
<head>
  <meta charset="utf-8">
  <title>Sing Up</title>
  <link rel="stylesheet" href="/css/styleSing.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
  <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-body border-bottom shadow-sm">
    <p class="h5 my-0 me-md-auto fw-normal">Fun table</p>
    <nav class="my-2 my-md-0 me-md-3"> 
      <a class="btn btn-outline-secondary" href="/">Home</a>
      <a class="btn btn-outline-primary" href="singIn.php">Log in</a> 
    </nav>
  </header>

  <div class="container mt-5">
    <form action="Fullcode/singUpChecker.php" method="post">
        <div class="form-group">
          <label for="inputLogin">Login</label>
          <input type="text" class="form-control" name="inputLogin" aria-describedby="loginHelp"  maxlength="50" placeholder="Enter login">
        <br>    
        <div class="form-group">
          <label for="inputEmail">Email address</label>
          <input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp" required maxlength="100" placeholder="Enter email">
        </div>
        <br>
        <div class="form-group">
          <label for="inputPassword1">Password</label>
          <input type="password" class="form-control" name="inputPassword1" required placeholder="Password">
        </div>
        <br>
        <div class="form-group">
          <label for="inputPassword2">Password</label>
          <input type="password" class="form-control" name="inputPassword2" required placeholder="Password">
        </div>
        <br>    
        <button type="submit" class="btn btn-primary">Submit</button>

    </form> 
    <p class="form-text text-muted" style="color:red !important;font-size:small">
    <?php session_start();
          echo $_SESSION['errorSingUp'];
          unset($_SESSION['errorSingUp'])?>
    </p>
  </div>
</body>  