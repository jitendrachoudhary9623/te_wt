
 <?php  


 $connection = mysqli_connect("localhost", "root", "root", "te");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      	$uname =  mysqli_real_escape_string($connection,$data->uname);       
      	$pass =   mysqli_real_escape_string($connection,$data->pass);  
      	$hidden =  mysqli_real_escape_string($connection,$data->hidden);
 

	switch($hidden){
		case "insert":
//echo $hidden;
			insert($connection,$uname,$pass);
		break;
		case "update":
//echo $hidden;
			update($connection,$uname,$pass);
		break;
		case "delete":
//echo $hidden;
			delete($connection,$uname);
		break;
		case "read":
//echo $hidden;
			display($connection);
		break;

	}
} 
function insert($connection,$uname,$pass)
{
 $query = "INSERT INTO login VALUES ('$uname', '$pass')";  
      if(mysqli_query($connection, $query))  
      {  
           echo "Data Inserted...";  
      }  
      else  
      {  
           echo 'Error';  
      } 

}
function update($connection,$uname,$pass)
{
echo "Updating the data";
$query = "Update login set pass='$pass' where uname='$uname'";  
      if(mysqli_query($connection, $query))  
      {  
           echo "Data Inserted...";  
      }  
      else  
      {  
           echo 'Error';  
      } 

}
      
 
function delete($connection,$uname)
{
echo "Deleting DAta";
$sql="delete from login where uname='$uname'";
$result=$connection->query($sql);
if ($result === TRUE) {
    echo "Data Deleted ";
} else {
   echo "Failed";
}
}


 ?>  
