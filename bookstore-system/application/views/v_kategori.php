<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Book Category</h2>
  </div>
</header>
<div class="container-fluid">
<div class="table-agile-info">
	<div class="panel panel-default">
<?php if ($this->session->userdata('level')=="admin"): {
	
}  ?>
	
	<?php if ($this->session->flashdata('message')!=null) {
	echo "<br><div class='alert alert-success alert-dismissible fade show' role='alert'>"
	.$this->session->flashdata('message')."<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	<span aria-hidden='true'>&times;</span>
	</button> </div>";
} ?>
	<?php elseif ($this->session->userdata('level')=="cashier"): {
		
	} ?>
<?php endif  ?>
<br><a href="#tambah" data-toggle="modal" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Add New Category</a><br>
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
		<td>Category Code</td>
		<td>Category Name</td>
		<td>Action</td>
	</tr></thead>
	<tbody style="background-color: white;">
	<?php $no=0; foreach ($tampil_kategori as $kat) : $no++;?>

	<tr>
		<td><?=$no?></td>
		<td>#CA<?=$kat->kode_kategori?></td>
		<td><?=$kat->nama_kategori?></td>
		<td>
			<a href="#edit" onclick="edit('<?=$kat->kode_kategori?>')" class="btn btn-success btn-sm" data-toggle="modal">Edit</a>
			<a href="<?=base_url('index.php/kategori/hapus/'.$kat->kode_kategori)?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm">Delete</a>
		</td>
	</tr>
<?php endforeach ?>
</tbody>
</table></div>

<div class="modal" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				Add New Category
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<form action="<?=base_url('index.php/kategori/tambah')?>" method="post">
				<div class="modal-body">
					<div class="form-group row">
						<div class="col-sm-3 offset-1"><label>Category Code</label></div>
						<div class="col-sm-7">
							<input type="number" name="kode_kategori" required class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-3 offset-1"><label>Category Name</label></div>
						<div class="col-sm-7">
							<input type="text" name="nama_kategori" required class="form-control">
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
				Edit Category
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			<form action="<?=base_url('index.php/kategori/kategori_update')?>" method="post">
				<div class="modal-body">
					<input type="hidden" name="kode_kategori_lama" id="kode_kategori_lama">
					<div class="form-group row">
						<div class="col-sm-3 offset-1"><label>Category Code</label></div>
						<div class="col-sm-7">
							<input type="number" name="kode_kategori" id="kode_kategori" required class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-3 offset-1"><label>Category Name</label></div>
						<div class="col-sm-7">
							<input type="text" name="nama_kategori" id="nama_kategori" required class="form-control">
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
			url:"<?=base_url()?>index.php/kategori/edit_kategori/"+a,
			dataType:"json",
			success:function(data){
				$("#kode_kategori").val(data.kode_kategori);
				$("#nama_kategori").val(data.nama_kategori);
				$("#kode_kategori_lama").val(data.kode_kategori);
			}
		});
	}
</script>

