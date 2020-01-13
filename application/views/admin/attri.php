<form class="attrib" id="attrib" >
	<div class="form-group row">
		<div class="col-sm-6 mb-3 mb-sm-0">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text" for="user">Utilisateur</label>
				</div>
				<select class="custom-select" id="user" name="user">
					<option selected>Choose...</option>
					<option value="1">One</option>
					<option value="2">Two</option>
					<option value="3">Three</option>
				</select>
			</div>

		</div>
		<div class="col-sm-6">
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text" for="poste">Poste</label>
				</div>
				<select class="custom-select" id="poste" name="poste">
					<option selected>Choose...</option>
					<option value="1">One</option>
					<option value="2">Two</option>
					<option value="3">Three</option>
				</select>
			</div>

		</div>
	</div>
	<div class="form-group">
		<input type="date" class="form-control form-control-user" id="jour" name="jour" placeholder="Jour">
	</div>
	<div class="form-group row">
		<div class="col-sm-6 mb-3 mb-sm-0">
			<input type="time" class="form-control form-control-user" id="heureDeb" name="heureDeb"
				placeholder="Heure début">
		</div>
		<div class="col-sm-6">
			<input type="time" class="form-control form-control-user" id="heureFin" name="heureFin"
				placeholder="Heure fin">
		</div>
	</div>
	<btn class="btn btn-primary btn-user btn-block" id="add_user">
		Attribuer un poste
	</btn>
	<hr>
</form>
<!-- DataTales  -->
<div class="card shadow mb-4  ml-2 col-8">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Attributions</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable_attrib" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Utilisateur</th>
						<th>Poste</th>
						<th>Jour</th>
						<th>Créneau</th>
						<th>Statut</th>
						<th>Action</th>
					</tr>
				</thead>

			</table>
		</div>
	</div>
</div>
