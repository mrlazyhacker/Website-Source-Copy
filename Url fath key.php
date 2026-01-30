<?php
$keyfile="keys.json";
if(!file_exists($keyfile)) file_put_contents($keyfile,"{}");
$keys=json_decode(file_get_contents($keyfile),true);

$newkey = substr(md5(uniqid()),0,8);
$keys[$newkey]=0;
file_put_contents($keyfile,json_encode($keys));
?>
<!DOCTYPE html>
<html>
<head>
<title>Key Generator | MR LAZY</title>
<style>
body{
  background:#000;color:#0f0;
  font-family:monospace;
  display:flex;align-items:center;justify-content:center;height:100vh;
}
.box{
  border:1px solid #0f0;padding:30px;text-align:center;
  animation:glow 2s infinite alternate;
}
@keyframes glow{from{box-shadow:0 0 5px #0f0}to{box-shadow:0 0 20px #0f0}}
</style>
</head>
<body>
<div class="box">
<h2>Your Key</h2>
<h1><?php echo $newkey; ?></h1>
<p>Valid for one use only</p>
<p>Developer: MR LAZY</p>
</div>
</body>
</html>