<?php

function buildOptions($options, $selectedOption)
{
   foreach ($options as $value => $text)
   {
      if ($value == $selectedOption)
      {
         echo '<option value="' . $value . 
                '" selected="selected">' . $text . '</option>';
      }
      else
      {
         echo '<option value="' . $value . '">' . $text . '</option>';
      }
   }
}

// Inicjuje tablice wyboru plci uzytkownika.
$genderOptions = array("0" => "[Plec]",
                                  "1" => "Mezczyzna",
                                  "2" => "Kobieta");

if (!isset($_SESSION['values']))
{
   $_SESSION['values']['nick'] = '';
   $_SESSION['values']['imie'] = '';
   $_SESSION['values']['nazwisko'] = '';
   $_SESSION['values']['plec'] = '';
   $_SESSION['values']['email'] = '';
   $_SESSION['values']['pass1'] = '';
   $_SESSION['values']['pass2'] = '';
   
}

if (!isset($_SESSION['errors']))
{
   $_SESSION['errors']['nick'] = '';
   $_SESSION['errors']['imie'] = ''; 
   $_SESSION['errors']['nazwisko'] = ''; 
   $_SESSION['errors']['plec'] = '';
   $_SESSION['errors']['email'] = '';
   $_SESSION['errors']['pass1'] = '';
   $_SESSION['errors']['pass2'] = '';
}


?>