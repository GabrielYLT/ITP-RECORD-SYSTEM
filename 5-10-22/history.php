<?php
include("Connection.php");
session_start();
error_reporting(0);
?>
<?php
if(!isset($_SESSION['id']))
{
?>
    <script>
    alert("Please login. Thank you!!!");
    </script>
    <?php
    header("refresh:0.001;url=login.php");
    //exit();
	
	
}else{
	$Admin_id=$_SESSION['id'];
$result=mysqli_query($connect,"SELECT *FROM admin WHERE AID = $Admin_id");
$row = mysqli_fetch_assoc($result);
	if(($row['Department'])!='All Department')
{	
?>
    <script>
    alert("You Are Not Authorize To Access This Page!!!");
    </script>
    <?php
    header("refresh:0.001;url=generalD.php");
    //exit();
	
}
}

if(isset($_GET["details"])){
$ad_id=$_GET['id'];	
$result=mysqli_query($connect,"SELECT * FROM category WHERE CID='$ad_id'");
$row=mysqli_fetch_assoc($result);}
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $row["CName"]." List" ?></title>
	 <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-typeahead.css" />
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>		
	<link rel="icon" type="image/x-icon" href="images/icons/d.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<!-- CSS Files -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/now-ui-dashboard.css" rel="stylesheet" />
		<!-- CSS Files -->
  <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />
		<!-- https://fontawesome.com/ -->
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<!-- https://getbootstrap.com/ -->
		<link rel="stylesheet" href="css/tooplate.css">

		
 
 

