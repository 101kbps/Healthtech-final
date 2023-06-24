<?php
include_once("head.php");
?>


<body class="login_body">
    <canvas id="lamp-anim" class="lamp-anim" width="100%" height="100%">
    </canvas>


    <header>
        <nav class="navigation">
            <a href="login.php"> Voltar </a>
        </nav>
    </header>

    <div class="box">
        <div class="card">
            <h1>Peça sua orçamento </h1>


            <div class="texfield">
                <label for="nome">Nome da empresa</label>
                <input type="text" name="nome" placeholder="Digite o nome da empresa">
            </div>


            <div class="texfield-group-">
                <div class="texfield">
                    <label for="cnpj">CNPJ</label>
                    <input type="number" name="cnpj" placeholder="Digite o CNPJ da empresa">
                </div>

                <div class="texfield">
                    <label for="telefone">Telefone</label>
                    <input type="number" name="telefone" placeholder="Digite o telefone">
                </div>
            </div>

            <div class="texfield">
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Digite o e-mail">
            </div>

            <div class="texfield-group-">
                <div class="texfield">
                    <label for="tipo">Tipo da empresa</label>
                    <select name="tipo">
                        <option value="1">Selecione</option>
                        <option value="MEI">MEI</option>
                        <option value="EI">EI</option>
                        <option value="SLU">SLU</option>
                        <option value="LTDA">LTDA</option>
                        <option value="S.A.">S.A.</option>
                    </select>
                </div>


                <div class="texfield">
                    <label for="regime">Regime tributário</label>
                    <select name="regime">
                        <option value="1">Selecione</option>
                        <option value="Lucro Real">Lucro Real</option>
                        <option value="Simples Nacional">Simples Nacional</option>
                        <option value="Lucro Presumido">Lucro Presumido</option>
                        <option value="Limpeza">Não se aplica</option>

                    </select>
                </div>
            </div>

            <div class="texfield">
                <label for="descricao">Descrição da empresa</label>
                <textarea name="descricao" placeholder="Descrição breve da empresa"></textarea>
            </div>
            <button class="btn">Enviar</button>
        </div>
    </div>




    <?php include_once('footer.php') ?>