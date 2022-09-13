function funcaoalerta(){
    if(confirm("Você deseja fazer logout?")){
		window.location="app/controllers/sessoes.php?op=logout";
	}
}
function funcaoalertapost(){
    if(confirm("Você deseja fazer logout?")){
		window.location="../../app/controllers/sessoes.php?op=logout";
	}
}

function login(){
	alert("Email ou senha incorreto(a)!");
}
