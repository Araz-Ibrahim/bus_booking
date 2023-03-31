<div class="container-fluid">
	<form id="manage_user">
		<div class="col-md-12">
			<div class="form-group mb-2">
				<label for="name" class="control-label">Name</label>
				<input type="hidden" class="form-control" id="id" name="id" required>
				<input type="text" class="form-control" id="name" name="name" required>
			</div>
			<div class="form-group mb-2">
				<label for="username" class="control-label">User Name</label>
				<input type="text" class="form-control" id="username" name="username" required>
			</div>
			<div class="form-group mb-2">
				<label for="password" class="control-label">Password</label>
				<input type="password" class="form-control" id="password" name="password" required>
			</div>
		</div>
	</form>
</div>
<script>
	$('#manage_user').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'./save_user.php',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
    			end_load()
    			alert_toast('An error occured','danger');
			},
			success:function(resp){
				if(resp == 1){
    				end_load()
    				$('.modal').modal('hide')
    				alert_toast('Data successfully saved','success');
    				load_user()
				}
			}
		})
	})
</script>