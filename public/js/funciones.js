  // Change the type of input to password or text
  
 
  function Toggle() {
    let temp = document.getElementById("typepass");
     
    if (temp.type === "password") {
        temp.type = "text";
    }
    else {
        temp.type = "password";
    }
}


/*const casilla=document.getElementById("checa");
console.log(casilla);
const inputclave=document.getElementById('password');
console.log(inputclave);
document.addEventListener("DOMContentLoaded",function(){
    console.log(casilla);
})
casilla.addEventListener("checked",mostrarClave);
function mostrarClave(){
    if (inputclave.type=="password"){
        inputclave.type="text";
    }else{
        inputclave.type="password";
    }
}*/
