
var myvars = '';
var x = '';
var checks = '';

function createCard(){
  var url;
  if (filtersApplied()) {
    url = filtersURL();
  }
  else {
    url = createsimpleURL();
  }
  console.log(url);
  document.getElementById("results").innerHTML = "";
  $.getJSON(url, function(result, status){
    console.log("Result: " + result.count + "Status: " + status);
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
      i3.innerHTML = " " + Math.round(result.hits[x].recipe.calories / result.hits[x].recipe.yield) + " calories";
      text.appendChild(i3);

      card.appendChild(text);

      var a2 = document.createElement('a');
      a2.setAttribute('href', result.hits[x].recipe.url);
      a2.setAttribute('class', "btn");
      a2.setAttribute('target', "_blank");
      a2.innerHTML = "Let's Cook!"

      card.appendChild(a2);

      var element = document.getElementById("results");
      element.appendChild(card);
    }
  });
}

function createsimpleURL() {
  x = document.getElementById("search_simple").value;
  return "https://api.edamam.com/search?q=" + x + "&app_id=c8ff4e69&app_key=1b92838186c46df465114974c2121ee0";
}

function filtersApplied() {
  $.ajax({
    url:"../php/searching.php",
    type:"POST",
    data: $('#mychecks :input').serialize(),
    async: false,
    success:function(data){
      myvars = data;
    }
  });
  var maxIng = $('#maxIngRange').serialize();
  var minCal = document.getElementById('minCal').value;
  var maxCal = document.getElementById('maxCal').value;
  var minTime = document.getElementById('minTime').value;
  var maxTime = document.getElementById('maxTime').value;

  var cals = 'calories=' + minCal + '-' + maxCal;
  var time = 'time=' + minTime + '-' + maxTime;
  console.log('&' + maxIng + '&' + cals + '&' + time)

  checks = '&' + maxIng + '&' + cals + '&' + time + $('#checks :input').serialize();
  x = document.getElementById("search_simple").value;
  if (myvars || checks) {
    return true;
    }
  return false;

}


function filtersURL() {
  if (x || myvars) {
    var concat = x + '&app_id=c8ff4e69&app_key=1b92838186c46df465114974c2121ee0';
    if (myvars) {
      if (x) {
        concat = x + "+" + myvars;
      }
      else {
        concat = myvars;
      }

    }
    if (checks) {
      return "https://api.edamam.com/search?q=" + concat + checks;

    }
    else {
      return "https://api.edamam.com/search?q=" + concat;

    }
  }
  else {
    if (checks) {
      return "https://api.edamam.com/search?q=&app_id=c8ff4e69&app_key=1b92838186c46df465114974c2121ee0" + checks;
    }
    console.log("please add ingredients or search in the main bar");
    console.log("https://api.edamam.com/search?q=" + x + myvars + checks);
  }
  return '';
}
