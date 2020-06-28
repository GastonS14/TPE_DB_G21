{include file="header.tpl"}
<div class="weight_form_small">
	<form action="save_evento" method="POST" enctype="multipart/form-data">
		<div class="form-group col-md-10 offset-1">
			<input type="number" class="form-control" name="id_evento" id="id_evento" placeholder="Id evento">
			<small id="id_evento" class="form-text text-muted">Id evento</small>
		</div>
		<div class="form-group col-md-10 offset-1">
			<input type="text" class="form-control" name="nombre_evento" id="nombre_evento" placeholder="nombre evento">
			<small id="nombre_evento" class="form-text text-muted">nombre evento</small>
		</div>
		<div class="form-group col-md-10 offset-1">
			<input type="text" class="form-control" name="descripcion_evento" id="descripcion_evento" placeholder="descripion evento">
			<small id="descripcion_evento" class="form-text text-muted">descripion evento</small>
		</div>
		<div class="form-group col-md-10 offset-1"> 	
			<select name="id_categoria/id_subcategoria" class="form-control">
				{foreach from=$subcategorias_list item=subcategorias}
					<option>{$subcategorias->id_categoria}/{$subcategorias->id_subcategoria}</option>
				{/foreach}
			</select>
			<small id="id_categoria_id_subcategoria" class="form-text text-muted">Id categoria, Id subcategoria</small>	
		</div>
		<div class="form-group col-md-10 offset-1"> 	
			<select name="email" class="form-control">
				{foreach from=$usuarios_list item=usuarios}
					<option>{$usuarios->email}</option>
				{/foreach}
			</select>
			<small id="email" class="form-text text-muted">Email de usuario</small>	
		</div>
		<div class="form-group col-md-10 offset-1"> 	
			<select name="id_distrito" class="form-control">
				{foreach from=$distritos_list item=distritos}
					<option>{$distritos->id_distrito}</option>
				{/foreach}
				<option></option>
			</select>
			<small id="id_distrito" class="form-text text-muted">Id distrito</small>	
		</div>
		<div class="form-group col-md-10 offset-1">
			<input type="number" class="form-control" name="dia_evento" id="dia_evento" placeholder="dia evento">
			<small id="dia_evento" class="form-text text-muted">dia evento</small>
		</div>
		<div class="form-group col-md-10 offset-1">
			<input type="number" class="form-control" name="mes_evento" id="mes_evento" placeholder="mes evento">
			<small id="mes_evento" class="form-text text-muted">Mes evento</small>
		</div>
		<div class="form-group col-md-10 offset-1">
			<input type="number" class="form-control" name="repetir" id="repetir" placeholder="repetir">
			<small id="repetir" class="form-text text-muted">repetir</small>
		</div>
		<div class="d-flex flex-column">
			<div class="p-2 col-md-6 offset-3">
		  		<input type="submit" name="save" value="Agregar" class="btn btn-primary form-group col-md-12">
			</div>
			<div class="p-2 col-md-6 offset-3">
		  		<input type="submit" name="cancel" value="Cancelar" class="btn btn-primary form-group col-md-12">
			</div>
		</div>	
	</form>
</div>
{include file="footer.tpl"}
		       