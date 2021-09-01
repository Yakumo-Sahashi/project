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
          swal({
            icon: "success",
            title: "Credenciales de acceso validas!",
            html: true,
            text: '\n\n Estas siendo redirigido automaticamente...',
            closeOnClickOutside: false,
            closeOnEsc: false,
            value: true,
            buttons: false,
            timer: 1500
          }).then((value) => {
            window.location = "home";
          });
        } else {
          alertaLg("Usuario o contraseña incorrectos! "+r);
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