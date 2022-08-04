/* 
시트 조건
0 : 통로
1 : 선택 가능
2 : 선택됨
3 : 예약 완료
*/


// 좌석배치_예약가능확인
let seats = [
    [2,1,0,1,1,0,0,0,0,1,1,0,1,1],
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
    if(selectedSeats.length > 0){
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
        selectedSeats.push({x,y});
    }else if(value === 2){
        if(confirm('선택을 취소하시겠습니까?')){
            const findIndex = selectedSeats.findIndex(seat => seat.x === x && seat.y === y);
            selectedSeats.splice(findIndex);
        }
    }

    handleToggle();
}

//  3일차 데이터 바꾸기 ? 한대연