<?php session_start();

   		include "anti_xss.php";

		//    $name=mysqli_real_escape_string($db,$name);
		//    $pw=mysqli_real_escape_string($db,$pw);

    		$connection = new Mongo();
    		$db = $connection->antiblog;
    		$collection = $db->profiles;
            $collection2 = $db->users;

            $username = $_SESSION['name'];
            $first = $_POST['first'];
            $last = $_POST['last'];
            $interest = $_POST['interest'];
            $dob = $_POST['dob'];
            $about = $_POST['about'];
            $pw = $_POST['password'];

            $query = array("username"=>$username);
            $query2 = array("username"=>$username, "first"=>$first, "last"=>$last, "interest"=>$interest, "dob"=>$dob, "about"=>$about);
            if($pw != null){
                $query3 = array("password"=> sha1($pw));
                $collection2->update($query, $query3, true);
                $_SESSION['pw'] = $pw;
            }
            $collection->update($query, $query2, true);

//echo $username;
            header("Location: profile.php");
            exit;

    		/*$cursor = $collection->find();
    		$error = FALSE;
    		foreach($cursor as $obj){
        		if($obj["username"] == $name){
            			$error = TRUE;
        		}
    		}
    		if($error == FALSE){
        		$obj= array("username"=>$name, "password" => sha1($pw));
        		$collection->insert($obj);
   	    	}*/
/*
first
last
interest
dob
about
*/
	?>



