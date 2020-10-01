<!-- 
    Name: Sangeev Thapa Magar
    Date: 03/08/2020
    Subject: CS 355 (Advanced Web Programming)
    Assignment 3: String Manipulation 
-->
<?php
    //Default values.
    $name1 = ""; // sender
    $name2 = ""; //receiver
    $address1 = "";// sender address
    $address2 = ""; // receiver address
    $state1 = ""; // sender state
    $state2 = ""; //receiver state
    $zip1 =""; //sender zip
    $zip2 = ""; //receiver zip
    $length = ""; //package length in inches
    $breath = ""; //package breath in inches
    $height = ""; //package height in inches
    $weight = ""; //package weight in pound
    $message = "Enter the all the required information.";
    $action = filter_input(INPUT_POST, 'action');
    
    switch($action){
        case 'process_data':
            $name1 = filter_input(INPUT_POST, 'name1');
            $name2 = filter_input(INPUT_POST, 'name2');
            $address1 = filter_input(INPUT_POST, 'address1');
            $address2 = filter_input(INPUT_POST, 'address2');
            $state1 = filter_input(INPUT_POST, 'state1');
            $state2 = filter_input(INPUT_POST, 'state2');
            $zip1 = filter_input(INPUT_POST, 'zip1');
            $zip2 = filter_input(INPUT_POST, 'zip2');
            $length = filter_input(INPUT_POST, 'length',FILTER_VALIDATE_INT);
            $breath = filter_input(INPUT_POST, 'breath',FILTER_VALIDATE_INT);
            $height = filter_input(INPUT_POST, 'height',FILTER_VALIDATE_INT);
            $weight = filter_input(INPUT_POST, 'weight',FILTER_VALIDATE_INT);
    
            // trimming the variables
            $name1 = trim($name1);
            $name2 = trim($name2);
            $address1 = trim($address1);
            $address2 = trim($address2);
            $state1 = trim($state1);
            $state2 = trim($state2);
            $zip1 = trim($zip1);
            $zip2 = trim($zip2);
            $length = trim($length);
            $breath = trim($breath);
            $height = trim($height);
            $weight = trim($weight);
    
            //validate name1 from the sender.
            if(empty($name1)){
                $message  = 'You must enter sender name.';
            break;
        }
            $name1 = strtolower($name1);
            $name1 = ucwords($name1);
    
            $i1 = strpos($name1, ' ');
            if ($i1 === false){
                $first_name1 = $name1;
            }else{
                $first_name1 = substr($name1, 0, $i1);
    
            }
    
            // validate address
            $address1 = strtoupper($address1);
            if(empty($address1)){
                $message = "You must enter an sender address.";
            break;
            }
    
            // validate State
            if(empty($state1)){
                $message = "You must choose sender state.";
            break;
            }
    
            //validate zip
            if(empty($zip1)){
                $message = "You must enter valid sender zip code.";
            break;
            }elseif(strlen($zip1)>5){
                $message = "The sender zip code must be of five number.";
            break;
            }elseif(strlen($zip1)<5){
                $message = "The sender zip code must be of five number.";
            break;
            }else{
                $zip1 = $zip1;
            }
    
            //validate name1 of receiver.
            if(empty($name2)){
                $message  = 'You must enter receiver name.';
            break;
        }
    
            $name2 = strtolower($name2);
            $name2 = ucwords($name2);
    
            $i2 = strpos($name2, ' ');
            if ($i2 === false){
                $first_name2 = $name2;
            }else{
                $first_name2 = substr($name2, 0, $i2);
    
            }
    
            // validate address
            $address2 = strtoupper($address2);
            if(empty($address2)){
                $message = "You must enter an receiver address.";
            break;
            }
    
            // validate State
            if(empty($state2)){
                $message = "You must choose receiver state.";
            break;
            }
    
            //validate zip
            if(empty($zip2)){
                $message = "You must enter valid receiver zip code.";
            }elseif(strlen($zip2)>5){
                $message = "The  receiver zip code must be of five number.";
            break;
            }elseif(strlen($zip2)<5){
                $message = "The receiver zip code must be of five number.";
            break;
            }else{
                $zip2 = $zip2;
            }
    
            // Validate Dimensions and weight of the package.
            if(empty($length)){
                $message = "You must enter the length of the package.";
            break;
            }else if($length >36){
                $message = "The length of the package must be under 36 inches.";
            }
            
            if(empty($breath)){
                $message = "You must enter the breath of the package.";
            break;
            }else if($breath >36){
                $message = "The breath of the package must be under 36 inches.";
            break;
            
            }
            
            if(empty($height)){
                $message = "You must enter the height of the package.";
            break;
            }else if($height >36){
                $message = "The height of the package must be under 36 inches.";
            }
    
            if(empty($weight)){
                $message = "You must enter the weight of the package.";
            break;
            }else if($weight>150){
                $message = "The weight of the package must be under 150 pounds.";
            }
    
    
            $message = "$first_name1 has send a package to $first_name2 with the shipping details below.\n".
                        "FROM: $name1 \n".
                        "Address: $address1, $state1 $zip1\n".
                        "TO: $name2 \n".
                        "Address: $address2, $state2 $zip2\n".
                        "The package is $length inches long, $breath inches wide, $height inches tall, and weighs $weight lbs. \n";
        break;  
        
    }
    include 'Validate.php';