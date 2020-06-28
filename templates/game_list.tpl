{include file= "header.tpl"}
    <form action="add_game" method="post">
        <input type="text" name="nombre" placeholder="nombre">
        <input type="text" name="plataforma" placeholder="plataforma">
        <input type="text" name="categoria" placeholder="categoria">
        <input type="submit" value= "Agregar Juego">
    </form>
    <ul>
        {foreach from=$game_list item=game}
            <li> {$game->nombre}, {$game->plataforma}, {$game->categoria}</li>
                <a href= 'delete/{$game->id_juego}'>DELETE</a> 
            </li>
        {/foreach}
    </ul>
{include file="footer.tpl"}