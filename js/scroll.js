"use strict"
    function scrollFunction() {
        if(document.body.scrollTop>10 || document.documentElement.scrollTop>10){
            document.getElementById("btnScroll").classList.add('buttonScroll');
        } else {
            document.getElementById("btnScroll").classList.remove('buttonScroll');
        }
    }
    //Cuando el usuario hace click en el boton, scroll arriba
    let arriba = document.getElementById("btnScroll");
    
    function irArriba() {
        //Safari
        document.body.scrollTop = 0;
        //Chrome, Firefox, IE y Opera
        document.documentElement.scrollTop = 0;
    }

    arriba.addEventListener("click", irArriba);
    window.addEventListener("scroll", scrollFunction);
