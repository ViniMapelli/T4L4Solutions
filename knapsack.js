var gcapacidade;
var gvalor = [];
var gpeso = [];
var gtotal;

function addItem(){
    var ctrP = document.getElementById("valor").value;
    var ctrV = document.getElementById("peso").value;

    if(ctrP== "" || ctrV == ""){
        alert("Valor ou Peso sem valor, por favor foneça um número válido");
    }else{
        gvalor.push(document.getElementById("valor").value);
        gpeso.push(document.getElementById("peso").value);

        var new_tr = document.createElement("tr");
        var td_valor = document.createElement("td");
        var td_peso = document.createElement("td");

        td_valor.innerText = document.getElementById("valor").value;
        td_peso.innerText = document.getElementById("peso").value;

        new_tr.appendChild(td_valor);
        new_tr.appendChild(td_peso);

        document.getElementById("table").appendChild(new_tr);
        document.getElementById("valor").setAttribute("value","");
        document.getElementById("peso").setAttribute("value","");
    }
}

function addCapacidade(){
    gcapacidade = document.getElementById("capacidade").value;
}

function teste(){
    console.log(gpeso.length);
    if(gpeso.length == 0){
        alert("Sem valores, por favor foneça um número válido");
    }else{
        gtotal = gpeso.length;
        knapsack(gcapacidade, gpeso, gvalor, gtotal);
    }
    //teste:
    //knapsack(18,[4,6,5,7,3,1,6],[12,10,8,11,14,7,9],7);
}

function knapsack(capacidade, peso, val, linhas){

    peso= peso.map(function(peso){return Number(peso);});
    val= val.map(function(val){return Number(val);});

    matriz = [];

    for(var i = 0; i <= capacidade; i++){
        matriz[i] = [];
        for(var j = 0; j <= linhas; j++){
            matriz[i][j] = 0;
        }
    }

    for(var i = 0; i < linhas + 1; i++){
        for(var j = 0; j < capacidade + 1; j++){
            if(i == 0 || j == 0){
                matriz[i][j] = 0;
            }else if(peso[i - 1] <= j){
                matriz[i][j] = Math.max(val[i - 1] + matriz[i - 1][j - peso[i - 1]], matriz[i - 1][j]);
            }else{
                matriz[i][j] = matriz[i - 1][j];
            }
        }
    }

    var resultado = document.createElement("table");
    var new_h1 = document.createElement("h4");
    new_h1.innerText = "Solução:" + matriz[linhas][capacidade];

    for(var i = 0; i <= linhas; i++){
        for(var j = 0; j <= capacidade; j++){
            if(i == 0){ //primeira linha
                var new_th = document.createElement("th");
                new_th.innerText = j;
                resultado.appendChild(new_th);
            }else{
                if(j == 0){
                    var new_tr = document.createElement("tr");
                }
                var new_td = document.createElement("td");
                new_td.innerText = matriz[i][j];
                new_tr.appendChild(new_td);
                resultado.appendChild(new_tr);
            }
        }
    }

    document.getElementById("resultado").appendChild(resultado);
    document.getElementById("resultado").setAttribute("style","display:block; overflow-x:scroll;");
    document.getElementById("solucao").appendChild(new_h1);
}