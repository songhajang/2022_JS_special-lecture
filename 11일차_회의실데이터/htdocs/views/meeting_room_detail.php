
<!-- ======  HTML ======= -->
</select>
<div id="meetingRoomList" class="row">
    <!-- title -->
    <div class="col-12">
        <br>
        <h3 id="meeting_room_title">TITLE</h3>
        <p id="meeting_room_comment">description</p>
    </div>

    <!-- img -->
    <div class="col-8">
        <div id="meeting_room_img">

        </div>
    </div>
    <!-- PAYMENT -->
    <div class="col-4 card" style="padding : 15px;">
        <h3>예약시간</h3>
        <div class="row">
            <!-- 시작시간 -->
            <div class="col-6">
            <select class="form-select" onchange="onChangeTime('start',this.value)" aria-label="Default select example">
                <option selected>시작시간</option>
                <option value="8">8시</option>
                <option value="9">9시</option>
                <option value="10">10시</option>
                <option value="11">11시</option>
                <option value="12">12시</option>
                <option value="13">13시</option>
                <option value="14">14시</option>
                <option value="15">15시</option>
                <option value="16">16시</option>
                <option value="17">17시</option>
                <option value="18">18시</option>
                <option value="19">19시</option>
            </select>
            </div>
            <!-- 종료시간 -->
            <div class="col-6">
            <select class="form-select" onchange="onChangeTime('end',this.value)"  aria-label="Default select example">
                <option selected>종료시간</option>
                <option value="8">8시</option>
                <option value="9">9시</option>
                <option value="10">10시</option>
                <option value="11">11시</option>
                <option value="12">12시</option>
                <option value="13">13시</option>
                <option value="14">14시</option>
                <option value="15">15시</option>
                <option value="16">16시</option>
                <option value="17">17시</option>
                <option value="18">18시</option>
                <option value="19">19시</option>
            </select>
            </div>
        </div>
        <br>

        <div>
            <!-- 단가 푯시 -->
            <h5>단가</h5>
            <p id="meeting_room_price">-</p>
        </div>
        <!-- 선택시간 -->
        <div>
            <h5>선택시간</h5>
            <p id="meeting_room_time">-
            </p>
        </div>
        <div>
            <h5>합계</h5>
            <h4 id="meeting_room_total_price">
            </h4>
        </div>
        <div>
            <button type="button" class="btn btn-primary " onclick="onComplete();">예약완료</button>
        </div>
    </div>
</div>

<!-- ======  JS ======= -->
<script>

    /**
     * 회의실 조회 API
     */
    
    const meetingRoomId = <?=$_GET['meetingRoomId'] ?>;
    let startTime = null;
    let endTime = null;
    let diffTime = null;
    let price = 0;
    let totalPrice = 0;

    function getMeetingRoom(meetingRoomId){
        const ajaxParameters = {
            url : `/api/meeting_room/detail?meetingRoomId=${meetingRoomId}`,
            type : 'get',
            success : (response)=>{
                const rewponseJson = JSON.parse(response);
                if(rewponseJson.status !== 200){
                    alert('데이터를 불러올 수 ㅇ없습니다.')
                }
                price = rewponseJson.data[0].price;
                $('#meeting_room_title').text(rewponseJson.data[0].name);
                $('#meeting_room_comment').text(rewponseJson.data[0].comment);
                $('#meeting_room_price').text(`시간당 ${rewponseJson.data[0].price}원`);
                $('#meeting_room_img').html(
                    `<img src="${rewponseJson.data[0].img}" class="img-fluid" alt="..." width="100%">`
                    );
            }
        }
        $.ajax(ajaxParameters)
    }
    getMeetingRoom(meetingRoomId);  
    

/**
 * 선택시간 함수
 * --
 */
    // Call area]
    function onChangeTime(type,value){
        const val = Number(value);
        if(type === 'start'){
            if( endTime !== null && val >= endTime){
                alert('시작시간은 종료시간을 넘길 수 없습니다.')
                return
            }
            startTime = val;
        }else{
            if( startTime !== null &&  val <= startTime){
                alert(`종료시간${val}은 시작시간${startTime}보다 낮게 설정할 수 없습니다.`)
                return
            }
            endTime = val;

        }

        diffTime = endTime - startTime;
        totalPrice = diffTime <= 0 ? 0: price * diffTime;
        $('#meeting_room_time').text(`
            ${startTime ? `${startTime}:00` : `--:--` }     ~     ${endTime ? `${endTime}:00` : `--:--` }(${diffTime}시간)   
            
            `)
        $('#meeting_room_total_price').text(`${totalPrice}원`)
    }


    function onComplete(){
        if(startTime == null && endTime == null && totalPrice <= 0 ){
            alert('모든 항목을 선택해주세요')
            return
        }
        const confirmRewult = confirm(`최종금액은 ${totalPrice}웝 입니다. \n 예약을 확정하시겠습니까??`)
        if(confirmRewult === false){
            return
        }
        alert('확정되었습니다')
    }
</script>