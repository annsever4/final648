<?php
class AddListing extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {

        $nRoomsMap = array('0'=>0,'1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5);

        $posting = (object)array(); // encapsulates all props of a posting
        $posting->image_id = null;
        $posting->owner_id = $_SESSION && isset($_SESSION['member_user_id']) ? $_SESSION['member_user_id'] : false;

        if(isset($_POST["submit"])) {

                // Idea, for failover we can extract image mime type from: 
                // (a) filename via $ = "image/".strtolower(array_pop(explode(".",$fn)))
                // (b) via ['mime'] attribute of $_FILES["fileUpload"]
                // For now let's just use existing impl, addon fix only if issues are observed

            // extract uploaded image file
            $uploaded_file = $_FILES["fileUpload"]["tmp_name"];
            if (false !== $uploaded_file && !empty($uploaded_file)) {
                $posting->file_body = file_get_contents($uploaded_file);
                $posting->file_mime  = $_FILES["fileUpload"]["type"];
                // store image in db... @returns unique id of newly inserted image!
                $posting->image_id = $this->model->addNewImage($posting->file_mime, $posting->file_body);
            }

            // set non-image posting props

            // generic stuff
            $posting->title              = self::cleanse(Request::post('title'));
            $posting->address            = self::cleanse(Request::post('address'));
            $posting->price              = self::cleanse(Request::post('price'));
            $posting->square_feet        = self::cleanse(Request::post('square_feet'));
            $posting->zip                = self::cleanse(Request::post('zip'));
            $posting->move_in_date       = self::cleanse(Request::post('move_in_date'));
            $posting->lease_end_date     = self::cleanse(Request::post('lease_end_date'));
            $posting->description        = self::cleanse(Request::post('description'));

            // checkbox stuff
            $posting->private_room       = self::cleanse(Request::post('private_room'))       == 1 ? 1 : 0;
            $posting->laundry_on_site    = self::cleanse(Request::post('laundry_on_site'))    == 1 ? 1 : 0;
            $posting->utilities_included = self::cleanse(Request::post('utilities_included')) == 1 ? 1 : 0;
            $posting->dogs_ok            = self::cleanse(Request::post('dogs_ok')) == 1 ? 1 : 0;
            $posting->cats_ok            = self::cleanse(Request::post('cats_ok')) == 1 ? 1 : 0;

            // dropdown encapsulates 3 db entries here
            $property_type_helper        = self::cleanse(Request::post('property_type'));
            $posting->is_apartment       = $property_type_helper == 'is_apartment' ? 1 : 0;
            $posting->is_house           = $property_type_helper == 'is_house'     ? 1 : 0;
            $posting->is_room            = $property_type_helper == 'is_room'      ? 1 : 0;

            // extract n-rooms props and map them to valid int values
            $posting->bed_rooms          = self::cleanse(Request::post('bed_rooms'));
            $posting->bathrooms          = self::cleanse(Request::post('bathrooms'));
            $posting->bed_rooms = in_array($posting->bed_rooms,$nRoomsMap) ? $nRoomsMap[$posting->bed_rooms] : 1;
            $posting->bathrooms = in_array($posting->bathrooms,$nRoomsMap) ? $nRoomsMap[$posting->bathrooms] : 1;

            // create new posting entry in db and return posting id.
            $posting_id = $this->model->addNewRental($posting);

            // redirect to newly created posting page
            header('location: '. URL . 'details/?rental_id='.$posting_id);
        }


        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/addlisting/index.php';
        require APP . 'view/_templates/footer.php';
    }

    function cleanse($str) {
        $str = trim($str); // trim string edges of blank-ish chars
        $str = strip_tags($str); // remove markup tags
        $str = htmlspecialchars($str); // replace special html chars with escape codes
        $str = addslashes($str); // add backslashes
        $str = str_replace('"','&quot;',$str); // replace double quotes with escape code
        return $str;
    }


}
