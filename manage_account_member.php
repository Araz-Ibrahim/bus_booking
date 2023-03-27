<?php
session_start();
include('db_connect.php');
	$qry = $conn->query("SELECT * FROM users where id = ".$_SESSION['login_id'])->fetch_array();
	foreach($qry as $k => $val){
		$meta[$k] =  $val;
	}
?>
<div class="container-fluid">
	<form id="manage_user">
		<div class="col-md-12">
			<div class="form-group mb-2">
				<label for="name" class="control-label">Name</label>
				<input type="hidden" class="form-control" id="id" name="id" value='<?php echo isset($meta['id']) ? $meta['id'] : '' ?>' required="">
				<input type="text" class="form-control" id="name" name="name" required="" value="<?php echo isset($meta['name']) ? $meta['name'] : '' ?>">
			</div>
			<div class="form-group mb-2">
				<label for="username" class="control-label">User Name</label>
				<input type="text" class="form-control" id="username" name="username" required value="<?php echo isset($meta['username']) ? $meta['username'] : '' ?>">
			</div>
			<div class="form-group mb-2">
				<label for="password" class="control-label">Password</label>
				<input type="password" class="form-control" id="password" name="password" required value="<?php echo isset($meta['password']) ? $meta['password'] : '' ?>">
			</div>
            <div class="form-group mb-2">
                <label for="blood_typ" class="control-label">Blood Type</label>
                <select class="form-select" name="blood_type" required>
                    <option value="A+" <?php if(isset($meta['blood_type'])) {if($meta['blood_type'] == 'A+') echo 'selected'; else echo ' ';}   ?> >A+</option>
                    <option value="A-" <?php if(isset($meta['blood_type'])) {if($meta['blood_type'] == 'A-') echo 'selected'; else echo ' ';}   ?> >A-</option>
                    <option value="B+" <?php if(isset($meta['blood_type'])) {if($meta['blood_type'] == 'B+') echo 'selected'; else echo ' ';}   ?> >B+</option>
                    <option value="B-" <?php if(isset($meta['blood_type'])) {if($meta['blood_type'] == 'B-') echo 'selected'; else echo ' ';}   ?> >B-</option>
                    <option value="AB+" <?php if(isset($meta['blood_type'])) {if($meta['blood_type'] == 'AB+') echo 'selected'; else echo ' ';}   ?> >AB+</option>
                    <option value="AB-" <?php if(isset($meta['blood_type'])) {if($meta['blood_type'] == 'AB-') echo 'selected'; else echo ' ';}   ?> >AB-</option>
                    <option value="O+" <?php if(isset($meta['blood_type'])) {if($meta['blood_type'] == 'O+') echo 'selected'; else echo ' ';}   ?> >O+</option>
                    <option value="O-" <?php if(isset($meta['blood_type'])) {if($meta['blood_type'] == 'O-') echo 'selected'; else echo ' ';}   ?> >O-</option>
                </select>            </div>
            <div class="form-group mb-2">
                <label for="phone" class="control-label">Phone Number</label>
                <input type="number" class="form-control" id="phone" name="phone" required value="<?php echo isset($meta['phone']) ? $meta['phone'] : '' ?>">
            </div>
            <div class="form-group mb-2">
                <label for="phone_2" class="control-label">Second Phone Number</label>
                <input type="number" class="form-control" id="phone_2" name="phone_2" required value="<?php echo isset($meta['phone_2']) ? $meta['phone_2'] : '' ?>">
            </div>
		</div>
	</form>
</div>
<script>
	$('#manage_user').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'./update_account_member.php',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
    			end_load()
    			alert_toast('An error occured','danger');
			},
			success:function(resp){
				if(resp == 1){
    				$('.modal').modal('hide')
    				alert_toast('Account successfully updated','success');
    				setTimeout(function(){
    					location.reload()
    				},500)
				}
			}
		})
	})
</script>