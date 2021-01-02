function checkCode() {
    let code = $("#group-gen-code").val();
    if(code.length > 3) {
        $.ajax({
            url: "ajax/checkGroupCode.ajax.php",
            type: "POST",
            data: {
                code: code
            },
            cache: false,
            success: function(dataResults) {
                let dataResult = JSON.parse(dataResults);
                console.log(dataResult.result);
                if(dataResult.result == 1) {
                    $(".correct-group").css("opacity","1");
                    $(".wrong-group").css("opacity","0");
                }else {
                    $(".correct-group").css("opacity","0");
                    $(".wrong-group").css("opacity","1");
                }
            }
        });
    }else {
        $(".wrong-group").css("opacity","0");
    }
}

$('#newPassword').on('change', function() {
    let newPassword = $('#newPassword').val();
    let lengthPassword = newPassword.length;
    let errorArray = [];

    if(lengthPassword < 6) {
        console.log("Sorry we need minimum 6 Digit password.");
        errorArray.push("Minimum 6 Digit");
    }
    let pattern1 = '[a-zA-Z]';
    if(!newPassword.match(pattern1)) {
        console.log("It should contain at least one character.");
        errorArray.push("At least one CHARACTER.");
    }
    let pattern2 = '[0-9]';
    if(!newPassword.match(pattern2)) {
        console.log("It should contain at least one Digit.");
        errorArray.push("At least one Digit");
    }

    if(errorArray.length != 0) {
        $('.log-button').attr('disabled', 'disabled').css({'opacity':'0.2'});
        $('#pass-error-box').children().remove();
        $('#pass-error-box').append('<span class="each-warn-message"><i class="fas fa-exclamation-triangle pdspace"></i> '+ errorArray[0] +'</span>');
    }else {
        $('.log-button').removeAttr('disabled').css({'opacity': '1'});;
        $('#pass-error-box').children().remove();
        $('#pass-error-box').append('<span class="each-warn-message" style="color: rgba(132, 253, 148, 0.651);"><i class="fas fa-check-circle pdspace"></i> All clear</span>');
    }
    
});
setParticles();
function setParticles() {
    const totalSnow = 1;
    let currentSnow = 0;
    setInterval(() => {
        let randomSnow = Math.floor(Math.random() * 100 );
        if(randomSnow % 2 == 0) {
            createParticle();
            currentSnow++;
        }
        if(currentSnow == totalSnow) {
            clearInterval(this);
        }
    }, 1);


}

function createParticle() {
    const screenWidth = Math.floor(Math.random() * 2000);
    const circle = document.createElement("div");
    let snowSpeed = 20;
    circle.classList.add('circle');
    circle.style.left = screenWidth + "px";
    circle.style.animationDuration = Math.floor(Math.random() * snowSpeed) + "s";
    circle.style.opacity = Math.random() * 1;
    if(screenWidth % 13 == 0) {
        circle.style.width = "8px";
        circle.style.height = "8px";
        circle.style.filter = "blur(10px)";
    }
    document.getElementById('snow-box').appendChild(circle);
}

