<?php
include ("Connection.php");

 if(isset($_GET["print"]))
{
	$start=$_GET["start"];
	$end=$_GET["end"];
	$cat=$_GET["cat"];
	
}
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
if(!empty($_GET["start"]) && !empty($_GET["end"]) && !empty($_GET["cat"]))
{
	$result1=mysqli_query($connect,"SELECT *FROM category WHERE CID = '$cat'");
	$row1 = mysqli_fetch_assoc($result1);
	$fileName =    $row1["CName"] . "_Report.xlsx"; 

}else{
	
	$fileName =  	"Report.xlsx"; 
}
	
 
// Column names 
$fields = array('Product Code', 'Product Name', 'Quantity', 'Added On','Added By', 'Remarks','Status'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 

 
// Fetch records from database 
$query = $connect->query("SELECT stock.PCode,product.PName,product.PImage,product.QType,product.CID,category.CName,SUM(stock.Qty) AS total_qty,Stock.AID,admin.AName,stock.DateAdded,stock.Remarks,stock.Status
									FROM (((stock INNER JOIN product ON stock.PCode = product.PCode)INNER JOIN category ON product.CID = category.CID)INNER JOIN admin ON stock.AID= admin.AID)
									WHERE product.CID = '$cat' AND DATE(DateAdded) BETWEEN '$start' AND '$end' group BY PCode,Status,AID ORDER BY DateAdded"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        
        $lineData = array($row['PCode'], $row['PName'], $row['total_qty'] . $row['QType'], $row['DateAdded'],$row['AName'],$row['Remarks']. $row['Status']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    }

}else{
	
	$query = $connect->query("SELECT stock.PCode,product.PName,product.PImage,product.QType,product.CID,category.CName,SUM(stock.Qty) AS total_qty,Stock.AID,admin.AName,stock.DateAdded,stock.Remarks,stock.Status
									FROM (((stock INNER JOIN product ON stock.PCode = product.PCode)INNER JOIN category ON product.CID = category.CID)INNER JOIN admin ON stock.AID= admin.AID)
									WHERE DATE(DateAdded) BETWEEN '$start' AND '$end' group BY PCode,Status,AID ORDER BY DateAdded"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        
        $lineData = array($row['PCode'], $row['PName'], $row['total_qty'] . $row['QType'], $row['DateAdded'],$row['AName'],$row['Remarks']. $row['Status']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    }
}
}
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;

?>