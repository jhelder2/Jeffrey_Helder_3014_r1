<?php 
function register($useremail, $username, $userfname, $userlname, $userdob, $userpassword){

    $pdo = Database::getInstance()->getConnection();

    $check_exist_query = 'SELECT COUNT(*) FROM `tbl_users` WHERE user_email = :useremail';
    $user_set = $pdo->prepare($check_exist_query);
    $email_data = [
        ':useremail'=>$useremail
    ];

    $user_set->execute($email_data);

    if($user_set->fetchColumn()>0){
        
        return 'Email already in use';

    } else {

        $new_data = [
            'useremail' => $useremail,
            'username' => $username,
            'firstname' => $userfname,
            'lastname' => $userlname,
            'userdob' => $userdob,
            'userpassword' => $userpassword
        ];

        $newuser = 'INSERT INTO tbl_users (u_id, user_uname, user_password, user_email, user_fname, user_lname, user_dob, last_login, this_login, sub_date, log_attempt) VALUES (DEFAULT,"'. $username.'","'.$userpassword.'","'.$useremail.'","'.$userfname.'","'.$userlname.'","'.$userdob.'", CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, DEFAULT, 3)';
        $user_build = $pdo->prepare($newuser);
        $user_build->execute($new_data);
            
        return '<p>User registration completed! <a href="../index.php">Sign-in Here</a>!</p>';    
    }
}