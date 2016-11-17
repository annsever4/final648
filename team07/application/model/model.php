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
    public function getListing($key, $order=null)
    {
        //tests if sort has been selected
        if($order) {
            $sql = "SELECT listings.id, listings.address, listings.price, images.image FROM listings INNER JOIN images ON listings.image_id = images.id WHERE listings.address LIKE '%" . $key . "%'"." ORDER BY listings.".$order;
        } else {
            $sql = "SELECT listings.id, listings.address, listings.price, images.image FROM listings INNER JOIN images ON listings.image_id = images.id WHERE listings.address LIKE '%" . $key . "%'";
        }

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


    public function registerUser($user_email, $password_hash , $first_name, $last_name ,$phone_number)
    {
        if ($this->emailAlreadyExists($user_email)) {
            return null;
        } else {
            $sql = "INSERT INTO member_user (email, password_hash, first_name, last_name, phone_number) VALUES (?, ?, ?, ?, ?)";
            $query = $this->db->prepare($sql);
            //binds values to ? place holders
            $query->bindValue(1, $user_email);
            $query->bindValue(2, $password_hash);
            $query->bindValue(3, $first_name);
            $query->bindValue(4, $last_name);
            $query->bindValue(5, $phone_number);
            //executes query
            $query->execute();
        }
    }


    public function emailAlreadyExists($user_email)
    {
        $sql = "SELECT member_user.email FROM member_user WHERE member_user.email = ?";
        $query = $this->db->prepare($sql);
        $query->bindValue(1, $user_email);
        $query->execute();
        if ($query->rowCount() > 0) { #if row count = 0 the email doesn't exist in the database
            return true;
        }
        return false;
    }


    public function getPasswordHash($user_email)
    {
        $sql = "SELECT member_user.password_hash FROM member_user WHERE member_user.email = ?";
        $query = $this->db->prepare($sql);
        $query->bindValue(1, $user_email);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getMemberUsersName($user_email)
    {
        //prepare query to retrieve first and last name from database
        $sql = "SELECT member_user.first_name, member_user.last_name FROM member_user WHERE member_user.email = ?";
        $query = $this->db->prepare($sql);
        $query->bindValue(1,$user_email);

        //execute query
        $query->execute();

        //fetch result
        $result = $query->fetch(PDO::FETCH_OBJ);

        $name = $result->first_name. " " .$result->last_name;

        return $name;
    }

    public function getMemberUserPhoneNumber($user_email)
    {
        $sql = "SELECT member_user.phone_number FROM member_user WHERE member_user.email = ?";
        $query =$this->db->prepare($sql);
        $query->bindValue(1,$user_email);
        $result = $query->fetch();

        return $result->phone_number;
    }
}
