<h2>Aplicação de doações para Instituições Beneficentes</h2>

<h3>Como instalar a aplicação</h3>

<p>O banco de esta na raiz do projeto com o nome <b>doacoes.sql<b></p>

<h3>Como usar a API</h3>

<p>A API é usada para cadastrar, alterar, listar e deletar INSTITUIÇÕES. </p>

<p><i>Obs: esta na raiz do projeto o json do POSTMAN para que você possa importar ('Api_instituições.postman_collection.json') e ver como trabalhei os verbos do rest</i></p>

<p>A aplicação tem uma validação básica via HEADER o nome da chave é 'Token' e seu valor é 'J14E06S95U13S'</p>

<p>
    Para listar NÂO é necessário passar o token via HEADER <br>
    <b>Listar TODOS(GET): </b> http://localhost/api/instituicoes<br>
    <b>Campos obrigatório: </b><br>
    <ul>
        <li>Não tem</li>
    </ul><br>
    <b>Listar apenas um(GET): </b> http://localhost/api/instituicoes/id<br>
    <b>Campos obrigatório: </b><br>
    <ul>
        <li>id</li>
    </ul>
</p>

<p>
    Para INSERIR  é necessário passar o input 'Token' e valor 'J14E06S95U13S' via HEADER <br>
    <b>Inserir(POST): </b> http://localhost/api/instituicoes/insert  <br>
    <b>Campos obrigatórios: </b><br>
    <ul>
        <li>nome</li>
        <li>email</li>
        <li>resumo</li>
    </ul>
</p>

<p>
    Para ALTERAR  é necessário passar o input 'Token' e valor 'J14E06S95U13S' via HEADER <br>
    <b>Alterar(PUT): </b> http://localhost:8000/api/instituicoes/update/id  <br>
    <b>Campos são opcionais: </b><br>
    <ul>
        <li>nome</li>
        <li>email</li>
        <li>resumo</li>
    </ul>
</p>

<p>
    Para DELETAR  é necessário passar o input 'Token' e valor 'J14E06S95U13S' via HEADER <br>
    <b>Deletar(DELETE): </b> http://localhost:8000/api/instituicoes/delete/id  <br>
    <b>Campos obrigatório: </b><br>
    <ul>
        <li>id</li>
    </ul>
</p>
