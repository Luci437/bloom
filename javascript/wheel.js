let userChoice = null;
let betVal = 0;
let selectedUser = null;
let selectedUserScore = 0;
let selectedUserId = 0;
let newScore = 0;
let sign = '';
$('.startWheel').attr('disabled','disabled').css("opacity","0.5");

function spin(){ 
    let randomAngle = Math.floor(Math.random()*  360);
    let lucky = false;

    selectedUserId=parseInt($('.selectedUser:checked').attr('data-uid'));

    $('.wheel').css("transform","rotate("+ randomAngle +"deg)");   
    $('.start').css("display","none");

    switch(userChoice) {
        case 'kattoor':
            if(randomAngle > 330 && randomAngle <= 359) {
                lucky = true;
            }
            break;
        case 'winModel':
            if(randomAngle > 300 && randomAngle < 330) {
                lucky = true;
            }
        case 'critical':
            if(randomAngle > 270 && randomAngle < 300) {
                lucky = true;
            }
            break;
        case 'vayaren':
            if(randomAngle > 240 && randomAngle < 270) {
                lucky = true;
            }
            break;
        case 'thomthom':
            if(randomAngle > 210 && randomAngle < 240) {
                lucky = true;
            }
            break;
        case 'mendos':
            if(randomAngle > 180 && randomAngle < 210) {
                lucky = true;
            }
            break;
        case '9kumar':
            if(randomAngle > 150 && randomAngle < 180) {
                lucky = true;
            }
            break;
        case 'makkan':
            if(randomAngle > 120 && randomAngle < 150) {
                lucky = true;
            }
            break;
        case 'robo':
            if(randomAngle > 90 && randomAngle < 120) {
                lucky = true;
            }
            break;
        case 'renizvazha':
            if(randomAngle > 60 && randomAngle < 90) {
                lucky = true;
            }
            break;
        case 'abinvanna':
            if(randomAngle > 30 && randomAngle < 60) {
                lucky = true;
            }
            break;
        case 'thambi':
            if(randomAngle > 0 && randomAngle < 30) {
                lucky = true;
            }
            break;
    }
    setTimeout(() => {
        $('.result').css({"display":"block","opacity": "1"});
        if(lucky) {
            newScore = betVal * 2;
            sign = '+';
            $('.winnerName').html(selectedUser +' '+ 'win');
        }else {
            newScore = betVal * 2;
            sign = '-';
            $('.winnerName').html(selectedUser +' '+ 'lost');
        }
        $('.newValue').html(sign+' '+newScore);
        $('.newScore').html(selectedUserScore);


    }, 17000);
}


function getUserBetValue(el) {
    betVal = $(el).val();
    $('.betVal').html(betVal);
    checkAllDataCollected();
}
// this is where we collect the selected user
$('.selectedUser').on('change',function() {

    $('#totalVal').attr('max',0);
    $('.betVal').html(0);
    betVal = 0;

    selectedUser = $('.selectedUser:checked').val();
    selectedUserScore=parseInt($('.selectedUser:checked').attr('data-score'));
    $('#totalVal').attr('max',selectedUserScore);
    checkAllDataCollected();
});
// this is where we collect the selected mode
$('.userSelectedMode').on('change',function() {
    userChoice = $('.userSelectedMode:checked').val();
    checkAllDataCollected();
});

function showWheel() {
    $('.wheelMainBox').css("display","flex");
}

function checkAllDataCollected() {

    if(selectedUser != null && userChoice != null && betVal > 0) {
        $('.startWheel').removeAttr('disabled').css("opacity","1");
    }else {
        $('.startWheel').attr('disabled','disabled').css("opacity","0.5");
    }
}
let dummyValue = 0;
function showResult() {
    $('.resultBox').css("display","flex");
    if(sign == '-') {
        dummyValue = selectedUserScore - newScore;
        takeAway();
    }else {
        dummyValue = selectedUserScore + newScore;
        giveMe();
    }
    $.ajax({
        url: 'ajax/afterWheels.ajax.php',
        type: 'POST',
        data: {
            id: selectedUserId,
            score: dummyValue
        },
        success: function(dataResult) {
            console.log(dataResult);
        }
    });
}

function takeAway() {
    setTimeout(() => {
        let tt = setInterval(() => {
            if(dummyValue < selectedUserScore) {
                selectedUserScore -= 1;
                $('.newScore').html(selectedUserScore);
            }else {
                clearInterval(tt);
            }
        }, 100);
    }, 1000);
}

function giveMe() {
    setTimeout(() => {
        let tt = setInterval(() => {
            if(dummyValue > selectedUserScore) {
                selectedUserScore += 1;
                $('.newScore').html(selectedUserScore);
            }else {
                clearInterval(tt);
            }
        }, 100);
    }, 1000);
}

function reload() {
    window.location.href = '';
}