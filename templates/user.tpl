{include file= "header.tpl"}
    <div class="separation">
    </div>
    <div class="weight_form_small">
        <table class= "table table-striped">
            <thead>
                <tr>
                    {if ($user_permiso ==1)}
                    <th>Email</th>
                    {/if}
                    <th>Acción usuario</th>
                    <th>Niveles de permisos</th>
                    <th>Editar permisos</th>
                </tr> 
            </thead>
            <tbody>
                {foreach from=$user_list item=user}
                    <tr>
                        <td>{$user->email}</td>
                        <td><a href='delete_user/{$user->email}'>Borrar</a></td>
                        <td>{if {$user->id_permiso} == 1}
                                Administrador
                            {elseif {$user->id_permiso} == 2}
                                Registrado
                            {else}
                                Invitado
                            {/if}
                        </td>
                        <td><a href='update_user/{$user->email}'>Editar</a></td>
                    </tr> 
                {/foreach}   
            </tbody>
        </table>
    </div>    
{include file="footer.tpl"}

