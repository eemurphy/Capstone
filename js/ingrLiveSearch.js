function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var txt = '';
  $.ajax({
    url:"../php/liveSearch.php",
    type:"POST",
    data: {string: str},
    async: false,
    success:function(data){
      txt = data;
    }
  });
  document.getElementById("livesearch").innerHTML= txt;
  document.getElementById("livesearch").style.border="1px solid #A5ACB2";

}
