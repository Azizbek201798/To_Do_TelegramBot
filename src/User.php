<?php

declare(strict_types=1);

class User{

    private $pdo;

    public function __construct(){
        $this->pdo = DB::connect();
    }
    public function create(string $email,string $password)    
    {
        $user = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $user->bindParam(":email",$email);
        $user->execute();
        if(count($user->fetchAll())>0){
            echo "User already exists";
        }
        $db = DB::connect();
        $stmt = $db->prepare('INSERT INTO users(email,password) VALUES(:email,:password);');
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',$password);
        $result = $stmt->execute();
    
        return $result ? "New record added with success" : "Something went wrong";
    }
    
    public function login(string $email,string $password){
        $user = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $user->bindParam(":email",$email);
        $user->bindParam(":password",$password);
        $user->execute();
        if(count($user->fetchAll())>0){
            echo "User already exists";
        }
                
    }
}