<form class="user" id="user" >
	<div class="form-group row">
		<div class="col-sm-6 mb-3 mb-sm-0">
			<input type="text" class="form-control form-control-user" id="nom" name="nom" placeholder="Nom">
		</div>
		<div class="col-sm-6">
			<input type="text" class="form-control form-control-user" id="prenom" name="prenom" placeholder="Prénom">
		</div>
	</div>
	<div class="form-group">
		<input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Adresse email">
	</div>
	<btn  class="btn btn-primary btn-user btn-block" id="add_user">
		Ajouter un utilisateur
</btn>
	<hr>
</form>
<!-- DataTales  -->
<div class="card shadow mb-4  ml-2 col-8">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Utilisateurs</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable_user" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>id</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Email</th>
					</tr>
				</thead>
				
			</table>
		</div>
	</div>
</div>

<script id="my_script">
	
	
</script>
