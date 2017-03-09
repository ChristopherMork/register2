<?php

/**
 * User: christophermork
 * Date: 08/03/2017
 */
require_once('ValidationFunctions.php');

// Create object from ValidationFunctions Class
$validation_functions = new ValidationFunctions();
$errors = [];
print_r($_POST);

/**
 * Checker at brugeren er videresendt fra register.php
 */

if (isset ($_SERVER['HTTP_REFERER'])) {
  if ($_SERVER['HTTP_REFERER'] == "http://localhost/register2/register.php" && isset ($_POST) && !empty($_POST)) {
    //Check først at key'en (indexet) name er sat i SUPERGLOBAL $_POST
    //Check derefter at den ikke indeholder en tom String
    if (isset($_POST["name"]) && !empty($_POST["name"])) {
      $name = $_POST["name"];

      // Check (string)$name er mindst 2 char's lang
      if (!$validation_functions->validateStringLenght($name, 2)) {
        $errors ["namelenght"] = ValidationFunctions::ERROR_NAME_LENGHT;
      }
      if (!$validation_functions->validateStringIsAlpha($name)) {
        $errors ['name_format'] = ValidationFunctions::ERROR_NAME_FORMAT;
      }
    }
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
      $email = $_POST["email"];
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE){
        $errors['email'] = ValidationFunctions::ERROR_EMAIL_FORMAT;
      }

    }
  }

}

$error_count = count ($errors);
echo "der er $error_count fejl";


