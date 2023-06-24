<?php
include_once('../config/sessao.php');
include_once("head.php");
include_once("header.php");
?>

<body class="form_body">
   <div class="lado_direito">


      <form id="create-form" action="<?= $BASE_URL ?>/../config/processamentoProduto.php" enctype="multipart/form-data" method="POST">
         <input type="hidden" name="type" value="create">
         <div class="card">
            <h1>Cadastrar produtos </h1>

            <div class="texfield-group-">
               <div class="texfield">
                  <label for="nome">Nome do produto</label>
                  <input type="text" id="nome" name="nome" placeholder="digite o nome" required>
               </div>
               <div class="texfield">
                  <label for="sobrenome">Código</label>
                  <input type="text" id="cod_product" name="cod_product" placeholder="Código do Produto" required>
               </div>
            </div>

            <div class="texfield-group">
               <div class="texfield">
                  <label for="preco"> Preço: </label>
                  <input type="text" id="preco" name="preco" placeholder="Digite o preco do produto" required>
               </div>


               <div class="texfield">
                  <label for="quantidade">Quantidade </label>
                  <input type="text" id="quantidade" name="quantidade" placeholder="Quantidade" required>
               </div>
               <div class="texfield">
                  <label for="data_nascimento"> Validade </label>
                  <input type="date" id="validade" name="validade" placeholder="Digite a validade" required>
               </div>
            </div>

            <div class="texfield-group-">

               <div class="textfield">
                  <p><label for="arquivo"> Selecione o arquivo: </label></p>
                  <p> <input name="arquivo" type="file"> </p>
               </div>



            </div>

            <div class="texfield-group-">


            </div>




            <div class="texfield">
               <label for="descricao">Descrição</label>
               <textarea type="text" id="descricao" name="descricao" placeholder=" Descrição do produto" rows="3">
               </textarea>
            </div>
            <br>
            <button type="submit" class="btn">Cadastrar</button>

         </div>
      </form>
   </div>




   <?php
   include_once("footer.php");
   ?>