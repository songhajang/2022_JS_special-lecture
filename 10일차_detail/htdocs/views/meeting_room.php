
<!-- ======  HTML ======= -->
<select id="buildingList" class="form-select mt-5" onchange="onChangeBuilding(this.value)">
    <option selected>Choose building...</option>
<br>
</select>
<div id="meetingRoomList" class="row mt-2">
</div>

<!-- ======  JS ======= -->
<script>
    function onChangeBuilding(value){
        const ajaxParameters ={
            url :`/api/meeting_room?buildingId=${value}`,
            type : 'get',
            success : (res)=>{
                console.log('response',res);
            
            const rewponseJson = JSON.parse(res);
                if(rewponseJson.status !== 200){
                    alert('데이터를 불러올 수 ㅇ없습니다.')
                }
                const view = rewponseJson.data.map((meetingRoom)=>{
                    const {id,name} = meetingRoom;
                    return `
                    <div class="col-3">
                        <a href="/meeting_room_detail?meetingRoomId=${id}">
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title">${name}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                   `
                })
                console.log(view)
                $('#meetingRoomList').html('').append(view)
            }
        }
        $.ajax(ajaxParameters)
    }

    /**
     * 회의실 조회 API
     */
    function getBuilding(){
        const ajaxParameters = {
            url : '/api/building',
            type : 'get',
            success : (response)=>{
                const rewponseJson = JSON.parse(response);
                if(rewponseJson.status !== 200){
                    alert('데이터를 불러올 수 ㅇ없습니다.')
                }
                const view = rewponseJson.data.map((building)=>{
                    const {id,name,address} = building;
                    return `<option value="${id}">${name}</option>`
                })
                // console.log(view)
                $('#buildingList').append(view)
            }
        }
        $.ajax(ajaxParameters)
    }
    getBuilding()
</script>