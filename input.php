<?php
    include 'Restricao.php';

    $decisoes = intval($_POST['decisoes']);
    $restricoes = intval($_POST['restricoes']);
    $interacoes = intval($_POST['interacoes']);

    if ( $interacoes == 0 ) $interacoes = 20;

    $restricao = new Restricao($decisoes, $restricoes);
?>


<?php include ('header.php'); ?>
<main>
    <form action="problem.php" method="post">
        <div id="page2" class="col l12 m6 s3" >
            <div id="principal" class="container z-depth-5" style="border-radius:40px;">
                <div class="row col l12 m6 s3">
                    <div class="col l3">
                        <label style="font-size:16px; position:relative; top:25px; left:10px; color:black;">Qual o objetivo da função ?</label>
                    </div>
                    <div class="input-field col l8 m6 s3" style="right:10px">
                        <select name="funcao" id="funcao">
                            <option value="1" selected>Maximizar</option>
                            <!-- <option value="2">Minimizar</option> -->
                        </select>
                    </div>
                </div>
                <hr/>
                <br/>
                <div class="col l12" style="margin-left:1%; margin-right:1%">
                    <div class="row col l12 m6 s3">
                        <div id="passoapasso" class="switch">
                        <label class="black-text" style="font-size:20px; padding-right:20px;">Visualizar passoa a passo? </label>
                            <label class="black-text">
                                Não
                                <input class="light" value="0" name="passoapasso" type="checkbox" disabled>
                                <span class="lever"></span>
                                Sim
                            </label>
                        </div>
                    </div>
                    <div id="listaDecisoes" class="row col l12 m6 s3">
                        <label class="col l12 m6 s3 black-text" style="font-size:20px;">Função:</label>
                        <div id="qtdeDecisoes" class="row col l12 m6 s3">
                                <?php 
                                    $restricao->setTipodecisao('DecisaoVariavel');
                                    $restricao->getFuncao();
                                ?>
                        </div>
                    </div>
                    <hr/>
                    <br>
                    <div class="">
                        <label class="col l12 m6 s3 black-text" style="font-size:20px;">Restrições:</label>
                            <?php $restricao->getRestricao(); ?>
                    </div>
                    <div class="row hide">
                        <div class="input-field">
                            <input id="nDecisoes" type="number" class="hide" name="nDecisoes" value="<?= $restricao->getNumerodecisao(); ?>">
                        </div>
                        <div class="input-field">
                            <input id="nRestricoes" type="number" class="hide" name="nRestricoes" value="<?= $restricao->getNumeroRestricao(); ?>">
                        </div>
                        <div class="input-field">
                            <input id="nInteracoes" type="number" class="hide" name="nInteracoes" value="<?= $interacoes; ?>">
                        </div>
                    </div>
                        <?php
                            $x = "";
                            for($i = 1; $i <= $decisoes;$i++)
                            if ($i == $decisoes) $x = $x.'X'.$i;
                            else $x = $x.'X'.$i.', ';
                            $x = $x.' >= 0';
                        ?>
                    <div class="row l12 m6 s3">
                        <p class="black-text center" style="padding-left:30%"><?= $x; ?></p>
                    </div>
                    <br/>
                    <div class="row col l12 m6 s3">
                        <button id="btnSolucionar" style="background-color:orange; border-radius:20px" class="btn waves-effect waves-light col l4 m2 s1 right" type="submit" name="action">Solucionar problema
                        </button>
                        <a id="btnVoltar" class="btn waves-effect waves-light col l4 m2 s1 red left" style="border-radius:20px;" href="javascript:history.back()" name="voltar">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>