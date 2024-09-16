<?php
$secret_key = "secretkey"; // Your Private Key that's used for ShareX connection
$sharexdir = "archive/"; // where are your images stored
if(isset($_POST['user'])) {
    if($_POST['user'] == "username") { //new user name 
        global $sharexdir;
	$sharexdir = "archive/otheruser"; //where you can add another user 
    }
}

$domain_url = 'domain'; // Your domain name

if(isset($_POST['secret'])) {
    if($_POST['secret'] == $secret_key) {
        $target_file = $_FILES["sharex"]["name"];
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
	if (move_uploaded_file($_FILES["sharex"]["tmp_name"], $sharexdir.$target_file)) {
            echo $domain_url.$sharexdir.$target_file;
        }
        else {
           echo "An error occured.";
        }
    }
    else {
        echo 'Invalid Secret Key';
    }
}
else {
    echo 'No data recieved. This is a ShareX Server, its open source, go check it out <a href="https://github.com/lanoow/sharex">here.</a>';
}
?>
