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
                    {if ($user_permiso==1)}
                    <tr>
                        <td colspan="4"></td>
                        <td><a href='category'>Volver a eventos</a></td>
                    </tr> 
                    {/if}   
            </tbody>
        </table>
    </div>
{include file="footer.tpl"}