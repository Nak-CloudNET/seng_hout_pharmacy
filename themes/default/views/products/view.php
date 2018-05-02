<?php
if ($Owner || $Admin ){ ?>
    <ul id="myTab" class="nav nav-tabs">
        <li class=""><a href="#details" class="tab-grey"><?= lang('product_details') ?></a></li>
        <li class=""><a href="#chart" class="tab-grey"><?= lang('chart') ?></a></li>
        <li class=""><a href="#sales" class="tab-grey"><?= lang('sales') ?></a></li>
        <li class=""><a href="#quotes" class="tab-grey"><?= lang('quotes') ?></a></li>
        <?php if($product->type == 'standard') { ?>
        <li class=""><a href="#purchases" class="tab-grey"><?= lang('purchases') ?></a></li>
        <li class=""><a href="#opening_stock" class="tab-grey"><?= lang('opening_stock') ?></a></li>
        <li class=""><a href="#transfers" class="tab-grey"><?= lang('transfers') ?></a></li>
        <li class=""><a href="#damages" class="tab-grey"><?= lang('quantity_adjustments') ?></a></li>
        <?php } ?>
        <li class=""><a href="#returns" class="tab-grey"><?= lang('returns') ?></a></li>
    </ul>
<?php }else{ ?>
    <ul id="myTab" class="nav nav-tabs">
        <?php if($GP['products-index']){?>
            <li class=""><a href="#details" class="tab-grey"><?= lang('product_details') ?></a></li>
        <?php } ?>
        <?php if($GP['chart_report-index']){?>
            <li class=""><a href="#chart" class="tab-grey"><?= lang('chart') ?></a></li>
        <?php } ?>
        <?php if($GP['sales-index']){?>
            <li class=""><a href="#sales" class="tab-grey"><?= lang('sales') ?></a></li>
        <?php } ?>
        <?php if($GP['quotes-index']){?>
            <li class=""><a href="#quotes" class="tab-grey"><?= lang('quotes') ?></a></li>
        <?php } ?>
        <?php if($GP['purchases-index']){?>
            <li class=""><a href="#purchases" class="tab-grey"><?= lang('purchases') ?></a></li>
        <?php } ?>
        <?php if($GP['purchases-index']){?>
            <li class=""><a href="#opening_stock" class="tab-grey"><?= lang('opening_stock') ?></a></li>
        <?php } ?>
        <?php if($GP['transfers-index']){?>
            <li class=""><a href="#transfers" class="tab-grey"><?= lang('transfers') ?></a></li>
        <?php } ?>
        <?php if($GP['products-adjustments']){?>
            <li class=""><a href="#damages" class="tab-grey"><?= lang('quantity_adjustments') ?></a></li>
        <?php } ?>
        <?php if($GP['products-return_list']){?>
            <li class=""><a href="#returns" class="tab-grey"><?= lang('returns') ?></a></li>
        <?php } ?>
    </ul>
<?php } ?>
<div class="tab-content">
    <div id="details" class="tab-pane fade in">

        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i class="fa-fw fa fa-file-text-o nb"></i><?= $product->name; ?></h2>

                <div class="box-icon">
                    <ul class="btn-tasks">
                    <?php if ($Owner || $Admin || $GP['products-edit'] || $GP['products-print_barcodes'] || $GP['products-export'] || $GP['products-adjustments'] || $GP['products-delete']) { ?>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon fa fa-tasks tip" data-placement="left" title="<?= lang("actions") ?>"></i>
                            </a>
                            <ul class="dropdown-menu pull-right" class="tasks-menus" role="menu"
                                aria-labelledby="dLabel">
                            <?php if ($Owner || $Admin || $GP['products-edit']) { ?>
                                <li>
                                    <a href="<?= site_url('products/edit/' . $product->id) ?>">
                                        <i class="fa fa-edit"></i> <?= lang('edit') ?>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($Owner || $Admin || $GP['products-print_barcodes']) { ?>
                                <li>
                                    <a onclick="window.open('<?= site_url('products/single_barcode/' . $product->id) ?>', 'erp_popup', 'width=900,height=600,menubar=yes,scrollbars=yes,status=no,resizable=yes,screenx=0,screeny=0'); return false;" href="#">
                                        <i class="fa fa-print"></i>  <?= lang('print_barcode') ?>
                                    </a>
                                </li>
                                <li>
                                    <a onclick="window.open('<?= site_url('products/single_label/' . $product->id) ?>', 'erp_popup', 'width=900,height=600,menubar=yes,scrollbars=yes,status=no,resizable=yes,screenx=0,screeny=0'); return false;" href="#">
                                        <i class="fa fa-print"></i>  <?= lang('print_label') ?>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($Owner || $Admin || $GP['products-export']) { ?>
                                <li>
                                    <a href="<?= site_url('products/pdf/' . $product->id) ?>">
                                        <i class="fa fa-download"></i> <?= lang('pdf') ?>
                                    </a>
                                </li>
                            <?php } ?>
                                <!--<li><a href="<?= site_url('products/excel/' . $product->id) ?>"><i class="fa fa-download"></i> <?= lang('excel') ?></a></li>-->
                            <?php if ($Owner || $Admin || $GP['products-adjustments']) { ?>
                                <li>
                                    <a data-target="#myModal2" data-toggle="modal" href="<?= site_url('products/add_adjustment/' . $product->id) ?>">
                                        <i class="fa fa-filter"></i>  <?= lang('adjust_quantity') ?>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if ($Owner || $Admin || $GP['products-delete']) { ?>
                                <li class="divider"></li>
                                <li>
                                    <a href="#" class="bpo" title="<b><?= $this->lang->line("delete_product") ?></b>"
                                        data-content="<div style='width:150px;><p><?= lang('r_u_sure') ?></p><a class='btn btn-danger' href='<?= site_url('products/delete/' . $product->id) ?>'><?= lang('i_m_sure') ?></a> <button class='btn bpo-close'><?= lang('no') ?></button></div>"
                                        data-html="true" data-placement="left">
                                        <i class="fa fa-trash-o"></i> <?= lang('delete') ?>
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext"><?php echo lang('product_details'); ?></p>

                        <div class="row">
                            <div class="col-sm-5">
                                <img src="<?= base_url() ?>assets/uploads/<?= $product->image ?>"
                                     alt="<?= $product->name ?>" class="img-responsive img-thumbnail"/>

                                <div id="multiimages" class="padding10">
                                    <?php if (!empty($images)) {
                                        echo '<a class="img-thumbnail" data-toggle="lightbox" data-gallery="multiimages" data-parent="#multiimages" href="' . base_url() . 'assets/uploads/' . $product->image . '" style="margin-right:5px;"><img class="img-responsive" src="' . base_url() . 'assets/uploads/thumbs/' . $product->image . '" alt="' . $product->image . '" style="width:' . $Settings->twidth . 'px; height:' . $Settings->theight . 'px;" /></a>';
                                        foreach ($images as $ph) {
                                            echo '<div class="gallery-image"><a class="img-thumbnail" data-toggle="lightbox" data-gallery="multiimages" data-parent="#multiimages" href="' . base_url() . 'assets/uploads/' . $ph->photo . '" style="margin-right:5px;"><img class="img-responsive" src="' . base_url() . 'assets/uploads/thumbs/' . $ph->photo . '" alt="' . $ph->photo . '" style="width:' . $Settings->twidth . 'px; height:' . $Settings->theight . 'px;" /></a>';
                                            if ($Owner || $Admin || $GP['products-edit']) {
                                                echo '<a href="#" class="delimg" data-item-id="'.$ph->id.'"><i class="fa fa-times"></i></a>';
                                            }
                                            echo '</div>';
                                        }
                                    }
                                    ?>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-striped dfTable table-right-left">
                                        <tbody>
                                        <tr>
                                            <td colspan="2" style="background-color:#FFF;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width:30%;"><?= lang("barcode_qrcode"); ?></td>
                                            <td style="width:70%;"><?php echo $barcode ?>
                                                <?php $this->erp->qrcode('link', urlencode(site_url('products/view/' . $product->id)), 1); ?>
                                                <img
                                                    src="<?= base_url() ?>assets/uploads/qrcode<?= $this->session->userdata('user_id') ?>.png"
                                                    alt="<?= $product->name ?>" class="pull-right"/></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang("product_type"); ?></td>
                                            <td><?php echo lang($product->type); ?></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang("product_name"); ?></td>
                                            <td><?php echo $product->name; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang("product_code"); ?></td>
                                            <td><?php echo $product->code; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?= lang("category"); ?></td>
                                            <td><?php echo $category->name; ?></td>
                                        </tr>
                                        <?php if ($product->subcategory_id) { ?>
                                            <tr>
                                                <td><?= lang("subcategory"); ?></td>
                                                <td><?php echo $subcategory->name; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td><?= lang("product_unit"); ?></td>
                                            <td><?php echo $product->unit; ?></td>
                                        </tr>
                                        <?php if ($Owner || $Admin) {
                                            echo '<tr><td>' . $this->lang->line("product_cost") . '</td><td>' . $this->erp->formatMoneyPurchase($product->cost) . '</td></tr>';
                                            echo '<tr><td>' . $this->lang->line("product_price") . '</td><td>' . $this->erp->formatMoney($product->price) . '</td></tr>';
                                        } else {
                                            if ($this->session->userdata('show_cost')) {
                                                echo '<tr><td>' . $this->lang->line("product_cost") . '</td><td>' . $this->erp->formatMoneyPurchase($product->cost) . '</td></tr>';
                                            }
                                            if ($this->session->userdata('show_price')) {
                                                echo '<tr><td>' . $this->lang->line("product_price") . '</td><td>' . $this->erp->formatMoney($product->price) . '</td></tr>';
                                            }
                                        }
                                        ?>

                                        <?php if ($product->tax_rate) { ?>
                                            <tr>
                                                <td><?= lang("tax_rate"); ?></td>
                                                <td><?php echo $tax_rate->name; ?></td>
                                            </tr>
                                            <tr>
                                                <td><?= lang("tax_method"); ?></td>
                                                <td><?php echo $product->tax_method == 0 ? lang('inclusive') : lang('exclusive'); ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($product->alert_quantity != 0) { ?>
                                            <tr>
                                                <td><?= lang("alert_quantity"); ?></td>
                                                <td><?php echo $this->erp->formatQuantity($product->alert_quantity); ?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if ($variants) { ?>
                                            <tr>
                                                <td><?= lang("product_variants"); ?></td>
                                                <td><?php foreach ($variants as $variant) {
                                                        echo '<span class="label label-primary">' . $variant->name . '</span> ';
                                                    } ?></td>
                                            </tr>
                                        <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <?php if ($product->cf1 || $product->cf2 || $product->cf3 || $product->cf4 || $product->cf5 || $product->cf6) { ?>
                                            <h3 class="bold"><?= lang('custom_fields') ?></h3>
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-bordered table-striped table-condensed dfTable two-columns">
                                                    <thead>
                                                    <tr>
                                                        <th><?= lang('custom_field') ?></th>
                                                        <th><?= lang('value') ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if ($product->cf1) {
                                                        echo '<tr><td>' . lang("pcf1") . '</td><td>' . $product->cf1 . '</td></tr>';
                                                    }
                                                    if ($product->cf2) {
                                                        echo '<tr><td>' . lang("pcf2") . '</td><td>' . $product->cf2 . '</td></tr>';
                                                    }
                                                    if ($product->cf3) {
                                                        echo '<tr><td>' . lang("pcf3") . '</td><td>' . $product->cf3 . '</td></tr>';
                                                    }
                                                    if ($product->cf4) {
                                                        echo '<tr><td>' . lang("pcf4") . '</td><td>' . $product->cf4 . '</td></tr>';
                                                    }
                                                    if ($product->cf5) {
                                                        echo '<tr><td>' . lang("pcf5") . '</td><td>' . $product->cf5 . '</td></tr>';
                                                    }
                                                    if ($product->cf6) {
                                                        echo '<tr><td>' . lang("pcf6") . '</td><td>' . $product->cf6 . '</td></tr>';
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } ?>

                                        <?php if ((!$Supplier || !$Customer) && !empty($warehouses) && $product->type == 'standard') { ?>
                                            <h3 class="bold"><?= lang('warehouse_quantity') ?></h3>
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-bordered table-striped table-condensed dfTable two-columns">
                                                    <thead>
                                                    <tr>
                                                        <th><?= lang('warehouse_name') ?></th>
                                                        <th><?= lang('quantity') . ' (' . lang('rack') . ')'; ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($warehouses as $warehouse) {
                                                        if ($warehouse->quantity != 0) {
                                                            echo '<tr><td>' . $warehouse->name . ' (' . $warehouse->code . ')</td><td><strong>' . $this->erp->formatQuantity($warehouse->quantity) . '</strong>' . ($warehouse->rack ? ' (' . $warehouse->rack . ')' : '') . '</td></tr>';
                                                        }
                                                    } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-7">
                                        <?php if ($product->type == 'combo') { ?>
                                            <h3 class="bold"><?= lang('combo_items') ?></h3>
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-bordered table-striped table-condensed dfTable two-columns">
                                                    <thead>
                                                    <tr>
                                                        <th><?= lang('product_name') ?></th>
                                                        <th><?= lang('quantity') ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($combo_items as $combo_item) {
                                                        echo '<tr><td>' . $combo_item->name . ' (' . $combo_item->code . ') </td><td>' . $this->erp->formatQuantity($combo_item->qty) . '</td></tr>';
                                                    } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } ?>
                                        <?php if (!empty($options)) { ?>
                                            <h3 class="bold"><?= lang('product_variants_quantity'); ?></h3>
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-bordered table-striped table-condensed dfTable">
                                                    <thead>
                                                    <tr>
                                                        <th><?= lang('warehouse_name') ?></th>
                                                        <th><?= lang('product_variant'); ?></th>
                                                        <th><?= lang('quantity') . ' (' . lang('rack') . ')'; ?></th>
                                                        <?php if ($Owner || $Admin) {
                                                            echo '<th>' . lang('cost') . '</th>';
                                                            echo '<th>' . lang('price') . '</th>';
                                                        } ?>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    foreach ($options as $option) {
                                                        if ($option->wh_qty != 0) {
                                                            echo '<tr><td>' . $option->wh_name . '</td><td>' . $option->name . '</td><td class="text-center">' . $this->erp->formatQuantity($option->wh_qty) . '</td>';
                                                            if ($Owner || $Admin && (!$Customer || $this->session->userdata('show_cost'))) {
                                                                echo '<td class="text-right">' . $this->erp->formatMoney($option->cost) . '</td><td class="text-right">' . $this->erp->formatMoney($option->price) . '</td>';
                                                            }
                                                            echo '</tr>';
                                                        }

                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">

                                <?= $product->details ? '<div class="panel panel-success"><div class="panel-heading">' . lang('product_details_for_invoice') . '</div><div class="panel-body">' . $product->details . '</div></div>' : ''; ?>
                                <?= $product->product_details ? '<div class="panel panel-primary"><div class="panel-heading">' . lang('product_details') . '</div><div class="panel-body">' . $product->product_details . '</div></div>' : ''; ?>

                            </div>
                        </div>

                        <?php if (!$Supplier || !$Customer) { ?>
                        <div class="buttons">
                            <div class="btn-group btn-group-justified">
                            <?php if ($Owner || $Admin || $GP['products-print_barcodes']) { ?>
                                <div class="btn-group">
                                    <a onclick="window.open('<?= site_url('products/single_barcode/' . $product->id) ?>', 'erp_popup', 'width=900,height=600,menubar=yes,scrollbars=yes,status=no,resizable=yes,screenx=0,screeny=0'); return false;" href="#" class="tip btn btn-primary" title="<?= lang('barcode') ?>">
                                        <i class="fa fa-print"></i> <span class="hidden-sm hidden-xs"><?= lang('print_barcode') ?></span>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a onclick="window.open('<?= site_url('products/single_label/' . $product->id) ?>', 'erp_popup', 'width=900,height=600,menubar=yes,scrollbars=yes,status=no,resizable=yes,screenx=0,screeny=0'); return false;" href="#" class="tip btn btn-primary" title="<?= lang('label') ?>">
                                        <i class="fa fa-print"></i> <span class="hidden-sm hidden-xs"><?= lang('print_label') ?></span>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a onclick="window.open('<?= site_url('products/single_label2/' . $product->id) ?>', 'erp_popup', 'width=900,height=600,menubar=yes,scrollbars=yes,status=no,resizable=yes,screenx=0,screeny=0'); return false;" href="#" class="tip btn btn-primary" title="<?= lang('label_printer') ?>">
                                        <i class="fa fa-print"></i> <span class="hidden-sm hidden-xs"><?= lang('label_printer') ?></span>
                                    </a>
                                </div>
                            <?php } ?>
                            <?php if ($Owner || $Admin || $GP['products-export']) { ?>
                                <div class="btn-group">
                                    <a href="<?= site_url('products/pdf/' . $product->id) ?>" class="tip btn btn-primary" title="<?= lang('pdf') ?>">
                                        <i class="fa fa-download"></i> <span class="hidden-sm hidden-xs"><?= lang('pdf') ?></span>
                                    </a>
                                </div>
                            <?php } ?>
                                <!--<div class="btn-group"><a href="<?= site_url('products/excel/' . $product->id) ?>" class="tip btn btn-primary"  title="<?= lang('excel') ?>"><i class="fa fa-download"></i> <span class="hidden-sm hidden-xs"><?= lang('excel') ?></span></a></div>-->
                            <?php if ($Owner || $Admin || $GP['products-adjustments']) { ?>
                                <?php if($product->type == 'standard') { ?>
                              <!--  <div class="btn-group">
                                    <a data-target="#myModal2" data-toggle="modal" href="<?= site_url('products/add_adjustment/' . $product->id) ?>" class="tip btn btn-warning" title="<?= lang('adjust_quantity') ?>">
                                        <i class="fa fa-filter"></i> <span class="hidden-sm hidden-xs"><?= lang('adjust_quantity') ?></span>
                                    </a>
                                </div> -->
                                <?php } ?>
                            <?php } ?>

                            <?php if ($Owner || $Admin || $GP['products-edit']) { ?>
                                <div class="btn-group">
                                    <a href="<?= site_url('products/edit/' . $product->id) ?>" class="tip btn btn-warning tip" title="<?= lang('edit_product') ?>">
                                        <i class="fa fa-edit"></i> <span class="hidden-sm hidden-xs"><?= lang('edit') ?></span>
                                    </a>
                                </div>
                            <?php } ?>

                            <?php if ($Owner || $Admin || $GP['products-delete']) { ?>
                                <div class="btn-group">
                                    <a href="#" class="tip btn btn-danger bpo" title="<b><?= $this->lang->line("delete_product") ?></b>"
                                        data-content="<div style='width:150px;'><p><?= lang('r_u_sure') ?></p><a class='btn btn-danger' href='<?= site_url('products/delete/' . $product->id) ?>'><?= lang('i_m_sure') ?></a> <button class='btn bpo-close'><?= lang('no') ?></button></div>"
                                        data-html="true" data-placement="top">
                                        <i class="fa fa-trash-o"></i> <span class="hidden-sm hidden-xs"><?= lang('delete') ?></span>
                                    </a>
                                </div>
                            <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.tip').tooltip();
            });
        </script>
    <?php } ?>

        <?php if ($Owner || $Admin || $GP['products-index']) { ?>
    </div>
    <div id="chart" class="tab-pane fade">
        <script src="<?= $assets; ?>js/hc/highcharts.js"></script>
        <script type="text/javascript">
            $(function () {
                Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                    return {
                        radialGradient: {cx: 0.5, cy: 0.3, r: 0.7},
                        stops: [[0, color], [1, Highcharts.Color(color).brighten(-0.3).get('rgb')]]
                    };
                });
                <?php if($sold) { ?>
                var sold_chart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'soldchart',
                        type: 'line',
                        width: <?= $purchased ? "($('#details').width()-160)/2" : "$('#details').width()-100"; ?>
                    },
                    credits: {enabled: false},
                    title: {text: ''},
                    xAxis: {
                        categories: [<?php
                    foreach ($sold as $r) {
                        $month = explode('-', $r->month);
                        echo "'".lang('cal_'.strtolower($month[1]))." ".$month[0]."', ";
                    }
                    ?>]
                    },
                    yAxis: {min: 0, title: ""},
                    legend: {enabled: false},
                    tooltip: {
                        shared: true,
                        followPointer: true,
                        formatter: function () {
                            var s = '<div class="well well-sm hc-tip" style="margin-bottom:0;min-width:150px;"><h2 style="margin-top:0;">' + this.x + '</h2><table class="table table-striped"  style="margin-bottom:0;">';
                            $.each(this.points, function () {
                                if (this.series.name == '<?= lang("amount"); ?>') {
                                    s += '<tr><td style="color:{series.color};padding:0">' + this.series.name + ': </td><td style="color:{series.color};padding:0;text-align:right;"> <b>' +
                                    currencyFormat(this.y) + '</b></td></tr>';
                                } else {
                                    s += '<tr><td style="color:{series.color};padding:0">' + this.series.name + ': </td><td style="color:{series.color};padding:0;text-align:right;"> <b>' +
                                    formatQuantity(this.y) + '</b></td></tr>';
                                }
                            });
                            s += '</table></div>';
                            return s;
                        },
                        useHTML: true, borderWidth: 0, shadow: false, valueDecimals: site.settings.decimals,
                        style: {fontSize: '14px', padding: '0', color: '#000000'}
                    },
                    series: [{
                        type: 'spline',
                        name: '<?= lang("sold"); ?>',
                        data: [<?php
                        foreach ($sold as $r) {
                            echo "['".lang('cal_'.strtolower($r->month))."', ".$r->sold."],";
                        }
                        ?>]
                    }, {
                        type: 'spline',
                        name: '<?= lang("amount"); ?>',
                        data: [<?php
                        foreach ($sold as $r) {
                            echo "['".lang('cal_'.strtolower($r->month))."', ".$r->amount."],";
                        }
                        ?>]
                    }]
                });
                $(window).resize(function () {
                    sold_chart.setSize($('#soldchart').width(), 450);
                });
                <?php } if($purchased) { ?>
                var purchased_chart = new Highcharts.Chart({
                    chart: {renderTo: 'purchasedchart', type: 'line', width: ($('#details').width() - 160) / 2},
                    credits: {enabled: false},
                    title: {text: ''},
                    xAxis: {
                        categories: [<?php
        foreach ($purchased as $r) {
            $month = explode('-', $r->month);
            echo "'".lang('cal_'.strtolower($month[1]))." ".$month[0]."', ";
        }
        ?>]
                    },
                    yAxis: {min: 0, title: ""},
                    legend: {enabled: false},
                    tooltip: {
                        shared: true,
                        followPointer: true,
                        formatter: function () {
                            var s = '<div class="well well-sm hc-tip" style="margin-bottom:0;min-width:150px;"><h2 style="margin-top:0;">' + this.x + '</h2><table class="table table-striped"  style="margin-bottom:0;">';
                            $.each(this.points, function () {
                                if (this.series.name == '<?= lang("amount"); ?>') {
                                    s += '<tr><td style="color:{series.color};padding:0">' + this.series.name + ': </td><td style="color:{series.color};padding:0;text-align:right;"> <b>' +
                                    currencyFormat(this.y) + '</b></td></tr>';
                                } else {
                                    s += '<tr><td style="color:{series.color};padding:0">' + this.series.name + ': </td><td style="color:{series.color};padding:0;text-align:right;"> <b>' +
                                    formatQuantity(this.y) + '</b></td></tr>';
                                }
                            });
                            s += '</table></div>';
                            return s;
                        },
                        useHTML: true, borderWidth: 0, shadow: false, valueDecimals: site.settings.decimals,
                        style: {fontSize: '14px', padding: '0', color: '#000000'}
                    },
                    series: [{
                        type: 'spline',
                        name: '<?= lang("purchased"); ?>',
                        data: [<?php
            foreach ($purchased as $r) {
                echo "['".lang('cal_'.strtolower($r->month))."', ".$r->purchased."],";
            }
            ?>]
                    }, {
                        type: 'spline',
                        name: '<?= lang("amount"); ?>',
                        data: [<?php
            foreach ($purchased as $r) {
                echo "['".lang('cal_'.strtolower($r->month))."', ".$r->amount."],";
            }
            ?>]
                    }]
                });
                $(window).resize(function () {
                    purchased_chart.setSize($('#purchasedchart').width(), 450);
                });
                <?php } ?>

            });
        </script>
        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i class="fa-fw fa fa-bar-chart-o nb"></i><?= lang('chart'); ?></h2>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-<?= $purchased ? '6' : '12'; ?>">
                                <div class="box" style="border-top: 1px solid #dbdee0;">
                                    <div class="box-header">
                                        <h2 class="blue"><i class="fa-fw fa fa-bar-chart-o"></i><?= lang('sold'); ?>
                                        </h2>
                                    </div>
                                    <div class="box-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="soldchart" style="width:100%; height:450px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($purchased) { ?>
                                <div class="col-sm-6">
                                    <div class="box" style="border-top: 1px solid #dbdee0;">
                                        <div class="box-header">
                                            <h2 class="blue"><i
                                                    class="fa-fw fa fa-bar-chart-o"></i><?= lang('purchased'); ?></h2>
                                        </div>
                                        <div class="box-content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="purchasedchart" style="width:100%; height:450px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="sales" class="tab-pane fade">
        <?php
			$warehouse_id = NULL;
			$v = "&product=" . $product->id . "&product_type=" . $product->type;
			if ($this->input->post('reference_no')) {
				$v .= "&reference_no=" . $this->input->post('reference_no');
			}
			if ($this->input->post('customer')) {
				$v .= "&customer=" . $this->input->post('customer');
			}
			if ($this->input->post('saleman')) {
				$v .= "&saleman=" . $this->input->post('saleman');
			}
			if ($this->input->post('biller')) {
				$v .= "&biller=" . $this->input->post('biller');
			}
			if ($this->input->post('warehouse')) {
				$v .= "&warehouse=" . $this->input->post('warehouse');
			}
			if ($this->input->post('start_date')) {
				$v .= "&start_date=" . $this->input->post('start_date');
			}
			if ($this->input->post('end_date')) {
				$v .= "&end_date=" . $this->input->post('end_date');
			}
		?>
        <script type="text/javascript">
            $(document).ready(function () {
				$('#form').hide();
				$('.toggle_down').click(function () {
					$("#form").slideDown();
					return false;
				});
				$('.toggle_up').click(function () {
					$("#form").slideUp();
					return false;
				});
                var oTable = $('#SlRData').dataTable({
                    "aaSorting": [[0, "desc"]],
                    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
                    "iDisplayLength": <?= $Settings->rows_per_page ?>,
                    'bProcessing': true, 'bServerSide': true,
                    'sAjaxSource': '<?= site_url('reports/getSalesReportByProID/?v=1'.$v) ?>',
                    'fnServerData': function (sSource, aoData, fnCallback) {
                        aoData.push({
                            "name": "<?= $this->security->get_csrf_token_name() ?>",
                            "value": "<?= $this->security->get_csrf_hash() ?>"
                        });
                        $.ajax({
                            'dataType': 'json',
                            'type': 'POST',
                            'url': sSource,
                            'data': aoData,
                            'success': fnCallback
                        });
                    },
                    "aoColumns": [{"bSortable": false, "mRender": checkbox},{"mRender": fld}, null, null, null, {"mRender": formatQuantity}, null, {"mRender": currencyFormat}, {"mRender": currencyFormat}, {"mRender": currencyFormat}],
                    "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                        var tprice = 0, tqty=0, tcost=0, tprofit=0;
                        for (var i = 0; i < aaData.length; i++) {
							tqty    += parseFloat(aaData[aiDisplay[i]][5]);
                            tprice  += parseFloat(aaData[aiDisplay[i]][7]);
							tcost   += parseFloat(aaData[aiDisplay[i]][8]);
							tprofit += parseFloat(aaData[aiDisplay[i]][9]);
                        }
                        var nCells = nRow.getElementsByTagName('th');
						nCells[5].innerHTML = formatQuantity(parseFloat(tqty));
                        nCells[7].innerHTML = currencyFormat(parseFloat(tprice));
						nCells[8].innerHTML = currencyFormat(parseFloat(tcost));
						nCells[9].innerHTML = currencyFormat(parseFloat(tprofit));
                    }
                }).fnSetFilteringDelay().dtFilter([
                    {column_number: 0, filter_default_label: "[<?=lang('date');?> (yyyy-mm-dd)]", filter_type: "text", data: []},
                    {column_number: 1, filter_default_label: "[<?=lang('date');?>]", filter_type: "text", data: []},
                    {column_number: 2, filter_default_label: "[<?=lang('reference_no');?>]", filter_type: "text", data: []},
                    {column_number: 3, filter_default_label: "[<?=lang('biller');?>]", filter_type: "text", data: []},
                    {column_number: 4, filter_default_label: "[<?=lang('customer');?>]", filter_type: "text", data: []},
                    {column_number: 6, filter_default_label: "[<?=lang('unit');?>]", filter_type: "text", data: []},
                ], "footer");
            });
        </script>
        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i class="fa-fw fa fa-heart nb"></i><?= $product->name . ' ' . lang('sales'); ?></h2>

                <div class="box-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            <a href="#" id="pdf" class="tip" title="<?= lang('download_pdf') ?>">
                                <i class="icon fa fa-file-pdf-o"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="xls" class="tip" title="<?= lang('download_xls') ?>">
                                <i class="icon fa fa-file-excel-o"></i>
                            </a>
                        </li>
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
                    </ul>
                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext"><?php echo lang('list_results'); ?></p>

						<div id="form">
							<?php echo form_open("products/view/" . $product->id); ?>
								<div class="row">

									<div class="col-sm-4">
										<div class="form-group">
											<label class="control-label" for="reference_no"><?= lang("reference_no"); ?></label>
											<?php echo form_input('reference_no', (isset($_POST['reference_no']) ? $_POST['reference_no'] : ""), 'class="form-control tip" id="reference_no"'); ?>
										</div>
									</div>

									<div class="col-sm-4">
										<div class="form-group">
											<label class="control-label" for="customer"><?= lang("customer"); ?></label>
											<?php echo form_input('customer', (isset($_POST['customer']) ? $_POST['customer'] : ""), 'class="form-control" id="customer" data-placeholder="' . $this->lang->line("select") . " " . $this->lang->line("customer") . '"'); ?>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
										<?= lang("saleman", "saleman"); ?>
											<?php
												$salemans['0'] = lang("all");
												foreach($agencies as $agency){
													$salemans[$agency->id] = $agency->username;
												}
												echo form_dropdown('saleman', $salemans, (isset($_POST['saleman']) ? $_POST['saleman'] : ""), 'id="saleman" class="form-control saleman"');
											?>
										</div>
									</div>

									<div class="col-sm-4">
										<div class="form-group">
											<label class="control-label" for="project"><?= lang("project"); ?></label>
											<?php
											if ($Owner || $Admin) {
												$bl[""] = "";
											foreach ($billers as $biller) {
												$bl[$biller->id] = $biller->company != '-' ? $biller->company : $biller->name;
											}
											echo form_dropdown('biller', $bl, (isset($_POST['biller']) ? $_POST['biller'] : ""), 'class="form-control" id="biller" data-placeholder="' . $this->lang->line("select") . " " . $this->lang->line("biller") . '"');
											} else {
												$user_pro[""] = "";
												foreach ($user_billers as $user_biller) {
													$user_pro[$user_biller->id] = $user_biller->company;
												}
												echo form_dropdown('biller', $user_pro, (isset($_POST['biller']) ? $_POST['biller'] : ''), 'class="form-control" id="biller" data-placeholder="' . $this->lang->line("select") . " " . $this->lang->line("biller") . '"');
											}
											?>
										</div>
									</div>

									<div class="col-sm-4">
										<div class="form-group">
											<label class="control-label" for="warehouse"><?= lang("warehouse"); ?></label>
											<?php
											$wh[""] = "";
											foreach ($warehouses as $warehouse) {
												$wh[$warehouse->id] = $warehouse->name;
											}
											echo form_dropdown('warehouse', $wh, (isset($_POST['warehouse']) ? $_POST['warehouse'] : ""), 'class="form-control" id="warehouse" data-placeholder="' . $this->lang->line("select") . " " . $this->lang->line("warehouse") . '"');
											?>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<?= lang("start_date", "start_date"); ?>
											<?php echo form_input('start_date', (isset($_POST['start_date']) ? $_POST['start_date'] : ""), 'class="form-control date" id="start_date"'); ?>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<?= lang("end_date", "end_date"); ?>
											<?php echo form_input('end_date', (isset($_POST['end_date']) ? $_POST['end_date'] : ""), 'class="form-control date" id="end_date"'); ?>
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
                            <table id="SlRData" class="table table-bordered table-hover table-striped table-condensed">
                                <thead>
                                <tr>
								    <th style="min-width:30px; width: 30px; text-align: center;">
										<input class="checkbox checkth" type="checkbox" name="check"/>
									</th>
                                    <th><?= lang("date"); ?></th>
                                    <th><?= lang("reference_no"); ?></th>
                                    <th><?= lang("biller"); ?></th>
                                    <th><?= lang("customer"); ?></th>
                                    <th><?= lang("quantity"); ?></th>
                                    <th><?= lang("unit"); ?></th>
                                    <th><?= lang("total_price"); ?></th>
									<th><?= lang("total_cost"); ?></th>
                                    <th><?= lang("profit"); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="9"
                                        class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                                </tr>
                                </tbody>
                                <tfoot class="dtFilter">
                                <tr class="active">
								    <th style="min-width:30px; width: 30px; text-align: center;">
                                       <input class="checkbox checkth" type="checkbox" name="check"/>
                                    </th>
                                    <th></th>
                                    <th></th>
									<th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
									<th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="quotes" class="tab-pane fade">
        <script type="text/javascript">
            $(document).ready(function () {
                var oTable = $('#QuRData').dataTable({
                    "aaSorting": [[0, "desc"]],
                    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
                    "iDisplayLength": <?= $Settings->rows_per_page ?>,
                    'bProcessing': true, 'bServerSide': true,
                    'sAjaxSource': '<?= site_url('reports/getQuoteProduct/?v=1&product='.$product->id . '&product_type='.$product->type) ?>',
                    'fnServerData': function (sSource, aoData, fnCallback) {
                        aoData.push({
                            "name": "<?= $this->security->get_csrf_token_name() ?>",
                            "value": "<?= $this->security->get_csrf_hash() ?>"
                        });
                        $.ajax({
                            'dataType': 'json',
                            'type': 'POST',
                            'url': sSource,
                            'data': aoData,
                            'success': fnCallback
                        });
                    },
                    "aoColumns": [{"mRender": fld}, null, null, null, {"mRender": formatQuantity}, {"mRender": currencyFormat}, {"mRender": row_status}],
                    "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                        var gtotal = 0, tqty=0;
                        for (var i = 0; i < aaData.length; i++) {
							tqty    += parseFloat(aaData[aiDisplay[i]][4]);
                            gtotal  += parseFloat(aaData[aiDisplay[i]][5]);
                        }
                        var nCells = nRow.getElementsByTagName('th');
						nCells[4].innerHTML = formatQuantity(parseFloat(tqty));
                        nCells[5].innerHTML = currencyFormat(parseFloat(gtotal));
                    }
                }).fnSetFilteringDelay().dtFilter([
                    {column_number: 0, filter_default_label: "[<?=lang('date');?> (yyyy-mm-dd)]", filter_type: "text", data: []},
                    {column_number: 1, filter_default_label: "[<?=lang('reference_no');?>]", filter_type: "text", data: []},
                    {column_number: 2, filter_default_label: "[<?=lang('biller');?>]", filter_type: "text", data: []},
                    {column_number: 3, filter_default_label: "[<?=lang('customer');?>]", filter_type: "text", data: []},
                    {column_number: 6, filter_default_label: "[<?=lang('status');?>]", filter_type: "text", data: []},
                ], "footer");
            });
        </script>
        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i class="fa-fw fa fa-heart-o nb"></i><?= $product->name . ' ' . lang('quotes'); ?>
                </h2>

                <div class="box-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            <a href="#" id="pdf1" class="tip" title="<?= lang('download_pdf') ?>">
                                <i class="icon fa fa-file-pdf-o"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="xls1" class="tip" title="<?= lang('download_xls') ?>">
                                <i class="icon fa fa-file-excel-o"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="image1" class="tip image" title="<?= lang('save_image') ?>">
                                <i class="icon fa fa-file-picture-o"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext"><?php echo lang('list_results'); ?></p>

                        <div class="table-responsive">
                            <table id="QuRData" class="table table-bordered table-hover table-striped table-condensed">
                                <thead>
                                <tr>
                                    <th><?= lang("date"); ?></th>
                                    <th><?= lang("reference_no"); ?></th>
                                    <th><?= lang("biller"); ?></th>
                                    <th><?= lang("customer"); ?></th>
                                    <th><?= lang("product_qty"); ?></th>
                                    <th><?= lang("grand_total"); ?></th>
                                    <th><?= lang("status"); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="7"
                                        class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                                </tr>
                                </tbody>
                                <tfoot class="dtFilter">
                                <tr class="active">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="purchases" class="tab-pane fade">
        <script type="text/javascript">
            $(document).ready(function () {
                var oTable = $('#PoRData').dataTable({
                    "aaSorting": [[0, "desc"]],
                    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
                    "iDisplayLength": <?= $Settings->rows_per_page ?>,
                    'bProcessing': true, 'bServerSide': true,
                    'sAjaxSource': '<?= site_url('reports/getPurchasesReportByProID/?v=1&product=' . $product->id) ?>',
                    'fnServerData': function (sSource, aoData, fnCallback) {
                        aoData.push({
                            "name": "<?= $this->security->get_csrf_token_name() ?>",
                            "value": "<?= $this->security->get_csrf_hash() ?>"
                        });
                        $.ajax({
                            'dataType': 'json',
                            'type': 'POST',
                            'url': sSource,
                            'data': aoData,
                            'success': fnCallback
                        });
                    },
                    "aoColumns": [{"bSortable": false, "mRender": checkbox},{"mRender": fld}, null, null, null,null, {"mRender": formatQuantity}, {"mRender": currencyFormat}, {"mRender": currencyFormat}, {"mRender": currencyFormat}, {"mRender": row_status}],
                    "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                        var gtotal = 0, tpaid = 0, tbalance = 0,tqty=0;
                        for (var i = 0; i < aaData.length; i++) {
                            tqty += parseFloat(aaData[aiDisplay[i]][6]);
                           gtotal += parseFloat(aaData[aiDisplay[i]][7]);
                           tpaid += parseFloat(aaData[aiDisplay[i]][8]);
                           tbalance +=parseFloat(aaData[aiDisplay[i]][9]);
                        }
                        var nCells = nRow.getElementsByTagName('th');
                         nCells[6].innerHTML = formatQuantity(parseFloat(tqty));
                         nCells[7].innerHTML = currencyFormat(parseFloat(gtotal));
						 nCells[8].innerHTML = currencyFormat(parseFloat(tpaid));
						 nCells[9].innerHTML = currencyFormat(parseFloat(tbalance));
                    }
                }).fnSetFilteringDelay().dtFilter([
                    {column_number: 1, filter_default_label: "[<?=lang('date');?> (yyyy-mm-dd)]", filter_type: "text", data: []},
                    {column_number: 2, filter_default_label: "[<?=lang('reference_no');?>]", filter_type: "text", data: []},
                    {column_number: 3, filter_default_label: "[<?=lang('warehouse');?>]", filter_type: "text", data: []},
                    {column_number: 4, filter_default_label: "[<?=lang('supplier');?>]", filter_type: "text", data: []},
					{column_number: 5, filter_default_label: "[<?=lang('product_name');?>]", filter_type: "text", data: []},
                    {column_number: 10, filter_default_label: "[<?=lang('status');?>]", filter_type: "text", data: []},
                ], "footer");
            });
        </script>
        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i class="fa-fw fa fa-star nb"></i><?= $product->name . ' ' . lang('purchases'); ?>
                </h2>

                <div class="box-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            <a href="#" id="pdf2" class="tip" title="<?= lang('download_pdf') ?>">
                                <i class="icon fa fa-file-pdf-o"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="xls2" class="tip" title="<?= lang('download_xls') ?>">
                                <i class="icon fa fa-file-excel-o"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="image2" class="tip image" title="<?= lang('save_image') ?>">
                                <i class="icon fa fa-file-picture-o"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext"><?php echo lang('list_results'); ?></p>

                        <div class="table-responsive">
                            <table id="PoRData" class="table table-bordered table-hover table-striped table-condensed">
                                <thead>
                                <tr>
								    <th style="min-width:30px; width: 30px; text-align: center;">
										<input class="checkbox checkth" type="checkbox" name="check"/>
									</th>
                                    <th><?= lang("date"); ?></th>
                                    <th><?= lang("reference_no"); ?></th>
                                    <th><?= lang("warehouse"); ?></th>
                                    <th><?= lang("supplier"); ?></th>
                                    <th><?= lang("product_name"); ?></th>
                                    <th><?= lang("quantity"); ?></th>
                                    <th><?= lang("grand_total"); ?></th>
                                    <th><?= lang("paid"); ?></th>
                                    <th><?= lang("balance"); ?></th>
                                    <th><?= lang("status"); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="9"
                                        class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                                </tr>
                                </tbody>
                                <tfoot class="dtFilter">
                                <tr class="active">
								    <th style="min-width:30px; width: 30px; text-align: center;">
										<input class="checkbox checkth" type="checkbox" name="check"/>
									</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="opening_stock" class="tab-pane fade">
        <script type="text/javascript">
            $(document).ready(function () {
                var oTable = $('#OSRData').dataTable({
                    "aaSorting": [[0, "desc"]],
                    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
                    "iDisplayLength": <?= $Settings->rows_per_page ?>,
                    'bProcessing': true, 'bServerSide': true,
                    'sAjaxSource': '<?= site_url('reports/getOpeningStocksReportByProID/?v=1&product=' . $product->id) ?>',
                    'fnServerData': function (sSource, aoData, fnCallback) {
                        aoData.push({
                            "name": "<?= $this->security->get_csrf_token_name() ?>",
                            "value": "<?= $this->security->get_csrf_hash() ?>"
                        });
                        $.ajax({
                            'dataType': 'json',
                            'type': 'POST',
                            'url': sSource,
                            'data': aoData,
                            'success': fnCallback
                        });
                    },
                    "aoColumns": [null,null,null,{"mRender": currencyFormat},{"mRender": currencyFormat},{"mRender": currencyFormat}],
                    "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {

                    }
                }).fnSetFilteringDelay().dtFilter([
                    {column_number: 0, filter_default_label: "[<?=lang('date');?> ", filter_type: "text", data: []},
                    {column_number: 1, filter_default_label: "[<?=lang('warehouse');?>]", filter_type: "text", data: []},
                    {column_number: 2, filter_default_label: "[<?=lang('product_name');?>]", filter_type: "text", data: []},
                    {column_number: 3, filter_default_label: "[<?=lang('quantity');?>]", filter_type: "text", data: []},
                    {column_number: 4, filter_default_label: "[<?=lang('cost');?>]", filter_type: "text", data: []},
                    {column_number: 5, filter_default_label: "[<?=lang('amount');?>]", filter_type: "text", data: []},
                ], "footer");
            });
        </script>
        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i class="fa-fw fa fa-star nb"></i><?= $product->name . ' ' . lang('purchases'); ?>
                </h2>

                <div class="box-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            <a href="#" id="pdf2" class="tip" title="<?= lang('download_pdf') ?>">
                                <i class="icon fa fa-file-pdf-o"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="xls2" class="tip" title="<?= lang('download_xls') ?>">
                                <i class="icon fa fa-file-excel-o"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="image2" class="tip image" title="<?= lang('save_image') ?>">
                                <i class="icon fa fa-file-picture-o"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext"><?php echo lang('list_results'); ?></p>

                        <div class="table-responsive">
                            <table id="OSRData" class="table table-bordered table-hover table-striped table-condensed">
                                <thead>
                                <tr>
                                    <th><?= lang("date"); ?></th>
                                    <th><?= lang("warehouse"); ?></th>
                                    <th><?= lang("product_name"); ?></th>
                                    <th><?= lang("quantity"); ?></th>
                                    <th><?= lang("cost"); ?></th>
                                    <th><?= lang("amount"); ?></th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="9"
                                        class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                                </tr>
                                </tbody>
                                <tfoot class="dtFilter">
                                <tr class="active">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="transfers" class="tab-pane fade">
        <script type="text/javascript">
            $(document).ready(function () {
                var oTable = $('#TrRData').dataTable({
                    "aaSorting": [[0, "desc"]],
                    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
                    "iDisplayLength": <?= $Settings->rows_per_page ?>,
                    'bProcessing': true, 'bServerSide': true,
                    'sAjaxSource': '<?= site_url('reports/getTransferProduct/?v=1&product='.$product->id) ?>',
                    'fnServerData': function (sSource, aoData, fnCallback) {
                        aoData.push({
                            "name": "<?= $this->security->get_csrf_token_name() ?>",
                            "value": "<?= $this->security->get_csrf_hash() ?>"
                        });
                        $.ajax({
                            'dataType': 'json',
                            'type': 'POST',
                            'url': sSource,
                            'data': aoData,
                            'success': fnCallback
                        });
                    },
                    "aoColumns": [{"mRender": fld}, null, {"mRender": formatQuantity}, null, null, {"mRender": currencyFormat}, {"mRender": row_status}],
					"fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                        var tqty = 0;
                        for (var i = 0; i < aaData.length; i++) {
                            tqty += parseFloat(aaData[aiDisplay[i]][2]);
                        }
                        var nCells = nRow.getElementsByTagName('th');
                         nCells[2].innerHTML = formatQuantity(parseFloat(tqty));
                    }
                }).fnSetFilteringDelay().dtFilter([
                    {column_number: 0, filter_default_label: "[<?=lang('date');?> (yyyy-mm-dd)]", filter_type: "text", data: []},
                    {column_number: 1, filter_default_label: "[<?=lang('reference_no');?>]", filter_type: "text", data: []},
                    {
                        column_number: 3,
                        filter_default_label: "[<?=lang("warehouse").' ('.lang('from').')';?>]",
                        filter_type: "text", data: []
                    },
                    {
                        column_number: 4,
                        filter_default_label: "[<?=lang("warehouse").' ('.lang('to').')';?>]",
                        filter_type: "text", data: []
                    },
                    {column_number: 5, filter_default_label: "[<?=lang('grand_total');?>]", filter_type: "text", data: []},
                    {column_number: 6, filter_default_label: "[<?=lang('status');?>]", filter_type: "text", data: []},
                ], "footer");
            });
        </script>
        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i class="fa-fw fa fa-star-o nb"></i><?= $product->name . ' ' . lang('transfers'); ?>
                </h2>

                <div class="box-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown"><a href="#" id="pdf3" class="tip" title="<?= lang('download_pdf') ?>"><i
                                    class="icon fa fa-file-pdf-o"></i></a></li>
                        <li class="dropdown"><a href="#" id="xls3" class="tip" title="<?= lang('download_xls') ?>"><i
                                    class="icon fa fa-file-excel-o"></i></a></li>
                        <li class="dropdown"><a href="#" id="image3" class="tip image"
                                                title="<?= lang('save_image') ?>"><i
                                    class="icon fa fa-file-picture-o"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext"><?php echo lang('list_results'); ?></p>

                        <div class="table-responsive">
                            <table id="TrRData" class="table table-bordered table-hover table-striped table-condensed">
                                <thead>
                                <tr>
                                    <th><?= lang("date"); ?></th>
                                    <th><?= lang("reference_no"); ?></th>
                                    <th><?= lang("quantity"); ?></th>
                                    <th><?= lang("warehouse") . ' (' . lang('from') . ')'; ?></th>
                                    <th><?= lang("warehouse") . ' (' . lang('to') . ')'; ?></th>
                                    <th><?= lang("grand_total"); ?></th>
                                    <th><?= lang("status"); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="7"
                                        class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                                </tr>
                                </tbody>
                                <tfoot class="dtFilter">
                                <tr class="active">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="damages" class="tab-pane fade">
        <script>
            $(document).ready(function () {
                $('#dmpData').dataTable({
                    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    "aaSorting": [[0, "desc"]],
                    "iDisplayLength": <?= $Settings->rows_per_page ?>,
                    'sAjaxSource': '<?= site_url('products/getadjustmentsDetailByProID/?v=1&product='.$product->id) ?>',
                    'fnServerData': function (sSource, aoData, fnCallback) {
                        aoData.push({
                            "name": "<?php echo $this->security->get_csrf_token_name(); ?>",
                            "value": "<?php echo $this->security->get_csrf_hash() ?>"
                        });
                        $.ajax({
                            'dataType': 'json',
                            'type': 'POST',
                            'url': sSource,
                            'data': aoData,
                            'success': fnCallback
                        });
                    },
                    "aoColumns": [
                        {"mRender": fld}, null, null, null, {"mRender": formatQuantity}, null, null, {"bSortable": false}],
					"fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                        var tqty = 0;
                        for (var i = 0; i < aaData.length; i++) {
                            tqty += parseFloat(aaData[aiDisplay[i]][4]);
                        }
                        var nCells = nRow.getElementsByTagName('th');
                         nCells[4].innerHTML = formatQuantity(parseFloat(tqty));
                    }
                }).fnSetFilteringDelay().dtFilter([
                    {column_number: 0, filter_default_label: "[<?=lang('date');?> (yyyy-mm-dd)]", filter_type: "text", data: []},
                    {column_number: 1, filter_default_label: "[<?=lang('reference_no');?> (yyyy-mm-dd)]", filter_type: "text", data: []},
                    {column_number: 2, filter_default_label: "[<?=lang('product_code');?>]", filter_type: "text", data: []},
                    {column_number: 3, filter_default_label: "[<?=lang('product_name');?>]", filter_type: "text", data: []},
                    {column_number: 5, filter_default_label: "[<?=lang('product_variant');?>]", filter_type: "text", data: []},
                    {column_number: 6, filter_default_label: "[<?=lang('warehouse');?>]", filter_type: "text", data: []},
					{column_number: 7, filter_default_label: "[<?=lang('type');?>]", filter_type: "text", data: []},
                ], "footer");
            });
        </script>
        <style type="text/css">#dmpData th:last-childe {
                width: 100px !important;
            }</style>
        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i class="fa-fw fa fa-filter nb"></i><?= $product->name . ' ' . lang('quantity_adjustments'); ?>
                </h2>

                <div class="box-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            <a href="#" id="pdf4" class="tip" title="<?= lang('download_pdf') ?>">
                                <i class="icon fa fa-file-pdf-o"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="xls4" class="tip" title="<?= lang('download_xls') ?>">
                                <i class="icon fa fa-file-excel-o"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="image4" class="tip image" title="<?= lang('save_image') ?>">
                                <i class="icon fa fa-file-picture-o"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext"><?php echo lang('list_results'); ?></p>

                        <div class="table-responsive">
                            <table id="dmpData" class="table table-bordered table-condensed table-hover table-striped">
                                <thead>
                                <tr>
                                    <th><?= lang("date"); ?></th>
                                    <th><?= lang("reference_no"); ?></th>
                                    <th><?= lang("product_code"); ?></th>
                                    <th><?= lang("product_name"); ?></th>
                                    <th><?= lang("quantity"); ?></th>
                                    <th><?= lang("product_variant"); ?></th>
                                    <th><?= lang("warehouse"); ?></th>
                                    <th><?= lang("type"); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="7"
                                        class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                                </tr>
                                </tbody>
                                <tfoot class="dtFilter">
                                <tr class="active">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="returns" class="tab-pane fade">
        <script>
            $(document).ready(function () {
                var oTable = $('#PRESLData').dataTable({
                    "aaSorting": [[0, "desc"]],
                    "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "<?= lang('all') ?>"]],
                    "iDisplayLength": <?= $Settings->rows_per_page ?>,
                    'bProcessing': true, 'bServerSide': true,
                    'sAjaxSource': '<?= site_url('reports/getReturnsReportByID/?v=1&product='.$product->id . '&product_type='.$product->type) ?>',
                    'fnServerData': function (sSource, aoData, fnCallback) {
                        aoData.push({
                            "name": "<?= $this->security->get_csrf_token_name() ?>",
                            "value": "<?= $this->security->get_csrf_hash() ?>"
                        });
                        $.ajax({
                            'dataType': 'json',
                            'type': 'POST',
                            'url': sSource,
                            'data': aoData,
                            'success': fnCallback
                        });
                    },
                    "aoColumns": [{"mRender": fld}, null, null, null, null, {"mRender": formatQuantity}, {"mRender": currencyFormat}, {"mRender": currencyFormat}],
                    "fnFooterCallback": function (nRow, aaData, iStart, iEnd, aiDisplay) {
                        var sc = 0, gtotal = 0, tqty = 0;
                        for (var i = 0; i < aaData.length; i++) {
							tqty += parseFloat(aaData[aiDisplay[i]][5]);
                            sc += parseFloat(aaData[aiDisplay[i]][6]);
                            gtotal += parseFloat(aaData[aiDisplay[i]][7]);
                        }
                        var nCells = nRow.getElementsByTagName('th');
                        nCells[5].innerHTML = formatQuantity(parseFloat(tqty));
                        nCells[6].innerHTML = currencyFormat(parseFloat(sc));
                        nCells[7].innerHTML = currencyFormat(parseFloat(gtotal));
                    }
                }).fnSetFilteringDelay().dtFilter([
                    {column_number: 0, filter_default_label: "[<?=lang('date');?> (yyyy-mm-dd)]", filter_type: "text", data: []},
                    {column_number: 1, filter_default_label: "[<?=lang('reference_no');?>]", filter_type: "text", data: []},
                    {
                        column_number: 2,
                        filter_default_label: "[<?=lang('sale_reference');?>]",
                        filter_type: "text",
                        data: []
                    },
                    {column_number: 3, filter_default_label: "[<?=lang('biller');?>]", filter_type: "text", data: []},
                    {column_number: 4, filter_default_label: "[<?=lang('customer');?>]", filter_type: "text", data: []},
                ], "footer");
            });
        </script>
        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i class="fa-fw fa fa-random nb"></i><?= $product->name . ' ' . lang('returns'); ?>
                </h2>

                <div class="box-icon">
                    <ul class="btn-tasks">
                        <li class="dropdown">
                            <a href="#" id="pdf5" class="tip" title="<?= lang('download_pdf') ?>">
                                <i class="icon fa fa-file-pdf-o"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="xls5" class="tip" title="<?= lang('download_xls') ?>">
                                <i class="icon fa fa-file-excel-o"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="image5" class="tip image" title="<?= lang('save_image') ?>">
                                <i class="icon fa fa-file-picture-o"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext"><?php echo lang('list_results'); ?></p>

                        <div class="table-responsive">
                            <table id="PRESLData" class="table table-bordered table-hover table-striped">
                                <thead>
									<tr>
										<th><?= lang("date"); ?></th>
										<th><?= lang("reference_no"); ?></th>
										<th><?= lang("sale_reference"); ?></th>
										<th><?= lang("biller"); ?></th>
										<th><?= lang("customer"); ?></th>
										<th class="col-sm-2"><?= lang("quantity"); ?></th>
										<th class="col-sm-1"><?= lang("surcharges"); ?></th>
										<th class="col-sm-1"><?= lang("grand_total"); ?></th>
									</tr>
                                </thead>
                                <tbody>
									<tr>
										<td colspan="9" class="dataTables_empty"><?= lang("loading_data"); ?></td>
									</tr>
                                </tbody>
                                <tfoot class="dtFilter">
									<tr class="active">
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th class="col-sm-2"><?= lang("quantity"); ?></th>
										<th class="col-sm-1"><?= lang("surcharges"); ?></th>
										<th class="col-sm-1"><?= lang("grand_total"); ?></th>
									</tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="PI" class="tab-pane fade">
        <div class="box">
            <div class="box-header">
                <h2 class="blue"><i class="fa-fw fa fa-file-text-o nb"></i><?= $product->name . ' ' . lang('pi'); ?>
                </h2>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="introtext"><?php echo lang('list_results'); ?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script type="text/javascript" src="<?= $assets ?>js/html2canvas.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#pdf').click(function (event) {
                event.preventDefault();
                window.location.href = "<?=site_url('reports/getSalesReport/pdf/?v=1&product='.$product->id)?>";
                return false;
            });
            $('#xls').click(function (event) {
                event.preventDefault();
                window.location.href = "<?=site_url('reports/getSalesReport/0/xls/?v=1&product='.$product->id)?>";
                return false;
            });
            $('#pdf1').click(function (event) {
                event.preventDefault();
                window.location.href = "<?=site_url('reports/getQuotesReport/pdf/?v=1&product='.$product->id)?>";
                return false;
            });
            $('#xls1').click(function (event) {
                event.preventDefault();
                window.location.href = "<?=site_url('reports/getQuotesReport/0/xls/?v=1&product='.$product->id)?>";
                return false;
            });
            $('#pdf2').click(function (event) {
                event.preventDefault();
                window.location.href = "<?=site_url('reports/getPurchasesReport/pdf/?v=1&product='.$product->id)?>";
                return false;
            });
            $('#xls2').click(function (event) {
                event.preventDefault();
                window.location.href = "<?=site_url('reports/getPurchasesReport/0/xls/?v=1&product='.$product->id)?>";
                return false;
            });
            $('#pdf3').click(function (event) {
                event.preventDefault();
                window.location.href = "<?=site_url('reports/getTransfersReport/pdf/?v=1&product='.$product->id)?>";
                return false;
            });
            $('#xls3').click(function (event) {
                event.preventDefault();
                window.location.href = "<?=site_url('reports/getTransfersReport/0/xls/?v=1&product='.$product->id)?>";
                return false;
            });
            $('#pdf4').click(function (event) {
                event.preventDefault();
                window.location.href = "<?=site_url('products/getadjustments/pdf/?v=1&product='.$product->id)?>";
                return false;
            });
            $('#xls4').click(function (event) {
                event.preventDefault();
                window.location.href = "<?=site_url('products/getadjustments/0/xls/?v=1&product='.$product->id)?>";
                return false;
            });
            $('#pdf5').click(function (event) {
                event.preventDefault();
                window.location.href = "<?=site_url('reports/getReturnsReport/pdf/?v=1&product='.$product->id)?>";
                return false;
            });
            $('#xls5').click(function (event) {
                event.preventDefault();
                window.location.href = "<?=site_url('reports/getReturnsReport/0/xls/?v=1&product='.$product->id)?>";
                return false;
            });
            $('.image').click(function (event) {
                var box = $(this).closest('.box');
                event.preventDefault();
                html2canvas(box, {
                    onrendered: function (canvas) {
                        var img = canvas.toDataURL()
                        window.open(img);
                    }
                });
                return false;
            });
        });
    </script>
<?php } ?>
