if( $('#clave2').val().length===0){
    $('#advertencia').hide();

}


$(window).on("load", function(){
    let btn=$('#btn1').on("click",function(){
        alert("Independencia");
    })
    $('#advertencia').hide();
    $('#adver-pin').hide();
    $("#adver-clave").hide();
    $("#info-clave").hide();
    $('#checa').on("click",function(){
        $(this).is(':checked') ? $('#password').attr('type', 'text') : $('#password').attr('type', 'password');
       });
       $('#formulario').on("submit",function(e){
         if ($('#clave1').val() != $('#clave2').val()){
            e.preventDefault();
            $('#advertencia').html('las contraseñas no coinciden');

         }
         if ($('#pin').val() != $('#realpin').val()){
            e.preventDefault();
            

         }
        });
        $('#clave2').on("keyup",function(e){
            $('#advertencia').show();
            
            if ($('#clave2').val() != $('#clave1').val() ){
               $('#advertencia').html('las contraseñas no coinciden');
               $('#advertencia').attr('class', 'alert alert-danger')
   
            }else{
                $('#advertencia').html('ahora puedes continuar');
                $('#advertencia').attr('class', 'alert alert-success')
            }
            if (e.keyCode==8 &&  $('#clave2').val().length==0 ){
                $('#advertencia').hide();
            

            }
        });
        $('#pin').on("keyup",function(e){
            $('#adver-pin').show();
            
            if ($('#pin').val() != $('#realpin').val() ){
               $('#adver-pin').html('pin incorrecto');
               $('#adver-pin').attr('class', 'alert alert-danger')
   
            }else{
                $('#adver-pin').html('pin valido');
                $('#adver-pin').attr('class', 'alert alert-success')
            }
            if (e.keyCode==8 &&  $('#pin').val().length==0 ){
                $('#adver-pin').hide();
            }    
        });
        $('#clave1').on('keyup',function(e){
            $("#adver-clave").show();
            $("#info-clave").show();
           /* const pbasico=/^[\w{4,5}]$/;
            const pmedio=/^[\w{6,10}|\w{5,9}\W+]$/;
            const psolido=/^[\w{11,}|\w{10,}\W+]$/;
            */
           let pbasico=/\w{1,5}/;
           let pmedio=/\w{0,4}\W+\w{4,}|\w{0,4}[A-Z]+\w{4,}|\w{4,}\W+/;
           let psolido=/[A-Z]+\w{4,}\W+\d{2,}|\w{1,4}[A-Z]+\w{1,4}\W+\d{2,}|\W+\w{0,4}[A-Z]+\w{1,4}\d{2,}|\d{2,}\W+\w{4,}/;
           $("#info-clave").html('Una clave solida debe tener al menos 1 letra mayúscula, un carácter especial y 2 digitos');
            if (pbasico.test($('#clave1').val())){
                $('#adver-clave').html('Su clave es fragil');
                $('#adver-clave').attr('class', 'alert alert-danger');
            }
            
            if (pmedio.test($('#clave1').val())){
                $('#adver-clave').html('Su clave es aceptable');
                $('#adver-clave').attr('class', 'alert alert-primary');
            }
            if (psolido.test($('#clave1').val())){
                $('#adver-clave').html('Su clave es sólida');
                $('#adver-clave').attr('class','alert alert-success');
            }
           
            if (e.keyCode==8 &&  $('#clave1').val().length==0 ){
                $('#adver-clave').hide();
                $("#info-clave").hide();
            }
        });
    
  });
/*
let casilla=$("#checa").on("click",function(){
        console.log(txtpassword.type);
        if(txtpassword.type=="password"){
            txtpassword.type="text"
        }else{
            txtpassword.type="password";
        }

    })
let x= $(document);
x.ready(IniciarEventos);
function IniciarEventos(){
    let boton1=$("#btn1");
    boton1.click(activame);
}
function activame(){
    alert("Me has activado, gracias");
}
$(window).on("load", function(){
    
  });



var casilla=document.getElementById('checa');
var inputclave=document.getElementById('password');
casilla.addEventListener('click',mostrarClave);
function mostrarClave(){
    if (inputclave.type=="password"){
        inputclave.type="text";
    }else{
        inputclave.type="password";
    }
}*/