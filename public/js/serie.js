let nbsaison = document.getElementsByClassName('saison-btn').length;
document.getElementById('season1').classList.add("showseason");

for (i = 1; i<+nbsaison; i++){
    document.getElementById('saison'+i).addEventListener('click', function (){
        document.getElementById('season'+i).classList.add("showseason");
   
    })

}

