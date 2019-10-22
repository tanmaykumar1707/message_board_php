
<?php /*open database connection*/
	require_once("Database/db.php");

?>

<?php /*inserting message using post method*/
	if(isset($_POST['board_id'])){
	 $board_id =mysqli_real_escape_string($connection,$_POST['board_id']);
	 $board_name=mysqli_real_escape_string($connection,$_POST['board_name']);
    $board_remarks=mysqli_real_escape_string($connection,$_POST['board_remarks']);
	 $prequery="insert into board_id (board_id,board_name,board_remarks) values ('{$board_id}','{$board_name}','{$board_remarks}')";
	 $preresult=mysqli_query($connection,$prequery);
	 if(!$preresult){
		die("pre database query failed");
	}
	}


/*delete message and image from database using get method*/
	 if(isset($_GET['id'])){
		//echo var_dump($_GET);
		$delquery="DELETE FROM board_id WHERE id=".$_GET['id']." LIMIT 1";
		$delresult=mysqli_query($connection,$delquery);
	if(!$delresult){
		die("database query failed");
		}
	
	}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta content="text/html" http-equiv="Content-Type" charset="utf-8" />

    <meta name="viewport" content="width=device-width">

    <title>Notification Board</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

    <link rel="icon" href="icon.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link type="text/css" rel="stylesheet" href="css/navbar.css">
    
    <link href="styles.css" type="text/css" rel="stylesheet">
    
         <script rel="text/javascript" src="js/java.js"></script>
<!--         <script rel="text/javascript" src="js/java.js"></script>-->
    <style>
        .alert_setting{
            display: none;
        }
    </style>

</head>

<body>
   
    <!---------------------------Start of header containing Social icon and Mob no.-------------->

    <!-----------------------------End header containing Social icon and Mob no.----------------->
        
        
    <!--------------------------------Start of Heading and Search Box---------------------------->
   
        <!--End of Logo and Search Bar-->

  
    <!---------------------------------End for Heading and Search Box---------------------------->
        
      
        
    <!---------------------------------Start of Menu Bar------------------------------>
    <div class="nav navbar navbar-default ">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <i class="fa fa-list-ul" style="font-size:20px;"></i>
                   
                      </button>
                    <a class="navbar-brand" href="#myPage">Notification Board - Control room</a>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right" >
                        <li><a  href="databases2.php">HOME</a></li>
                        <li><a class="active1" href="board_id.php"> BOARD ID</a></li>
                            
                     
                    </ul>

                </div>

            </div>
        </div>
    <!---------------------------------- End of Menu Bar------------------------------>

        <br>
        
    <!---------------------------------Main Container--------------------------->
    <div class="container">
       
       
            <!---------------------------------Inner  Container----------------->
        <div class="row">
               
                

            
                <!-- -----------------------------------------SEND Form--------------------->
                <div class="col-sm-12">

                    <div class="panel panel-primary">

                        <div class="panel-heading">
                            <h4>CREATE BOARD ID</h4>
                        </div>
                        <div class="panel-body ">

                            <div class="alert alert-danger  alert_setting text-center ">

                                <h4>
                                 <strong>Error!</strong> <span id="ajax_mssg"> </span></h4>
                            </div>

                            <form id="form" action="board_id.php" method="post"  class="form-horizontal">
                                           
                                             <div class=" form-group ">
                                                <label for="Board id" class="control-label col-sm-3">Board Id: </label>
                                                <div class="col-sm-4">
                                                 <input type="number" name="board_id" class="form-control" required>


                                                </div>
                                            </div>            
                                            
                                            <div class=" form-group ">
                                                <label for="Board Name" class="control-label col-sm-3">Board Name: </label>
                                                <div class="col-sm-4">
                                                 <input type="text" name="board_name" class="form-control" required>


                                                </div>
                                            </div> 
                                            <div class=" form-group ">
                                                <label for="Remarks" class="control-label col-sm-3">Board Remarks: </label>
                                                <div class="col-sm-4">
                                                   <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                  <textarea rows="4" cols="50" name="board_remarks" placeholder="Enter Board Remarks  here(If any)..." class="form-control"></textarea>


                                                </div>
                                            </div>

                                            <center> <input class="btn btn-primary"  type="submit" name="submit" value="Create Board ID" cass="btn btn-primary">
                                                
                                            </center>

                            </form>

                        </div>
                        <!-- End of Panel body div-->

                    </div>    <!--                    Panel Ending-->             
            </div><!--                Col Sm 12-->
        </div>  
<!--        END ROW-->
        
        
        
<?php
echo "<h2> Board Id List : </h2><br>";

        
        $query="select * from board_id";
	$result=mysqli_query($connection,$query);
	if(!$result){
		die("database query failed");
	}

while($row = mysqli_fetch_assoc($result)){
	
	$idwhile=$row['id'];

		
		echo "<br><h4> BOARD ID : ".$row['board_id']."  (";
        echo $row['board_name'].")  ".$row['board_remarks']."  ";
		echo "<a id=\"link\" class='btn btn-danger' href=\"?id=".$idwhile."\">delete</a></h4>";
	

}
mysqli_free_result($result);
?>


        
        
</div>
  


   
   



   
    
    <footer id="footer" >
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 footer-info">
                        <h3>Message Board</h3>
                        <p style="font-family: cursive; font-size: 10px;" >Sends Notifications to Bulletin Boards </p>
                    </div>
                    <div class="col-sm-3 footer-link">
                                            </div>
                    <div class=" col-sm-3 footer-contact">
                       
                    </div>
                    <div class="col-sm-3 footer-newsletter">
                        <h4>Project Guide</h4>
                        <p>  Suman Deb, CSE department,<br> NIT Agartala, Tripura</p>     
                        
                    </div>
                </div>
            </div>
        </div>
       <p class="copyright text-muted" >Copyright &copy; Notification Board(Vikash Kumar) - <?php echo date("Y"); ?></p>
    </footer>
</body>

</html>



<script type="text/javascript" src="jscolor/jscolor.js"></script>