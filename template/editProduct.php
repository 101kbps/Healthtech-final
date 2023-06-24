<?php
include_once('../config/sessao.php');
include_once("../config/processamentoProduto.php");
include_once("head.php");
?>

<body class="form_body">
   <header>
      <nav class="navigation">
         <a href="tableProduct.php"> Voltar </a>
      </nav>
   </header>

   <div class='lado_direito'>

      <form id="create-form" action="<?= $BASE_URL ?>/../config/processamentoProduto.php" method="POST">
         <input type="hidden" name="type" value="edit">
         <input type="hidden" name="id" value="<?= $product['id'] ?>">
         <div class="card">
            <h1>Atualizar </h1>


            <div class="texfield-group-">
               <div class="texfield">
                  <label for="nome">Nome do produto:</label>
                  <input type="text" id="nome" name="nome" placeholder="digite o nome" value="<?= $product['nome'] ?>" required>
               </div>
               <div class="texfield">
                  <label for="nome">Código do Produto</label>
                  <input type="text" id="cod_product" name="cod_product" placeholder="digite o nome" value="<?= $product['cod_product'] ?>" required>
               </div>
            </div>

            <div class="texfield-group">
               <div class="texfield">
                  <label for="cpf">Quantidade:</label>
                  <input type="text" id="quantidade" name="quantidade" value="<?= $product['quantidade'] ?>">
               </div>
               <div class="texfield">
                  <label for="emissor"> Preço: </label>
                  <input type="text" id="preco" name="preco" value="<?= $product['preco'] ?>">
               </div>
               <div class="texfield">
                  <label for="data_nascimento">Validade</label>
                  <input type="date" id="validade" name="validade" value="<?= $product['validade'] ?>">
               </div>
            </div>

            <div class="texfield">
               <label for="observacao">Descrição</label>
               <input type="text" id="descricao" name="descricao" value="<?= $product['descricao'] ?>">
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