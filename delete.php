<?php

require_once "../../App//classes/VehicleManager.php";

$VehicleManager = new VehicleManager('', '', '', '');
$id = $_GET['id'] ?? null; //closing

if ($id === null) {
    header("Location: ../index.php");
    exit;
}

$vehicles = $VehicleManager->getVehicles();
$vehicle = $vehicles[$id] ?? null;

if (!$vehicle) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
        $VehicleManager->deleteVehicle($id);
    }
    header("Location: ../index.php");
    exit;
}

include './header.php';
?>

<div class="container my-4">
    <h1>Delete Vehicle</h1>
    <p>Are you sure you want to delete <strong></strong>?</p>
    <form method="POST">
        <button type="submit" name="confirm" value="yes" class="btn btn-danger">Yes, Delete</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>