<?php


require_once "connection.php";

class CategoriesModel{
	/* --LOG ON TO codeastro.com FOR MORE PROJECTS-- */
	/*=============================================
	CREATE CATEGORY
	=============================================*/

	static public function mdlAddCategory($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(category) VALUES (:category)");

		$stmt -> bindParam(":category", $data, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return 'ok';

		} else {

			return 'error';

		}
		
		$stmt -> close();

		$stmt = null;
	}
	/* --LOG ON TO codeastro.com FOR MORE PROJECTS-- */
	/*=============================================
	SHOW CATEGORY 
	=============================================*/
	
	static public function mdlShowCategories($table, $item, $value){

		if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}
		else{
			$stmt = Connection::connect()->prepare("SELECT * FROM $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}
	/* --LOG ON TO codeastro.com FOR MORE PROJECTS-- */
	/*=============================================
	EDIT CATEGORY
	=============================================*/

	static public function mdlEditCategory($table, $data){

		$stmt = Connection::connect()->prepare("UPDATE $table SET Category = :Category WHERE id = :id");

		$stmt -> bindParam(":Category", $data["Category"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $data["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	/* --LOG ON TO codeastro.com FOR MORE PROJECTS-- */
	/*=============================================
	DELETE CATEGORY
	=============================================*/

	static public function mdlDeleteCategory($table, $data){

		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id");

		$stmt -> bindParam(":id", $data, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}