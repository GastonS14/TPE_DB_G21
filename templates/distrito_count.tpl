{include file="header.tpl"}
    <div class="weight_form_small">
        <table class="table">
            <thead>
                <tr>
                    <th>Id distrito</th>
                    <th>Nombre pais</th>
                    <th>Nombre provincia</th>
                    <th>Nombre distrito</th>
                    <th>Cantidad de eventos</th>
                </tr> 
            </thead>
            <tbody>
                {foreach from=$distrito_count_list item=distrito_count}
                    <tr>
                        <td>{$distrito_count->id_distrito}</td>
                        <td>{$distrito_count->nombre_pais}</td>
                        <td>{$distrito_count->nombre_provincia}</td>
                        <td>{$distrito_count->nombre_distrito}</td>
                        <td>{$distrito_count->cantidad_eventos}</td>
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
