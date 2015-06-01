<?php
try
{
  $pdo = new PDO('mysql:host=external-db.s189691.gridserver.com', 'db189691_mbread', 'MBreader');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
  $error = 'Unable to connect to the database server. <br>' . $e->getMessage();
  include 'error.html.php';
  exit();
}