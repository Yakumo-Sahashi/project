$(document).ready(() => {

  function iniciarSesion() {

    if ($('#usuario').val() == "" && $('#password').val() == "") {
      alertaLg("Desbes llenar todos los campos!");
      return false;
    } else if ($('#usuario').val() == "") {
      alertaLg("Debes ingresar un nombre de usuario!");
      return false;
    } else if ($('#password').val() == "") {
      alertaLg("Debes ingresar un password!");
      return false;
    } else {
      //loader.opening();
    }

    $.ajax({
      type: 'POST',
      data: $('#frmLogin').serialize(),
      url: 'model/login.php',
      success: (r) => {
        if (r === "2") {
          setTimeout(() => {
            //ending();
            window.location = "home";
          }, 2000);
        } else {
          //$('#login_inic')[0].reset();    
          //loader.ending();
          alertaLg("Usuario o contraseña incorrectos! " + r);
          return false;
        }
      }
    });
  }

  function alertaLg(msj) {
    swal({
      title: "Error!",
      text: msj,
      icon: "warning",
      button: "Ok!",
    });
  }

  $('#btnSesion').click(() => {
    iniciarSesion();
  });

  $("#frmLogin").keypress((e) => {
    var code = (e.keyCode ? e.keyCode : e.which);
    if (code == 13) {
      iniciarSesion();
    }
  });

});