<!-- 처음은 php 중간 html 끝 js -->
<!-- ====== PHP ====== -->
<?php
$pwd = getcwd();
include("{$pwd}/includes/DBConnection.php");

$query = "SELECT * FROM building ORDER BY name ASC";
$stmt = $db ->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['building_id'])){
    $query2 = "SELECT * FROM meeting_room WHERE building_id=?";
    $stmt = $db->prepare($query);
    $stmt->bindParam(1, $_GET['building_id'], PDO::FETCH_ASSOC);
    $stmt->execute();
    $meetingRoomResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!-- 건물 선택 -->
<select class="form-select" aria-label="Default select example" onchange="onChangBuilding(this.value)">
  <option selected>건물을 선택해주세요</option>

  <?php
  // 건물 검색 결과 반복
    foreach($result as $value){
        ?>
        <option value='<?=$value['id']?>'><?=$value['name']?></option>
        <?php
    }
  ?>
  <option value="1">컴과고 효봉관</option>
  <option value="2">선화여중</option>
</select>
<br>

<!-- ====== HTML ====== -->
<!-- 회의실 선택 -->
<div class="row">
    <?php 
    if(isset($meetingRoomResult)){
    foreach($result as $value){ ?>
    <div class="col-3">
        <div class="card" style="width: 100%;">
            <img src="https://www.justcoglobal.com/coworking/images/meeting-rooms.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?=$value['name']?></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <?php 
    } // foreach
    } // if
    else {
        echo "<h3>건물을 선택해주세요.</h3>";
    }
    ?>
</div>

<!-- ====== JS ====== -->
<!-- JS -->
<script>

function onChangeBuilding(value) {
    document.location.href = `/meeting_room?building_id=${value}`      //중요함(페이지 작동시킬때 등등 이용가능)

}

</script>