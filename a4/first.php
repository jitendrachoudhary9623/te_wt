<?php
$server="localhost";
$user="root";
$pass="root";
$db_name="te";

$connection=new mysqli($server,$user,$pass,$db_name);

$hidden=$_POST['hidden'];

$uname=$_POST['uname'];
$password=$_POST['pass'];
/*$q = $_REQUEST["q"];

if($q!=null)
{
find($connection,$q)
}
if($hidden==="create"){
echo $hidden;
}
*/
switch($hidden){
case "create":
//echo $hidden;
insert($connection,$uname,$password);
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

function insert($connection,$uname,$password)
{
echo "Inserting the data";
$sql="insert into login values('$uname','$password');";
$result=$connection->query($sql);
if ($result === TRUE) {
    echo "Data Inserted -> Success";
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
if($result->num_rows>0){
echo "<br><table><th>Username</th><th>Password</th>";
while($row=$result->fetch_assoc()){
echo "<tr><td>".$row["uname"]."</td><td> " .$row["pass"]."</td></tr>";
}
}
else{

}
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

$connection->close();
?>
