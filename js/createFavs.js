function favCreation() {
  var recipes;
  $.ajax({
    url:"../php/returnFavs.php",
    type:"GET",
    async: false,
    success:function(data){
      recipes = JSON.parse(data);
    }
  });
  for (x in recipes) {
    var card = document.createElement("div");
    card.setAttribute('class', 'recipe-card');

    var headimg = document.createElement("div");
    headimg.setAttribute('class', 'headimg');

    var img = document.createElement('img');
    img.src = recipes[x].img;

    var favbtn = document.createElement('div');
    favbtn.setAttribute('class', 'heartbtn');
    var favtxt = document.createElement('i');
    favtxt.setAttribute('class', "far fa-heart");
    favtxt.id = recipes[x].title + '?' + recipes[x].img + '?' + recipes[x].url + '?' + recipes[x].servings + '?' + recipes[x].calories;
    favbtn.addEventListener('click', function() {
      favIt(event);

    });
    if (isFavorited(recipes[x].title) == 'true') {
      favtxt.setAttribute('class', "fas fa-heart");

    }

    favbtn.appendChild(favtxt);
    headimg.appendChild(img);
    headimg.appendChild(favbtn);
    card.appendChild(headimg);

    var title = document.createElement("h1");
    title.setAttribute('class', 'food');
    title.innerHTML = recipes[x].title;


    var text = document.createElement('div');
    text.setAttribute('class', 'text-box');
    text.appendChild(title);

    var i2 = document.createElement('i');
    i2.setAttribute('class', 'fa fa-users');
    i2.innerHTML = " " + recipes[x].servings + " servings";
    text.appendChild(i2);

    var i3 = document.createElement('i');
    i3.setAttribute('class', 'fas fa-utensils');
    i3.innerHTML = " " + recipes[x].calories + " calories";
    text.appendChild(i3);

    card.appendChild(text);

    var a2 = document.createElement('a');
    a2.setAttribute('href', recipes[x].url);
    a2.setAttribute('class', "btn");
    a2.setAttribute('target', "_blank");
    a2.innerHTML = "Let's Cook!"

    card.appendChild(a2);

    var element = document.getElementById("favorites");
    element.appendChild(card);
  }
}
