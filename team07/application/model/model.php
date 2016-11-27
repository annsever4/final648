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
    public function getListing($key, $order=null, $is_house, $is_apartment, $is_room, $laundry_on_site, $dogs_ok,
                                $cats_ok, $utilities_included)
    {
        //creates initial sql statement to return listings with addresses LIKE the key value
        $sql = "SELECT listings.id, listings.address, listings.price, images.image FROM listings".
            " INNER JOIN images ON listings.image_id = images.id WHERE listings.address LIKE '%"
            . $key . "%'";

        //checks what filters to add the sql statement
        if ($is_house){
            $sql.= " AND listings.is_house = 1";
        }
        //
        if($is_apartment) {
            $sql .= " AND listings.is_apartment = 1";
        }

        if($is_room)  {
            $sql .= " AND listings.is_room = 1";
        }

        if($laundry_on_site) {
            $sql .= " AND listings.laundry_on_site = 1";
        }

        if($dogs_ok) {
            $sql .= " AND listings.dogs_ok = 1" ;
        }

        if($cats_ok) {
            $sql .= " AND listings.cats_ok = 1";
        }

        if($utilities_included){
            $sql .= " AND listings.utilities = 1";
        }

        if($order) {
            $sql .= " ORDER BY listings.".$order;
        }

        //prepares statement eliminating risk of SQL injection
        $query = $this->db->prepare($sql);

        //executes query
        $query->execute();

        //returns an array of objects with col values as properites
        return $query->fetchAll();
    }

    //gets details of a particular listing

    public function getDetails($listing_id){
        $sql = "SELECT listings.*, images.image, member_user.id, member_user.email, member_user.first_name, member_user.last_name, member_user.phone_number FROM listings".
            " INNER JOIN images ON listings.image_id = images.id".
            " INNER JOIN member_user ON member_user.id = listings.owner_id".
            " WHERE listings.id = ?";

        $query = $this->db->prepare($sql);

                //replaces first ? in string with the variable $listing_id
        $query -> bindValue(1, $listing_id);

        $query -> execute();

        return $query->fetch();
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
        $query->execute();

        return $query->fetch();
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
        $result = $query->fetch();

        $name = $result->first_name. " " .$result->last_name;

        return $name;
    }

    public function getMemberUserPhoneNumber($user_email)
    {
        $sql = "SELECT member_user.phone_number FROM member_user WHERE member_user.email = ?";
        $query =$this->db->prepare($sql);
        $query->bindValue(1,$user_email);

        $query->execute();

        $result = $query->fetch();

        return $result->phone_number;
    }

    public function getMessagesALL() {

        $sql = "SELECT * FROM messages WHERE messages.sender_id = :current_user_id OR messages.recipient_id = :current_user_id";

        $query = $this->db->prepare($sql);

        $query -> bindValue(':current_user_id', $_SESSION['user_id']);

        $query->execute();

        return  $query->fetchAll();
    }

}
