
<div class="container-fluid">
	<form id="manage_user">
		<div class="col-md-12">
			<div class="form-group mb-2">
				<label for="name" class="control-label">Name</label>
				<input type="hidden" class="form-control" id="id" name="id" required="">
				<input type="text" class="form-control" id="name" name="name" required="">
			</div>
			<div class="form-group mb-2">
				<label for="username" class="control-label">User Name</label>
				<input type="text" class="form-control" id="username" name="username" required >
			</div>
			<div class="form-group mb-2">
				<label for="password" class="control-label">Password</label>
				<input type="password" class="form-control" id="password" name="password" required >
			</div>
            <div class="form-group mb-2">
                <label for="blood_typ" class="control-label">Blood Type</label>
                <select class="form-select" name="blood_type" required>
                    <option value="A+" >A+</option>
                    <option value="A-" >A-</option>
                    <option value="B+" >B+</option>
                    <option value="B-" >B-</option>
                    <option value="AB+" >AB+</option>
                    <option value="AB-" >AB-</option>
                    <option value="O+" >O+</option>
                    <option value="O-" >O-</option>
                </select>            </div>
            <div class="form-group mb-2">
                <label for="phone" class="control-label">Phone Number</label>
                <input type="number" class="form-control" id="phone" name="phone" required >
            </div>
            <div class="form-group mb-2">
                <label for="phone_2" class="control-label">Second Phone Number</label>
                <input type="number" class="form-control" id="phone_2" name="phone_2" required>
            </div>

		</div>
	</form>
</div>
<script>
	$('#manage_user').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'./save_member.php',
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