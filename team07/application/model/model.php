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
    public function getListing($key)
    {
	
	/***
        $sql = "SELECT listings.id, listings.address, listings.price, images.image FROM listings INNER JOIN images ON listings.image_id = images.id WHERE listings.address LIKE '%".$key."%'".
        " ORDER BY listings.".$order;
        $query = $this->db->prepare($sql);
	*/
	$sql = "SELECT listings.id, listings.address, listings.price, images.image FROM listings INNER JOIN images ON listings.id=images.id  WHERE address LIKE '%".$key."%'";
        $query = $this->db->prepare($sql);

        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
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



}
