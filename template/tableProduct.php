<?php
include_once('../config/sessao.php');
include_once("head.php");
include_once("header.php");
include_once("../config/processamentoProduto.php")

?>
body class="table_body">
<div class="tableProd">


     <main class="table">
          <section class="table__header">
               <h1>Funcionários</h1>
               <?php if (count($Allclientes) > 0) : ?>
                    <?php if ($_SESSION['plano'] == 1) : ?>
                         <div class="adicionar">
                              <a href="<?= $BASE_URL ?>/create.php"> <ion-icon class="adicionarIcone" name="add-circle-outline"></ion-icon> </a>
                         </div>
                    <?php endif; ?>

          </section>
          <section class="table__body">
               <table>
                    <thead>
                         <tr>
                              <th scope="col">Id</th>
                              <th scope="col">Nome</th>
                              <th scope="col">Telefone</th>
                              <th scope="col">Email</th>
                              <th scope="col">Plano</th>
                              <th scope="col">Ver</th>
                              <?php if ($_SESSION['plano'] == 1) : ?>
                                   <th scope="col">Editar</th>
                                   <th scope="col">Excluir</th>
                              <?php endif; ?>
                         </tr>
                    </thead>
                    <tbody>

                         <?php foreach ($Allclientes as $cliente) : ?>
                              <tr>
                                   <td><?= $cliente["id"] ?></td>
                                   <td><?= $cliente["nome"] ?></td>
                                   <td><?= $cliente["telefone"] ?></td>
                                   <td><?= $cliente["email"] ?></td>
                                   <td><?php
                                        if ($cliente["plano"] == 1) {
                                             echo "Administrador";
                                        }                                     elseif ($cliente["plano"] == 2) {
                                        echo "Básico";
                                        }elseif ($cliente["plano"] == 3) {
                                             echo "Silver";
                                        } elseif ($cliente["plano"] == 4) {
                                             echo "Gold";
                                        } else {
                                             echo "plano Desconhecido";
                                        }
                                        ?>
                                   </td>
                                   <?php if ($_SESSION['plano'] == 1 || ($_SESSION['plano'] != 1 && $_SESSION['id'] == $cliente["id"])) : ?>
                                        <td><a href="<?= $BASE_URL ?>/show.php?id=<?= $cliente["id"] ?>"><ion-icon name="book-outline"></ion-icon></a></td>
                                   <?php endif; ?>
                                   <?php if ($_SESSION['plano'] == 1) : ?>
                                        <td><a href="<?= $BASE_URL ?>/edit.php?id=<?= $cliente["id"] ?>"> <ion-icon name="create-outline"></ion-icon></a> </td>
                                        <!-- Elementos exclusivos para o nível de acesso 1 (Administrador) -->
                                        <td>
                                             <!--delete-->
                                             <form class="delete-form" action="<?= $BASE_URL ?>/../config/processamento.php" method="POST">
                                                  <input type="hidden" name="type" value="delete">
                                                  <input type="hidden" name="id" value="<?= $cliente["id"] ?>">
                                                  <button type="submit" class="delete-btn"><ion-icon name="close-outline"></ion-icon></button>
                                             </form>
                                        </td>
                                   <?php endif; ?>
                              </tr>

                         <?php endforeach; ?>
                    </tbody>

               </table>
          </section>

     <?php else : ?>
          <p id="empty-list-text">
          <div class="adicionar">
               <a href="create.php"><ion-icon name="add-circle-outline"></ion-icon></a>
          </div>
          </p>
     <?php endif; ?>
</div>
</div>
<?php
include_once("footer.php");
?>