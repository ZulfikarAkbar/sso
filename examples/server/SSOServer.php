
<?php

use Jasny\ValidationResult;
use Jasny\SSO;

class SSOServer extends SSO\Server {
    static $brokers = array(
        'siakad' => array('secret'=>'siakad123'),
        'sidos' => array('secret'=>'sidos123'),
    );
    // private static $usr = array (
    //     'med' => [
    //         'fullname' => 'Med Irzal',
    //         'email' => 'med@mail.com',
    //         'password' => '$2y$10$lVUeiphXLAm4pz6l7lF9i.6IelAqRxV4gCBu8GBGhCpaRb6o0qzUO', 
    //         'role' => 'Dosen'
    //     ],
    //     'zul' => [
    //         'fullname' => 'Zulfikar Akbar',
    //         'email' => 'zul@mail.com',
    //         'password' => '$2y$10$RU85KDMhbh8pDhpvzL6C5.kD3qWpzXARZBzJ5oJ2mFoW7Ren.apC2', 
    //         'role' => 'Mahasiswa'
    //     ],
    // );

    
    protected function getBrokerInfo($brokerId){
        require "koneksi_broker.php";
        $table = $koneksi->query("SELECT * from TB_BROKER");
        while($row = $table->fetch_assoc()){
            $brokerId= $row ['broker_id'];
            $secret = $row ['secret'];
            $broker [ $brokerId ] = ['secret' => $secret] ;

            $id = [$brokerId];
            for($i=0;$i<count($id); $i++){
                if($brokerId == $id[$i]){
                    $brokerId = $id[$i]; return $broker[$brokerId];
                }
            }
            // if(!isset($broker[$brokerId])) return null;
            // return $broker[$brokerId];
        }
        
    }
    
    protected function getUserInfo($username){
        require "koneksi_user.php";
        $table = $koneksi->query("SELECT * from TB_USER");
        while($row = $table->fetch_assoc()){
            $username= $row ['username'];
            $fullname = $row ['fullname'];
            $email = $row ['email'];
            $role = $row ['role'];
            $password = $row ['password'];
            $usr [ $username ] = ['fullname' => $fullname, 'email' => $email, 'role'  => $role, 'password' => $password] ;
            $user = compact('username') + $usr[$username];
            unset($user['password']);
            return $user;
        }
        
        // foreach($table as $row){
        //     $username= $row ['username'];
        //     $fullname = $row ['fullname'];
        //     $email = $row ['email'];
        //     $role = $row ['role'];
        //     $password = $row ['password'];
        //     $usr [ $username ] = ['fullname' => $fullname, 'email' => $email, 'role'  => $role, 'password' => $password] ;
        //     $user = compact('username') + $usr[$username];
        //     unset($user['password']);
        //     return $user;
        // }
        
    }

    protected function authenticate($username, $password){
        if (!isset($username) && !isset($password)) return ValidationResult::error("Please type your username & password");
        require "koneksi_user.php";
        $table = $koneksi->query("SELECT * from TB_USER");
        while($row = $table->fetch_assoc()){
            $username= $row ['username'];
            $passwd = $row ['password'];
            $usr [ $username ] = ['password' => $passwd] ;
            
            $arr_col_passwd = array_column($usr,'password');
            $arrs[] = $arr_col_passwd;
        }
        $s = $arrs[0];
        $i = 0;
        for($i=0;$i<count($s);$i++){
            if (!password_verify($password, $s[$i])) return ValidationResult::error("Unvalid password");
        }
        // foreach($arrs as $arr){
        //     for($i=0;$i<count($arr);$i++){
        //         if (!isset($usr [ $username ]) || !password_verify($password, $arr[$i])) return ValidationResult::error("Unvalid password");
        //     }
        // }
        return ValidationResult::success("O. K.");
    }
}

// $arr_key = array_keys($uname);
            // foreach($arr_key as $key){
            //     $arrs = [$key];
            //     for($f=0; $f<count($key); $f++){
            //         $users[$key[$f]] = ['fullname' => $fullname, 'email' => $email, 'role'  => $role, 'password' => $passwd] ;
            //         $user = compact('username') + $usr[$uname];
            //         if($users[$key[$f]] != $username){
            //             return ValidationResult::error("Kredensial tidak valid!");
            //         }
            //     }
            // }
