<!DOCTYPE html>
<html lang="eng">
<head>
  <meta charset="utf-8">
  <title>Main page</title>
  <link rel="stylesheet" href="/css/styleSing.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
  <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-body border-bottom shadow-sm">
    <p class="h5 my-0 me-md-auto fw-normal">Fun table</p>
    <nav class="my-2 my-md-0 me-md-3"> 
      <a class="btn btn-outline-secondary" href="/">Home</a>
      <a class="btn btn-outline-primary" href="singUp.php">Sing up</a> 
    </nav>
  </header>

  <div class="container mt-5">
    <form action="Fullcode/singInChecker.php" method="post">
        <div class="form-group">
          <label for="inputLogin">Email address</label>
          <input type="text" class="form-control" name="inputLogin" aria-describedby="ELhelp" required maxlength="50" placeholder="Enter login">
        </div>
        <br> 
        <div class="form-group">
          <label for="inputPassword1">Password</label>
          <input type="password" class="form-control" name="inputPassword" required placeholder="Password">
        </div>
        <br> 
        <button type="submit" class="btn btn-primary">Submit</button>
         <p class="form-text text-muted" style="color:red !important;font-size:small">
    <?php session_start();
          echo $_SESSION['errorSingIn'];
          unset($_SESSION['errorSingIn'])?>
    </p> 
    </form> 
  </div>
</body>
