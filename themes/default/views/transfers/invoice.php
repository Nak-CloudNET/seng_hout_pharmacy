<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Invoice&nbsp;<?= $inv->transfer_no ?></title>
	<link href="<?php echo $assets ?>styles/theme.css" rel="stylesheet">
	<link href="<?php echo $assets ?>styles/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $assets ?>styles/custome.css" rel="stylesheet">
</head>
<style>
	body {
		font-size: 14px !important;
	}
		
	.container {
		width: 21cm;
		min-height: 29.7cm;
		margin: 20px auto;
		padding: 10px;
	}
	
	@media print {
		.container {
			padding: 10px !important;
			height: 29.7cm !important;
		}
		#footer {
			position:absolute !important;
   			bottom:0 !important;
		}
		.hr_footer{
			margin: 0px 0px 0px 55px !important;
		}
		.left_div_header{
			 margin-left : -15px !important;
		}
		.right_div_header{
			 margin-right : -15px !important;
		}
	}
	
	.thead th {
		text-align: center !important;
	}
	
	.table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
		border: 1px solid #000 !important;
	}
	
	.company_addr h3:first-child {
		font-family: Khmer OS Muol !important;
		//padding-left: 12% !important;
	}
	
	.company_addr h3:nth-child(2) {
		margin-top:-2px !important;
		//padding-left: 130px !important;
		font-size: 26px !important;
		font-weight: bold;
	}
	
	.company_addr h3:last-child {
		margin-top:-2px !important;
		//padding-left: 100px !important;
	}
	
	.company_addr p {
		font-size: 12px !important;
		margin-top:-2px !important;
		padding-left: 20px !important;
	}
	
	.inv h4:first-child {
		font-family: Khmer OS Muol !important;
		font-size: 14px !important;
	}
	
	.inv h4:last-child {
		margin-top:-5px !important;
		font-size: 14px !important;
	}
	
	button {
		border-radius: 0 !important;
	}
	
