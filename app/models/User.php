<?php 

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function cariUsername($username)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        $this->db->bind(':username', $username);

        $row = $this->db->rowCount();

        if ($row > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function tambahUser($data)
    {
        $this->db->query('INSERT INTO users(username, password, kode_level) VALUES (:username, :password, 2)');
        
        $this->db->bind(':username',$data['username']);
        $this->db->bind(':password',$data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($password, $username)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hash_password = $row->password;

        if (password_verify($password, $hash_password)) {
            return $row;
        } else {
            return false;
        }
    }
}
