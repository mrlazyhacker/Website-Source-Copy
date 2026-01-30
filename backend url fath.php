<?php
$keyfile = "keys.json";
if(!file_exists($keyfile)) file_put_contents($keyfile,"{}");
$keys = json_decode(file_get_contents($keyfile),true);

if(isset($_GET['checkkey'])){
  $k=$_GET['checkkey'];
  if(isset($keys[$k]) && $keys[$k]==0){
    $keys[$k]=1;
    file_put_contents($keyfile,json_encode($keys));
    exit("OK");
  }
  exit("NO");
}

if(isset($_GET['url'])){
  $url = $_GET['url'];
  if(!filter_var($url,FILTER_VALIDATE_URL)) die("Invalid URL");

  $html = @file_get_contents($url);
  if(!$html) die("Failed to fetch");

  header("Content-Type: application/octet-stream");
  header("Content-Disposition: attachment; filename=source.html");
  echo $html;
}