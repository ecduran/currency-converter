<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Currency Converter</title>
</head>
<body>

<h2>Currency Converter to USD</h2>

<form action="currency_converter.php" method="post">

  Amount: <input type="text" name="amount"><br/><br/>

<?php 
  include_once 'config/database.php';
  include_once 'obj/country.php';

  $database = new Database();

  $db = $database->getConnection();

  $country = new Country($db);

  $result = $country->selectAllCountry();

  $totalRows = count($result);

  if($totalRows>0) {

      echo 'Country: <select name="currency_value"><br/>';

      foreach ($result as $value) {

      echo             "<option value='".$value['currency_code']."'>".$value['country_name']."</option>";

      }

      echo            '</select> <br/><br />';

  }

 ?>
  <input type="submit" value="Submit">         

</form>

</body>
</html>