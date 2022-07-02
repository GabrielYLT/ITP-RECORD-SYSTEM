<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=itp", "root", "");

$output = '';

$query = '';

if(isset($_POST["query"]))
{
$search = str_replace(",", "|", $_POST["query"]);
 $query = "
 SELECT stock.PCode,product.PName,product.PImage,product.QType,product.CID,product.Stor,category.CName,SUM(stock.Qty) AS total_qty,stock.AID,admin.AName,stock.DateAdded,stock.Remarks,stock.Status
									FROM (((stock INNER JOIN product ON stock.PCode = product.PCode)INNER JOIN category ON product.CID = category.CID)INNER JOIN admin ON stock.AID= admin.AID)
 WHERE stock.PCode REGEXP '".$search."'
 OR product.PName REGEXP '".$search."' 
 OR category.CName REGEXP '".$search."'  
 OR product.Stor REGEXP '".$search."' 
 OR stock.DateAdded REGEXP '".$search."' 
 OR admin.AName REGEXP '".$search."' 
OR stock.Remarks REGEXP '".$search."' 
 OR stock.Status REGEXP '".$search."'
 group BY PCode,exp,AID,Status,DATE(DateAdded) ORDER BY DateAdded DESC
 ";
}
else
{
 $query = "SELECT stock.PCode,product.PName,product.PImage,product.QType,product.CID,product.Stor,category.CName,SUM(stock.Qty) AS total_qty,stock.AID,admin.AName,stock.DateAdded,stock.Remarks,stock.Status
									FROM (((stock INNER JOIN product ON stock.PCode = product.PCode)INNER JOIN category ON product.CID = category.CID)INNER JOIN admin ON stock.AID= admin.AID)
									group BY PCode,exp,AID,Status,DATE(DateAdded) ORDER BY DateAdded DESC

 ";
}

$statement = $connect->prepare($query);
$statement->execute();
$data = [];
while($row = $statement->fetch(PDO::FETCH_ASSOC))
{
 $data[] = $row;
}

echo json_encode($data);

?>
