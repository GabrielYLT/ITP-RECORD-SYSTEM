<?php
include("Connection.php");
$conn = $connect;
if($conn->connect_error) {
  exit('Could not connect');
}


$sql = "SELECT PName
FROM product WHERE PCode = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($PName);
$stmt->fetch();
$stmt->close();





echo "<div class='form-group' style='margin-bottom:0%;'>
                                    <label for='email'>Product Name </label>
                                    <input value='".$PName."' id='name' name='SubCategory' type'text' class='form-control validate' readonly>
										
                                </div>";

									
                               


?>