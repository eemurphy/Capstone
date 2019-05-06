function favIt(e) {
  var str = e.target.id;
  var recipe = str.split("?");
  console.log(recipe);
  $.ajax({
    url:"../php/addFav.php",
    type:"POST",
    data: {title: recipe[0],
           img: recipe[1],
           url: recipe[2],
           servings: recipe[3],
           calories: recipe[4]},
    success:function(data){
      console.log(data);
    }
  });
  if (isFavorited(recipe[0]) == 'true') {
    e.target.setAttribute('class', "fas fa-heart");
  }
  else {
    e.target.setAttribute('class', "far fa-heart");
  }

}
