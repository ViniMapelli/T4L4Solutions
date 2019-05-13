<main>
    <form action="input.php" method="post">
        <div id="page1" class="container">
            <div class="row">
                <div id="principal" class="container z-depth-5" style="border-radius:20px;">
                    <div class="row" style="margin-bottom: 3%;">
                        <div class="col l12" style="text-align:center">
                            <label style="color:black; font-size:30px;">SIMPLEX</label>
                            <br/>
                            <hr/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l4">
                            <label style="font-size:16px; position:relative; top:25px; left:10px; color:black;">Quantidade de variáveis de decisão?</label>
                        </div>
                        <div class="input-field col l8">
                            <input id="decisao" type="number" class="validate black-text" name="decisoes" style="position:relative; right:20px" min="1">
                        </div>
                        <div class="col l4">
                            <label style="font-size:16px; position:relative; top:25px; left:10px; color:black;">Quantidade de restrições?</label>
                        </div>
                        <div class="input-field col l8">
                            <input id="restricao" type="number" class="validate black-text" name="restricoes" style="position:relative; right:20px" min="1">
                        </div>
                        <div class="col l4">
                            <label style="font-size:16px; position:relative; top:25px; left:10px; color:black;">Quantidade de interações?</label>
                        </div>
                        <div class="input-field col l8">
                            <input id="interacao" type="number" class="validate black-text" name="interacoes" style="position:relative; right:20px" min="1" value="1000">
                        </div>
                    </div>
                    <div class="row">
                    <div class="input-field col l4 m2 s1">
                    </div>
                        <div class="input-field col l4 m2 s1">
                            <button id="btnContinuar" style="background-color:orange; border-radius:20px" class="btn waves-effect waves-light col l12 m6 s3" type="submit" name="action" data-position="top" data-delay="3">Continuar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>