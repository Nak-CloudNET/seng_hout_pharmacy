<style type="text/css" media="all">
	#PRData{ 
		white-space:nowrap; 
		width:100%; 
	}
    #PRData td:nth-child(6), #PRData td:nth-child(7) {
        text-align: right;
    }
 
</style>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-barcode"></i><?= lang('product_customers') ; ?>
        </h2>
		<div class="box-icon">
            <ul class="btn-tasks">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="toggle_up tip" title="<?= lang('hide_form') ?>">
                        <i class="icon fa fa-toggle-up"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="toggle_down tip" title="<?= lang('show_form') ?>">
                        <i class="icon fa fa-toggle-down"></i>
                    </a>
                </li>
				<li class="dropdown">
					<a href="#" id="pdf" data-action="export_pdf"  class="tip" title="<?= lang('download_pdf') ?>">
						<i class="icon fa fa-file-pdf-o"></i>
					</a>
				</li>
                <li class="dropdown">
					<a href="#" id="excel" data-action="export_excel"  class="tip" title="<?= lang('download_xls') ?>">
						<i class="icon fa fa-file-excel-o"></i>
					</a>
				</li>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext"><?= lang('list_results'); ?></p>
                <div id="form">
				<?php echo form_open('reports/customer_details', 'id="action-form"'); ?>
					<div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="reference_no"><?= lang("reference_no"); ?></label>
                                <?php echo form_input('reference_no', (isset($_POST['reference_no']) ? $_POST['reference_no'] : ""), 'class="form-control tip" id="reference_no"'); ?>

                            </div>
                        </div>
						<div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" for="cat"><?= lang("products"); ?></label>
                                <?php                          
								$pro[""] = "ALL";
                                foreach ($products as $product) {
                                    $pro[$product->id] = $product->code.' / '.$product->name;
                                }
                                echo form_dropdown('product', $pro, (isset($_POST['product']) ? $_POST['product'] : ""), 'class="form-control" id="product" data-placeholder="' . $this->lang->line("select") . " " . $this->lang->line("producte") . '"');
                                ?>
                            </div>
                        </div>
						
                        <?php if(isset($biller_idd)){?>
						<div class="col-sm-4">
							<div class="form-group">
								<?= lang("biller", "biller"); ?>
								<?php 
								$str = "";
								$q = $this->db->get_where("companies",array("id"=>$biller_idd),1);
								 if ($q->num_rows() > 0) {
									 $str = $q->row()->name.' / '.$q->row()->company;
									echo form_input('biller',$str , 'class="form-control" id="biller"');
								 }
								?>
							</div>
						 </div>
						<?php } ?>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("warehouse", "warehouse") ?>
                                <?php
                                $waee[''] = "ALL";
                                foreach ($warefull as $wa) {
                                    $waee[$wa->id] = $wa->code.' / '.$wa->name;
                                }
                                echo form_dropdown('warehouse', $waee, (isset($_GET['warehouse']) ? $_GET['warehouse'] : $warehouse), 'class="form-control select" id="warehouse" placeholder="' . lang("select") . " " . lang("warehouse") . '" style="width:100%"')
                                ?>

                            </div>
                        </div>
						<div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("category", "category") ?>
                                <?php
                                $cat[0] = $this->lang->line("all");
                                foreach ($categories as $category) {
                                    $cat[$category->id] = $category->name;
                                }
                                echo form_dropdown('category', $cat, (isset($_POST['category']) ? $_POST['category'] : ''), 'class="form-control select" id="category" placeholder="' . lang("select") . " " . lang("category") . '" style="width:100%"')
                                ?>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("customer", "slcustomer"); ?>
                                <?php if ($Owner || $Admin || $GP['customers-add']) { ?>
                                <div><?php } ?>
                                    <?php
                                    echo form_input('customer_1', (isset($_POST['customer']) ? $_POST['customer'] : (isset($sale_order->company_name)?$sale_order->company_name:$this->input->get('customer'))), ' id="slcustomer"  data-placeholder="' . lang("select") . ' ' . lang("customer") . '"  class="form-control " ');
                                    ?>
                                    <?php if ($Owner || $Admin || $GP['customers-add']) { ?>


                                </div>
                            <?php } ?>
                            </div>
                        </div>
						<div class="col-sm-4">
							<div class="form-group">
								<label class="control-label" for="group_area"><?= lang("group_area"); ?></label>
								<?php
								$group["0"] = lang('all');
								foreach ($group_areas as $group_area) {
									$group[$group_area->areas_g_code] =  $group_area->areas_group;
								}
								echo form_dropdown('group_area', $group, (isset($_POST['group_area']) ? $_POST['group_area'] : ""), 'class="form-control" id="slarea" data-placeholder="' . $this->lang->line("select") . " " . $this->lang->line("group_area") . '"');
								?>
							</div>
						</div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("from_date", "from_date"); ?>
                                <?php echo form_input('from_date', (isset($_POST['from_date']) ? $_POST['from_date'] : $this->erp->hrsd($from_date)), 'class="form-control date" id="from_date"'); ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("to_date", "to_date"); ?>
                                <?php echo form_input('to_date', (isset($_POST['to_date']) ? $_POST['to_date'] : $this->erp->hrsd($to_date)), 'class="form-control date" id="to_date"'); ?>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <div
                            class="controls"> <?php echo form_submit('submit_report', $this->lang->line("submit"), 'class="btn btn-primary"'); ?> </div>
                    </div>
                    <?php echo form_close(); ?>
					
                </div>
                <div class="clearfix"></div>

                <div class="table-responsive">
                    <table id="PRData" class="table table-bordered table-hover table-striped table-condensed">
                        <thead>
							<tr class="primary">
								<th class=""><?= lang("type") ?></th>
								<th class=""><?= lang("date") ?></th>
								<th class=""><?= lang("reference") ?></th>
								<th class=""><?= lang("product_name") ?></th>
								<th class=""><?= lang("categories") ?></th>
								<th class=""><?= lang("qty") ?></th>
								<th class=""><?= lang("unit") ?></th>
								<th class=""><?= lang("unit_price") ?></th>
								<th class=""><?= lang("amount") ?></th>
							</tr>
                        </thead>
                        <tbody>
							<?php
							$grand = 0 ;
							$gqty = 0;
							$gprice = 0;
							$wid = $this->reports_model->getWareByUserID();
							$this->db->select("erp_sales.customer_id, CONCAT(erp_group_areas.areas_group, ' - ', erp_sales.customer,' (',erp_companies.address,')') as customer, SUM(erp_sale_items.quantity) as qty")
							->join("erp_sale_items", "erp_sale_items.sale_id = erp_sales.id", "LEFT")
							->join("erp_companies", "erp_companies.id = erp_sales.customer_id", "LEFT")
							->join("erp_group_areas", "erp_group_areas.areas_g_code = erp_companies.group_areas_id", "LEFT");
							if($customer){
								$this->db->where("erp_sales.customer_id",$customer);
							}
							if($group_area_id){
								$this->db->where("erp_companies.group_areas_id", $group_area_id);
							}
							if($reference){
								$this->db->where("reference_no",$reference);
							}
							if($product_id){
								$this->db->where("product_id",$product_id);
							}
							if($from_date && $to_date){
								$this->db->where('erp_sales.date >= "'.$from_date.' 00:00" AND erp_sales.date <= "'.$to_date.' 23:59"');
							}
							if($warehouse){
								$this->db->where("erp_sales.warehouse_id",$warehouse);
							}else{
								if($wid){
									$this->db->where("erp_sales.warehouse_id IN ($wid)");
								}
							}
							if($category_id){
								$this->db->join('erp_products', 'erp_products.id = erp_sale_items.product_id', 'left');
								$this->db->where("erp_products.category_id", $category_id);
							}
							$this->db->order_by("erp_group_areas.areas_group");
							$this->db->group_by("customer_id");
							$customers = $this->db->get("erp_sales")->result();
							if(is_array($customers)){
							foreach($customers as $row){
								if($row->customer_id){
									if($row->qty){
								?>
							<tr>
								<td colspan="9" style="background:#F0F8FF;"><b><?=$row->customer?></b></td>
							</tr>
								<?php
									$this->db->select("
												product_id,
												product_name,
												erp_sale_items.quantity,
												net_unit_price,
												customer_id,
												reference_no,
												erp_sales.date,
												'SALE' as transaction_type,
												unit,option_id")
											 ->join("erp_sales","erp_sales.id = erp_sale_items.sale_id","LEFT")
											 ->join("erp_products","erp_products.id = erp_sale_items.product_id","LEFT");
									if($reference){
										$this->db->where("reference_no",$reference);
									}
									if($customer){
										$this->db->where("customer_id",$customer);
									}
									if($group_area_id){
										$this->db->join('erp_companies','erp_companies.id = erp_sales.customer_id', 'left');
										$this->db->where("erp_companies.group_areas_id", $group_area_id);
									}
									if($product_id){
										$this->db->where("product_id",$product_id);
									}
									if($from_date && $to_date){
										$this->db->where('erp_sales.date >="'.$from_date.' 00.00" AND erp_sales.date<="'.$to_date.' 23.59"');
									}
									if($warehouse){
										$this->db->where("erp_sales.warehouse_id",$warehouse);
									}else{
										if($wid){
											$this->db->where("erp_sales.warehouse_id IN ($wid)");
										}
									}
									$this->db->select('erp_sale_items.*, erp_categories.name as cate_name');
									$this->db->join('erp_categories', 'erp_categories.id = erp_products.category_id', 'left');									
									if($category_id){										
										$this->db->where('erp_products.category_id', $category_id);
									}
									$sale_items = $this->db->get("erp_sale_items")->result();
									$tqty = 0 ; 
									$amount = 0 ;
									$total_price = 0 ;
									$vqty = 0;
									$unit_name = "";
									if(is_array($sale_items)){
									foreach($sale_items as $row1){
										if($row->customer_id == $row1->customer_id){
											if($row1->option_id){
												$unit_n = $this->db->get_where('erp_product_variants',array('id'=> $row1->option_id),1)->row();
												$unit_q = $unit_n->qty_unit;
												$vqty = abs($row1->quantity)*$unit_q;				
												$unit_name = $this->erp->convert_unit_2_string($row1->product_id,$vqty);												
											}else{
												$unit = $this->reports_model->getUn($row1->unit);
												if($unit){
													$unit_name = $unit->name;
												}
												$vqty =  abs($row1->quantity);
											}
								?>
									<tr>
										<td class="text-center"><?=$row1->transaction_type?></td>
										<td><?=$this->erp->hrsd($row1->date)?></td>
										<td><?=$row1->reference_no?></td>
										<td><?=$row1->product_name?></td>
										<td style="text-align:center;"><?=$row1->cate_name?></td>
										<td class="text-right"><?=$this->erp->formatQuantity($vqty)?></td>
										<td ><?=$unit_name?></td>
										<td class="text-right"><?=$this->erp->formatMoney(abs($row1->net_unit_price))?></td>
										<td class="text-right"><?=$this->erp->formatMoney(abs($row1->quantity)*abs($row1->net_unit_price))?></td>
									</tr>
								
								<?php
									$tqty+=$vqty;
									$amount+=(abs($row1->quantity)*abs($row1->net_unit_price));
									$total_price+=abs($row1->net_unit_price);
										}
									}
									}
								?>
							<tr style="background:#F0F8FF;">
								<td colspan="4"></td>
								<td class="text-center"><b>Total</b></td>
								<td class="text-right"><b><?=$this->erp->formatQuantity($tqty)?></b></td>
								<td></td>
								<td class="text-right"><b><?=$this->erp->formatMoney($total_price)?></b></td>
								<td class="text-right"><b><?=$this->erp->formatMoney($amount)?></b></td>
							</tr>
							<?php
							$grand +=$amount;
							$gprice +=$total_price;
							$gqty+=$tqty;
								}
								}
							}
							}
							?>
							<tr>
								<td style="background:#4682B4;color:white;"><b>Grand Total</b></td>
								<td style="background:#4682B4;color:white;"></td>
								<td style="background:#4682B4;color:white;"></td>
								<td style="background:#4682B4;color:white;"></td>
								<td style="background:#4682B4;color:white;"></td>
								<td style="background:#4682B4;color:white;" class="text-right"><b><?=$this->erp->formatQuantity($gqty)?></b></td>
								<td style="background:#4682B4;color:white;"></td>
								<td style="background:#4682B4;color:white;" class="text-right"><b><?=$this->erp->formatMoney($gprice)?></b></td>
								<td style="background:#4682B4;color:white;" class="text-right"><b><?=$this->erp->formatMoney($grand)?></b></td>
								
							</tr>
                        </tbody>
                       
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#form').hide();
    $('.toggle_down').click(function () {
        $("#form").slideDown();
        return false;
    });
    $('.toggle_up').click(function () {
        $("#form").slideUp();
        return false;
    });

    $(document).ready(function () {
        $("#slcustomer").select2("destroy").empty().attr("placeholder", "<?= lang('select_customer_to_load') ?>").select2({
            placeholder: "<?= lang('select_area_to_load') ?>", data: [
                {id: '', text: '<?= lang('select_area_to_load') ?>'}
            ]
        });

        $('#slarea').change(function () {
            var v = $(this).val();
            $('#modal-loading').show();
            if (v) {
                $.ajax({
                    type: "get",
                    async: false,
                    url: "<?= site_url('sales/getCustomersByArea') ?>/" + v,
                    dataType: "json",
                    success: function (scdata) {
                        if (scdata != null) {
                            $("#slcustomer").select2("destroy").empty().attr("placeholder", "<?= lang('select_customer') ?>").select2({
                                placeholder: "<?= lang('select_category_to_load') ?>",
                                data: scdata
                            });
                        }else{

                            $("#slcustomer").select2("destroy").empty().attr("placeholder", "<?= lang('select_customer') ?>").select2({
                                placeholder: "<?= lang('select_category_to_load') ?>",
                                data: 'not found'
                            });
                        }
                    },
                    error: function () {
                        bootbox.alert('<?= lang('ajax_error') ?>');
                        $('#modal-loading').hide();
                    }
                });
            } else {
                $("#slcustomer").select2("destroy").empty().attr("placeholder", "<?= lang('select_area_to_load') ?>").select2({
                    placeholder: "<?= lang('select_area_to_load') ?>",
                    data: [{id: '', text: '<?= lang('select_area_to_load') ?>'}]
                });
            }
            $('#modal-loading').hide();
        }).trigger('change');



    });


	$(document).ready(function(){
		/*
		$("#excel").click(function(e){
			e.preventDefault();
			window.location.href = "<?=site_url('products/getProductAll/0/xls/')?>";
			return false;
		});
		$('#pdf').click(function (event) {
            event.preventDefault();
            window.location.href = "<?=site_url('products/getProductAll/pdf/?v=1'.$v)?>";
            return false;
        });
		*/
		$('.date').datetimepicker({
			format: site.dateFormats.js_sdate, 
			fontAwesome: true, 
			language: 'erp', 
			todayBtn: 1, 
			autoclose: 1, 
			minView: 2 
		});
		
		$(document).on('focus','.date', function(t) {
			$(this).datetimepicker({format: site.dateFormats.js_sdate, fontAwesome: true, todayBtn: 1, autoclose: 1, minView: 2 });
		});
	
		$('body').on('click', '#multi_adjust', function() {
			 if($('.checkbox').is(":checked") === false){
				alert('Please select at least one.');
				return false;
			}
			var arrItems = [];
			$('.checkbox').each(function(i){
				if($(this).is(":checked")){
					if(this.value != ""){
						arrItems[i] = $(this).val();   
					}
				}
			});
			$('#myModal').modal({remote: '<?=base_url('products/multi_adjustment');?>?data=' + arrItems + ''});
			$('#myModal').modal('show');
        });
		$('#excel').on('click', function(e){
			e.preventDefault();
				window.location.href = "<?=site_url('reports/customersReportDetails/0/xls/'.$warehouse1.'/'.$customer1.'/'.$reference1.'/'.$product_id1.'/'.$category_id.'/'.$group_area_id.'/'.$from_date1.'/'.$to_date1)?>";
				return false;
		});
		$('#pdf').on('click', function(e){
			e.preventDefault();
				window.location.href = "<?=site_url('reports/customersReportDetails/pdf/0/'.$warehouse1.'/'.$customer1.'/'.$reference1.'/'.$product_id1.'/'.$category_id.'/'.$group_area_id.'/'.$from_date1.'/'.$to_date1)?>";
				return false;	
		});
	});
</script>

