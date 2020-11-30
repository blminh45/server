<?php 
require_once('lib/db.php');
// $r=DP::run_query('SELECT `id`, `NoiDung`, `MucDo`, `DapAn1`, `DapAn2`, `DapAn3`, `DapAn4`, `DA_Dung` FROM `question` WHERE `MucDo`=?',[$_GET['DoKho']],2);
if(isset($_GET['get'])){
    $r=DP::run_query('SELECT id, word, definition FROM wordlist', [$_GET['get']], 2);
    echo json_encode($r);
}

if(isset($_GET['word']) && isset($_GET['definition'])){
    $i=DP::run_query('INSERT INTO wordlist(word, definition) VALUES (?,?)', [$_GET['word'], $_GET['definition']], 3);
    $result= array("code"=>"200");
    echo json_encode($result);
}

?>