{include file="header.tpl"}
    <div class="weight_form_small">
        <table class="table">
            <thead>
                <tr>
                    <th>Id categoria</th>
                    <th>Id subcategoria</th>
                    <th>Nombre subcategoria</th>
                    {if ($user_permiso==1)}
                    <th>Acción</th>
                    {/if}
                </tr> 
            </thead>
            <tbody>
                {foreach from=$subcategories_details item=subcategories}
                    <tr>
                        <td>{$subcategories->id_categoria}</td>
                        <td>{$subcategories->id_subcategoria}</td>
                        <td>{$subcategories->nombre_subcategoria}</td>
                        {if ($user_permiso==1) || ($user_permiso==2)}
                        <td><a href= 'delete_subcategory/{$subcategories->id_categoria}/{$subcategories->id_subcategoria}'>Borrar</a></td>
                        <td><a href='add_subcategory/{$subcategories->id_categoria}'>Agregar subcategoria</a></td>
                        {/if}
                    </tr> 
                {/foreach}
                    {if ($user_permiso==1)}
                    
                    <tr>
                        <td colspan="4"></td>
                        <td><a href='category'>Volver a categorias</a></td>
                    </tr> 
                    {/if}   
            </tbody>
        </table>
    </div>
{include file="footer.tpl"}