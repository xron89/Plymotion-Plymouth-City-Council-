$(window).resize(function() {
    divCenter();
});

function divCenter()
{
    $('.content').css({
        position: 'absolute',
        left: ($(window).width() - $('.content').outerWidth()) / 2
    });
}

$(document).ready(function() {
    var screenWidth = $(document).width();
    var startPos = screenWidth;
    var bike = $('#bike');
    var bike2 = $('#bike2');
    
    $('.container_content').load(divCenter());
    $(window).resize();

    bikepass(bike, startPos);
    setInterval(function() {
        bikepass(bike, startPos);
    }, 9000);

    setTimeout(function()
    {
        bikepass2(bike2, startPos);
        setInterval(function() {
            bikepass2(bike2 ,startPos);
        }, 15000);
    }, 3000);
    
    $('#registerSubmit').click(function() {
            $('#registerForm').submit();
    });
    
    $('#adminSubmit').click(function() {
            $('#adminForm').submit();
    });
    
    $('#newAdminSubmit').click(function() {
            $('#adminRegForm').submit();
    });
});

function bikepass(bike, startPos) {
    bike.css('left', startPos);
    bike.animate({left: -200}, 7000, 'linear');
}

function bikepass2(bike, startPos) {
    bike.css('left', startPos);
    bike.animate({left: -450}, 8000, 'linear');
}

function registerPopup() {
    alert("Thank you for registering.\n" +
            "You will receive an email shortly to allow you to confirm your email.\n" +
            "This email will also contain your reference code");
}

function activatePopup() {
    alert("Your account is now activated.\n" +
            "Please login to continue.");
}


