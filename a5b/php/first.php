
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


/*
function update($connection,$uname,$pass)
{
echo "Updating the data";
$sql="Update login set pass='$pass' where uname='$uname';";
$result=$connection->query($sql);
if ($result === TRUE) {
    echo "Record updated ";
} else {
   echo "Failed";
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

function display($connection)
{
$sql="SELECT * FROM login;";
$result=$connection->query($sql);
$ar=new array();
if($result->num_rows>0){

while($row=$result->fetch_assoc()){
echo $row["uname"];
}
}
else{

}
print json_encode($ar)
}
function find($connection,$q)
{
$sql="SELECT * FROM login where uname like '$q%';";
$result=$connection->query($sql);
if($result->num_rows>0){
echo "<br><table><th>Username</th><th>Password</th>";
while($row=$result->fetch_assoc()){
echo "<tr><td>".$row["uname"]."</td><td> " .$row["pass"]."</td></tr>";
}
echo "</table>";
}
else{
echo"0 results";
}
}
*/
 ?>  
