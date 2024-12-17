<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">System Users</h2>
  </div>
</header>

<div class="table-agile-info">
	<div class="panel panel-default">

		<div class="container-fluid">
			<?php if ($this->session->flashdata('message')!=null) {
			echo "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>"
				.$this->session->flashdata('message')."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button> </div>";
			} ?>
			<br><a href="#tambah" data-toggle="modal" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Add New System User</a><br>
			<table class="table table-hover table-bordered" id="example" ui-options=ui-options="{
			        &quot;paging&quot;: {
			          &quot;enabled&quot;: true
			        },
			        &quot;filtering&quot;: {
			          &quot;enabled&quot;: true
			        },
			        &quot;sorting&quot;: {
			          &quot;enabled&quot;: true
			        }}">
				<thead style="background-color: #464b58; color:white;">
					<tr>
						<td>#</td>
						<td>Full Name</td>
						<td>Username</td>
						<td>Level</td>
						<td>Action</td>
					</tr></thead>
				<tbody style="background-color: white;">
					<?php $no=0; foreach ($tampil_user as $user) : $no++;?>

					<tr>
						<td><?=$no?></td>
						<td><?=$user->nama_user?></td>
						<td><?=$user->username?></td>
						<td><?=$user->level?></td>
						<td>
							<a href="#edit" onclick="edit('<?=$user->kode_user?>')" class="btn btn-success btn-sm" data-toggle="modal">Edit</a>
							<a href="<?=base_url('index.php/user/hapus/'.$user->kode_user)?>" onclick="return confirm('Are you sure to delete it?')" class="btn btn-danger btn-sm">Delete</a>
						</td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="modal" id="tambah">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					Add System User
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
					</button>
				</div>
				<form action="<?=base_url('index.php/user/tambah')?>" method="post">
					<div class="modal-body">
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Name</label></div>
							<div class="col-sm-7">
								<input type="text" name="nama_user" required class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Username</label></div>
							<div class="col-sm-7">
								<input type="text" name="username" required class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Password</label></div>
							<div class="col-sm-7">
								<input type="password" name="password" required class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Level</label></div>
							<div class="col-sm-7">
								<select type="text" name="level" required class="form-control">
								 	<option>admin</option>
								 	<option>cashier</option>
								</select> 
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<input type="submit" name="simpan" value="Save" class="btn btn-success">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					Update User Info
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
					</button>
				</div>
				<form action="<?=base_url('index.php/user/user_update')?>" method="post">
					<div class="modal-body">
						<input type="hidden" name="kode_user_lama" id="kode_user_lama">
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Name</label></div>
							<div class="col-sm-7">
								<input type="text" name="nama_user" id="nama_user" required class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Username</label></div>
							<div class="col-sm-7">
								<input type="text" name="username" id="username" required class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Password</label></div>
							<div class="col-sm-7">
								<input type="password" name="password" id="password" required class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Status</label></div>
							<div class="col-sm-7">
								<select type="text" name="level" id="level" required class="form-control">
									<option>Admin</option>
									<option>Cashier</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<input type="submit" name="edit" value="Save" class="btn btn-success">
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('example').DataTable();
	}
	);
	function edit(a) {
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/user/edit_user/"+a,
			dataType:"json",
			success:function(data){
				$("#kode_user").val(data.kode_user);
				$("#nama_user").val(data.nama_user);
				$("#username").val(data.username);
				$("#password").val(data.password);
				$("#level").val(data.level);
				$("#kode_user_lama").val(data.kode_user);
			}
		});
	}
</script>

