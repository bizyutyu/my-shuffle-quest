<?php
include_once("auth.inc");
auth();
?>

<!DOCTYPE html>

<html lang="ja">

<head>
<link rel="stylesheet" type="text/css" href="/penshu4_2020/67190223/ex15/ready.css">
<title>
確認画面
</title>
<meta charset="utf-8">
</head>

<body>

<h1>確認</h1>

<?php

@$con = pg_connect("host=kite.cs.miyazaki-u.ac.jp dbname=endb2022 user=enuser2022 password=???????");
if ($con == false){
  print("DATABASE CONNECTION ERROR\n");
  exit;
}

$sql1 = "select * from {$_SERVER['PHP_AUTH_USER']}";

@$result = pg_query($sql1);
if($result == false){
  print"DATA ACQUISITION ERROR\n";
  exit;
}

$n = 5;
$m = pg_num_rows($result);

for($i = 0; $i < $m; $i++){
  for($j = 0; $j < $n; $j++){
    $a[$i][$j] = pg_fetch_result($result,$i,$j);
  }
}

$id0 = $a[0][1];
$id1 = $a[1][1];
$id2 = $a[2][1];
$id3 = $a[3][1];
$id4 = $a[4][1];
$id5 = $a[5][1];


    $sql1 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id0} where id = 0";
    $sql2 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id1} where id = 1";
    $sql3 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id2} where id = 2";
    $sql4 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id3} where id = 3";
    $sql5 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id4} where id = 4";
    $sql6 = "update {$_SERVER['PHP_AUTH_USER']} set hplog = {$id5} where id = 5";

    @$result = pg_query($sql1);
     if($result == false){
        print"DATA ACQUISITION ERROR1\n";
        exit;
     }

     @$result = pg_query($sql2);
     if($result == false){
        print"DATA ACQUISITION ERROR2\n";
        exit;
     }

      @$result = pg_query($sql3);
     if($result == false){
        print"DATA ACQUISITION ERROR3\n";
        exit;
     }

      @$result = pg_query($sql4);
     if($result == false){
        print"DATA ACQUISITION ERROR4\n";
        exit;
     }

      @$result = pg_query($sql5);
     if($result == false){
        print"DATA ACQUISITION ERROR5\n";
        exit;
     }

      @$result = pg_query($sql6);
     if($result == false){
        print"DATA ACQUISITION ERROR6\n";
        exit;
     }

     pg_free_result($result);
     pg_close($con);


print "<a href=\"ready.php\">準備画面へ</a>\n";



?>
</form>

</body>
</html>
