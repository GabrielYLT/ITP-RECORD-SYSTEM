<?php
include("Connection.php");
$conn = $connect;
if($conn->connect_error) {
  exit('Could not connect');
}


$sql = "SELECT PCode
FROM product WHERE PName = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($PCode);
$stmt->fetch();
$stmt->close();





echo "<div class='form-group' style='margin-bottom:0%;'>
                                    <label for='email'>Product Code </label>
                                    <input value='".$PCode."' id='name' name='pcode' type'text' class='form-control validate' readonly>
										
                                </div>";

									
                               


?>