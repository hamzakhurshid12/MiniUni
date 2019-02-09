<html>
<style>
th{
    background-color:gray;
}
</style>
<body>
<table style="border:1px solid black;">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Job Title</th>
<th>Emp Office Address</th>
<th>Reports To</th>
<th>Update</th>
</tr>
<?php
$servername="localhost";
$username="root";
$password="seecs@123";
$dbname="organization";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die("Connection failed:".mysqli_connect_error());
}

$sql="SELECT * FROM employee";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row["ID"]."</td><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td>".$row["Job Title"]."</td><td>".$row["Emp Office Address"]."</td><td>".$row["Reports To"]."</td>";
        echo "<td><a href=\"update.php?id=".$row["ID"]."\">Update</a> <a href=\"curd.php?operation=delete&id=".$row["ID"]."\">Delete</a>";
        echo "</tr>";
    }
}else{
    echo "0 results";
}
mysqli_close($conn);
?>

</table>
<br>
<button><a href="update.php">Add Record</a></button>
</body>
</html>