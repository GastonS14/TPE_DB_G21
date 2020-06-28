{include file= "header.tpl"}
    <div class="weight_form_small">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Plataforma</th>
                    <th>Categoria</th>
                    {if ($user_permiso==1)}
                    <th></th>
                    <th>Acción</th>
                    {/if}
                </tr> 
            </thead>
            <tbody>
                {foreach from=$game_details item=game}
                <tr>
                    <td>{$game->nombre}</td>
                    <td>{$game->plataforma}</td>
                    <td>{$game->categoria}</td>
                    {if ($user_permiso==1)}
                    <td><a href='delete/{$game->id_juego}'>Borrar</a></td>
                    <td><a href='update_game/{$game->id_juego}'>Editar</a></td>
                    {/if}
                </tr> 
                {/foreach}
                {if ($user_permiso==1)}
                <tr>
                    <td colspan="4"></td>
                    <td><a href='add_game'>Agregar juego</a></td>
                </tr>
                {/if}   
            </tbody>
        </table>
        <div class="img-container-add-game">
            <div class="img-center">
                {if isset($game->imagen)}
                    <img src="{$game->imagen}" class="img-fluid img-thumbnail img-center"/>
                {/if}     
            </div>
        </div>
        {if ($user_permiso!=3)}
        <div class="container_comments">
            <form action="api/comment" id="form-games" method="POST" class="form_comm">
                <div class="form-group col-md-10 offset-1">
                    <input type="hidden" name="game_id" class="form-control" id="game_id" value="{$game->id_juego}">
                </div>
                <div class="form-group row">
                    <div class="col-md-7">
                        <textarea class="form-control" id="comentario" rows="6" name="comentario"></textarea>
                        <small id="comentario" class="form-text text-muted">Agrega un comentario</small>
                    </div>
                    <div class="form-group col-md-5">
                        <input type="number" class="form-control" name="puntaje" id="puntaje">
                        <small id="nombre" class="form-text text-muted">Puntaje del juego</small>
                        <input type="submit" name="save" value="Agregar" class="btn btn-primary form-group col-md-12">
                    </div>
                </div>  
            </form>
            <ul id="comments">            
            </ul>
        </div>
        {/if}
    </div>
    <button id="btnScroll" title="Ir arriba">
            <i class="fas fa-angle-double-up"></i>
    </button>
    <footer>
        <div class="redesSociales">
            <div class="redSocContent">
                <a href="https://twitter.com/login?lang=es" class="font">
                    <i class="fab fa-twitter fa-2x" id="iconTw"></i>
                </a>
            </div>
            <div class="redSocContent">
                <a href="https://www.instagram.com/?hl=es-la" class="font">
                    <i class="fab fa-instagram fa-2x" id="iconInst"></i>
                </a>
            </div>
            <div class="redSocContent">
                <a href="https:www.facebook.com" class="font">
                    <i class="fab fa-facebook-square fa-2x"id="iconFb"></i>
                </a>
            </div>
        </div>
    </footer>
        <script type="text/javascript" src="./js/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script type="text/javascript" src="./js/bootstrap.js"></script>
        <script type="text/javascript" src="./js/scroll.js"></script>
        <!--<script src="./js/juegos.js"></script>-->
    </body>
</html>

            