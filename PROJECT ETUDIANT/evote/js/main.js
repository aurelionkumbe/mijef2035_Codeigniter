$(document).ready(function(){

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

});

function countdown(sec){
    setTimeout( function(){
        $('#Winnercoutdown span').html(sec);
        if(sec == 0){
            window.location.href = "http://aurelionkumbe/evote/index.php/home/winner/all";
            return false;
        }
        countdown(sec - 1);
    } , 1000);
}