<style>
/* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 2px grey; 
  border-radius: 5px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: grey; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #fff; 
}

label {
	color:black;
}
</style>
  <style>
  .bootstrap-tagsinput {
   width: 99%;
   font-size: 20px;
   text-align: center;
   
  }
  </style>
		</head>
	
	<body>
<div class="wrapper"  style="overflow:hidden;height:100%" >
    <div class="sidebar" data-color="pink">
	
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="dashboard.php" class="simple-text logo-mini" style="font-size:15px;">
          JMM
        </a>
        <a href="dashboard.php" class="simple-text logo-normal" style="font-size:15px;">
          RECORD SYSTEM
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper" >
        <ul class="nav">
          <li>
            <a href="dashboard.php">
              <i class="now-ui-icons education_paper "></i>
              <p style="font-size:15px;">Dashboard</p>
            </a>
          </li>
          <li>
            <a>
              <i class="now-ui-icons design_bullet-list-67"></i>
              <h3 class="dropdown-header" style="color:white;font-size:15px">Category</h3>
			</a>
			<?php 
			
			$conn = $connect;
			
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
			$sql3 = "SELECT * FROM category ";
			$result3 = $conn->query($sql3);
			if ($result3->num_rows > 0) {
			while($row3 = $result3->fetch_assoc()) {
				
			echo "<ul class='nav' style='padding'>";
			echo "<li><a class='dropdown-item' style='width:80%;margin-left:13%;margin-top:-5%;font-size:11px;' href='list.php?details&id=". $row3["CID"]."'><i class='now-ui-icons design_palette'></i>". $row3["CName"]. "</a></li></ul> </li>";
			
			}
			} 
			?>
			<li>
				<a href="history.php">
				  <i class="now-ui-icons files_paper"></i>
				  <p style="font-size:15px;">History</p>
				</a>
			</li>
          </li>
		   <li>
            <a href="admin_list.php">
              <i class="now-ui-icons users_circle-08"></i>
              <p style="font-size:15px;">Admin List</p>
            </a>
          </li>
          <li>
            <a href="manage.php">
              <i class="now-ui-icons loader_gear"></i>
              <p style="font-size:15px;">Manage</p>
            </a>
          </li>
        </ul>
	  </div>
    </div>
    <div class="main-panel" id="main-panel" style="height:100%;background-image: url('images/bg.jpg');background-size: cover;background-attachment: fixed;">
		<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute" style="opacity:1;">
			<div class="container-fluid">
			    <div class="navbar-wrapper">
					<div class="navbar-toggle">
					    <button type="button" class="navbar-toggler">
							<span class="navbar-toggler-bar bar1"></span>
							<span class="navbar-toggler-bar bar2"></span>
							<span class="navbar-toggler-bar bar3"></span>
					    </button>
					</div>
			    </div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar navbar-kebab"></span>
					<span class="navbar-toggler-bar navbar-kebab"></span>
					<span class="navbar-toggler-bar navbar-kebab"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navigation">
					<ul class="navbar-nav">
					    <li class="nav-item">
						  <Tooltip title="Profile">
							<a class="nav-link" href="viewProfile.php">
							    <i class="now-ui-icons users_single-02"></i>
							    <p>
									<span class="d-lg-none d-md-block">Profile</span>
							    </p>
							</a>
						  </Tooltip>
					    </li>
						<li class="nav-item">
						  <Tooltip title="Logout">
							<a class="nav-link" href="logout.php">
							    <i class="now-ui-icons media-1_button-power"></i>
							    <p>
									<span class="d-lg-none d-md-block">Logout</span>
							    </p>
							</a>
						  </Tooltip>
					    </li>
					</ul>
			    </div>
			</div>
        </nav>
		<div><br><br><br><br><br></div>
			<!-- row -->
            <div class="row tm-content-row tm-mt-big" style="font-family: 'Lato', sans-serif;padding-left:1%;padding-top:3%;padding-right:1%;padding-bottom:1%;">
                <div class="col-xl-20 col-lg-12 tm-md-12 tm-sm-12 tm-col" style="padding-top:auto%;margin: auto; margin-bottom:2%;">
                    <div class="tm-block h-100" style="border-radius:10px;border-style: groove;background-color: #ffffff;opacity: 75%;">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
							
							<h2 class="tm-block-title d-inline-block" style="margin-left:3%;margin-top:2%;color:black;font-weight:bold;font-size:40px;">History</h2>
						
                            </div>
							
							<hr>
<div class="form-group">
    <div class="row">
     <div class="col-md-12">
<h6 style="margin-left:auto%;margin-top:auto%;"class="text-white text-capitalize ps-3"><input  autocomplete=off id="tags" type="text" data-role="tagsinput" placeholder="&nbsp; &nbsp; &nbsp;Enter Keywords Here" ></h6>
<h6 style="margin-left:auto%;margin-top:auto%;"class="text-white text-capitalize ps-3"><button type="button" style="width:99%;height:35px;margin-left:autos%;border-radius:10px;border-style: none;text-align:center;font-size:30px;height:55px;"name="search" class="btn btn-primary" id="search" style="float:right">Search</button></h6>

</div>
</div>
</div>

                        </div>
						<hr>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped tm-table-striped-even mt-3">
                                <thead>
                                    <tr class="tm-bg-gray">
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;font-size:25px;">Code</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;font-size:25px;">Image</th>
                                        <th scope="col" style="text-align:center;color:black;font-weight:bold;font-size:25px;">Name</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;font-size:25px;">Category</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;font-size:25px;">Quantity</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;font-size:25px;">Added On</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;font-size:25px;">Added By</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;font-size:25px;">Remarks</th>
										<th scope="col" style="text-align:center;color:black;font-weight:bold;font-size:25px;">Status</th>
										
										
                                    </tr>
                                </thead>
                                <tbody id="myTable">
    
                                </tbody>
                            </table>
                        </div>
            </div>
        </div>
    </div>
		
		

  </div>
   <div style="clear:both"></div>
  <br />
  
  <br />
  <br />
  <br />
	</body>
</html>
<script>
$(document).ready(function(){
 
 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   dataType:"json",
   success:function(data)
   {
    $('#total_records').text(data.length);
    var html = '';
    if(data.length > 0)
    {
     for(var count = 0; count < data.length; count++)
     {
      html += '<tr>';
      html += '<td style="text-align:center;color:black;font-weight:bold;font-size:18px;">'+data[count].PCode+'</td>';
	  html += '<td  style="text-align:center;color:black;font-weight:bold;font-size:18px;"><img width="125px" src="images/'+data[count].PImage+'"></td>';
      html += '<td style="text-align:center;color:black;font-weight:bold;font-size:18px;">'+data[count].PName+'</td>';
      html += '<td style="text-align:center;color:black;font-weight:bold;font-size:18px;">'+data[count].CName+'</td>';
      html += '<td style="text-align:center;color:black;font-weight:bold;font-size:18px;">'+data[count].total_qty+'</td>';
	  html += '<td style="text-align:center;color:forestgreen;font-weight:bold;font-size:18px;">'+data[count].DateAdded+'</td>';
	  html += '<td style="text-align:center;color:black;font-weight:bold;font-size:18px;">'+data[count].AName+'</td>';
	  html += '<td style="text-align:center;color:black;font-weight:bold;font-size:18px;">'+data[count].Remarks+'</td>';
	  if(data[count].Status =='Stock In'){
      html += '<td class="align-middle text-center text-sm" style="width:10%;"> <span class="badge badge-sm bg-gradient-success" style="font-size:10px;">'+data[count].Status+'</span></td></tr>';
      }else{
		html += '<td class="align-middle text-center text-sm " style="width:10%;"> <span class="badge badge-sm bg-gradient-danger" style="font-size:10px;">'+data[count].Status+'</span></td></tr>';
		  
	  }
     }
    }
    else
    {
     html = '<tr><td colspan="5">No Data Found</td></tr>';
    }
    $('tbody').html(html);
   }
  })
 }

 $('#search').click(function(){
  var query = $('#tags').val();
  load_data(query);
 });

});
</script>
	