<?php
$server="localhost";
$user="root";
$pass="root";
$db_name="te";


$q = $_GET['q'];
$connection=new mysqli($server,$user,$pass,$db_name);
$sql="SELECT * FROM login WHERE uname like '%$q%';";
$result=$connection->query($sql);
if($result->num_rows>0){
echo "<br>";
while($row=$result->fetch_assoc()){
echo "<br>username: ".$row["uname"]."<br> password: " .$row["pass"]."<br>";
}
}
else{
echo"0 results";
}
$connection->close();

?>
