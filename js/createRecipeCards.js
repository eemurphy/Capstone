function createCard(){
  var url = createsimpleURL();
  document.getElementById("results").innerHTML += url;
  //$.getJSON(url, function(result){
    document.getElementById("results").innerHTML += "2";
    //for (x in result.hits) {
    //var card = document.createElement("p");
    //var content = document.createTextNode(result.hits[x].recipe.label);
  //  card.appendChild(content);
  //  document.getElementById("results").innerHTML += "3"; //+ result.hits[x].recipe.label;
  //  }
  //});
}

function createsimpleURL() {
  var x = document.getElementById("search_simple").value;
  return "https://api.edamam.com/search?q=" + x + "&app_id=c8ff4e69&app_key=4e95c1dd3483dcda4d0d618341222ddf";
}
