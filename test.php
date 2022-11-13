<?php 
    $nameErr = $emailErr = $commentErr = "";
    $name = $email = $comment = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["name"])) {
            $nameErr = "Nazwa jest wymagana";
        } 
        else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameErr = "Dozwolone są tylko litery oraz spacje";
            }
        }
        
        if (empty($_POST["email"])) {
            $emailErr = "Adres Email jest wymagany";
        } 
        else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Zły format adresu Email";
            }
        }   
      
        if (empty($_POST["comment"])) 
        {
            $comment = "";
        } 
        else 
        {
            $comment = test_input($_POST["comment"]);
        }
    }
      
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
?>