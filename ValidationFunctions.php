<?php

/**
 * Created by Christopher Mørk
 * Date: 08/03/2017
 * Time: 15.21
 */

class ValidationFunctions
{
  const ERROR_NAME_LENGHT = "Navn er for kort";
  const ERROR_NAME_FORMAT ="Navn må kun bestå af bogstaver";
  const ERROR_EMAIL_FORMAT = "Email format forkert!";
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
    if (is_string($string) && preg_match('/^[A-Za-z\s]+$/', $string)) {
      return true;
    } else
      return false;

  }

}