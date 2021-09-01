$(document).ready(()=> {

  function cerrarSesion(accion){
    $.ajax({
      type: 'POST',
      data: 'funcion='+accion, 
      url:'model/login.php',
      success: (r)=>{
        if(r==="2"){
          setTimeout(()=>{
            window.location="login";
          },3000); 
        }
      }
    });
  }
  
  $('#btnCerrarSesion').click(()=> {
    cerrarSesion(3);
  });
});