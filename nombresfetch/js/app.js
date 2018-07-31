new WOW().init();

  document.querySelector("#generar-nombre").addEventListener("submit", cargarNombre);



  function cargarNombre(e) {
  	e.preventDefault();
  	
  	const origen=document.getElementById("origen");
  	const origenSeleccionado=origen.options[origen.selectedIndex].value;
  	const genero=document.getElementById("genero");
  	const generoSeleccionado=genero.options[genero.selectedIndex].value;
  	const cantidad=document.getElementById("numero").value;

    let url="";
    url += "http://uinames.com/api/?";

    if (origenSeleccionado !== "") {
    	url += `region=${origenSeleccionado}&`;
    };

    if (generoSeleccionado !== "") {
    	url += `gender=${generoSeleccionado}&`;
    };

    if (cantidad !== "") {
    	url += `amount=${cantidad}&ext`;
    };

  

  fetch(url)
     .then(function (res) {
        return res.json();
     })
     .then(function (response) {
       console.log(response);

       let casi="";
                response.forEach( function(nombre) {
               console.log(nombre.name);
           casi+=`
           <div id="container" class=" col-md-4">
         <img class="card-img-top" src=${nombre.photo} alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Nombres</h4>
         <p class="card-text">
            
             <li>${nombre.name}</li>



         </p>
            <a href="#!" class="btn btn-primary">Go somewhere</a>
         </div>
       </div>`;
                 });
   document.getElementById("resultado").innerHTML=casi;
     });

}



//     var ajax = new XMLHttpRequest();
//     ajax.onreadystatechange = function() {
//     	if (ajax.readyState == 4 && ajax.status == 200) {
//     		var response = JSON.parse(ajax.responseText);
    		
//     		let casi="";
//                 response.forEach( function(nombre) {
          
//            casi+=`
//            <div id="container" class=" col-md-4">
//   				<img class="card-img-top" src=${nombre.photo} alt="Card image cap">
//  				 <div class="card-body">
//    				 <h4 class="card-title">Nombres</h4>
//     			<p class="card-text">
     				
//             	<li>${nombre.name}</li>



//     			</p>
//    				 <a href="#!" class="btn btn-primary">Go somewhere</a>
//   				</div>
// 				</div>`;
//                  });
             
         

            
           


// document.getElementById("resultado").innerHTML=casi;

//     	}
//     };
//     ajax.open("GET", url, true);
//    // ajax.setRequestHeader("Content-type", "application/json");
//     ajax.send();

//   };


   



