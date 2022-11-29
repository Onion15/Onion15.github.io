<?php 
    session_start();
    $nameErr = $emailErr = $commentErr = $captchaErr = "";
    $name = $email = $comment = $captcha = "";
    $arrayNumber = array("zero", "jeden", "dwa", "trzy", "cztery", "pięć", "sześć", "siedem", "osiem", "dziewięć");
    $arrayMark = array("dodać", "odjąć", "razy", "przez");
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {       
        if (empty($_POST["name"])) 
        {
            $nameErr = "Nazwa jest wymagana";
        } 
        else 
        {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameErr = "Dozwolone są tylko litery oraz spacje";
            }
        }
        
        if (empty($_POST["email"])) 
        {
            $emailErr = "Adres Email jest wymagany";
        } 
        else 
        {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
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

        $captcha = test_input($_POST["captcha"]);
        $captcha = (int)$captcha;  
        if($captcha == "")
            $captchaErr = "Captcha jest wymagana";
        else
        {          
            if ($captcha != $_SESSION["result"])
            {
                $captchaErr = "Zły wynik";
            }
        }        
    }
      
    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $text = "";
    $x = rand(0, 9);
    $z = rand(0, 3);
    $check = true;
    $_SESSION["result"] = -1;
    while($check)
    {
        $y = rand(0, 9);
        if($z == 0 && ($x+$y) >= 0 && ($x+$y) <= 10)
        {
            $check = false;
            $_SESSION["result"] = $x+$y;
            $text = ucfirst($arrayNumber[$x]). " ". $arrayMark[$z]. " ". $arrayNumber[$y];
        }
        if($z == 1 && ($x-$y) >= 0 && ($x-$y) <= 10)
        {
            $check = false;
            $_SESSION["result"] = $x-$y;
            $text = ucfirst($arrayNumber[$x]). " ". $arrayMark[$z]. " ". $arrayNumber[$y];
        }
        if($z == 2 && ($x*$y) >= 0 && ($x*$y) <= 10)
        {
            $check = false;
            $_SESSION["result"] = $x*$y;
            $text = ucfirst($arrayNumber[$x]). " ". $arrayMark[$z]. " ". $arrayNumber[$y];
        }
        if($z == 3 && $y != 0 && ($x/$y) >= 0 && ($x/$y) <= 10)
        {
            $check = false;
            $_SESSION["result"] = floor($x/$y);
            $text = ucfirst($arrayNumber[$x]). " ". $arrayMark[$z]. " ". $arrayNumber[$y];
        }
    }
?>