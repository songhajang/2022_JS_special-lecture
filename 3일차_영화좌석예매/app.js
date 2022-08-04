/* 
시트 조건
0 : 통로
1 : 선택 가능
2 : 선택됨
3 : 예약 완료
*/


// 데이터 바꾸기 

let seats = [
    [1,1,0,1,1,0,0,0,0,1,1,0,1,1],
    [1,1,0,1,1,1,1,1,1,1,1,0,1,1],
    [1,1,0,1,1,1,1,1,1,1,1,0,1,1],
    [1,1,0,1,1,1,1,1,1,1,1,0,1,1],
    [0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [1,1,0,1,1,1,1,1,1,1,1,0,1,1]
];
let selectedSeats = [];
const seatsDiv = document.getElementById('seats');
const selectedSeatsDiv = document.getElementById('selected_seats');

/**
 * 시트 그리기 함수
 * --  //함수이름 크게
 * @param {string} a  // 파라미터
 */

// fuction creatsSeate () {} == createSeat = () => {}
const createSeat = (a) => {
    let container = document.createElement('div');
    let newSeat ;

    // seatDiv 내부 초기화
    seatsDiv.innerHTML = '';

    // foreach랑 동일 map 은 리턴 가능 // index == 번지수
    seats.map((seatRow, seatRowindex)=>{
        seatRow.map((seat, seatindex)=>{
            newSeat = document.createElement('div');
            newSeat.classList.add(
                'seat', 
                seat === 1 && 'enable',
                seat === 2 && 'disable',
                seat === 3 && 'soldout',
                
            ) // classList
            
            newSeat.classList.contains('enable') && newSeat.addEventListener('click', headClickSeat)|| newSeat.classList.contains('disable') && newSeat.addEventListener('click', headClickSeat);
            newSeat.data = {
                x: seatRowindex,
                y: seatindex,
                value: seat
                // 좌표와 값을 받아와 값으로 선택가능한지 판별
            }
            container.appendChild(newSeat);

        }); //seateRow.map
    }); // seats.map

    seatsDiv.appendChild(container);
}
/**
 * 선택좌석 토글 함수
 * --
 */
const handleToggle = () => {
    let container = document.createElement('p');
    let newSeat = '';

    selectedSeatsDiv.innerHTML=''
    if(selectedSeats.length > 0){
        selectedSeats.map((seat)=>{
            const {x,y} = seat;
            newSeat += `[${x}행 ${y}열]`;
        });//seat map

        // debugger; js 디버깅 하는 방법
        container.textContent = newSeat; // 글자 삽입
        selectedSeatsDiv.appendChild(container);
        selectedSeatsDiv.style.display = 'block';
    }else{
        selectedSeatsDiv.style.display = 'none';
    }
}

/**
 * 시트 클릭함수
 * --
 */

const headClickSeat = (event) => {;
    let {x,y,value} = event.target.data

    if( value === 1){
        event.target.classList.toggle('disable');
        event.target.data.value = 2
        selectedSeats.push({x,y,value:2});

    }else if(value === 2){
        if(confirm('선택을 취소하시겠습니까?')){
            const findIndex = selectedSeats.findIndex(seat => seat.x === x && seat.y === y);
            if(findIndex >= 0){
                event.target.classList.toggle('disable');
                event.target.data.value = 1;
                selectedSeats.splice(findIndex, 1);
                // 선택한 배열 위치부터 뒤에꺼 싹다 지움 // 파라미터 지정필요 1 == 한개의 파라미터를 지우겠다.라는뜻
                //*splice == 원본에 지장있음 , slice == 원본에 지장없음 (작동방식 동일)
            }
        }
    }

    handleToggle();
}
/**
 * 예약 완료 처리 함수
 * --
 */
const heandleSoldout = () => {
    if(selectedSeats.length > 0){
        // 2가 맞는지 검사
        selectedSeats.map((seat) => {
            const {x,y,value} = seat;
            if(seat.value !== 2){
                return alert('선택된 좌석이 아닙니다. \n 확인해주세요');
            }
            seats[x][y] = 3;
        });
        selectedSeats = [];
        handleToggle();
        createSeat();
    }else{
        alert('좌석을 선택해주세요');
    }
}