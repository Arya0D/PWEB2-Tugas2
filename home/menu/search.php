<?php


$x = $_POST['nama'];
$y = $_GET['menu'];

header("location: .?menu=$y&nama=$x");