
<?php /*open database connection*/
	require_once("Database/db.php");
?>

<?php /*inserting message using post method*/
	if(isset($_POST['name'])){
	 $message=mysqli_real_escape_string($connection,$_POST['name']);
	 $color=mysqli_real_escape_string($connection,$_POST['color']);
	 $video=(int)mysqli_real_escape_string($connection,$_POST['video']);
	 $textsize=(int)mysqli_real_escape_string($connection,$_POST['textsize']);
    $board_id=(int)mysqli_real_escape_string($connection,$_POST['board_id']);
        
	 $prequery="insert into board2 (fac_name,message,color,file,time,size,board_id) values ('Vikash Kumar','{$message}','{$color}','no','{$video}','{$textsize}','{$board_id}')";
	 $preresult=mysqli_query($connection,$prequery);
	 if(!$preresult){
		die("pre database query failed");
	}
	}


/*delete message and image from database using get method*/
	 if(isset($_GET['id'])){
		//echo var_dump($_GET);
		$delquery="DELETE FROM board2 WHERE id=".$_GET['id']." LIMIT 1";
		$delresult=mysqli_query($connection,$delquery);
	if(!$delresult){
		die("database query failed");
		}
	if(file_exists ("images/".$_GET['id'].".jpeg"))
		unlink ("images/".$_GET['id'].".jpeg");
	}




/*upload image file using post method*/
	if (isset($_FILES['file'])) {
		$query="SELECT * FROM board2 ORDER BY id DESC LIMIT 1";
		$lastresult=mysqli_query($connection,$query);
		if(!$lastresult){
			die("database query failed");
		}
		$last = mysqli_fetch_assoc($lastresult);
		$id=$last['id'];
		move_uploaded_file($_FILES["file"]["tmp_name"],
	      "images/".$id.".jpeg");
		if(file_exists ("images/".$id.".jpeg"))
		{
			$query="UPDATE board2 SET file='yes' WHERE id={$id}";
			$lastresult=mysqli_query($connection,$query);
			if(!$lastresult){
				die("database query failed");
			}
		}
	}
	/*if (isset($_FILES['video'])) {
		$query="SELECT * FROM board2 ORDER BY id DESC LIMIT 1";
		$lastresult=mysqli_query($connection,$query);
		if(!$lastresult){
			die("database query failed");
		}
		$last = mysqli_fetch_assoc($lastresult);
		$id=$last['id'];
	  move_uploaded_file($_FILES["video"]["tmp_name"],
	      "images/".$id.".mp4");
	}*/


/*get database row wise result*/

	$query="select * from board2 where fac_name='Vikash Kumar'";
	$result=mysqli_query($connection,$query);
	if(!$result){
		die("database query failed");
	}



	//echo var_dump($_POST);
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
                        <li><a class="active1" href="databases2.php">HOME</a></li>
                        <li><a href="board_id.php"> BOARD ID</a></li>
                            
                     
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
                            <h4>Send Notification to Board</h4>
                        </div>
                        <div class="panel-body ">

                            <div class="alert alert-danger  alert_setting text-center ">

                                <h4>
                                 <strong>Error!</strong> <span id="ajax_mssg"> </span></h4>
                            </div>

                            <form id="form" action=databases2.php method="post" enctype="multipart/form-data"  class="form-horizontal">
                                           
                                             <div class=" form-group ">
                                                <label for="category" class="control-label col-sm-3">Board Id: </label>
                                                <div class="col-sm-4">
                                                  
                                                  <select class="form-control" name="board_id" required>
                                                    <option value="">Select Board Id</option>
                                                    <?php
                                                    $sql = mysqli_query($connection, "SELECT * From board_id");
                                                    $row = mysqli_num_rows($sql);
                                                    while ($row = mysqli_fetch_array($sql)){
                                                    echo "<option value='". $row['board_id'] ."'>" .$row['board_id'] ."(".$row['board_name'] .")</option>" ;
                                                    }
                                                    ?>
                                                        <option value="1">Select All Devices  </option>
                                                    </select>


                                                </div>
                                            </div>            
                                
                                            <div class=" form-group ">
                                                <label for="category" class="control-label col-sm-3">Text: </label>
                                                <div class="col-sm-4">
                                                   <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                  <textarea rows="4" cols="50" name="name" placeholder="Enter text here..." class="form-control"></textarea>


                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="email" class="control-label col-sm-3">Color: </label>
                                               <div class="input-group col-sm-6">
                                                   
                                                    <input id="djf" name="color" class="color" class="form-control">
                                                   
                                                </div>
                                            </div>
                                            
                                           
                                
                                        <div class="form-group">
                                                <label for="email" class="control-label col-sm-3">Image: </label>
                                               <div class="input-group col-sm-6">
                                                    <input type="file" name="file" id="file" class="form-control">
                                                    
                                                </div> 
                                            </div>
            
                                            <input type="number" name="textsize" value="22" hidden>
                                            <select name="video" hidden>
                                              <option value="1">no</option>
                                              <option value="2">yes</option>
                                             </select>


                                            <center> <input  type="submit" name="submit" value="SEND" cass="btn btn-primary">
                                                
                                            </center>

                            </form>

                        </div>
                        <!-- End of Panel body div-->

                    </div>    <!--                    Panel Ending-->             
            </div><!--                Col Sm 12-->
        </div>  
