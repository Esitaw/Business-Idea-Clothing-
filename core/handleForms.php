<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertDesignerBtn'])) {

	$query = insertDesigner($pdo, $_POST['username'], $_POST['first_name'], 
		$_POST['last_name'], $_POST['date_of_birth'], $_POST['department']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}

}


if (isset($_POST['editDesignerBtn'])) {
    var_dump($_POST);
    $query = updateDesigner($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['date_of_birth'], $_POST['department'], $_GET['designer_id']);
    
    if ($query) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Update failed";
    }
}




if (isset($_POST['deleteDesignerBtn'])) {
	$query = deleteDesigner($pdo, $_GET['designer_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}



if (isset($_POST['insertNewPurchaseBtn'])) {
    $designer_id = $_POST['designer_id']; 
    $query = insertPurchase($pdo, $_POST['customer_name'], $_POST['item_name'], $_POST['price'], $designer_id);

    if ($query) {
        header("Location: ../viewpurchases.php?designer_id=" . htmlspecialchars($designer_id));
    } else {
        echo "Insertion failed";
    }
}



if (isset($_POST['editPurchaseBtn'])) {
    var_dump($_POST);
    $query = updatePurchase($pdo, $_POST['item_name'], $_POST['price'], $_GET['purchase_id']);

    if ($query) {
        header("Location: ../viewpurchases.php?designer_id=" . $_GET['designer_id']);
    } else {
        echo "Update failed";
    }
}



if (isset($_POST['deletePurchaseBtn'])) {
	$query = deletePurchase($pdo, $_GET['purchase_id']);

	if ($query) {
		header("Location: ../viewpurchases.php?designer_id=" .$_GET['designer_id']);
	}
	else {
		echo "Deletion failed";
	}
}




?>



