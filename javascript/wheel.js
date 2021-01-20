let userChoice = null;
let betVal = 0;
let selectedUser = null;
let selectedUserScore = 0;
let selectedUserId = 0;
let newScore = 0;
let sign = '';
$('.startWheel').attr('disabled','disabled').css("opacity","0.5");
let mainArray = [];
const modeValues = [[331,359],[301,329],[271,299],[241,269],[211,239],[181,209],[151,179],[121,149],[91,119],[61,89],[31,59],[1,29]];

function createMainArray() {
    while(mainArray.length < 12) {
        mainArray.push(Math.floor(Math.random() * 12));
    }
}

function calculatePercentage() {
    let perSpan = document.getElementsByClassName('percentageSpan');
    let count = 0;
    let percentage = 0;
    for(var i=0;i<12;i++) {
        count = 0;
        percentage = 0;
        for(var j=0;j<12;j++) {
            if(i == mainArray[j]) {
                count++;
            }
        }
        percentage = (count / 12) * 100;
        if(percentage == 0) {
            perSpan[i].innerHTML = percentage + '%';
        }else {
            perSpan[i].innerHTML = percentage.toFixed(2) + '%';
        }
        
    }
}

$(document).ready(function(){
    createMainArray();
    calculatePercentage();
});

function spin(){ 
    let randomIndex = Math.floor(Math.random()*  12);
    let randomArrayValue = mainArray[randomIndex];
    let startingValue = modeValues[randomArrayValue][0];
    let endingValue = modeValues[randomArrayValue][1];
    let randomAngle = Math.floor(Math.random() * (endingValue - startingValue)) + startingValue;
    let lucky = false;

    selectedUserId=parseInt($('.selectedUser:checked').attr('data-uid'));

    $('.wheel').css("transform","rotate("+ randomAngle +"deg)");   
    $('.start').css("display","none");

    switch(userChoice) {
        case 'paambu':
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
        case 'scanner':
            if(randomAngle > 180 && randomAngle < 210) {
                lucky = true;
            }
            break;
        case 'kadukkan':
            if(randomAngle > 150 && randomAngle < 180) {
                lucky = true;
            }
            break;
        case 'makkan':
            if(randomAngle > 120 && randomAngle < 150) {
                lucky = true;
            }
            break;
        case 'shibuannan':
            if(randomAngle > 90 && randomAngle < 120) {
                lucky = true;
            }
            break;
        case 'mottasijo':
            if(randomAngle > 60 && randomAngle < 90) {
                lucky = true;
            }
            break;
        case 'paalkuppi':
            if(randomAngle > 30 && randomAngle < 60) {
                lucky = true;
            }
            break;
        case 'kundanbrijesh':
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
            $('#selectedModeByUser').html("<i class='far fa-check-circle pdspace'></i>"+userChoice);
            $('#selectedModeByUser').css("color","lime");
            $('.modeUserSelected').css({"background":"rgba(0, 255, 0, 0.205)","border":"1px solid rgba(0, 255, 0, 0.466)"});
        }else {
            newScore = betVal * 2;
            sign = '-';
            $('.winnerName').html(selectedUser +' '+ 'lost');
            $('#selectedModeByUser').html("<i class='far fa-times-circle pdspace'></i>"+userChoice);
            $('#selectedModeByUser').css("color"," rgb(238, 44, 44)");
            $('.modeUserSelected').css({"background":"rgba(255, 0, 0, 0.205)","border":"1px solid rgba(255, 0, 0, 0.466)"});
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
    $('#selectedModeByUser').html("<i class='far fa-question-circle pdspace'></i>"+userChoice);
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