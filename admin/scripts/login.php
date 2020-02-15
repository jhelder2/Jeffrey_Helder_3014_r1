<?php 
function login($username, $userpassword){

    $pdo = Database::getInstance()->getConnection();
//check if username exisits
    $check_exist_query = 'SELECT COUNT(*) FROM `tbl_users` WHERE user_uname = :username';
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username'=>$username
        )
    );
//if username exists then 
    if($user_set->fetchColumn()>0){
//check if password matches to username
        $check_exist_query = 'SELECT * FROM `tbl_users` WHERE user_uname = :username';
        $check_exist_query .=' AND user_password=:userpassword';
        $user_match = $pdo->prepare($check_exist_query);
        $login_data = [
            ':username'=>$username,
            ':userpassword'=>$userpassword
        ];
        $user_match->execute($login_data);

//if password matches
        while($founduser = $user_match->fetch(PDO::FETCH_ASSOC)){
//set "$this login" time 
            date_default_timezone_set("America/Toronto");
            $this_login = (date('Y-m-d H:i:s'));
//set "last_login" as the previous "this_login"
            $id = $founduser['u_id'];
            $laston = $founduser['this_login'];
            $lastlogin_update = 'UPDATE tbl_users SET last_login =:lastdata WHERE u_id = :id';
            $last_update = $pdo->prepare($lastlogin_update);
            $lastdata = [
                ':id'=>$id,
                ':lastdata'=>$laston
            ];
            $last_update->execute($lastdata);

//set new "this_login"
            $id = $founduser['u_id'];
            $update = 'UPDATE tbl_users SET this_login =:thislogin WHERE u_id = :id';
            $thislogin_update = $pdo->prepare($update);
            $data = [
                ':thislogin'=>$this_login,
                ':id'=>$id
            ];
            $thislogin_update->execute($data);
//pass varibles to homepage as array
            session_start();

            $id = $founduser['u_id'];
            $uname = $founduser['user_uname'];
            $upassword= $founduser['user_password'];
            $uemail = $founduser['user_email'];
            $user_fname = $founduser['user_fname'];
            $user_lname = $founduser['user_lname'];
            $user_dob = $founduser['user_dob'];
            $lastlogin = $founduser['last_login'];
            $thislogin = $founduser['this_login'];
            $subdate = $founduser['sub_date'];

            $_SESSION['user'] = [$id, $uname, $upassword, $uemail, $user_fname , $user_lname, $user_dob, $lastlogin, $thislogin , $subdate];
        }
//if $id is true
        if(isset($id)){

            redirect_to('admin/welcome.php');
//if password doesnt match            
        }else{
            
            return 'Wrong password. </br>**Account will be locked-out after 3 wrong attempts**';
        }
//if username doesnt exsist
    }else{
        return '<p>Username not found. </br>If new user <a href="/admin/user_signup.php">Register Here</a>!</p>';
    }
}
?>