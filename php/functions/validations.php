<?
    //contains functions related to form validations

    //converts everything into normal text, excapes special character
    function initial_filter($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function check_input($string){
        $string = initial_filter($string);
        if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string))
            {
                $_SESSION["err_name"]="No special chracters allowed";
                return false;
            }
        return true;    
    }
?>
