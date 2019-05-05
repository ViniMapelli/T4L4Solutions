<?php
    include 'Simplex.php';

    $nDecisoes = $_POST['nDecisoes'];
    $nRestricoes = $_POST['nRestricoes'];
    $funcao = $_POST['DecisaoVariavel'];
    $base = $_POST['base'];
    $tipo_funcao = intval($_POST['funcao']);
    $interacoes = intval($_POST['nInteracoes']);

    $passoapasso = $_POST['passoapasso'];
    if ($passoapasso == "true") $passoapasso = true;
    else $passoapasso = false;

    $restricao = array();
    for ($i = 1; $i <= $nRestricoes; $i++) array_push($restricao, $_POST['RestricaoVariavel'.$i]);

    // $opcaoRestricao = $_POST['opcaoRestricao'];
    
    $opcaoRestricao = array(1,1);
    // print_r ($opcaoRestricao);

    $simplex = new Simplex($nDecisoes, $nRestricoes, $funcao, $restricao, $opcaoRestricao, $base, $interacoes);

    if ($tipo_funcao == 1) $simplex->maximizar();
    elseif ($tipo_funcao == 2) $simplex-> minimizar();

?>

<?php include 'header.php'; ?>
<main>
    <div id="principal" class="container z-depth-5" style="border-radius:40px;">
    <div class="container" style="border-top: 15px;">
        <div class="row">
            <br/>
            <?php
                if ($passoapasso)
                {
                    for ($i = 0; $i < count($simplex->lista_tabela); $i++) { ?>
                        <?php if ($i == 0) {
                            echo '<h6 class="border">Estrutura inicial do simplex</h6>';
                        }
                        else {
                            echo '<h6 class="border">Interação: '.$i.'</h6>';
                        }?>
                        <table class="responsive-table highlight">
                            <thead>
                            <tr>
                                <?php foreach ($simplex->lista_tabela[$i][0] as $head) {
                                    echo '<th>' . $head . '</th>';
                                } ?>
                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            for ($w = 1; $w <= $simplex->nRestricoes + 1; $w++) {
                                echo '<tr>';
                                foreach ($simplex->lista_tabela[$i][$w] as $value) {
                                    echo '<td>' . $value . '</td>';
                                }
                                echo '</tr>';
                            } ?>
                            </tbody>
                        </table>
                        <br/>
                        <?php
                    }
                }
                else
                { ?>
                    <table class="responsive-table highlight">
                        <thead>
                        <tr>
                            <?php foreach ($simplex->tabela[0] as $head) {
                                echo '<th>' . $head . '</th>';
                            } ?>
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        for ($i = 1; $i <= $simplex->qtdeRestricao; $i++) {
                            echo '<tr>';
                            foreach ($simplex->tabela[$i] as $value) {
                                echo '<td>' . $value . '</td>';
                            }
                            echo '</tr>';
                        } ?>
                        </tbody>
                    </table>
                    <br/>
        <?php   }  ?>
        </div>
        <div class="row">
            <div class="col l4 m2 s1">
                <h6 class="border">Variáveis Básicas</h6>
                <?php
                foreach ($simplex->melhorSolucao() as $value)
                    echo '<p>'.$value[0].' = '.$value[1];
                ?>
            </div>
            <!-- ############################ -->
            
            <div class="col l4 m2 s1">
                <h6 class="border">Não Básicas</h6>
                <?php $simplex->restoSolucao(); ?>
            </div>
            <div class="col l4 m2 s1">
                <h6 class="border">Preços sombras</h6>
                <?= $simplex->precoSombra(); ?>
            </div>
        </div>
        <div class="row">
            <h6 class="border">Limite de restrições</h6>
            <table>
                <thead>
                    <tr>
                        <th>Variáveis</th>
                        <th>Menor valor</th>
                        <th>Maior valor</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $resultado = $simplex->limiteRestricao();

                        foreach ($resultado as $valor)
                        {
                            echo '<tr>';
                                foreach ($valor as $item)
                                {
                                    echo '<td>'.$item.'</td>';
                                }
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- ############### -->
    </div>
    <div class="row col s12 m6 l3">
        <div class="container">
            <a id="btnVoltar" class="btn waves-effect waves-light col l12 m6 s3 red" href="javascript:history.back()" name="voltar" style="border-radius:20px;">Voltar</a>
        </div>
    </div>
    </div>
</main>