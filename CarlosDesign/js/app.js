 

let boton = document.getElementById("icono");
let enlaces = document.getElementById("enlaces");
let contador = 0;
boton.addEventListener("click", function (e) {
    e.preventDefault();
    if (contador == 0) {
        enlaces.className = ("enlaces dos");
        contador = 1;
    } else {
        enlaces.classList.remove("dos");
        enlaces.className = ("enlaces uno");
        contador = 0;
    }
})

/*Animacioines  */
window.addEventListener('scroll',function(){
    var div = document.getElementById('zoom');
    var posicion = div.getBoundingClientRect().top; // console.log(posicion);
    var tamañoPantalla = window.innerHeight/2;
   
    if(posicion<=tamañoPantalla){
        div.style.animation = 'ease-in-out Zoom 1s ';
    }else{
        div.style.animation = 'ease-in-out moverDerecha 1s ';
    }
})
window.addEventListener('scroll',function(){
    var div = document.getElementById('articuloAnimacion');
    var posicion = div.getBoundingClientRect().top;
    var tamañoPantalla = window.innerHeight/3;
    if(posicion<=tamañoPantalla){
        div.style.animation = 'ease-in-out moverDerecha 1s ';
    }else{
        div.style.animation = 'ease-in-out moverAbajo 1s ';
    }
})
window.addEventListener('scroll',function(){
    var div = document.getElementById('mIzq');
    var posicion = div.getBoundingClientRect().top;
    var tamañoPantalla = window.innerHeight/3.5;
    if(posicion<=tamañoPantalla){
        div.style.animation = 'ease-in-out moverDerecha 1s ';
    }else{
        div.style.animation = 'ease-in-out moverIzquierda  1s ';
    }
})


/* boton flotante */
window.onscroll=function(){
    if(document.documentElement.scrollTop >100){
        document.querySelector('.go-top-container').classList.add('show');
    }else{
        document.querySelector('.go-top-container').classList.remove('show');
    }
}
document.querySelector('.go-top-container').addEventListener('click',()=>{
    window.scrollTo({
        top:0, behavior:'smooth'
    });
});