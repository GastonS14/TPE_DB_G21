{include file="header.tpl"}
    <div class="weight_form_small">
        <table class="table">
            <thead>
                <tr>
                    <th>Id evento</th>
                    <th>Nro edicion</th>
                    <th>Fecha inicio pub</th>
                    <th>Fecha fin pub</th>
                    <th>presupuesto</th>
                    <th>Fecha edicion</th>
                    {if ($user_permiso==1)}
                    <th>Acción</th>
                    {/if}
                </tr> 
            </thead>
            <tbody>
                {foreach from=$ediciones_evento_details item=ediciones_evento}
                    <tr>
                        <td>{$ediciones_evento->id_evento}</td>
                        <td>{$ediciones_evento->nro_edicion}</td>
                        <td>{$ediciones_evento->fecha_inicio_pub}</td>
                        <td>{$ediciones_evento->fecha_fin_pub}</td>
                        <td>{$ediciones_evento->presupuesto}</td>
                        <td>{$ediciones_evento->fecha_edicion}</td>
                        {if ($user_permiso==1) || ($user_permiso==2)}
                        <td><a href= 'delete_evento/{$ediciones_evento->id_evento}/{$ediciones_evento->nro_evento}'>Borrar</a></td>
                        <td><a href='add_ediciones_evento/{$ediciones_evento->id_categoria}'>Agregar edicion</a></td>
                        {/if}
                    </tr> 
                {/foreach}
                    {if ($user_permiso==1)}
                    
                    <tr>
                        <td colspan="7"></td>
                        <td><a href='evento'>Volver a eventos</a></td>
                    </tr> 
                    {/if}   
            </tbody>
        </table>
    </div>
{include file="footer.tpl"}