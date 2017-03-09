<?php

/**
 * User: christophermork
 * Date: 08/03/2017
 */
require_once('ValidationFunctions.php');

// Create object from ValidationFunctions Class
$validation_functions = new ValidationFunctions();
$errors = [];
$allowed_pets = [
  'Dog',
  'Cat',
  'Rat',
  'Bird'
];

//print_r($_POST);

/**
 * Checker at brugeren er videresendt fra register.php
 */

if (isset ($_SERVER['HTTP_REFERER'])) {
  if ($_SERVER['HTTP_REFERER'] == "http://localhost/register2/register.php" && isset ($_POST) && !empty($_POST)) {
    //Check først at key'en (indexet) name er sat i SUPERGLOBAL $_POST

    //Check derefter at den ikke indeholder en tom String
    if (isset($_POST["name"]) && !empty($_POST["name"])) {
      $name = trim($_POST["name"]);

      // Check (string)$name er mindst 2 char's lang
      if (!$validation_functions->validateStringLenght($name, 2)) {
        $errors ["namelenght"] = ValidationFunctions::ERROR_NAME_LENGHT;
      }
      if (!$validation_functions->validateStringIsAlpha($name)) {
        $errors ['name_format'] = ValidationFunctions::ERROR_NAME_FORMAT;
      }
    } else {
      $errors['name'] = ValidationFunctions::ERROR_FIELD_REQUIRED;
    }
    // Checker at email passer
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
      $email = trim($_POST["email"]);
      if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        $errors['email'] = ValidationFunctions::ERROR_EMAIL_FORMAT;
      }
    }

    // Checker at telefonnummer kun indeholder tal
    if (isset($_POST["phone"]) && !empty($_POST["phone"])) {
      if (!ctype_digit($_POST ['phone'])) {
        $errors['phone'] = ValidationFunctions::ERROR_PHONE_MUST_CONTAIN_NUMBERS;
      } else {
        $phone = $_POST['phone'];
        $phone = str_replace(' ', '', $phone);
        if (strlen($phone) !== 8) {
          $errors['phone_lenght'] = ValidationFunctions::ERROR_PHONE_MUST_CONTAIN_8NUMBERS;
        }
      }
    }

    // Checker at du ikke er en hacker!
    if (isset($_POST["pet"]) && !empty($_POST["pet"])) {
      $pet = $_POST ['pet'];

      $allowed_pets = array_map ("strtolower" , $allowed_pets);
      if (!in_array(strtolower($pet), $allowed_pets))  {
        $errors['wrong_pet'] = ValidationFunctions::DU_ER_EN_HACKER;
      }
    } else {
      $errors['pets'] = ValidationFunctions::DU_ER_EN_HACKER;
    }
    // Validerer description

    if (isset($_POST["description"]) && !empty($_POST["description"]))
      //Trim fjerner whitespace og udelukker HTML-tags
      {
      $description = trim (strip_tags( $_POST['description'], '<h1><h2><h3><h4><a>'));
    }

    // Checker at passwords matcher
    // Checker at passwords minimum er 6 tegn lang
    if (isset ($_POST["password"], $_POST["password_again"])
      && !empty($_POST["password"]) && !empty ($_POST ["password_again"])){

      if ($_POST["password"] !== $_POST["password_again"]){
        $errors["passwords"] = ValidationFunctions::PASSWORDS_MATCHER_IKKE;
      } elseif(strlen($_POST["password"] ) < 6){
        $errors["password"] = ValidationFunctions::PASSWORD_IKKE_LANGT_NOK;
      }
    } else {
      ValidationFunctions::ERROR_FIELD_REQUIRED;
    }



  } //End of isset $_POST
} //End of HTTP_REFERER

if (!empty ($errors)){

  foreach($errors as $key => $error) {
    echo "<strong>" . strtoupper($key) . ": " . $error . "</strong> <br />";
  }
}

