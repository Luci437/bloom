function setAll() {
    const firstPlayerId = $('.allPlayerDetails').eq(0).val();
    const secondPlayerId = $('.allPlayerDetails').eq(1).val();

    let selector = Math.floor(Math.random() * 2);
    let selectorPlayer;
    
    if(selector == 0) {
        selectorPlayer = secondPlayerId;
    }else {
        selectorPlayer = firstPlayerId;
    }

    let fakeArray = [];
    let totalOnes = 0;
    let totalZeros = 0;
    let values;

    while(fakeArray.length < 5) {
        values = Math.floor(Math.random() * 2);

        if(values == 1) {
            if(totalOnes < 3) {
                fakeArray.push(values);
                totalOnes++;
            }else {
                if(totalZeros < 2) {
                    fakeArray.push(0);
                    totalZeros++;
                }
            }
        }else {
            if(totalZeros < 2) {
                fakeArray.push(values);
                totalZeros++;
            }else {
                if(totalOnes < 3) {
                    fakeArray.push(1);
                    totalOnes++;
                }
            }
        }
    }

    console.log(fakeArray);

    for(x in fakeArray) {
        if(fakeArray[x] == selector) {
            $('.playerName').eq(x).html($('.allPlayerDetails').eq(0).attr('data-player'));
            $('.frontFace').eq(x).attr('data-userId',$('.allPlayerDetails').eq(0).val());
        }else {
            $('.playerName').eq(x).html($('.allPlayerDetails').eq(1).attr('data-player'));
            $('.frontFace').eq(x).attr('data-userId',$('.allPlayerDetails').eq(1).val());
        }
    }
}

let totalCardSelected = 0;
let previousId = false;
let clickable = true;

function revealCard(card) {
    if(clickable) {
        if(totalCardSelected < 3) {
            $(card).css("opacity","0");
            totalCardSelected++;
            if(!previousId) {
                previousId = $(card).attr("data-userId");
            }
            if(previousId != $(card).attr("data-userId")) {
                previousId = -1;
                totalCardSelected = 4;
                clickable = false;
            }
        } 
        if(previousId != -1 && totalCardSelected == 3) {
            $('.cardMainBox').addClass('shake');
            $.ajax({
                url: "ajax/devils.ajax.php",
                type: "POST",
                data: {
                    user_id: $(card).attr("data-userId")
                },
                success: function(result) {
                    console.log(result);
                }
            });
            setTimeout(() => {
                $('.endTitle').html('YOU HAVE BEEN OOKED');
                $('.endScreen').css("visibility","visible");
            }, 2000);
            clickable = false;
        }
        if(previousId == -1) {
            $('body').css("box-shadow","0 0 200px 50px rgba(0,0,0,0.9) inset");
            setTimeout(() => {
                $('.endTitle').html('M.F ESCAPED, C.U NEXT TIME');
                $('.endScreen').css("visibility","visible");                
            }, 2000);
            clickable = false;
        }
    }
}