$(document).ready(function(){
$("#logout").click(function() {
    $.ajax({
        url: 'logout.php',
        type: 'post',
        success: function(response){
            window.location.replace("blur.html");
        console.log("wylogowano")
            // $('#possiblity').html(response);

        }
    });
})})