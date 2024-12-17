<?php

require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";

require_once "../controllers/customers.controller.php";
require_once "../models/customers.model.php";


class productsTableSales{

	/*=============================================
 	 SHOW PRODUCTS TABLE
  	=============================================*/ 
	public function showProductsTableSales(){

		$item = null;
		$value = null;
		$order = "id";

		$products = ControllerProducts::ctrShowProducts($item, $value, $order);

		if(count($products) == 0){

			$jsonData = '{"data":[]}';

			echo $jsonData;

			return;
		}

		$jsonData = '{
			"data":[';

				for($i=0; $i < count($products); $i++){


					/*=============================================
					We bring the image
					=============================================*/
					
					$image = "<img src='".$products[$i]["image"]."' width='40px'>";

					/*=============================================
					Stock
					=============================================*/
				  	
				  	if($products[$i]["stock"] <= 10){

		  				$stock = "<button class='btn btn-danger'>".$products[$i]["stock"]."</button>";

		  			}else if($products[$i]["stock"] > 11 && $products[$i]["stock"] <= 15){

		  				$stock = "<button class='btn btn-warning'>".$products[$i]["stock"]."</button>";

		  			}else{

		  				$stock = "<button class='btn btn-success'>".$products[$i]["stock"]."</button>";

		  			}

		  			/*=============================================
		 	 		ACTION BUTTONS
		  			=============================================*/ 

		  			$buttons =  "<div class='btn-group'><button class='btn btn-primary addProductSale recoverButton' idProduct='".$products[$i]["id"]."'><i class='fa fa-plus'></i></button></div>";



					$jsonData .='[
						"'.($i+1).'",
						"'.$image.'",
						"'.$products[$i]["code"].'",
						"'.$products[$i]["description"].'",
						"'.$stock.'",
						"'.$buttons.'"
					],';
				}

				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= '] 

			}';

		echo $jsonData;
	}
}


/*=============================================
ACTIVATE PRODUCTS TABLE
=============================================*/ 
$activateProductsSales = new productsTableSales();
$activateProductsSales -> showProductsTableSales();
