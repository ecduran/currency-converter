<?php 
  function currencyConverter ($from_Currency, $to_Currency) {
      $from_Currency = urlencode(strtoupper($from_Currency));
      $to_Currency = urlencode(strtoupper($to_Currency));
      $url = file_get_contents('http://free.currencyconverterapi.com/api/v3/convert?q=' . $from_Currency . '_' . $to_Currency . '&compact=ultra');
      $json = json_decode($url, true);

      return $json[$from_Currency . '_' . $to_Currency];
  }


  $amount = $_POST["amount"];
  $currency = $_POST["currency_value"];
  $currency_usd = "USD";
  $convertedCurrency =  round($amount * currencyConverter($currency, $currency_usd), 2);

  echo "<h2>Currency Converter to USD</h2>";
  echo "Amount: " . $amount . " " . $currency;
  echo "</br>";

  echo "Converted to: <strong>" . $convertedCurrency . " " . $currency_usd . "</strong>";

  echo "</br></br>";
  echo "<a href='/currency-converter'>back</a>";
 ?>