<?php
include("Connection.php");
$conn = $connect;
if($conn->connect_error) {
  exit('Could not connect');
}


$sql = "SELECT Pcode,PName
FROM product WHERE PCode = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($PCode,$PName);
$stmt->fetch();
$stmt->close();





echo "<div class='form-group' style='margin-bottom:0%;'>
                                    <label for='email'>Product Name </label>
                                    <input value='".$PName."' id='name' name='SubCategory' type'text' class='form-control validate' readonly>
										
                                </div>";
								
echo "<div class='form-group' style='margin-bottom:0%;'>
                                   <label for='expire'>Product Expire &nbsp; </label>
									<input  type='text' class='form-control selectList' autocomplete='off' list='exp1' placeholder='Please Choose The Correct Expiry Date' style='width:100%;Height:50%;' name='exp' id='exp' required>
									<datalist id='exp1'>" ;
									
									
									
									$sql1 = "SELECT * FROM stock WHERE PCode = '$PCode' AND Qty >='1' group BY exp ORDER BY exp DESC";
									$result = $conn->query($sql1);
									if ($result->num_rows > 0) {

									while($row = $result->fetch_assoc()) {
									$exp = $row["exp"];
									
									$RexpIn=mysqli_query($connect,"SELECT SUM(Qty) AS inStock FROM stock WHERE Status = 'Stock In' AND PCode = '$PCode' AND exp = '$exp' group BY exp,'$PCode'");
									$expIn = mysqli_fetch_assoc($RexpIn);
									
									$RexpOut=mysqli_query($connect,"SELECT SUM(Qty) AS outStock FROM stock WHERE Status = 'Stock Out' AND PCode = '$PCode' AND exp = '$exp' group By exp,'$PCode'");
									$expOut = mysqli_fetch_assoc($RexpOut);
									
									$in = $expIn["inStock"] ;
									$out = $expOut["outStock"];
									
									
									$subtotal = $in - $out ;

									
									if($subtotal != '0'){
									echo "<option value='" . $row["exp"]. "'>Current Qty : ".$subtotal ."</option> ";
									}
									
									}
									}else {echo "0 results found " ;}
									
									echo "</datalist></div>";
									
									
									
                               


?>