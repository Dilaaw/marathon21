const { forEach } = require('lodash');

require('./bootstrap');

 var LastSeries = document.getElementsByClassName('last-series');


 LastSeries[3].id ='last-series2';
 LastSeries[4].id ='last-series1';
 LastSeries[0].id = 'last-series3';
 LastSeries[1].id = 'last-series4';
 LastSeries[2].id = 'last-series5';

 document.getElementById('welcome-caroussel-suiv').addEventListener('click', function (){

    console.log ('suiv');
    for(let element of LastSeries){
        let elementID = element.id
        let indice = elementID.charAt(elementID.length-1);
        if (indice==5){
        let newIndice = 1;
        console.log(indice +' '+newIndice)
       element.id = 'last-series'+newIndice;
        }else{
            let newIndice = indice*1+1;
            console.log(indice +' '+newIndice)
           element.id = 'last-series'+newIndice;
    }}
 });

 document.getElementById('welcome-caroussel-prec').addEventListener('click', function (){

    console.log ('prec');
    for(let element of LastSeries){
        let elementID = element.id
        let indice = elementID.charAt(elementID.length-1);
        if (indice==1){
        let newIndice = 5;
        console.log(indice +' '+newIndice)
       element.id = 'last-series'+newIndice;
        }else{
            let newIndice = indice*1-1;
            console.log(indice +' '+newIndice)
           element.id = 'last-series'+newIndice;
    }}
 });
