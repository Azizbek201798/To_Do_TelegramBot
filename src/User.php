<?php

declare(strict_types=1);

class User{

    private $pdo;

    public function __construct(){
        $this->pdo = DB::connect();
    }
    
    public function isUserExists(string $email){
        $user = $this->pdo->prepare("SELECT * FROM users WHERE email = :email;");
        $user->bindParam(":email",$email);
        $user->execute();
        if(count($user->fetchAll()) > 0){
            echo "User already registered!";
            return true;
        } else {
            return false;
        }
    }

    public function register(string $email,string $password)    
    {
        $info = $this->isUserExists($email);
        if(!$info){
            $db = DB::connect();
            $stmt = $db->prepare('INSERT INTO users(email,password) VALUES(:email,:password);');
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':password',$password);
            $result = $stmt->execute();
        if ($result){
            $_SESSION['user'] = $email;
            header("Location: /");
        } else{
            echo "Error occured!";
        }
    }
    }
    
    public function login(string $email,string $password){
        $user = $this->pdo->prepare("SELECT * FROM users WHERE email = :email and password = :password");
        $user->bindParam(":email",$email);
        $user->bindParam(":password",$password);
        $user->execute();
        if($user->fetch(PDO::FETCH_ASSOC)){
            $_SESSION['user'] = $email;
            header("Location: /");
        }else{
            $_SESSION['login_error'] = "Email or password is incorrect!";
            header("Location: /");
        }
    }
} 