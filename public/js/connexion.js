
$("#connexion").submit(function (e){
    e.preventDefault();

    var $this = $(this);

    var pseudo = $('#login').val();
    var pass = $('#password').val();

    if(pseudo === '' || pass === ''){
        $("#errorID").css("visibility", "inherit");
    }else{
        $.post("../app/Model/connexion.php", { login : pseudo, pass : pass}, function ( data) {
            if(data == 1){
                window.location.replace("index.php?p=home");
            }else{

            }
        });



    }
})