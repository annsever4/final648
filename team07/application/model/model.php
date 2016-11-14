<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all songs from database
     */
    public function getListing($key, $order)
    {
	

        $sql = "SELECT listings.id, listings.address, listings.price, images.image FROM listings INNER JOIN images ON listings.image_id = images.id WHERE listings.address LIKE '%".$key."%'".
        " ORDER BY listings.".$order;
        $query = $this->db->prepare($sql);
        $query -> execute();



        return $query->fetchAll();
    }

    public function registerUser($user_email, $password_hash)
    {
        if($this->emailAlreadyExists($user_email)) {
            return null;
        } else {
            $sql = "INSERT INTO member_user (email,password_hash) VALUES (?,?)";
            $query = $this->db->prepare($sql);
            $query ->bindValue(1,$user_email);
            $query ->bindValue(2,$password_hash);
            $query ->execute();
        }
    }

    public function emailAlreadyExists($user_email){
    $sql = "SELECT member_user.email FROM member_user WHERE member_user.email = ?";
    $query = $this->db->prepare($sql);
    $query -> bindValue(1,$user_email);
    $query ->execute();
    if($query->rowCount() > 0){ #if row count = 0 the email doesn't exist in the database
        return true;
    }
    return false;
    }

    public function getPasswordHash($user_email){

        $sql = "SELECT member_user.password_hash FROM member_user WHERE member_user.email = ?";
        $query = $this->db->prepare($sql);
        $query -> bindValue(1,$user_email);
        return $query->fetch();

    }



}
