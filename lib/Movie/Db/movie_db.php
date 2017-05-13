<?php
namespace Movie\Db;


	
//USER FUNCTIONS
function read_user($pdo, $username) {
    	$stmt = $pdo->prepare("SELECT * FROM blog_members WHERE username = :username");
        $stmt->execute(['username' => $username]);
       // print_r($stmt);
	return $stmt->fetch();
}
