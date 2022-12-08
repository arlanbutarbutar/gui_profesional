<?php 
  $conn=mysqli_connect("localhost","root","","gui");
  if (!$conn) {
	  header('Location: ../gui-config'); exit();
  }