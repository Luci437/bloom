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


