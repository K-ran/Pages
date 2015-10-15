<?
    /**
     * This the user class.
     * Contains all the information regarding the logged in user
     */
    class UserClass
    {
        public $user_id;
        public $user_name;
        public $first_name="";
        public $last_name="";
        public $about_me="";
        public $book_name="";
        public $email="";
        public $cover_pic_url="";
        public $dob="";

        function __construct()
        {
            # code...
        }

        public function load_info_from_db($row){
            $this->user_id=$row['user_id'];
            $this->user_name=$row['user_name'];
            $this->first_name=$row['first_name'];
            $this->last_name=$row['last_name'];
            $this->about_me=$row['about_me'];
            $this->book_name=$row['book_name'];
            $this->email=$row['email'];
            $this->cover_pic_url=$row['cover_pic'];
        }
    }

?>
