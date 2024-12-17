<header class="page-header">
  <div class="container-fluid">
    <h2 class="no-margin-bottom">Transaction History</h2>
  </div>
</header>

<div class="container-fluid">
	<br>
	<div class="row">
		<div class="col-md-12">
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
						<td>Customer's Name</td>
						<td>Date</td>
						<td>Book</td>
						<td>Qty</td>
						<td>Amount</td>
						<td>Cashier</td>
					</tr></thead>
					<tbody style="background-color: white;">
					<?php $no=0; foreach ($tampil_riwayat as $riwayat) : $no++;?>

					<tr>
						<td><?=$no?></td>
						<td><?=$riwayat->nama_pembeli?></td>
						<td><?=$riwayat->tgl?></td>
						<td><?=$riwayat->bookname?></td>
						<td><?=$riwayat->book_qty?></td>
						<td>$<?=number_format($riwayat->total)?></td>
						<td><?=$riwayat->nama_user?></td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>