<?php

class ControllerCustomers{

	/*=============================================
	CREATE CUSTOMERS
	=============================================*/

	static public function ctrCreateCustomer(){

		if(isset($_POST["newCustomer"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newCustomer"]) &&
			   preg_match('/^[0-9]+$/', $_POST["newIdDocument"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["newEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["newPhone"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["newAddress"])){

			   	$table = "customers";

			   	$data = array("name"=>$_POST["newCustomer"],
					           "idDocument"=>$_POST["newIdDocument"],
					           "email"=>$_POST["newEmail"],
					           "phone"=>$_POST["newPhone"],
					           "address"=>$_POST["newAddress"],
					           "birthdate"=>$_POST["newBirthdate"]);

			   	$answer = ModelCustomers::mdlAddCustomer($table, $data);

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been saved",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "customers";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "Customer cannot be blank or special characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "customers";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	SHOW CUSTOMERS
	=============================================*/

	static public function ctrShowCustomers($item, $value){

		$table = "customers";

		$answer = ModelCustomers::mdlShowCustomers($table, $item, $value);

		return $answer;

	}

	/*=============================================
	EDIT CUSTOMER
	=============================================*/

	static public function ctrEditCustomer(){

		if(isset($_POST["editCustomer"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editCustomer"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editIdDocument"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["editPhone"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editAddress"])){

			   	$table = "customers";

			   	$data = array("id"=>$_POST["idCustomer"],
			   				   "name"=>$_POST["editCustomer"],
					           "idDocument"=>$_POST["editIdDocument"],
					           "email"=>$_POST["editEmail"],
					           "phone"=>$_POST["editPhone"],
					           "address"=>$_POST["editAddress"],
					           "birthdate"=>$_POST["editBirthdate"]);

			   	$answer = ModelCustomers::mdlEditCustomer($table, $data);

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been updated",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "customers";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "Customer cannot be blank or special characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "customers";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	DELETE CUSTOMER
	=============================================*/

	static public function ctrDeleteCustomer(){

		if(isset($_GET["idCustomer"])){

			$table ="customers";
			$data = $_GET["idCustomer"];

			$answer = ModelCustomers::mdlDeleteCustomer($table, $data);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

								window.location = "customers";

								}
							})

				</script>';

			}		

		}

	}

}

