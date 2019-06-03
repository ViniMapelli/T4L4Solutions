#Nome da Aplicação
T4L4 Solutions

Repositório para a implementação do algoritmo Simplex e Mochila.

Projeto de Pesquisa Operacional
5º Semestre BCC UNIVEM

#Alunos
Vinicius Mapelli    RA: 570370
Leonardo Osawa      RA: 
Luiz Henrique Simba RA:

O Simplex permite que se encontre valores ideais em situações em que diversos aspectos precisam ser respeitados. Diante de um problema, são estabelecidas inequações que representam restrições para as variáveis. A partir daí, testa-se possibilidades de maneira a otimizar, isto é, maximizar ou minimizar o resultado da forma mais rápida possível.

O algoritmo da mochila consiste em preencher a mochila com objetos diferentes de pesos e valores. O objetivo é que preencha a mochila com o maior valor possível, não ultrapassando o peso máximo.


## Ferramentas
- PHP
- Javascript
- Heroku
- GitHub para hospedagem e versionamento

## Nota de realease a ser publicado

###Simplex
- Algoritmo Simplex para problemas de maximização.
- Algoritmo Simplex para problemas de minimização.
- É exibido o passo a passo das tabelas geradas pelo método Simplex
- Tabela de Sensibilidade.

###Mochila
- Apreentação da solução, dos itens a serem considerados e a tabela de cálculo.

##Entradas personalizadas para:

###Simplex
- Limite máximo de iterações
- Tipo de Simplex (MAX ou MIN)
- Quantidade de variáveis e restrições

###Mochila
- Capacidade da mochila
- Peso e valor dos itens

##Limitações

###Simplex
- Em cada variável da função objetivo e das restrições deve conter apenas o número, sem a adição do 'x', separando os números por ';' e caso tenha alguma variável nula, é necessário inserir o 0.

###Mochila
- Serão permitidos somente valores inteiros

##Datas Importantes

###Simplex

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


###Mochila

  Datas     |   Eventos
---------   |   -----------
13/05/2019  |   Planejamento do Projeto
20/05/2019  |   Inserindo entrada de dados dinâmicos
20/05/2019  |   Finalização do projeto da mochila
20/05/2019  |   Criação de uma página de navegação
01/06/2019  |   Atualizando o Read Me

##Compatibilidade
       Requisitos   |    Ferramentas
----------------    |    -------------------
      Navegadores   |   Mozila Firefox e Chrome
Sistema Operacional |   Ubuntu, Windows e Mac

##Tecnologias

  Tecnologias    |  Ferramentas
 -------------   |  -------------
Front-End        |  HTML Javascript
Back-End         |  Javascript e PHP
Editor de Texto  |  Sublime e Visual Studio Code
Servidor Web     |  Heroku 

##Atividades Realizadas no Período

###Simplex
Código | Título | Tarefa | Situação | Observação
--------- | ------ | -------| -------| -------
1 | Maximizar | Montar a Tabela Simplex, e possibilitar o usuário a maximizar modelos de simplex com sistemas lineares. | Concluído | Apenas restrições de “<=”
2 | Minimizar | Montar a Tabela Simplex, e possibilitar o usuário a minimizar modelos de simplex com sistemas lineares. | Concluído | Apenas restrições de “<=”
3 | Adição de restrições | Possibilitar o usuário a adicionar inputs para maiores números de restrições. | Concluído |
4 | Remoção de restrições | Possibilitar o usuário a remover inputs para menores números de restrições. | Concluído |
5 | Demonstrar passo a passo | Demonstrar ao usuário as alterações na tabela causada pelas iterações do método simplex. | Concluído|
6 | Tabela de sensibilidade | Demonstrar ao usuário a tabela de sensibilidade. |Concluído|

###Mochila

Código | Título | Tarefa | Situação | Observação
--------- | ------ | -------| -------| -------
1 | Tabela de solução | Demonstrar ao usuário as etapas do algortimo | Concluído |
2 | Solução do problema | Mostrar ao usuário os itens selecionados pelo algoritmo como qualificados | Concluído |
