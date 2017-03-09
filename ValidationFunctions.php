<?php

/**
 * Created by Christopher Mørk
 * Date: 08/03/2017
 * Time: 15.21
 */

class ValidationFunctions
{
  const ERROR_FIELD_REQUIRED = "Is required";

  const ERROR_NAME_LENGHT = "Navn er for kort";
  const ERROR_NAME_FORMAT ="Navn må kun bestå af bogstaver";
  const ERROR_EMAIL_FORMAT = "Email format forkert!";
  const ERROR_PHONE_MUST_CONTAIN_NUMBERS = "Telefon må kun indeholde tal";
  const ERROR_PHONE_MUST_CONTAIN_8NUMBERS = "Telefon skal indeholde 8 tal";
  const DU_ER_EN_HACKER = "Du er en hacker!";
  const PASSWORDS_MATCHER_IKKE = "Dine passwords matcher ikke!";
  const PASSWORD_IKKE_LANGT_NOK = "Password ikke langt nok";

  public function validateStringLenght($name, $lenght = 2)
  {
    if (is_string($name) && is_integer($lenght)) {
      if (strlen($name) < $lenght) {
        return false;
      } else
        return true;
    }
  }

  public function validateStringIsAlpha($string)
  {
    if (is_string($string) && preg_match('/^[A-Za-zæøåÆØÅ\s]+$/', $string)) {
      return true;
    } else
      return false;

  }

}