function Enviar() {

    var nome = document.getElementById("nomeid");
    var fone = document.getElementById("foneid");
    var email = document.getElementById("emailid");
    var msg = document.getElementById("msgid");
    var alerta = document.getElementById("mensagem-alerta");
    
 
    if(nome.value==""){
 alerta.textContent = "Informe o seu nome!";
 alerta.setAttribute("class", "msg-erro");
 nome.focus();
 return;
    }else
    if(fone.value==""){   
    alerta.textContent = "Informe seu telefone!";
    alerta.setAttribute("class", "msg-erro");
    fone.focus();
   return;
    }else
    if(email.value==""){
        alerta.textContent = "Informe seu e-mail!";
        alerta.setAttribute("class", "msg-erro");
        email.focus();
      return; 
    }else
    if(msg.value==""){
        alerta.textContent = "Você deve digitar um feedback!";
        alerta.setAttribute("class", "msg-erro");
        email.focus();
      return; 
    }else{
        alert("Recebemos seu feedback!");
    }

    
}