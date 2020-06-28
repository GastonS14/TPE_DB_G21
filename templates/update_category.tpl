{include file="header.tpl"}
	<div class="separation">
    </div>
	<div class="weight_form_small">
		{foreach from=$category_detail item=category}
			<form action="save_update_category/{$category->nombre_categoria}" method="POST">
				<div class="form-group col-md-10 offset-1">
					<input type="text" name="id_categoria" id="id_categoria" class="form-control" placeholder="Id categoria" value="{$category->id_categoria}">
					<small id="name" class="form-text text-muted">Id categoria</small>
				</div>
				<div class="form-group col-md-10 offset-1">
					<input type="text" name="nombre_categoria" id="nombre_categoria" class="form-control" placeholder="nombre_categoria" value="{$category->nombre_categoria}">
					<small id="description" class="form-text text-muted">Nombre categoria</small>
				</div>
				<div class="d-flex flex-column">
					<div class="p-2 col-md-6 offset-3">
				  		<input type="submit" name="save" value="Guardar" class="btn btn-primary form-group col-md-12">
					</div>
					<div class="p-2 col-md-6 offset-3">
				  		<input type="submit" name="cancel" value="Cancelar" class="btn btn-primary form-group col-md-12">
					</div>
				</div>	
			</form>
		{/foreach}
	</div>
	{include file="footer.tpl"}

	