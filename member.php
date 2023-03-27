 <section id="bg-bus" class="d-flex align-items-center">
<main id="main">
	<div class="container">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-md-12">
					<button class="float-right btn btn-primary btn-sm" type="button" id="new_member">Add New <i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="row">
				&nbsp;
			</div>
			<div class="row">
				<div class="card col-md-12">
					
					<div class="card-body">
						<table class="table table-striped table-bordered" id="user-field">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">Name</th>
                                    <th class="text-center">User Name</th>
                                    <th class="text-center">Blood Type</th>
                                    <th class="text-center">Phone Number</th>
                                    <th class="text-center">Second Phone Number</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</main>
</section>
<script>
	$('#new_member').click(function(){
		uni_modal('Add New Bus','manage_member.php')
	})
	window.load_user = function(){
		$('#user-field').dataTable().fnDestroy();
		$('#user-field tbody').html('<tr><td colspan="4" class="text-center">Please wait...</td></tr>')
		$.ajax({
			url:'load_member.php',
			error:err=>{
				console.log(err)
				alert_toast('An error occured.','danger');
			},
			success:function(resp){
				if(resp){
					if(typeof(resp) != undefined){
						resp = JSON.parse(resp)
							if(Object.keys(resp).length > 0){
								$('#user-field tbody').html('')
								var i = 1 ;
								Object.keys(resp).map(k=>{
									var tr = $('<tr></tr>');
									tr.append('<td class="text-center">'+(i++)+'</td>')
									tr.append('<td class="text-center">'+resp[k].name+'</td>')
                                    tr.append('<td>'+resp[k].username+'</td>')
                                    tr.append('<td>'+resp[k].blood_type+'</td>')
                                    tr.append('<td>'+resp[k].phone+'</td>')
                                    tr.append('<td>'+resp[k].phone_2+'</td>')
									tr.append('<td><center><button class="btn btn-sm btn-primary edit_bus mr-2" data-id="'+resp[k].id+'">Edit</button><button class="btn btn-sm btn-danger remove_bus" data-id="'+resp[k].id+'">Delete</button><button class="btn btn-sm btn-warning make_admin" data-id="'+resp[k].id+'">Make Admin</button></center></td>')
									$('#user-field tbody').append(tr)

								})

							}else{
								$('#user-field tbody').html('<tr><td colspan="4" class="text-center">No data.</td></tr>')
							}
					}
				}
			},
			complete:function(){
				$('#user-field').dataTable()
				manage();
			}
		})
	}
	function manage(){
		$('.edit_bus').click(function(){
		uni_modal('Edit New User','manage_member.php?id='+$(this).attr('data-id'))

		})
		$('.remove_bus').click(function(){
		_conf('Are you sure to delete this data?','remove_bus',[$(this).attr('data-id')])

		})
        $('.make_admin').click(function(){
            _conf('Are you sure to make this user to admin?','make_admin',[$(this).attr('data-id')])
        })
	}
	function remove_bus($id=''){
		start_load()
		$.ajax({
			url:'delete_user.php',
			method:'POST',
			data:{id:$id},
			error:err=>{
				console.log(err)
				alert_toast("An error occured","danger");
				end_load()
			},
			success:function(resp){
				if(resp== 1){
					alert_toast("Data succesfully deleted","success");
					end_load()
					$('.modal').modal('hide')
					load_user()
				}
			}
		})
	}
    function make_admin($id=''){
        start_load()
        $.ajax({
            url:'make_admin.php',
            method:'POST',
            data:{id:$id},
            error:err=>{
                console.log(err)
                alert_toast("An error occured","danger");
                end_load()
            },
            success:function(resp){
                if(resp== 1){
                    alert_toast("Data succesfully updated","success");
                    end_load()
                    $('.modal').modal('hide')
                    load_user()
                }
            }
        })
    }
	$(document).ready(function(){
		load_user()
	})
</script>