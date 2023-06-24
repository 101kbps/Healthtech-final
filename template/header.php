<header>

    <div class="flex">
        <h2 class="logo">Olá
            <?php if ($_SESSION['cargo'] == 1) {
                echo "gerente";
            } elseif ($_SESSION['cargo'] == 2) {
                echo "funcionário";
            } ?>!</h2>
        <nav class="navigation">
            <a href="menu.php">Home</a>
            <a href="table.php">Funcionários</a> <!--Colocar o link de referencia do arquivo no lugar do #-->
            <a href="tableProduct.php">Estoques</a>
            <a href="vendas.php">Vendas</a>
            <a href="../config/logout.php">Sair</a>
        </nav>

    </div>

</header>