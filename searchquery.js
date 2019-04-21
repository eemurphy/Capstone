
//Displays the names of 10 chicken recipes
$(document).ready(function(){
  $("#btn1").click(function(){
    $.getJSON("https://api.edamam.com/search?q=chicken&app_id=c8ff4e69&app_key=4e95c1dd3483dcda4d0d618341222ddf", function(result){
      for (x in result.hits) {
        document.getElementById("input").innerHTML += "<br>" + result.hits[x].recipe.label;
      }
    });
  });
});

function createsimpleURL() {
  var x = document.getElementById("search_simple").value;
  return "https://api.edamam.com/search?q=" + x + "&app_id=c8ff4e69&app_key=4e95c1dd3483dcda4d0d618341222ddf";
}
