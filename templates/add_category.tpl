{include file="header.tpl"}
	<div class="separation">
    </div>
	<div class="weight_form_small">
		<form action="save_category" method="POST" >
			<div class="form-group col-md-10 offset-1">
			    <input type="number" class="form-control" name="id_categoria" id="id_categoria" placeholder="Categoria">
				<small id="id_categoria" class="form-text text-muted">Id categoria</small>
			</div>
			<div class="form-group col-md-10 offset-1">
			    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="nombre_categoria"></textarea>
			    <small id="nombre_categoria" class="form-text text-muted">Nombre categoria</small>
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