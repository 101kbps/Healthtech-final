<?php
include_once('../config/sessao.php');
include_once('head.php');
include_once('finalizarVendas.php');
include_once('../config/processamentoProduto.php');
?>

<body>

    <div class="ScreenUp">
        <div class="Name">Sysfee</div>
        <div class="Nav">
            <ul>
                <li class="active"><a href="#home"> <span class="dot" style="background-color: rgb(206, 93, 93);"></span>Cafés</a></li>
                <li class="active"><a href="#news"> <span class="dot" style="background-color: rgb(192, 190, 73);"></span>Sobremesas</a></li>
                <li class="active" style="float:right"><a href="menu.php"><i style="font-size: 25px;" class="fa-solid fa-right-from-bracket"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="ScreenDown">
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">

                    <?php if (count($AllProduct) > 0) : ?>
                        <?php if (count($AllArquivos) > 0) : ?>

                            <?php foreach ($AllArquivos as $arquivo) : ?>


                                <?php foreach ($AllProduct as $product) : ?>

                                    <!-- Este if serve para que não tenha dados duplicados em Vendas-->
                                    <?php if ($product['id'] == $arquivo['id']) : ?>

                                        <div class="card swiper-slide">
                                            <div class="image-content">
                                                <span class="over"><i style="font-size: 30px; float: right; margin-right: 15px; margin-top: 10px; color: white;" class="fa-solid fa-circle-minus"></i></span>





                                                <div class="card-image">
                                                    <img src="<?= $arquivo['path'] ?>" alt="" class="card-img">
                                                </div>
                                            </div>

                                            <div class="card-content">
                                                <h2 class="name"> <?= $product['nome'] ?></h2>
                                                <p class="description">
                                                    <?php echo $product['descricao'];  ?>
                                                </p>
                                                <p class="name"> R$: <?= $product['preco'] ?> </p>
                                                <div class="name">
                                                    <section>


                                                        <input type="checkbox" id="150ML" name="quantidade" value="150ML">
                                                        <label for="150ml">150 ML</label>
                                                        <input type="checkbox" id="180ML" name="quantidade" value="180"> <label for="180ml">180 ML</label>
                                                    </section>
                                                </div>



                                                <button class="button"> <a class="ver-mais-vendas" onclick="openNav()"> Selecionar </a>

                                            </div>
                                        </div>




                                    <?php endif; ?>
                                <?php endforeach ?>


                            <?php endforeach ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>



            </div>


        </div>
        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </div>

    </div>
    </div>





    <?php include_once('footer.php'); ?>