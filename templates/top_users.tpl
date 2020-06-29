{include file="header.tpl"}
    <div class="weight_form_small">
        <table class="table">
            <thead>
                <tr>
                    <th>Id usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>e_mail</th>
                    <th>Cantidad de eventos</th>
                </tr> 
            </thead>
            <tbody>
                {foreach from=$top_users_list item=top_users}
                    <tr>
                        <td>{$top_users->id_usuario}</td>
                        <td>{$top_users->nombre}</td>
                        <td>{$top_users->apellido}</td>
                        <td>{$top_users->e_mail}</td>
                        <td>{$top_users->cant_eventos_usuario}</td>
                    </tr> 
                {/foreach}
                    <tr>
                        <td colspan="4"></td>
                        <td><a href='evento'>Volver a eventos</a></td>
                    </tr>
            </tbody>
        </table>
    </div>
{include file="footer.tpl"}

{include file= "header.tpl"}
    <div class="separation">
    </div>
    <div class="weight_form_middle">
        <table class= "table table-striped">
            <thead>
                <tr>
                    <th>Id evento</th>
                    <th>Nombre Evento</th>
                    <th>Descripcion evento</th>
                    <th>Id categoria</th>
                    <th>Id subcategoria</th>
                    <th>Id usuario</th>
                    <th>Id distrito</th>
                    <th>Dia evento</th>
                    <th>Mes evento</th>
                    <th>Repetir</th>
                    {if ($user_permiso==1)}
                    <th></th>
                    <th>Acción</th>
                    <th></th>
                    {/if}
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td><a href='get_top_users'>Usuarios con mas eventos</a></td>
                    <td></td>
                    <td><a href='get_top_users'>Id_Events(fecha_edicion=primer tri 2020)</a></td>
                    <td><a href='get_top_users'>Distritos + count(events) por distrito</a></td>
                    <td><a href='get_top_users'>Categorías con eventos en todas sus subcategorías.</a></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr> 
                {foreach from=$evento_list item=eventos}
                    <tr>
                        <td>{$eventos->id_evento}</td>
                        <td>{$eventos->nombre_evento}</td>
                        <td>{$eventos->descripcion_evento}</td>
                        <td>{$eventos->id_categoria}</td>
                        <td>{$eventos->id_subcategoria}</td>
                        <td>{$eventos->id_usuario}</td>
                        <td>{$eventos->id_distrito}</td>
                        <td>{$eventos->dia_evento}</td>
                        <td>{$eventos->mes_evento}</td>
                        <td>{$eventos->repetir}</td>
                        {if ($user_permiso==1)}
                        <td><a href='update_evento/{$eventos->id_evento}'>Editar</a></td>
                        {/if}
                        <td><a href='ediciones_evento/{$eventos->id_evento}'>Ver ediciones</a></td>
                    </tr> 
                {/foreach}
                    {if ($user_permiso==1)}
                    <tr>
                        <td colspan="11"></td>
                        <td><a href= 'add_evento'>Agregar evento</a></td>
                    </tr>
                    {/if}   
            </tbody>
        </table>
    </div>    
{include file="footer.tpl"}