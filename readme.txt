Nome da Aplicação:
T4L4 Solutions

Repositório para a implementação do algoritmo Simplex e Mochila.
GitHub: https://github.com/ViniMapelli/T4L4Solutions
Heroku: https://t4l4solutions.herokuapp.com/index.php

Projeto de Pesquisa Operacional
5º Semestre BCC UNIVEM

Alunos
Vinicius Mapelli    RA: 570370
Leonardo Osawa      RA: 569313
Luiz Henrique Simba RA: 568546

O Simplex é um meio onde você encontra a melhor combinação de valores em determinadas situações, levando em conta algumas restrições que devem ser respeitadas, onde diante de um problema com determinadas variáveis, as inequações como restrições, a melhor maneira de otimização é o objetivo sendo maximização ou minimização.

O algoritmo da mochila tem o objetivo em achar uma combinação de objetos onde, seu valor seja o maior possível, respeitando a capacidade da mochila.

Ferramentas
- PHP
- Javascript
- Heroku
- GitHub

Nota de realease a ser publicado

Simplex
- Algoritmo Simplex para problemas de maximização.
- Algoritmo Simplex para problemas de minimização.
- É exibido o passo a passo das tabelas geradas pelo método Simplex
- Analise de Sensibilidade.

Mochila
- Apreentação da solução, dos itens a serem considerados e a tabela de cálculo.

Entradas personalizadas para:

Simplex
- Limite máximo de iterações
- Tipo de Simplex (MAX ou MIN)
- Quantidade de variáveis e restrições

Mochila
- Capacidade da mochila
- Peso e valor dos itens

Limitações

Simplex
- Em cada variável da função objetivo e das restrições deve conter apenas o número, sem a adição do 'x', separando os números por ';' e caso tenha alguma variável nula, é necessário inserir o 0.

Mochila
- Serão permitidos somente valores inteiros

Datas Importantes

Simplex

  Datas     |   Eventos
---------   |   ---------
15/04/2019  |   Planejamento do Projeto
15/04/2019  |   Criação de Entrada de dados Dinâmica
22/04/2019  |   Resolução de problemas de maximização de recurso
22/04/2019  |   Resolução direta do problema
22/04/2019  |   Exibir o Resultado Final
22/04/2019  |   MVP
29/04/2019  |   Resolução Passo a Passo
29/04/2019  |   Resolução de problemas de minimização de recurso
13/05/2019  |   Controle de Interações
13/05/2019  |   Analise de Sensibilidade
13/05/2019  |   MVP


Mochila

  Datas     |   Eventos
---------   |   -----------
13/05/2019  |   Planejamento do Projeto
20/05/2019  |   Inserindo entrada de dados dinâmicos
20/05/2019  |   Finalização do projeto da mochila
20/05/2019  |   Criação de uma página de navegação
01/06/2019  |   Atualizando o Read Me

Compatibilidade
       Requisitos   |    Ferramentas
----------------    |    -------------------
      Navegadores   |   Mozila Firefox e Chrome
Sistema Operacional |   Ubuntu, Windows e Mac

Tecnologias

  Tecnologias    |  Ferramentas
 -------------   |  -------------
Front-End        |  HTML Javascript
Back-End         |  Javascript e PHP
Editor de Texto  |  Sublime e Visual Studio Code
Servidor Web     |  Heroku 

Atividades Realizadas no Período

Simplex

Restrições dinâmicas - Ao informar a quantidade de restrições os a aplicação gera a quantidade de entradas correspondente
Maximizar - Montar Simplex e realizar os calculos de maximização.
Minimizar - Montar Simplex e realizar os calculos de minimização.
Demonstrar Passo a Passo - Ao habilitar a função "Mostrar passo a passo" a aplicação gera todos as iterações que foram feitas para chegar na solução.
Analise de sensibilidade - Ao final dos calculos a aplicação mostra a análise de sensibilidade realizada conforme o problema fornecido.

Mochila

Solução do problema - Mostrar para o usuário a melhor solução, apresentando os itens que devem ser considerados.
