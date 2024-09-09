function mostrarInformacoes(){
    var inNome = $("#inNome").val();
    var inDataNascimento = document.getElementById("inDataNascimento").value;
    var inEndereco = document.getElementById("inEndereco").value;
    var inTelefone = document.getElementById("inTelefone").value;
    var inEmail = document.getElementById("inEmail").value;
    var inGenero = document.querySelector('input[name="genero"]:checked').value;
    
    //outNome.textContent = "Nome: " + inNome;
    $("#outNome").text("Nome: " + inNome);
    outDataNasc.textContent = "Data de Nascimento: " + inDataNascimento;
    outGenero.textContent = "Gênero: " + inGenero;
    outEndereco.textContent = "Endereço: " + inEndereco;
    outTelefone.textContent = "Telefone: " + inTelefone;
    outEmail.textContent = "E-mail: " + inEmail;
}

var form = document.getElementById("form");

function cadastrar(e){
    e.preventDefault();
    localStorage.setItem("nome",inNome.value);
    localStorage.setItem("data de nascimento",inDataNascimento.value);
    localStorage.setItem("endereço",inEndereco.value);
    localStorage.setItem("telefone",inTelefone.value);
    localStorage.setItem("email",inEmail.value);
    localStorage.setItem("gênero",inGenero.value);
}

form.addEventListener("submit", cadastrar);
