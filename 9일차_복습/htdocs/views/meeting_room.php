<!-- ======  PHP ======= -->
<?php
$query = "SELECT * FROM building ORDER BY name ASC";
// db 오류 검사
$stmt = $db->prepare($query);
// 값 저장
$stmt->execute();

$buildingReult = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $buildingId = isset($_GET['building_id'])? $_GET['building_id'] : false;
$buildingId = 1;
// $meetingRoomResult = NULL;
if ($buildingId != false){

    $query2 = "SELECT * FROM meeting_room where building_id=:building_id";
// db 오류 검사
    $stmt2 = $db->prepare($query2);
    $stmt2->bindParam(":building_id", $buildingId,PDO::PARAM_INT);
    // 값 저장
    $stmt2->execute();

    $meetingRoomResult = $stmt2->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!-- ======  HTML ======= -->
<select class="form-select" value="<?=$buildingId?>" onchange="onChangeBuilding(this.value)">
    <option selected>Choose building...</option>
    <?php foreach($buildingReult as $building){?>
        <option value="<?=$building['id']?>"><?=$building['name']?></option>
    <?php } ?>
</select>
<div class="row">
    <?php if( $buildingId != false){
        foreach($meetingRoomResult as $meetingRoom){
        ?>
        <div>
            <div class="card" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title"><?=$meetingRoom['name']?></h5>
            </div>
        </div>
        </div>
    <?php 
    } }?>
</div>
<!-- ======  JS ======= -->
<script>
    function onChangeBuilding(value){
        document.location.href=`/meeting_room?building_id=${value}`;
    }
</script>