</style>
<body>
	<div class="container">
		<div class="row" style="margin-top: 20px;">
		<div>
			<div class="col-sm-3 col-xs-3" style="margin-top: 10px;">
				<?php if(!empty($biller->logo)) { ?>
					<img src="<?= base_url() ?>assets/uploads/logos/<?= $biller->logo; ?>" style="width: 200px; margin-left: 10px !important;" />
				<?php } ?>
			</div>
		
			<div class="col-sm-6 col-xs-6 company_addr" style="margin-top: -20px !important">
				<center>
					<h2 style="font-weight:bold !important;font-family:Times New Roman !important;"><?= $biller->company ? $biller->company : $biller->cf1; ?></h2>
					<?php if(!empty($biller->cf1)) { ?>
						<h3><?= $biller->cf1 ?></h3>
					<?php }else { ?>
						
					<?php } ?>
				
					<?php if(!empty($biller->address)) { ?>
						<p style="margin-top:-10px !important;font-size: 16px !important;">អាសយដ្ឋាន ៖ &nbsp;<?= $biller->address; ?></p>
					<?php } ?>
					
					<?php if(!empty($biller->phone)) { ?>
						<p style="margin-top:-10px !important;font-size: 16px !important;">ទូរស័ព្ទលេខ ( Tel ) : &nbsp;<?= $biller->phone; ?></p>
					<?php } ?>
				</center>
			</div>
			<div class="col-sm-3 col-xs-3">
				<button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;" onclick="window.print();">
					<i class="fa fa-print"></i> <?= lang('print'); ?>
				</button>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-xs-12 inv">
				<center>
					<h4>វិក្កយបត្រ ផ្ទេរទំនិញ</h4>
					<h4>TRANSFER INVOICE</h4>
				</center>
			</div>
		</div>
		
		<div class="row" style="font-size:13px !important;">
			<div class="col-sm-6 col-xs-6 left_div_header">
				<div class="row" style="line-height:1.6;">
					<div class="col-sm-4 col-xs-4">
						<p>ផ្ទេរពី</p>
						<p style="margin-top:-15px">Transfer From</p>
						<p style="margin-top:-10px !important;">ផ្ទេរទៅ</p>
						<p style="margin-top:-15px">Transfer To</p>
					</div>
					<div class="col-sm-8 col-xs-8">
						<p style="margin-top: 8px">: &nbsp;&nbsp;<?= $from_warehouse->name; ?></p>
						<p style="margin-top: 15px">: &nbsp;&nbsp;<?= $to_warehouse->name; ?></p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="row" style="line-height:1.6;">
					<div class="col-sm-6 col-xs-6">
						<p>លេខវិក្កយបត្រ ផ្ទេរទំនិញ</p>
						<p style="margin-top:-15px">Transfer No</p>
						<p style="margin-top:-10px !important;">កាលបរិច្ឆេទ</p>
						<p style="margin-top:-15px">Date</p>
					</div>
					<div class="col-sm-6 col-xs-6 pull-right">
						<p style="margin-top: 8px;">: &nbsp;&nbsp;<?= $inv->transfer_no ?></p>
						<p style="margin-top: 15px;">: &nbsp;&nbsp;<?= $inv->date; ?></p>
					</div>
				</div>
			</div>
		</div>
		
		<?php
			$cols = 6;
			if ($discount != 0) {
				$cols = 7;
			}
		?>
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<table class="table table-bordered" style="margin-top: 10px;">
					<thead>
						<tr class="thead">
							<th style="width: 45px !important;">ល.រ<br /><?= strtoupper(lang('no')) ?></th>
							<th>ឈ្មោះទំនិញ<br /><?= strtoupper(lang('product_name')) ?></th>
							<th style="width: 110px !important;">ថ្ងៃផុតកំណត់<br /><?= strtoupper(lang('expiry_date')) ?></th>
							<th style="width: 80px !important;">ចំនួន<br /><?= strtoupper(lang('qty')) ?></th>
							<th style="width: 85px !important;">ខ្នាត<br /><?= strtoupper(lang('unit')) ?></th>
							<th style="width: 110px !important;">ផ្សេងៗ<br /><?= strtoupper(lang('other')) ?></th>
						</tr>
					</thead>
					<tbody style="font-size: 12px;">						
						<?php $no = 1; $rw = 1; ?>
						
							<?php foreach($rows as $row) { ?>
									<tr>
										<td style="vertical-align: middle; text-align: center"><?php echo $no ?></td>
										<td style="vertical-align: middle;"><?php echo $row->product_name ?></td>
										<td style="vertical-align: middle; text-align: center"><?php echo $row->expiry > 0 ? $row->expiry:''; ?></td>
										<td style="vertical-align: middle; text-align: center"><?php echo $this->erp->formatQuantity($row->quantity) ?></td>
										<td style="vertical-align: middle; text-align: center"><?php echo $row->unit; ?></td>
										<td style="vertical-align: middle; text-align: center"></td>
									</tr>
									<?php
										$no++;
										$row++;
									?>
							<?php } ?>
							<?php
								if($rw<13){
									$k=13 - $rw;
									for($j=1;$j<=$k;$j++){
										if($discount != 0) {
											echo  '<tr>
													<td height="34px"></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>';
										}else {
											echo  '<tr>
													<td height="34px"></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>';
										}
										
									}
								}
							?>
						
					</tbody>
					
				</table>
			</div>
		</div>

		<!--
		<div id="footer" class="row" style="margin-top: 80px !important;">
			<div class="col-sm-5 col-xs-5" style="margin-left: 35px;">
				<hr style="width : 185px !important; margin:0; border:1px solid #000;">
				<p>ហត្ថលេខា និងឈ្មោះអ្នករៀបចំ</p>
				<p style="margin-top:-10px;">Prepared's Signature & Name</p>
			</div>
			<div class="col-sm-1 col-xs-1">
				<!-- <hr style="margin:0; border:1px solid #000;">
				<center>
					<p>ហត្ថលេខា <br>និងឈ្មោះអ្នកត្រួតពិនិត្យ</p>
					<p style="margin-top:-10px;">Checked's Signature & Name</p>
				</center>
			</div>
			<div class="col-sm-1 col-xs-1">
				<!-- <hr style="margin:0; border:1px solid #000;">
				<center>
					<p>ហត្ថលេខា <br>និងឈ្មោះអ្នកដឹកជញ្ជូន</p>
					<p style="margin-top:-10px;">Deliveried's Signature & Name</p>
				</center>
			</div>
			<div class="col-sm-5 col-xs-5" style="float:right !important;">
				<hr class="hr_footer" style="width : 185px !important; margin: 0px 0px 0px 64px; border:1px solid #000;">
				<center>
					<p>ហត្ថលេខា  និងឈ្មោះអ្នកទទួល</p>
					<p style="margin-top:-10px;">Received's Signature & Name</p>
				</center>
			</div>
		</div> -->
		<div id="footer" style="margin-top: 80px !important;">
			<div class="col-sm-3 col-xs-3">
				<hr style="margin:0; border:1px solid #000;">
				<center>
					<p>ហត្ថលេខា <br>និងឈ្មោះអ្នករៀបចំ</p>
					<p style="margin-top:-10px;">Prepared's Signature & Name</p>
				</center>
			</div>
			<div class="col-sm-3 col-xs-3">
				<hr style="margin:0; border:1px solid #000;">
				<center>
					<p>ហត្ថលេខា <br>និងឈ្មោះអ្នកត្រួតពិនិត្យ</p>
					<p style="margin-top:-10px;">Checked's Signature & Name</p>
				</center>
			</div>
			<div class="col-sm-3 col-xs-3">
				<hr style="margin:0; border:1px solid #000;">
				<center>
					<p>ហត្ថលេខា <br>និងឈ្មោះអ្នកដឹកជញ្ជូន</p>
					<p style="margin-top:-10px;">Deliveried's Signature & Name</p>
				</center>
			</div>
			<div class="col-sm-3 col-xs-3">
				<hr style="margin:0; border:1px solid #000;">
				<center>
					<p>ហត្ថលេខា <br>និងឈ្មោះអ្នកទទួល</p>
					<p style="margin-top:-10px;">Received's Signature & Name</p>
				</center>
			</div>
		</div>
		<div class="no-print" style="margin-top: 20px;">
			<button class="btn btn-default" onclick="window.print()"><i class="fa fa-print" aria-hidden="true"></i>&nbsp;Print</button>&nbsp;
			<a href="<?= base_url('transfers/list_in_transfer') ?>"><button class="btn btn-warning"><i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;List Transfers</button></a>&nbsp;
			<a href="<?= base_url('transfers/add') ?>"><button class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add Transfer</button></a>
		</div>

	</div>
</body>
</html>