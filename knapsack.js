var gcapacidade;
var gvalor = [];
var gpeso = [];
var gtotal;
var mochila = [];

function addItem(){

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
}

function addCapacidade(){
    gcapacidade = document.getElementById("capacidade").value;
}

function teste(){
    gtotal = gpeso.length;
    knapsack(gcapacidade, gpeso, gvalor, gtotal);
    //knapsack(18,[4,6,5,7,3,1,6],[12,10,8,11,14,7,9],7);
}

function knapsack(capacidade, peso, val, linhas){

    peso = peso.map(function(peso){return Number(peso);});
    val = val.map(function(val){return Number(val);});

    mochila = [];
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

    res = matriz[linhas][capacidade];

    w = capacidade;

    for(var i = linhas; i > 0; i--){
        if(res <= 0){
            break;
        }
        
        if(res == matriz[i - 1][w]){
            continue;
        }else{
            mochila.push(i - 1);

            res = res - val[i - 1];
            w = w - peso[i - 1];
        }
    }

    var resultado = document.createElement("table");

    var new_h1 = document.createElement("span");
    new_h1.innerText = "Solucao: " + matriz[linhas][capacidade];

    var new_h1_1 = document.createElement("span");

    str_solucao = "Itens levados {Valor, Peso}: ";

    for(var i = 0; i < mochila.length; i++){
        str_solucao += "{" + val[mochila[i]] + "," + peso[mochila[i]] + "} ";
    }

    new_h1_1.innerText = str_solucao;

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
    document.getElementById("resultado").setAttribute("style","display:block; overflow-x:scroll");
    document.getElementById("solutionF").appendChild(new_h1);
    document.getElementById("solutionI").appendChild(new_h1_1);
}