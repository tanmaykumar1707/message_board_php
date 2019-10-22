<?php
	require_once("../Database/db.php");

    $query1="select * from board2 ORDER BY id DESC LIMIT 1 ";
	$result1=mysqli_query($connection,$query1);
    $message=mysqli_fetch_assoc($result1);
	if(!$result1){
		die("database query failed");
	}
else 
{
   if($message['board_id']==1)
   {
        
                print(json_encode($message));
                mysqli_free_result($result1);
               
   }
    else
    {
        
        if(isset($_POST['board_id']) && $_POST['board_id']!="" )
            {
                $board_id = $_POST['board_id'];
                $query="SELECT * FROM board2 where board_id= '$board_id' ORDER BY id DESC LIMIT 1";
                $result=mysqli_query($connection,$query);

                if(!$result){
                    die("database query failed");
                }

                $message=mysqli_fetch_assoc($result);
                print(json_encode($message));
                mysqli_free_result($result);
               

            } else
            {
                echo "API Configured Wrong expect post Parameter as  'board_id'=?";

            }
        
        
        
    }
}

 mysqli_close($connection);


?>