/**
 * Created by User on 26.9.2022 г..
 */
function run1() {
    var different = document.getElementsByClassName('type_pack1')[0].value;
    if (different == 1) {
        $( ".different_row1" ).removeClass( "hidden" );
        $( ".hide_number1" ).addClass( "hidden" );
    }
    else {
        $( ".different_row1" ).addClass( "hidden" );
        $( ".hide_number1" ).removeClass( "hidden" );
    }
}
// 2
function run2() {
    var different = document.getElementsByClassName('type_pack2')[0].value;
    if (different == 2) {
        $( ".different_row2" ).removeClass( "hidden" );
        $( ".hide_number2" ).addClass( "hidden" );
    }
    else {
        $( ".different_row2" ).addClass( "hidden" );
        $( ".hide_number2" ).removeClass( "hidden" );
    }
}

// 3
function run3() {
    var different = document.getElementsByClassName('type_pack3')[0].value;
    if (different == 3) {
        $( ".different_row3" ).removeClass( "hidden" );
        $( ".hide_number3" ).addClass( "hidden" );
    }
    else {
        $( ".different_row3" ).addClass( "hidden" );
        $( ".hide_number3" ).removeClass( "hidden" );
    }
}