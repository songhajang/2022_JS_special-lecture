<?php
    $query = "SELECT * FROM building ORDER BY name ASC";
    // db 오류 검사
    $stmt = $db->prepare($query);
    // 값 저장
    $stmt->execute();
    
    $buildingReult = $stmt->fetchAll(PDO::FETCH_ASSOC);

$response = sendResopnse(200,"success", $buildingReult);
echo $response;


?>