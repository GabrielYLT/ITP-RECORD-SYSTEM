
<?php

$connect = mysqli_connect("localhost","root","","itp");

if(!$connect)
{
		?>
		<script type="text/javascript">
		alert("Server Down");
		</script>
		<?php
	echo("Connect Unsuccessfully");
}

?>