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
                                $cats_ok, $utilities_included, $min_price, $max_price)
    {
        //creates initial sql statement to return listings with addresses LIKE the key value
        $sql = "SELECT listings.*, images.image FROM listings".
            " INNER JOIN images ON listings.image_id = images.id WHERE listings.address LIKE '%"
            . $key . "%'";

        //checks what filters to add the sql statement
        if ($is_house){
            $sql .= " AND listings.is_house = 1";
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

        if($min_price) {
            $min_price = trim($min_price);
            $sql .= " AND listings.price > ".$min_price;
        }

        if($max_price){
            $max_price = trim($max_price);
            $sql .= " AND listings.price < ".$max_price; 
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

    public function populateIndex(){
        $sql = "SELECT listings.*, images.image FROM listings".
            " INNER JOIN images ON listings.image_id = images.id ORDER BY listings.id DESC LIMIT 9";

        $query = $this->db->prepare($sql);

        $query->execute();

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

    public function getUserProfileInformation($user_id){
            $sql = "SELECT member_user.id, member_user.email, member_user.first_name, member_user.last_name, ".
                    "member_user.phone_number FROM member_user WHERE member_user.id = ?";

            $query = $this->db->prepare($sql);

            $query -> bindValue(1, $user_id);

            $query->execute();

            return $query->fetch();
    }

    public function getUserListings($user_id){

        $sql = "SELECT listings.id, listings.address, listings.title, listings.price, listings.square_feet, listings.move_in_date, listings.owner_id, ".
            "member_user.id FROM listings INNER JOIN member_user ON listings.owner_id = member_user.id WHERE member_user.id = ?";

        $query = $this->db->prepare($sql);

        $query -> bindValue(1, $user_id);

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
        $query->execute();

        return $query->fetch();
    }

    public function getCredentials($user_email)
    {
        //prepare query to retrieve first and last name from database
        $sql = "SELECT member_user.first_name, member_user.last_name, member_user.id, member_user.phone_number FROM member_user WHERE member_user.email = ?";
        $query = $this->db->prepare($sql);
        $query->bindValue(1,$user_email);

        //execute query
        $query->execute();


        return $query->fetch();
    }

    /*
    public function getMemberUserPhoneNumber($user_email)
    {
        $sql = "SELECT member_user.phone_number FROM member_user WHERE member_user.email = ?";
        $query =$this->db->prepare($sql);
        $query->bindValue(1,$user_email);

        $query->execute();

        $result = $query->fetch();

        return $result->phone_number;
    } */

    public function getMessagesALL() {

        $sql = "SELECT * FROM messages WHERE messages.recipient_id = :current_user_id";

        $query = $this->db->prepare($sql);

        $query -> bindValue(':current_user_id', $_SESSION['member_user_id']);

        $query->execute();

        return  $query->fetchAll();
    }


    public function addNewImage($strMimeType, $blobFileContent)
    {
        $sql = "INSERT INTO images (type, image) VALUES (?, ?)";
        $query = $this->db->prepare($sql);
        $query->bindValue(1, $strMimeType);
        $query->bindValue(2, $blobFileContent);
        try {
            $this->db->beginTransaction();
            $query->execute();
            $image_id = $this->db->lastInsertId();
            $this->db->commit();
            return $image_id;
        } catch(PDOExecption $e) {
            $this->db->rollback();
            return null;
        }
    }

    public function addNewRental($posting)
    {
        $sql = "INSERT INTO listings (
                                        address,
                                        price,
                                        owner_id,
                                        image_id,
                                        title,
                                        zip,
                                        description,
                                        laundry_on_site,
                                        utilities_included,
                                        private_room,
                                        dogs_ok,
                                        cats_ok,
                                        is_house,
                                        is_apartment,
                                        is_room,
                                        square_feet,
                                        bed_rooms,
                                        move_in_date,
                                        lease_end_date,
                                        bathrooms
                            ) VALUES (  ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                                        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                            )";
        $query = $this->db->prepare($sql);
        $query->bindValue( 1, $posting->address);
        $query->bindValue( 2, $posting->price);
        $query->bindValue( 3, $posting->owner_id);
        $query->bindValue( 4, $posting->image_id);
        $query->bindValue( 5, $posting->title);
        $query->bindValue( 6, $posting->zip);
        $query->bindValue( 7, $posting->description);
        $query->bindValue( 8, $posting->laundry_on_site);
        $query->bindValue( 9, $posting->utilities_included);
        $query->bindValue(10, $posting->private_room);
        $query->bindValue(11, $posting->dogs_ok);
        $query->bindValue(12, $posting->cats_ok);
        $query->bindValue(13, $posting->is_house);
        $query->bindValue(14, $posting->is_apartment);
        $query->bindValue(15, $posting->is_room);
        $query->bindValue(16, $posting->square_feet);
        $query->bindValue(17, $posting->bed_rooms);
        $query->bindValue(18, $posting->move_in_date);
        $query->bindValue(19, $posting->lease_end_date);
        $query->bindValue(20, $posting->bathrooms);
        try {
            $this->db->beginTransaction();
            $query->execute();
            $listing_id = $this->db->lastInsertId();
            $this->db->commit();
            return $listing_id;
        } catch(PDOExecption $e) {
            $this->db->rollback();
            return null;
        }
    }

    public function getConversationsAll()
    {

        $sql = "SELECT users.id, users.first_name, users.last_name, max(msgs.time_stamp) as timestamp ";
        $sql.= "FROM member_user as users ";
        $sql.= "RIGHT JOIN messages as msgs ";
        $sql.= "ON msgs.sender_id=users.id ";
        $sql.= "WHERE msgs.recipient_id=? OR msgs.sender_id=? ;";
//      $sql = "SELECT sender_id, time_stamp FROM messages WHERE messages.recipient_id=?";
        $query = $this->db->prepare($sql);
        $query->bindValue(1, $_SESSION['member_user_id']);
        $query->bindValue(2, $_SESSION['member_user_id']);
        $query->execute();
        return $query->fetchAll();
    }

    public function getConversation($sender_id)
    {
        $sql = "SELECT * FROM messages WHERE ";
        $sql.= "recipient_id=? AND sender_id=? OR recipient_id=? AND sender_id=?; ";
        $query = $this->db->prepare($sql);
        $query->bindValue(1, $_SESSION['member_user_id']);
        $query->bindValue(2, $sender_id);
        $query->bindValue(3, $sender_id);
        $query->bindValue(4, $_SESSION['member_user_id']);
        $query->execute();
        return $query->fetchAll();
    }

    public function addNewMessage($recipient_id, $message)
    {
        $sql = "INSERT INTO messages (sender_id, recipient_id, message) VALUES (?, ?, ?);";
        $query = $this->db->prepare($sql);
        $query->bindValue(1, $_SESSION['member_user_id']);
        $query->bindValue(2, $recipient_id);
        $query->bindValue(3, $message);
        $query->execute();
    }

}


/* 

SELECT users.id, users.first_name, users.last_name
FROM student_imarchen.member_user as users 
INNER JOIN (
    SELECT distinct sender_id FROM student_imarchen.messages WHERE recipient_id=3
) msgs 
ON msgs.sender_id=users.id;



SELECT users.id, users.first_name, users.last_name, max(msgs.time_stamp) 
FROM student_imarchen.member_user as users 
RIGHT JOIN student_imarchen.messages as msgs 
ON msgs.sender_id=users.id 
WHERE msgs.recipient_id=3;

*/