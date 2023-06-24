<?php
include_once('../config/sessao.php');
include_once("head.php");
include_once("../config/processamento.php");
?>

<body class="form_body">

   <header>
      <nav class="navigation">
         <a href="table.php"> Voltar </a>
      </nav>
   </header>

   <div class='lado_direito'>

      <form id="create-form" action="<?= $BASE_URL ?>/../config/processamento.php" method="POST">
         <input type="hidden" name="type" value="edit">
         <input type="hidden" name="id" value="<?= $onlyfuncionarios['id'] ?>">
         <div class="card">
            <h1>Atualizar </h1>

            <div class="texfield-group-">
               <div class="texfield">
                  <label for="nome">Nome:</label>
                  <input type="text" id="nome" name="nome" placeholder="digite o nome" value="<?= $onlyfuncionarios['nome'] ?>" required>
               </div>
            </div>
            <div class="texfield-group">
               <div class="texfield">
                  <label for="cpf">CPF:</label>
                  <input type="text" id="cpf" name="cpf" placeholder="digite o cpf" value="<?= $onlyfuncionarios['cpf'] ?>" required>
               </div>
               <div class="texfield">
                  <label for="data_nascimento">Data de Nascimento:</label>
                  <input type="text" id="data_nascimento" name="data_nascimento" placeholder="digite o seu niver" value="<?= $onlyfuncionarios['data_nascimento'] ?>" required>
               </div>
            </div>

            <div class="texfield-group-">
               <div class="texfield">
                  <label for="fone">Telefone:</label>
                  <input type="text" id="fone" name="fone" placeholder="digite o telefone" value="<?= $onlyfuncionarios['telefone'] ?>" required>
               </div>
               <div class="texfield">
                  <label for="email">E-mail:</label>
                  <input type="email" id="email" name="email" placeholder="digite o email" value="<?= $onlyfuncionarios['email'] ?>" required>
               </div>
            </div>
            <div class="texfield-group-">
               <div class="texfield">
                  <label for="endereco">Endereço:</label>
                  <input type="text" id="endereco" name="endereco" placeholder="digite o endereço" value="<?= $onlyfuncionarios['endereco'] ?>" required>
               </div>
                  <div class="texfield">
                     <label for="cep">CEP:</label>
                     <input type="text" id="cep" name="cep" placeholder="digite o cep" value="<?= $onlyfuncionarios['cep'] ?>" required>
                  </div>
            </div>

            <div class="texfield-group">
               <div class="texfield">
                  <label for="admissao"> Data de admissão:</label>
                  <input type="text" id="admissao" name="admissao" value="<?= $onlyfuncionarios['admissao'] ?>" required>
               </div>

               <div class="texfield">
                  <label for="demissao"> Data de demissao:</label>
                  <input type="text" class="form-control" id="demissao" name="demissao" value="<?= $onlyfuncionarios['demissao'] ?>">
               </div>
            </div>
            <div>
               <div class="texfield">
                  <label for="cargo">Cargo:</label>
                  <select id="cargo" name="cargo" value="<?= $onlyfuncionarios['cargo'] ?>" required>
                     <option value="<?=$onlyfuncionarios['cargo']?>" selected>selecione</option>
                     <option value="1">Administrador</option>
                     <option value="2">Instrutor</option>
                     <option value="2">Colaborador</option>
                  </select>
               </div>
               <div class="texfield">
                  <label for="contrato">Contrato:</label>
                  <input type="text" id="contrato" name="contrato" placeholder="digite o  contrato" value="<?= $onlyfuncionarios['contrato'] ?>" required>
               </div>
               <div class="texfield">
                  <label for="salario">Salário:</label>
                  <input type="text" id="salario" name="salario" placeholder="digite o salario" value="<?= $onlyfuncionarios['salario'] ?>" required>
               </div>
               <div class="texfield">
                  <label for="modalidade">Modalidade:</label>
                  <input type="text" id="modalidade" name="modalidade" placeholder="digite o  modalidade" value="<?= $onlyfuncionarios['modalidade'] ?>" required>
               </div>
            </div>

            <div class="texfield-group-">
               <div class="texfield">
                  <label for="senha">Senha:</label>
                  <input type="password" id="senha" name="senha" placeholder="digite a senha" value="<?= $onlyfuncionarios['senha'] ?>" required>
               </div>
               <div class="texfield">
                  <label for="id_admin">Id Admin:</label>
                  <input type="password" id="id_admin" name="id_admin" placeholder="digite a id" value="<?= $onlyfuncionarios['id_admin'] ?>">
               </div>
            </div>
            <br>
            <button type="submit" class="btn">Atualizar</button>
         </div>
      </form>
   </div>
   </div>
   <?php
   include_once("footer.php");
   ?>