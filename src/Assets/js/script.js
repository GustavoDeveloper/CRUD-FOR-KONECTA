// Login
$('#login').submit(function() {
    $.post('http://localhost/coffekonecta/src//Controller/Login/LoginController.php', {
        user: $('#userlogin').val(),
        pass: $('#passlogin').val(),
      },
      function(response) {
        if (response == true) {
          swal("Bienvenido", "", "success").then(function() {
            window.location.replace('vistaresponsable.php');
          })
        }else if (response == false) {
          swal("Oops...", "Usuario o Contraseña Incorretos", "error");
        }
      }, 'json');
    return false;
});