<!--        END ROW-->
        
        <h3>Previous Notifications : </h3>
        
        
        <h4>
        <table class="table table-striped">
    <thead>
      <tr>
        <th>Message</th>
        <th>Image</th>
        <th>Board Id</th>
      </tr>
    </thead>
             <tbody>
             <?php


    
while($row = mysqli_fetch_assoc($result)){
	//var_dump($row);
    
	$idwhile=$row['id'];
    ?>
             <tr >  
               
                <td>
                 <?php 
                	echo $row['message'];
                ?>
                 
                 
                 </td>
                 <td>
                 <?php 
                        if(file_exists ("images/".$idwhile.".jpeg")){
                        $imginfo=getimagesize("images/".$idwhile.".jpeg");
                            if($imginfo[1]>100){
                                $imginfo[0]=$imginfo[0]/$imginfo[1]*100;
                                $imginfo[1]=100;
                            }
                            if($imginfo[0]<100){
                                ;$imginfo[1]=$imginfo[1]/$imginfo[0]*100;
                                $imginfo[0]=100;
                            }
                            echo "<img src='images/".$idwhile.".jpeg' height='".(int)$imginfo[1]."' width='".(int)$imginfo[0]."'>";
                            } else 
                     echo "No Image ";  
                     ?>       
                 </td>
              
                   <td><?php  echo $row['board_id']; ?> </td>  
                 
                 <td> 
                 
                 <?php  echo  "<a class='btn btn-danger'id=\"link\" href=\"?id=".$idwhile."\">delete</a>";  
                     ?>
                 </td>
                 
                 </tr>
                
        <?php     
}
mysqli_free_result($result);
             
?>
   </tbody>
  </table>    
    
    </h4>
 
<?php
    
//while($row = mysqli_fetch_assoc($result)){
//	//var_dump($row);
//    echo "<div id=\"message\">";
//	$idwhile=$row['id'];
//    
//	if(file_exists ("images/".$idwhile.".jpeg")){
//	$imginfo=getimagesize("images/".$idwhile.".jpeg");
//		if($imginfo[1]>100){
//			$imginfo[0]=$imginfo[0]/$imginfo[1]*100;
//			$imginfo[1]=100;
//		}
//		if($imginfo[0]<100){
//			;$imginfo[1]=$imginfo[1]/$imginfo[0]*100;
//			$imginfo[0]=100;
//		}
//		echo "<img src='images/".$idwhile.".jpeg' height='".(int)$imginfo[1]."' width='".(int)$imginfo[0]."'>";
//        
//		
//	
//	}
//        
//
//		echo "  Message: ".$row['message']."  ";
//            echo " Board Id: ".$row['board_id'];
//        echo " &nbsp; <a class='btn btn-danger'id=\"link\" href=\"?id=".$idwhile."\">delete</a>";
//        
//    
//    echo "</div><br>";
//}
//mysqli_free_result($result);
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