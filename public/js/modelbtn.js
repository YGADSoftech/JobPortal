$(document).ready(function(){

    $("#loginToReg").on('click',function() {
        // if($('#myLoginModal').hasClass('in'))
        // {
            $('#myLoginModal').modal('hide');
        // }

        // if($('#signup').hasClass('in'))
        // {
        //     $('#signup').modal('hide');
        // }

        //  if(!$('#myLoginModal').hasClass('in'))
        // {
        //     $('#myLoginModal').modal('show');
        // }

        // if(!$('#signup').hasClass('in'))
        // {
            $('#signup').modal('show');
        // }
    });

    $("#RegToLogin").on('click',function() {
        // if($('#signup').hasClass('in'))
        // {
            $('#signup').modal('hide');
        // }

        // if($('#signup').hasClass('in'))
        // {
        //     $('#signup').modal('hide');
        // }

        //  if(!$('#myLoginModal').hasClass('in'))
        // {
            $('#myLoginModal').modal('show');
        // }

        // if(!$('#signup').hasClass('in'))
        // {
        //     $('#signup').modal('show');
        // }
    });

});
