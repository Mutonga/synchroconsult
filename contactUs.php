<?php
//define the variables.
$name = $email = $tel = $subject = $comment = "";
$emailErr = $telErr = $nameErr = $subjectErr = $commentErr= "";

//checking type of method

if($_SERVER["REQUEST_METHOD"] == "POST"){

      //name input
        if(empty($_POST["name"])){
          $nameErr = " ";
        }else{
          $name = sanitize($_POST["name"]);

          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
          }
        }
        //email input
        if(empty($_POST["email"])){
          $emailErr = "Email is required";
        }else{

          //santize the email
          $email = sanitize($_POST["email"]);

          //validate the email
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          $emailErr = "Invalid email!";
        }else{
          $email = sanitize($_POST["email"]);
        }
      }

        //tel input
        if(empty($_POST["tel"])){
          $telErr = "Tel is required";
        }else{
          $tel = sanitize($_POST["tel"]);
        }



        //check if the subject field is filled
        if(isset($_POST["subject"])){

          $subject = "Subject:".sanitize($_POST["subject"]);
          //validate subject input using preg_match() function
        if(!preg_match("/^[a-zA-Z0-9]*$/",$subject)){

          $subjectErr = "Only alphanumerics and spaces allowed";

            }else{

            $subject = "Subject:".sanitize($_POST["subject"]);
          }
        }



      //check if the comment section is field
      if(isset($_POST["comment"])){

        $comment = sanitize($_POST["comment"]);
        //validate  comment input using the preg_match() function
        if(!preg_match("/^[a-zA-Z0-9 .\-]*$/",$comment)){

            $commentErr = "Only alphanumerics and spaces allowed";
        }
      else{
        $comment = sanitize($_POST["comment"]);
      }
    }
}

//sanitization function
function sanitize($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$to = "ngshvill57@gmail.com";
$headers = "From: $email";
$details = "Name: ".$name."\n"."Tel:  ".$tel."\n"."From:  ".$email."\n"."Subject: ".$subject."\n"."Comment: ".$comment;

//send the email
mail($to,$headers,$details);


 ?>
