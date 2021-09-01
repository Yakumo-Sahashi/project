$(document).ready(()=> {

  function cerrarSesion(accion){
    $.ajax({
      type: 'POST',
      data: 'funcion='+accion, 
      url:'model/login.php',
      success: (r)=>{
        if(r==="2"){
          swal({
            icon: "success",
            title: "Cerrando sesion...",
            html: true,
            text: '\n\n Estas siendo redirigido automaticamente...',
            closeOnClickOutside: false,
            closeOnEsc: false,
            value: true,
            buttons: false,
            timer: 1500
          }).then((value) => {
            window.location = "login";
          });
        }
      }
    });
  }
  
  $('#btnCerrarSesion').click(()=> {
    cerrarSesion(3);
  });
});