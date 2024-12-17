<?php
class Table{
	public $currentTable;

	function __construct($currentTable){
		$this->currentTable=$currentTable;
	}
	
	function saveInDatabase($credentials, $primary=''){
		try{
			$this->insertInDatabase($credentials);
		}
		catch(Exception $err){
			$this->updateInDatabase($credentials, $primary);
		}
	}

	function insertInDatabase($credentials){
		global $pdo;
		$pieces= array_keys($credentials);
		$rowValues=implode(',', $pieces); 
		$rowValuesWithColon= implode(', :', $pieces);
		$databaseQuery= 'INSERT INTO '.$this->currentTable.'('.$rowValues.') VALUES(:'.$rowValuesWithColon.')';//database query
		$selectprpstmt= $pdo->prepare($databaseQuery);
		$selectprpstmt->execute($credentials);
	}

	function updateInDatabase($credentials, $primary){
		global $pdo;
		$pieces=[];
		foreach ($credentials as $key => $value) {
			$pieces[]=$key.'= :'.$key; 
		}
		$piecesWithComma= implode(', ', $pieces);
		$databaseQuery="UPDATE $this->currentTable SET $piecesWithComma WHERE $primary=:primary";
		$credentials['primary']=$credentials[$primary];
		$selectprpstmt=$pdo->prepare($databaseQuery);
		$selectprpstmt->execute($credentials); 
	}

	function findInDatabase($column, $value){
		global $pdo;
		$selectprpstmt=$pdo->prepare('SELECT * FROM '.$this->currentTable.' WHERE '.$column.'=:value');
		$credentials=[
			'value'=>$value
		];
		$selectprpstmt->execute($credentials);
		return $selectprpstmt;
	}

	function findAllInDatabase(){
		global $pdo;
		$selectprpstmt=$pdo->prepare("SELECT * FROM ".$this->currentTable);
		$selectprpstmt->execute();
		return $selectprpstmt;
	}

	function deleteFromDatabase($column, $value){
		global $pdo;
		$selectprpstmt=$pdo->prepare("DELETE FROM $this->currentTable WHERE $column = :value");
		$credentials=[
			'value'=>$value
		];
		$selectprpstmt->execute($credentials);
		return $selectprpstmt;
	}

	function getLastInsertId(){
		global $pdo;
		$lastInsertId = $pdo->lastInsertId();
		return $lastInsertId;
	}
	
	// function findFromJoinTables($tables, $pks, $typeOfJoin,$whereCriteria=''){
	// 	global $pdo;
	// 	array_unshift($tables, $this->currentTable);
	// 	$num=2;
	// 	$query='SELECT ';
	// 	$query.=implode('.* ,' , $tables);
	// 	$query.='.* FROM ';

	// 	$query.=implode(' '.$typeOfJoin.' ', array_slice($tables, 0,2));
	// 	for ($i=0; $i < count($tables); $i++) { 
	// 		if(array_key_exists($i, $tables) && array_key_exists($i, $pks)){				
	// 			$query.=' ON '.$tables[$i].'.'.$pks[$i].' = '.$tables[$i+1].'.'.$pks[$i];
	// 			if(count($tables)>2){
	// 				if(array_key_exists($num,$tables)){
	// 					$query.=' JOIN '.$tables[$num];
	// 					$num++;
	// 				}
	// 			}
	// 		}
	// 	}
	// 	if($whereCriteria!=''){
	// 		$query.=' WHERE ';
	// 		$pieces=[];
	// 		foreach ($whereCriteria as $key => $value) {
	// 			$valueAfterDot= explode('.', $key);
	// 			$pieces[]=$key.'= :'.$valueAfterDot[1];
	// 		}
	// 		$piecesWithComma=implode(' AND ', $pieces);
	// 		$query.=$piecesWithComma;
	// 		$newCriteria=[];
	// 		foreach ($whereCriteria as $key => $value) {
	// 			$newValueAfterDot= explode('.', $key);
	// 			$newCriteria[$newValueAfterDot[1]]=$whereCriteria[$key];
	// 		}
	// 		$selectprpstmt=$pdo->prepare($query);
	// 		$selectprpstmt->execute($newCriteria);
	// 	}
	// 	else{
	// 		$selectprpstmt=$pdo->prepare($query);
	// 		$selectprpstmt->execute();	
	// 	}
	// 	return $selectprpstmt;
	// }
}
