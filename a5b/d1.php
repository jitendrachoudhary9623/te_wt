<html>
<head>

</head>
<script src="js/angular.js"></script>
<script>
var app = angular.module("myapp",[]);  
 app.controller("controller", function($scope, $http){  
      $scope.deleteData = function(){ 
alert("Deleted"); 
           $http.post(  
                "php/first.php",  
                {'uname':$scope.uname, 'pass':'','hidden':'delete'}  
           ).success(function(data){  
                alert(data);  
                $scope.uname = null;  
                $scope.pass = null;  
 $scope.hid = null;  
           });  
      }  
 });  
</script>
<style>


#submit{

margin-left:5%;
width:90%;
background-color:red;
color:white;
font-size:22px;
font-family:arial;
padding:1%;
}
#submit:hover{

margin-left:2.5%;
width:95%;
background-color:green;
color:white;
}

.fm1{
margin:8%;
border : 3px solid green;
padding:5%;
}

input[type='text']{
padding:0.5%;
width:100%;
}
</style>
<body>
<h1>Delete</h1>
                <div ng-app="myapp" ng-controller="controller" class="fm1">  
                    
                     <input type="text" name="uname" ng-model="uname" placeholder="Enter Username" />  
                    
                                      <br />  
                     <br />  
                     <input type="submit" ng-click="deleteData()" value="Delete" id="submit"/>  
                </div> 
</body>

</html>

