let d = new Date();
document.body.innerHTML = "<h1>Today's date is " + d + "</h1>"

fetch('/test', {method: 'GET'})
    .then(function(response) {
      if(response.ok) return response.json();
      throw new Error('Request failed.');
    });
    .then(function(data) {
      document.getElementById('name').innerHTML = `Button was clicked ${data.length} times`;
    })
    .catch(function(error) {
      console.log(error);
    });
}, 1000);
