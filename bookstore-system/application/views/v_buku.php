<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Book Details</h2>
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
		<br><a href="#tambah" data-toggle="modal" class="btn btn-primary pull-left"><i class="fa fa-plus"></i> Add New Book</a><br>
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
					<td>Book Title</td>
					<td>Cover</td>
					<td>Year</td>
					<td>Price</td>
					<td>Category</td>
					<td>Publisher</td>
					<td>Author</td>
					<td>Stock</td>
					<td>Action</td>
				</tr></thead>
				<tbody style="background-color: white;">
				<?php $no=0; foreach ($tampil_buku as $buku) : $no++;?>

				<tr>
					<td><?=$no?></td>
					<td><?=$buku->judul_buku?></td>
					<td><img src="<?=base_url('assets/gambar/'.$buku->gambar_buku)?>" style="width:40px"></td>
					<td><?=$buku->tahun?></td>
					<td>$<?=number_format($buku->harga)?></td>
					<td><?=$buku->nama_kategori?></td>
					<td><?=$buku->penerbit?></td>
					<td><?=$buku->penulis?></td>
					<td><?=$buku->stok?></td>
					<td>
						<a href="#edit" onclick="edit('<?=$buku->kode_buku?>')" class="btn btn-success btn-sm" data-toggle="modal"><i class="fa fa-pencil"></i></a>
						<a href="<?=base_url('index.php/buku/hapus/'.$buku->kode_buku)?>" onclick="return confirm('Yakin untuk menghapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
			</table>
			<br/>
	
		</div>
	</div>
	<div class="modal" id="tambah">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					Add New Book
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
					</button>
				</div>
				<form action="<?=base_url('index.php/buku/tambah')?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Book Title</label></div>
							<div class="col-sm-7">
								<input type="text" name="judul_buku" required="form-control" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Year</label></div>
							<div class="col-sm-7">
								<input type="number" name="tahun" required="form-control" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Price</label></div>
							<div class="col-sm-7">
								<input type="number" name="harga" required="form-control" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Category</label></div>
							<div class="col-sm-7">
								<select name="kategori" required="form-control" class="form-control">
									<?php foreach ($kategori as $kat): ?>
										<option value="<?=$kat->kode_kategori?>">
											<?=$kat->nama_kategori ?>
										</option> 
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Cover Photo</label></div>
							<div class="col-sm-7">
								<input type="file" name="gambar" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Publisher</label></div>
							<div class="col-sm-7">
								<input type="text" name="penerbit" required="form-control" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Author</label></div>
							<div class="col-sm-7">
								<input type="text" name="penulis" required="form-control" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Stock</label></div>
							<div class="col-sm-7">
								<input type="number" name="stok" required="form-control" class="form-control">
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
					Update Book
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
					</button>
				</div>
				<form action="<?=base_url('index.php/buku/buku_update')?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="kode_buku" id="kode_buku">
					<div class="modal-body">
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Book Title</label></div>
							<div class="col-sm-7">
								<input type="text" name="judul_buku" id="judul_buku" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Year</label></div>
							<div class="col-sm-7">
								<input type="number" name="tahun" id="tahun" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Price</label></div>
							<div class="col-sm-7">
								<input type="number" name="harga" id="harga" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Category</label></div>
							<div class="col-sm-7">
								<select name="kategori" id="kategori" class="form-control">
									<?php foreach ($kategori as $kat): ?>
										<option value="<?=$kat->kode_kategori?>">
											<?=$kat->nama_kategori ?>
										</option> <?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>CoverPhoto</label></div>
							<div class="col-sm-7">
								<input type="file" name="gambar" id="gambar" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Publisher</label></div>
							<div class="col-sm-7">
								<input type="text" name="penerbit" id="penerbit" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Author</label></div>
							<div class="col-sm-7">
								<input type="text" name="penulis" id="penulis" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-3 offset-1"><label>Stock</label></div>
							<div class="col-sm-7">
								<input type="number" name="stok" id="stok" class="form-control">
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
</div>


<script type="text/javascript">
$(document).ready(function(){
		$('example').DataTable();
	}
	);
	function edit(a) {
		$.ajax({
			type:"post",
			url:"<?=base_url()?>index.php/buku/edit_buku/"+a,
			dataType:"json",
			success:function(data){
				$("#kode_buku").val(data.kode_buku);
				$("#judul_buku").val(data.judul_buku);
				$("#tahun").val(data.tahun);
				$("#harga").val(data.harga);
				$("#kategori").val(data.kode_kategori);
				$("#penerbit").val(data.penerbit);
				$("#penulis").val(data.penulis);
				$("#stok").val(data.stok);

			}
		});
	}
</script>
