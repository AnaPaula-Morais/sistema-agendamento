function mostrarInformacoes(){
    var inNome = document.getElementById("inNome").value;
    var inDataNascimento = document.getElementById("inDataNascimento").value;
    var inEndereco = document.getElementById("inEndereco").value;
    var inTelefone = document.getElementById("inTelefone").value;
    var inEmail = document.getElementById("inEmail").value;
    var inGenero = document.querySelector('input[name="genero"]:checked').value;
    
    outNome.textContent = "Nome: " + inNome;
    outDataNasc.textContent = "Data de Nascimento: " + inDataNascimento;
    outGenero.textContent = "Gênero: " + inGenero;
    outEndereco.textContent = "Endereço: " + inEndereco;
    outTelefone.textContent = "Telefone: " + inTelefone;
    outEmail.textContent = "E-mail: " + inEmail;
}