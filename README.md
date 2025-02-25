# Sistema de Agendamento de Consultas <img src="./assets/calendar.png" width="30px">

<img src="./assets/construction-and-tools.png" width="20px"> Projeto em construção...<img src="./assets/construction-and-tools.png" width="20px">

## Definição
 O Sistema de Agendamento é uma aplicação web desenvolvida para otimizar o gerenciamento de agendamentos, pacientes e sessões em uma clínica de fisioterapia. Ele permite que os profissionais da clínica, tenham um controle eficiente de suas atividades diárias, melhorando a organização das consultas e o acompanhamento do tratamento dos pacientes. O sistema será projetado para ser intuitivo e prático, com foco na eficiência e facilidade de uso.

## Orientações para uso deste sistema
* A página index é uma landing page simples onde o utilizador tem acesso ao login.
* Existe dois tipos de utilizadores: o admin e o utilizador comum.
* O admin já está salvo no banco de dados com o seguinte login: email:admin@gmail.com, senha: admin.
* O **administrador** pode cadastrar novos usuários, clientes, fazer agendamentos de consultas,editar e excluir clientes.
* O **utilizador** comum, só poderá agendar consultas e cadastrar novos clientes.
* Esta cadastrado no banco de dados um usuário normal com o email: joanamaria@gmail.com, senha: 123456.
* Caso o admin queira deletar um agendamento que ocorrerá nas próximas 72h, isto não poderá ocorrer, ele deverá editar o agendamento e não excluir.
