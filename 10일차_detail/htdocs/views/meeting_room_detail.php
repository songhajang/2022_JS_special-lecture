
<!-- ======  HTML ======= -->
<select id="buildingList" class="form-select mt-5" onchange="onChangeBuilding(this.value)">
    <option selected>Choose building...</option>
<br>

</select>
<div id="meetingRoomList" class="row">
    <!-- title -->
    <div class="col-12">
        <h3 id="meeting_room_title">TITLE</h3>
        <p id="meeting_room_address">description</p>
    </div>

    <!-- img -->
    <div class="col-8">
        <p>img</p>
    </div>
    <!-- PAYMENT -->
    <div class="col-4">
        <p>pay</p>
    </div>
</div>

<!-- ======  JS ======= -->
<script>

    /**
     * 회의실 조회 API
     */
    
    const meetingRoomId = <?=$_GET['meetingRoomId'] ?>;

    function getMeetingRoom(meetingRoomId){
        const ajaxParameters = {
            url : `/api/meeting_room/detail?meetingRoomId=${meetingRoomId}`,
            type : 'get',
            success : (response)=>{
                const rewponseJson = JSON.parse(response);
                if(rewponseJson.status !== 200){
                    alert('데이터를 불러올 수 ㅇ없습니다.')
                }
                $('#meeting_room_title').text(rewponseJson.data[0].name);
                $('#meeting_room_address').text(rewponseJson.data[0].address);
            }
        }
        $.ajax(ajaxParameters)
    }
    getMeetingRoom(meetingRoomId);  
</script>