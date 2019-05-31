<div class="container">
	<div class="row">
		<div id="principal" class="container z-depth-5" style="border-radius:20px;">
            <div class="row" style="margin-bottom: 3%;">
                <div class="col l12" style="text-align:center">
                    <label style="color:black; font-size:30px;">Algoritmo da Mochila</label>
                    <br/>
                    <hr/>
                </div>
            </div>
            <div class="row">
                <div class="col l3">
                    <label style="font-size:16px; position:relative; top:25px; left:10px; color:black;">Capacidade da Mochila</label>
                </div>
                <div class="input-field col l9">
                    <input id="capacidade" type="number" class="validate black-text" style="position:relative; right:20px" min="1" onchange="addCapacidade();">
                </div>
                <div class="col l1">
                    <label style="font-size:16px; position:relative; top:25px; left:10px; color:black;">Valor</label>
                </div>
                <div class="input-field col l3">
                    <input id="valor" type="number" class="validate black-text" style="position:relative; right:20px" min="1">
                </div>
                <div class="col l1">
                    <label style="font-size:16px; position:relative; top:25px; left:10px; color:black;">Peso</label>
                </div>
                <div class="input-field col l3">
                    <input id="peso" type="number" class="validate black-text" style="position:relative; right:20px" min="1">
				</div>
				<div class="input-field col l1 m2 s1">
                </div>
				<div class="input-field col l3 m2 s1">
					<input type="button" value="Adicionar Item" onclick="addItem();" class="btn waves-effect waves-light col l12 m6 s3" style="background-color:orange; border-radius:20px">
				</div>
            </div>
			<div class="row">
				<div class="col l2"></div>
				<div class="col l8">
					<div id="bot">
						<table id="table" class="responsive-table highlight">
							<tr>
								<th >Valor</th>
								<th >Peso</th>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="input-field col l4 m2 s1">
                </div>
				<div class="input-field col l4 m2 s1">
					<input type="button" value="Gerar Resultado" onclick="teste();" class="btn waves-effect waves-light col l12 m6 s3" style="background-color:green; border-radius:20px">
                </div>
			</div>
				<div class="row">
					<div class="col l2"></div>
					<div class="col l8">
						<div id="resultado" style="display:none"></div>
					</div>
				</div>
				<div class="row">
					<div class="col l2"></div>
					<div class="col l8">
						<div id="solucao"></div>
					</div>
				</div>
				<!-- <div id="solucao"></div> -->
			<!-- </div> -->
		</div>
	</div>
</div>