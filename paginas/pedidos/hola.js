var boton =document.getElementById("boton");

function traer(){
var dni = 71461644;
fetch(
"https://apiperu.dev/api/dni/" +
dni + 
"?api_token=3ff81f5f2815af3fd49c7da111c44eaa9651526d8ee6ee7512a77865f3ee8885"

)
.then((res) => res.json())
.then((data) => {
	document.getElementById("nombre").value=data.data.nombres;
console.log(data);
});
}
boton.addEventListener("click",traer);