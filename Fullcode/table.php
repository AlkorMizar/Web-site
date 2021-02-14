<?php require "database.php" ;
	if (!initDatabase('table',$link)) {
    	if(!isUnblocked($_SESSION['user'],$link)){
    		closeDatabase($link);
    		session_destroy();
    	}
    }
?>

<div class="container mt-5" >
	  <div class="btn-group" role="group" style="float: right;top : -1px; ">	
	  	  <button class="submit" name="button" value=1><i class="fa fa-unlock"></i></button>
          <button class="submit" name="button" value=2><i class="fa fa-lock"></i></button>
	      <button class="submit" name="button" value=3><i class="fa fa-trash"></i></button>
      </div>	
      <table class="table table-striped" style=" border: 4px double LightGrey;" id="table">
        <thead>
          <tr>
            <th scope="col"><label><input class="form-check-input" id="checkAll" type="checkbox" name="checkAll" value=""></th>
            <th scope="col">Login</th>
            <th scope="col">Email</th>
            <th scope="col">Registration date</th>
            <th scope="col">Last login date</th>
            <th scope="col">Status</th>
          </tr>
         </thead>
         <tbody> 

<?php 	
         	if (!initDatabase('table',$link)) {
         		if(!getForTable($link,$users)){
         			closeDatabase($link);

		            foreach ($users as $user) {
		    	        echo<<< EOT
		    <tr>
		      <th scope="row"><label><input class="form-check-input" type="checkbox" value="$user[login]" name="checkList[]"></th>
		      <td >$user[login]</td>
		      <td>$user[email]</td>
		      <td>$user[dateOfReg]</td>
		      <td>$user[dateOfLastEnter]</td>
		      <td>$user[status]</td>
		    </tr>

EOT;
					}
         		}
         	}
?>      
         </tbody> 
      </table>
    </div> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts.js"></script>

