let luckyPlayerName = "";
let luckyPlayerId;

function findLucky() {
    let playerName = document.getElementsByClassName('available-playerName');
    let playerBox = document.getElementsByClassName('box1-player-box');
    let totalPlayer = playerBox.length;
    let allPlayerId = document.getElementsByClassName('player-id');

    let currentplayer = 0;

    $('.waiting-box').css("display","flex");
    let findLuckyTimer = setInterval(() => {
        for(let i=0;i<totalPlayer;i++) {
            if(i == currentplayer) {
                playerBox[i].classList.add("this-player");
            }else {
                playerBox[i].classList.remove("this-player");
            }
        }
        currentplayer++;
        if(currentplayer == totalPlayer) {
            currentplayer = 0;
        }
        }, 100);

    setTimeout(() => {
        $('.waiting-box').html('<h4 class="waiting-text">We found him</h4>');
        setTimeout(() => {
            $('.waiting-box').css("display","none");
        }, 1000);
        clearInterval(findLuckyTimer);

        for(let i=0;i<totalPlayer;i++) {
            playerBox[i].classList.remove("this-player");
        }

        let luckyPlayer = Math.floor(Math.random()*totalPlayer);
        luckyPlayerName = playerName[luckyPlayer].innerHTML;
        luckyPlayerId = allPlayerId[luckyPlayer].value;
        playerBox[luckyPlayer].classList.add("lucky-player-box");
        $('.box2').css("display","flex");
        $('.selected-player-name').html(playerName[luckyPlayer].innerHTML);
        
    }, 5000);
    
}

function getCard() {
    $('.box1').css("display","none");
    $('.box2-button-box').css("display","none");
    $('.confirmation-answer').html(", that was a bold move....");
    $('.card-box').css("display","flex");
    let countdown = 9;

    let countInterval = setInterval(() => {
        $('.countdown').html(countdown);
        countdown--;
        if(countdown == -1) {
            findTask();
            clearInterval(countInterval);
        }
    }, 1000);
}

function findTask() {
    let taskHeading = ['Winner','Exchange','Boost 10','Loss 10'];
    let taskDescription = ['You win the game','You exchange your point with ','You get 10 more points','Your 10 points is deducted'];
    let playerName = document.getElementsByClassName('available-playerName');
    let totalPlayer = playerName.length;
    let totalTask = taskHeading.length;
    let allPlayerId = document.getElementsByClassName('player-id');

    let randomTask = Math.floor(Math.random() * totalTask);
    let selectedTask = taskHeading[randomTask];

    if(selectedTask == 'Exchange') {
        let randomPlayer = Math.floor(Math.random() * totalPlayer);
        let flag = 0;
        while(flag == 0) {
            randomPlayer = Math.floor(Math.random() * totalPlayer);
            if(luckyPlayerName != playerName[randomPlayer].innerHTML) {
                flag = 1;
                break;
            }else {
                continue;
            }
        }

        let exchangePlayerId = allPlayerId[randomPlayer].value;
        $.ajax({
            url: 'ajax/lucky.ajax.php',
            type: 'POST',
            data: {
                myid : luckyPlayerId,
                himid : exchangePlayerId,
                mode : 'Exchange'
            },
            success: function(dataResult) {
                console.log(dataResult);
            }
        });

        $('.header-title').html(taskHeading[randomTask]);
        $('.header-text').html(taskDescription[randomTask]+" "+playerName[randomPlayer].innerHTML);


    }else if (selectedTask == 'Winner') {
        $.ajax({
            url: 'ajax/lucky.ajax.php',
            type: 'POST',
            data: {
                himid : luckyPlayerId,
                mode : 'winner'
            },
            success: function(dataResult) {
                console.log(dataResult);
            }
        });

        $('.header-title').html(taskHeading[randomTask]);
        $('.header-text').html(taskDescription[randomTask]);
    }else if(selectedTask == 'Boost 10') {
        $.ajax({
            url: 'ajax/lucky.ajax.php',
            type: 'POST',
            data: {
                gainUserId: luckyPlayerId,
                mode: 'boost_10'
            },
            success: function(dataResult) {
                console.log(dataResult);
            }
        });

        $('.header-title').html(taskHeading[randomTask]);
        $('.header-text').html(taskDescription[randomTask]);
    }else if(selectedTask == 'Loss 10') {
        $.ajax({
            url: 'ajax/lucky.ajax.php',
            type: 'POST',
            data: {
                gainUserId: luckyPlayerId,
                mode: 'loss_10'
            },
            success: function(dataResult) {
                console.log(dataResult);
            }
        });

        $('.header-title').html(taskHeading[randomTask]);
        $('.header-text').html(taskDescription[randomTask]);
    }


    $('.card-box').css("transform","rotateY(180deg)");
    setTimeout(() => {
        console.log("Entered here");
        window.location = "amongus.php";
    }, 5000);
}