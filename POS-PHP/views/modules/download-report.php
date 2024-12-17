<?php

require_once "../../controllers/sales.controller.php";
require_once "../../models/sales.model.php";
require_once "../../controllers/customers.controller.php";
require_once "../../models/customers.model.php";
require_once "../../controllers/users.controller.php";
require_once "../../models/users.model.php";

$report = new ControllerSales();
$report -> ctrDownloadReport();