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
    
    $('.container_content').load(divCenter());
    $(window).resize();
  
    $('#registerSubmit').click(function() {
            $('#registerForm').submit();
    });
    
    $('#adminSubmit').click(function() {
            $('#adminForm').submit();
    });
    
    $('#newAdminSubmit').click(function() {
            $('#adminRegForm').submit();
    });
    
    $('#retrieveDetailsSubmit').click(function() {
            $('#retrieveDetailsForm').submit();
    });
    
    $('#resendEmailSubmit').click(function() {
            $('#resendEmailForm').submit();
    });
});


