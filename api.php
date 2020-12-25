<?php 
require_once('lib/db.php');

//lay ra toi da 5 tu
if(isset($_GET['get'])){
    $r=DP::run_query('SELECT id, word, definition, image FROM wordlist limit 5', [$_GET['get']], 2);
    echo json_encode($r);
    return;
}

if(isset($_GET['word']) && isset($_GET['definition']) && isset($_GET['img'])){
    $i=DP::run_query('INSERT INTO wordlist(word, definition, image) VALUES (?,?,?)', [$_GET['word'], $_GET['definition'], $_GET['img']], 3);
    $result= array("code"=>"200");
    echo json_encode($result);
    return;
}

//lay ra toi da 5 tu voi tu khoa bat dau = word
if(isset($_GET['word'])){
    $i=DP::run_query("SELECT id, word, definition FROM wordlist WHERE word like CONCAT(?, '%') limit 0,5", [$_GET['word']], 2);
    echo json_encode($i);
    return;
}

function updateImg(){
    // receive image as POST Parameter
    $image = str_replace('data:image/png;base64,', '', $_POST['image']);
    $image = str_replace(' ', '+', $image);
    // Decode the Base64 encoded Image
    $data = base64_decode($image);
    // Create Image path with Image name and Extension
    $file = '../images/' . "MyImage" . '.jpg';
    // Save Image in the Image Directory
    $success = file_put_contents($file, $data);
}

?>