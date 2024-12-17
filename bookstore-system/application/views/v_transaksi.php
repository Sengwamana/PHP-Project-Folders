<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Sales Transaction</h2>
  </div>
</header>
<br>
<div class="container-fluid">
	<div class="row">
	<div class="col-md-7">
	<table class="table table-hover table-bordered" id="example" style="background-color: #eef9f0;">
		<thead style="background-color: #464b58; color:white;">
			<tr>
				<th>#</th>
				<th>Book Title</th>
				<td>Category</td>
				<th>Price</th>
				<th>Stock</th>
				<th>Act.</th>
			</tr>

		</thead>
		<tbody style="background-color: white;">
		<?php $no=0; foreach ($tampil_buku as $buku): $no++; ?>
		<tr>
		
			<td><?=$no?></td>
			<td><?=$buku->judul_buku?></td>
			<td><?=$buku->nama_kategori?></td>
			<td>$<?=$buku->harga?></td>
			<td><?=$buku->stok?></td>
			<td><a href="<?=base_url('index.php/transaksi/addcart/'.$buku->kode_buku)?>"><button class="btn btn-success btn-sm"><span class="fa fa-shopping-cart" aria-hidden="true"></span></button></a></td>
		</tr>
	<?php endforeach ?>
		
		</tbody>
	</table>
</div>
<div class="col-md-5">
	<form action="<?=base_url('index.php/transaksi/simpan')?>" method="post">
	
		Cashier : <select name="kode_user" class="form-control">
		<option>Please Select . . .</option>
		<?php foreach ($transaksi as $transaksi): ?>
			<option value="<?=$transaksi->kode_user?>"><?=$transaksi->nama_user?></option>
			<?php endforeach ?>
			</select>
			Customer's Name : <input type="text" name="nama_pembeli" class="form-control"><br>

		
		<table class="table table-hover" id="example" style="background-color: white;">
		<thead style="background-color:#636363; color:white;">
		<tr>
			<td>#</td>
			<td>Title</td>
			<td>Qty</td>
			<td>Price</td>
			<td>Subtotal</td>
			<td>Action</td>
		</tr>
		</thead>
		<?php $no=0; foreach ($this->cart->contents() as $items): $no++; ?>
		<input type="hidden" name="kode_buku[]" value="<?=$items['id']?>">
		<input type="hidden" name="rowid[]" value="<?=$items['rowid']?>">

 
		<tr>
			<td><?=$no?></td>
			<td><?=$items['name']?></td>
			<td width="1"><input type="text" name="qty[]" value="<?=$items['qty']?>" class="form-control" style="padding:4px;"></td>
			<td>$<?=number_format($items['price'])?></td>
			<td>$<?=number_format($items['subtotal'])?></td>
			<td><a href="<?=base_url('index.php/transaksi/hapus_cart/'.$items['rowid'])?>" class="btn btn-danger btn-sm"><span class="fa fa-trash" aria-hidden="true"></span></a></td>
		</tr>
		<input type="hidden" name="bookname" value="<?=$items['name']?>">
		<input type="hidden" name="book_qty" value="<?=$items['qty']?>">
		<?php endforeach  ?>
			<input type="hidden" name="total" value="<?=$this->cart->total()?>">
			
			<th colspan="4">Total Amount</th>
			<th>$<?=number_format($this->cart->total())?></th>
			<th></th>
				
			</tr>
		</table>
		<div class="text-center">
		<input type="submit" name="update" value="Update Quantity" class="btn btn-info"> 
		<input type="submit" name="bayar" onclick="return confirm('Are you sure?')" class="btn btn-success" value="Pay">
		<a class="btn btn-danger" href="<?=base_url('index.php/transaksi/clearcart')?>">Clear Cart</a>
		</div>
	</form>
	<?php if ($this->session->flashdata('message')): ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert"><?= $this->session->flashdata('message');?><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button> </div>
<?php endif ?>
</div>
</div>


</div>
