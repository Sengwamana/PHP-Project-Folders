<h2>Transaction Note</h2>
Transaction No. : <?=$transaksi->kode_transaksi?><br>
Cashier : <?=$transaksi->nama_user?><br>
Customer : <?=$transaksi->nama_pembeli?><br>
Date : <?=$transaksi->tgl?>

<table border="1" style="border-collapse: collapse;">
	<tr>
		<th>No</th>
		<th>Book Title</th>
		<th>Price</th>
		<th>Amount</th>
		<th>Subtotal</th>
	</tr>
	<?php $no=0; foreach ($this->trans->detail_transaksi($transaksi->kode_transaksi) as $buku): $no++; ?>
	<tr>
		<th><?=$no?></th>
		<th><?=$buku->judul_buku?></th>
		<th><?= number_format($buku->harga)?></th>
		<th><?=$buku->jumlah?></th>
		<th><?= number_format(($buku->harga*$buku->jumlah))?></th>
	</tr>
	<?php endforeach ?>
	<tr>
		<th colspan="4">Total</th>
		<th><?= number_format($transaksi->total)?></th>
	</tr>
</table>

<script type="text/javascript">
	window.print();
	location.href="<?=base_url('index.php/transaksi/clearcart')?>";
</script>
