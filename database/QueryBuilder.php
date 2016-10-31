<?php
class QueryBuilder

{
	protected $pdo;

	public function __construct($pdo)
	{
		$this -> pdo = $pdo;
	}


	public function selectAll($table)
	{

		$statement = $this->pdo->prepare("select * from {$table}");
		$statement -> execute();
		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

		public function selectSpecific($q)
	{

		$statement = $this->pdo->prepare("{$q}");
		$statement -> execute();
		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	public function insertDB($insert)
	{

		$statement = $this->pdo->prepare("{$insert}");
		$statement -> execute();
		$last_id = $this->pdo -> lastInsertId();
		return $last_id;
	}

	public function updateDB($q)
	{

		$statement = $this->pdo->prepare("{$q}");
		$statement -> execute();
		return "ok";
	}

}

?>