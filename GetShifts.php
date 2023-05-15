<?php
include("conn.php");

$departments = $_POST['department'];
$shifts = $_POST['shift'];

$collections = (new MongoDB\Client)->Lb6->duty;
$filter = ['department' => $departments, 'shift' => $shifts];
$projection = ['name' => 1, 'date' => 1];
$cursor = $collections->find($filter, $projection);

foreach ($cursor as $Documents) 
{
    foreach ($Documents['name'] as $nurses) {
        echo $nurses . " " . $Documents['date'] . "<br>";

        $result[] = $nurses;
        
    }
}

echo "<script>localStorage.setItem('request', '" . (json_encode($result)) . "');</script>";
?>