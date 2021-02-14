<!DOCTYPE html>
<html lang="eng">
<head>
  <meta charset="utf-8">
  <title>Main page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
  <?php session_start();?>
  <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-body border-bottom shadow-sm">
    <p class="h5 my-0 me-md-auto fw-normal">Fun table</p>

    <nav class="my-2 my-md-0 me-md-3">
    
    <?php if(empty($_SESSION['user'])): ?>  
      <a class="btn btn-outline-secondary" href="singUp.php">Sign up</a>
      <a class="btn btn-outline-primary" href="singIn.php">Log in</a>
    
    <?php else: ?>
      <a ><u><?php echo $_SESSION['user'];?></u></a> 
      <a class="btn btn-outline-secondary" href="singOut.php">Log out</a>   
    <?php endif; ?>  

    </nav>
  </header>
  
   <?php if(empty($_SESSION['user'])): ?> 

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">No access</h1><p class="lead">Please register or login to have fun in Fun Table</p>
    </div>
  <?php else: ?>
    <form action="Fullcode/blockUnblockDelete.php" method="post">

      <?php require "Fullcode/table.php" ?>
      
    </form>
  <?php endif; ?>  

</body>
</html>