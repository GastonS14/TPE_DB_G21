{include file="header.tpl"}
    <div class="separation">
    </div>
    <div class="weight_form_middle">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                    <th></th>
                    {if ($user_permiso==1)}
                    <th></th>
                    <th>Acción</th>
                    {/if}
                </tr> 
            </thead>
            <tbody>
                {foreach from=$category_list item=category}
                    <tr>
                        <td>{$category->id_categoria}</td>
                        <td>{$category->nombre_categoria}</td>
                        <td><a href= 'subcategories/{$category->id_categoria}'>Ver subcategorias</a> </td>
                        {if ($user_permiso==1) || ($user_permiso==2)}
                        <td><a href= 'delete_category/{$category->id_categoria}'>Borrar</a> </td>
                        <td><a href= 'update_category/{$category->id_categoria}'>Editar</a></td>
                        {/if}
                    </tr> 
                {/foreach}
                    {if ($user_permiso==1) || ($user_permiso==2)}
                    <tr>
                        <td colspan="4"></td>
                        <td><a href='add_category'>Agregar categoria</a></td>
                    </tr>
                    {/if}    
            </tbody>
        </table>
    </div>
    <div class="fond"></div>
{include file="footer.tpl"}