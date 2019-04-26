function createCard(){
  var url = createsimpleURL();
      document.getElementById("results").innerHTML = "";
  $.getJSON(url, function(result, status){
    console.log(status);
    for (x in result.hits) {
      var card = document.createElement("div");
      card.setAttribute('class', 'recipe-card');

      var headimg = document.createElement("div");
      headimg.setAttribute('class', 'headimg');

      var img = document.createElement('img');
      img.src = result.hits[x].recipe.image;
      headimg.appendChild(img);
      card.appendChild(headimg);

      var title = document.createElement("h1");
      title.setAttribute('class', 'food');
      title.innerHTML = result.hits[x].recipe.label;


      var text = document.createElement('div');
      text.setAttribute('class', 'text-box');
      text.appendChild(title);
      
      var diets = document.createElement('p');
      diets.setAttribute('class', 'info');
      var diet_text = "";
      for (d in result.hits[x].recipe.dietLabels) {
        diet_text += result.hits[x].recipe.dietLabels[d] + " ";
      }
      for (h in result.hits[x].recipe.healthLabels) {
        diet_text += result.hits[x].recipe.healthLabels[h] + " ";
      }
      diets.innerHTML = diet_text;
      text.appendChild(diets);

      var i2 = document.createElement('i');
      i2.setAttribute('class', 'fa fa-users');
      i2.innerHTML = " " + result.hits[x].recipe.yield + " servings";
      text.appendChild(i2);

      var i3 = document.createElement('i');
      i3.setAttribute('class', 'fa fa-cutlery');
      i3.innerHTML = " " + Math.round(result.hits[x].recipe.calories) + " calories";
      text.appendChild(i3);

      card.appendChild(text);

      var a2 = document.createElement('a');
      a2.setAttribute('href', "#");
      a2.setAttribute('class', "btn");
      a2.innerHTML = "Let's Cook!"

      card.appendChild(a2);

      var element = document.getElementById("results");
      element.appendChild(card);
    }
  });
}

function createsimpleURL() {
  var x = document.getElementById("search_simple").value;
  return "https://api.edamam.com/search?q=" + x + "&app_id=c8ff4e69&app_key=4e95c1dd3483dcda4d0d618341222ddf";
}
