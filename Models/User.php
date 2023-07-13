<?php
class User {
    private $id;
    private $username;
    private $password;

    public function __construct(User $user)
    {
            $this->id = $user['id'];
            $this->username = @$user['username'];
            $this->password = @$user['password'];
    }
    
}