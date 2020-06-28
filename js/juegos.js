"use strict"

    function create_game_HTML(comment) {
        let element = `${game.comentario}: ${game.puntaje}: ${game.fecha}`;
        element += `<a href="game/${game.id}">Ver</a> `;
        element += `<a href="update_game/${game.id}">Finalizar</a> `;
        element += `<a href="delete/${game.id}">Eliminar</a>`;
        element = `<li>${element}</li>`;
        return element;  
    }

    function get_comments() {
        fetch("api/comments/data.id_juego")
        .then(response => response.json())
        .then(comments => {
            let juegos_ul = document.querySelector("#comments");
            comments_ul.innerHTML = "";
            for (let comment of comments) {
                juegos_ul.innerHTML += create_game_HTML(comment);
            }
        })
        .catch(error => console.log(error));
    }

    document.querySelector("#form-games").addEventListener('submit', add_comment);

    /*function get_current_date(){
        let today = new Date();
        let dd = today.getDate();
        let mm = today.getMonth()+1;
        let yyyy = today.getFullYear();
        let curr_date = dd+'/'+mm+'/'+yyyy;
        return curr_date;
    }*/

    function add_comment(e) {
        e.preventDefault();
        let data = {
            id_juego: document.querySelector("input[name=game_id]").value,
            comentario:  document.querySelector("input[name=comentario]").value,
            puntaje:  document.querySelector("input[name=puntaje]").value,
        }

        fetch('api/comment', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},       
            body: JSON.stringify(data) 
         })
         .then(response => {
             get_comments();
         })
         .catch(error => console.log(error));
    }

    get_comments();
