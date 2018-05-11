<?php 

class Country {

	private $conn;
	private $tableName = 'country_codes';

	public $countryName;
	public $currencyCode;


	public function __construct($db) {
		$this->conn = $db;
	}

	public function selectAllCountry() {

		$query = "SELECT country_name, currency_code FROM ".$this->tableName."";

		$stmt = $this->conn->prepare($query);

		$stmt->execute();

		return $stmt->fetchAll();
	}

}


 ?>