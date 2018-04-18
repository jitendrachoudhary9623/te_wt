<html>
<head>

</head>
<script src="js/angular.js"></script>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "te";

$arr=array();
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM login";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
     //   echo "id: " . $row["uname"]. "<br>";
$arr[]=$row;
    }
} 
//print json_encode($arr);
//$conn->close();
?>
<script>
var array=<?php echo json_encode($arr); ?>;
alert(array[0].uname);
</script>
<style>

.fm1{



}

.tab{

padding:3%;
width:100%;
}

.tab th{
border : 1px solid green;
padding:2%;
text-align:center;
background-color:red;
color:white;
}
.tab tr td{
border : 1px solid green;
padding:1%;
text-align:center;
}

</style>
<body>
<div ng-app="myApp" ng-controller="namesCtrl" class="fm1">
<table class ="tab">
<th>Username</th>
<th>Password</th>
<tr ng-repeat="user in array">
 <td >
    {{ user.uname }}
  </td>
<td>
{{user.pass }}
</td>
 <br>
</tr>
 

</div>

</body>
<script>
angular.module('myApp', []).controller('namesCtrl', function($scope) {
    $scope.array =array;
}); 
</script>
</html>

