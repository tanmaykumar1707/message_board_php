<?php
	require_once("../Database/db.php");



 if(isset($_POST['board_id']))
 {
 	$board_id = $_POST['board_id'];
 
$query="SELECT * FROM board_id where board_id='$board_id' ";
$result=mysqli_query($connection,$query);




if($result){
		  $rowcount=mysqli_num_rows($result);
		  if($rowcount>=1)
		  {
		  		$data['message'] = "Login Success Automatically..!";
		  		$data['status']	=	TRUE;
		  }
		  else
		  {

		  		$data['message'] = "Board id Not Exist Contact ADMIN";
		  		$data['status']	=	FALSE;

		  }
	}
	else
	{

		  		$data['message'] = "Oops!..Sorry, Please try Later..!";
		  		$data['status']	=	FALSE;

	}

print(json_encode($data));


 }

 else
 	echo "API Configured Wrong expect post Parameter as  'board_id'=?"

	


?>