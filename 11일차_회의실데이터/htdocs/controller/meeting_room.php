<?php
// $buildingId = isset($_GET['building_id'])? $_GET['building_id'] : false;
$buildingId = $_GET['buildingId'];
// $meetingRoomResult = NULL;

    $query2 = "SELECT * FROM meeting_room where building_id=:building_id";
// db 오류 검사
$stmt2 = $db->prepare($query2);
$stmt2->bindParam(":building_id", $buildingId,PDO::PARAM_INT);
// 값 저장
$stmt2->execute();
$meetingRoomResult = $stmt2->fetchAll(PDO::FETCH_ASSOC);


$response = sendResopnse(200,"success", $meetingRoomResult);
echo $response;



?>