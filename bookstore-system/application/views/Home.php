<header class="page-header">
	<div class="container-fluid">
	  	<h2 class="panel-title">Dashboard</h2>
	</div>
</header> 
<div class="main-content">
	<?php 
        if ($this->session->userdata('level') == 'admin') { ?>
	<section class="dashboard-counts no-padding-bottom">
	    <div class="container-fluid">
	      <div class="row bg-white has-shadow">
	        <!-- Item -->
	        <div class="col-xl-4 col-sm-4">
	          <div class="item d-flex align-items-center">
	            <div class="icon bg-violet"><i class="fa fa-book"></i></div>
	            <a href="<?php echo base_url('index.php/buku') ?>" class="text-secondary">
	              <div class="title"><span>Total Book</span></div>
	            </a>
	            <span class="number"><?php echo $jml_buku->jml_buku; ?></span>
	          </div>
	        </div>
	        <!-- Item -->
	        <div class="col-xl-4 col-sm-4">
	          <div class="item d-flex align-items-center">
	            <div class="icon bg-green"><i class="fa fa-dollar"></i></div>
	            <a href="<?php echo base_url('index.php/riwayat') ?>" class="text-secondary">
	              <div class="title"><span>Earnings</span></div>
	            </a>
	            <span class="number"><?php echo '$'.$jml_transaksi->jml_transaksi; ?></span>
	          </div>
	        </div>
	        <!-- Item -->
	        <div class="col-xl-4 col-sm-4">
	          <div class="item d-flex align-items-center">
	            <div class="icon bg-red"><i class="fa fa-exchange"></i></div>
	            <a href="<?php echo base_url('index.php/riwayat') ?>" class="text-secondary">
	              <div class="title"><span>Total Transaction</span></div>
	            </a>
	            <span class="number"><?php echo $jml_pengguna->jml_pengguna; ?></span>
	          </div>
	        </div>
		  </div>

		  <div class="row bg-white has-shadow">
	        <!-- Item -->
	        <div class="col-xl-4 col-sm-4">
	          <div class="item d-flex align-items-center">
	            <div class="icon bg-warning"><i class="fa fa-bookmark" style="color: white;"></i></div>
	            <a href="<?php echo base_url('index.php/kategori') ?>" class="text-secondary">
	              <div class="title"><span>Categories</span></div>
	            </a>
	            <span class="number"><?php echo $book_cat->book_cat; ?></span>
	          </div>
	        </div>
	        <!-- Item -->
	        <div class="col-xl-4 col-sm-4">
	          <div class="item d-flex align-items-center">
	            <div class="icon bg-gray"><i class="fa fa-user-secret"></i></div>
	            <a href="<?php echo base_url('index.php/user') ?>" class="text-secondary">
	              <div class="title"><span>System Users</span></div>
	            </a>
	            <span class="number"><?php echo $sys_user->sys_user; ?></span>
	          </div>
	        </div>
	        <!-- Item -->
	        <div class="col-xl-3 col-sm-3">
				<div class="item d-flex align-items-center">
				  <div class="icon bg-info"><i class="fa fa-th-large" style="color: white;"></i></div>
				  <a href="<?php echo base_url('index.php/buku') ?>" class="text-secondary">
					<div class="title"><span>Stocks</span></div>
				  </a>
				  <span class="number"><?php echo $book_stock->book_stock; ?></span>
				</div>
			  </div>
		  </div>

		  <div class="row bg-white has-shadow">

			<div class="col-xl-4 col-sm-4"></div>
	        
	        <!-- Item -->
	        <div class="col-xl-4 col-sm-4">
	          <div class="d-flex align-items-center">
	            <div class="icon bg-green"><i class="fa fa-hourglass"></i></div>
	            <a href="<?php echo base_url('index.php/riwayat') ?>" class="text-secondary">
	              <div class="title"><span>Sales (24hrs)</span></div>
	            </a>
	            <span class="number"><?php echo '$'.$sales_p->sales_p; ?></span>
	          </div>
	        </div>
			<!-- Item -->
			
			<div class="col-xl-4 col-sm-4"></div>
	        
		  </div>
		</div>
	</section>
		<?php } elseif (($this->session->userdata('level') == 'cashier')) {?>
			<section class="dashboard-counts no-padding-bottom">
			<div class="container-fluid">
			<div class="row bg-white has-shadow">
				<!-- Item -->
				<div class="col-xl-4 col-sm-4">
				<div class="item d-flex align-items-center">
					<div class="icon bg-violet"><i class="fa fa-book"></i></div>
					<a href="#" class="text-secondary">
					<div class="title"><span>Total Book</span></div>
					</a>
					<span class="number"><?php echo $jml_buku->jml_buku; ?></span>
				</div>
				</div>
				<!-- Item -->
				<div class="col-xl-4 col-sm-4">
				<div class="item d-flex align-items-center">
					<div class="icon bg-green"><i class="fa fa-dollar"></i></div>
					<a href="#" class="text-secondary">
					<div class="title"><span>Earnings</span></div>
					</a>
					<span class="number"><?php echo '$'.$jml_transaksi->jml_transaksi; ?></span>
				</div>
				</div>
				<!-- Item -->
				<div class="col-xl-4 col-sm-4">
				<div class="item d-flex align-items-center">
					<div class="icon bg-red"><i class="fa fa-exchange"></i></div>
					<a href="#" class="text-secondary">
					<div class="title"><span>Total Transaction</span></div>
					</a>
					<span class="number"><?php echo $jml_pengguna->jml_pengguna; ?></span>
				</div>
				</div>
			</div>

			<div class="row bg-white has-shadow">
				<!-- Item -->
				<div class="col-xl-4 col-sm-4">
				<div class="item d-flex align-items-center">
					<div class="icon bg-warning"><i class="fa fa-bookmark" style="color: white;"></i></div>
					<a href="#" class="text-secondary">
					<div class="title"><span>Categories</span></div>
					</a>
					<span class="number"><?php echo $book_cat->book_cat; ?></span>
				</div>
				</div>
				<!-- Item -->
				<div class="col-xl-4 col-sm-4">
				<div class="item d-flex align-items-center">
					<div class="icon bg-gray"><i class="fa fa-user-secret"></i></div>
					<a href="#" class="text-secondary">
					<div class="title"><span>System Users</span></div>
					</a>
					<span class="number"><?php echo $sys_user->sys_user; ?></span>
				</div>
				</div>
				<!-- Item -->
				<div class="col-xl-3 col-sm-3">
					<div class="item d-flex align-items-center">
					<div class="icon bg-info"><i class="fa fa-th-large" style="color: white;"></i></div>
					<a href="#" class="text-secondary">
						<div class="title"><span>Books Stock</span></div>
					</a>
					<span class="number"><?php echo $book_stock->book_stock; ?></span>
					</div>
				</div>
			</div>

			<div class="row bg-white has-shadow">

				<div class="col-xl-4 col-sm-4"></div>
				
				<!-- Item -->
				<div class="col-xl-4 col-sm-4">
				<div class="d-flex align-items-center">
					<div class="icon bg-green"><i class="fa fa-hourglass"></i></div>
					<a href="#" class="text-secondary">
					<div class="title"><span>Sales (24hrs)</span></div>
					</a>
					<span class="number"><?php echo '$'.$sales_p->sales_p; ?></span>
				</div>
				</div>
				<!-- Item -->
				
				<div class="col-xl-4 col-sm-4"></div>
				
			</div>
			</div>
	</section>
		<?php }?>
	
</div>
