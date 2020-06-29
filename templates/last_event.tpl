{include file="header.tpl"}
    <div class="weight_form_small">
        <table class="table">
            <thead>
                <tr>
                    <th>Id evento</th>
                </tr> 
            </thead>
            <tbody>
                {foreach from=$last_event_list item=last_event}
                    <tr>
                        <td>{$last_event->id_evento}</td>
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