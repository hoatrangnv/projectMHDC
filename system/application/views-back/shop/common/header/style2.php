<?php
$srcbanner = DOMAIN_CLOUDSERVER . 'media/shop/banners/' . $siteGlobal->sho_dir_banner . '/' . $siteGlobal->sho_banner;
if ($isAffiliate == TRUE && $siteGlobal->sho_dir_banner == 'defaults') {
    $srcbanner = DOMAIN_CLOUDSERVER . 'media/shop/banners/' . $Pa_Shop_Global->sho_dir_banner . '/' . $Pa_Shop_Global->sho_banner;
}
$filelogo = DOMAIN_CLOUDSERVER.'media/shop/logos/' . $siteGlobal->sho_dir_logo . '/' . $siteGlobal->sho_logo;            
    if ( $siteGlobal->sho_logo !="" ) {
        $sho_logo = $filelogo;
    } else {
        $sho_logo = 'images/no-logo.png';
    }
?>  

<?php if ($isMobile == 0) { ?>
<div class="headertop">
    <div class="container">
        <div class="row small">
            <div class="col-sm-6  text-left">
                <div style="margin: 10px 0;">
                    <a href="tel:<?php echo $siteGlobal->sho_mobile; ?>"><i class="fa fa-phone-square fa-fw"></i> <?php echo $siteGlobal->sho_mobile; ?></a>
                    |
                    <a href="/checkout"><i class="fa fa-shopping-cart fa-fw"></i> Giỏ hàng <span class="cartNum badge"><?php echo $azitab['cart_num'] ?></span></a>
                </div>            
            </div>           
         
            <div class="col-sm-6  text-right">                
                <div style="margin: 10px 0;">
                    <?php if ($this->session->userdata('sessionUser') > 0) { ?>
                        Chào <strong><?php echo $this->session->userdata('sessionUsername'); ?></strong>, &nbsp; <a href="/logout">Đăng xuất</a>                   
		    <?php } else { ?>
                        <a href="#" data-toggle="modal" data-target="#myLogin"><i class="fa fa-sign-in fa-fw"></i> Chào mừng đăng nhập</a>
		    <?php } ?>
                </div>
            </div>
        </div>        
    </div>
    <h1 id="brand" class="text-center" style="margin:10px 0 10px">
        <?php
        $filelogo = DOMAIN_CLOUDSERVER . 'media/shop/logos/' . $siteGlobal->sho_dir_logo . '/' . $siteGlobal->sho_logo;
        if ($siteGlobal->sho_logo != "") {
            $sho_logo = $filelogo;
        } else {
            $sho_logo = 'images/no-logo.png';
        }
        ?>
        <a href="/">
            <?php if ($siteGlobal->sho_logo != "") { ?>
            <img alt="<?php echo $siteGlobal->sho_name; ?>" src="<?php echo $sho_logo; ?>" border="0" height="70"  />
            <?php } else { ?>
            <img src="/images/logo-azibai.png" alt="">
            <?php } ?>
        </a>
   </h1>
</div>  

<div class="headermenu">
    <div class="container">
        <nav class="navbar navbar-inverse" style="margin:0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
		    <span class="sr-only">Toggle navigation</span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
		    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand visible-xs" href="#">Danh mục menu</a>
            </div>
           <div class="collapse navbar-collapse" id="myNavbar" style=" text-transform: uppercase; ">

                <ul class="nav navbar-nav">
                    <li class="<?php
		    if (isset($menuSelected) && $menuSelected == 'home') {
			echo 'active';
		    } else {
			echo 'normal';
		    }
		    ?>">
                        <a target="_self" href="/"><span><?php echo $this->lang->line('index_page_menu_detail_global'); ?></span></a>
                    </li>

                    <li class="<?php
		    if (isset($menuSelected) && $menuSelected == 'introduct') {
			echo 'active';
		    } else {
			echo 'normal';
		    }
		    ?>"><a target="_self" href="/shop/introduct"><span><?php echo $this->lang->line('index_page_menu_introduct_global'); ?></span></a>
                    </li>

                    <li class="<?php
		    if (isset($menuSelected) && $menuSelected == 'defaults') {
			echo 'active';
		    } else {
			echo 'normal';
		    }
		    ?>"><a target="_self" href="/shop"><span>Cửa hàng</span></a>
                    </li>

		    <?php $url = $this->uri->segment(2); ?>
                    <li class="dropdown <?php
		    if (isset($url) && $url == 'product') {
			echo 'active';
		    } else {
			echo 'normal db_li';
		    }
		    ?>">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="/">
			    <?php echo $this->lang->line('product_menu_detail_global'); ?>
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu db_menu_2">
			    <?php if ($shop_af->use_group == 2) { ?>
    			    <li><a href="/san-pham-tu-gian-hang/">Sản phẩm từ Gian hàng</a></li>
			    <?php } ?>
			    <?php
			    foreach ($listCategory as $k => $category) {
				if ($category->cate_type == 0) {
				    ?>
				    <li>
					<?php if (!empty($category->child)) { ?>
	    				<span><?php echo $category->cat_name; ?></span>
	    				<ul>
						<?php foreach ($category->child as $item) { ?>
						    <li><a href="<?php echo '/shop/' . $tlink . '/cat/' . $item->cat_id . '-' . RemoveSign($item->cat_name); ?>"><?php echo $item->cat_name; ?></a></li>
						<?php } ?>
	    				</ul>
					<?php } else { ?>
	    				<a href="<?php echo '/shop/' . $tlink . '/cat/' . $category->cat_id . '-' . RemoveSign($category->cat_name); ?>"><?php echo $category->cat_name; ?></a>
					<?php } ?>
				    </li>
				    <?php
				}
			    }
			    ?>
                            <li><?php if ($shop_af->use_group == 2) { ?>
    				<a class="hover" href="<?php echo '/shop/' . $tlink . '/pro_type/0-Tat-ca-san-pham' ?>">Xem tất cả sản phẩm</a></li>
			    <?php } else { ?>
    			    <a class="hover" href="<?php echo '/shop/' . $tlink ?>">Xem tất cả sản phẩm</a></li>
		    <?php } ?>
                </ul>
                </li>
		<?php if (serviceConfig == 1) { ?>
    		<li class="dropdown <?php echo $url == 'services' ? 'active' : 'normal db_li'; ?>">
    		    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
    			Dịch vụ<span class="caret"></span>
    		    </a>
    		    <ul class="dropdown-menu db_menu_2">
			    <?php if ($shop_af->use_group == 2) { ?>
				<li><a href="/shop/dich-vu-tu-gian-hang/">Dịch vụ từ Gian hàng</a></li>
			    <?php } ?>
			    <?php
			    foreach ($listCategory as $k => $category) {
				if ($category->cate_type == 1) {
				    ?>
	    			<li>
					<?php if (!empty($category->child)) { ?>
					    <span><?php echo $category->cat_name; ?></span>
					    <ul>
						<?php foreach ($category->child as $item) { ?>
		    				<li><a href="<?php echo '/shop/services/cat/' . $item->cat_id . '-' . RemoveSign($item->cat_name); ?>"><?php echo $item->cat_name; ?></a></li>
						<?php } ?>
					    </ul>
					<?php } else { ?>
					    <a href="<?php echo '/shop/services/cat/' . $category->cat_id . '-' . RemoveSign($category->cat_name); ?>"><?php echo $category->cat_name; ?></a>
					<?php } ?>
	    			</li>
				    <?php
				}
			    }
			    ?>
    			<li><a class="hover" href="<?php echo '/shop/services'; ?>">Xem tất cả dịch vụ</a></li>
    		    </ul>
    		</li>
		<?php } ?>
                <li class="dropdown <?php echo $url == 'coupon' ? 'active' : 'normal'; ?>">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Coupon <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu db_menu_2">
			<?php if ($shop_af->use_group == 2) { ?>
    			<li><a href="/coupon-tu-gian-hang/">Coupon từ Gian hàng</a></li>
			<?php } ?>
			<?php
			foreach ($listCategory as $k => $category) {
			    if ($category->cate_type == 2) {
				?>
				<li>
				    <?php if (!empty($category->child)) { ?>
	    			    <span><?php echo $category->cat_name; ?></span>
	    			    <ul>
					    <?php foreach ($category->child as $item) { ?>
						<li><a href="<?php echo '/shop/' . $afLink . '/cat/' . $item->cat_id . '-' . RemoveSign($item->cat_name); ?>"><?php echo $item->cat_name; ?></a></li>
					    <?php } ?>
	    			    </ul>
				    <?php } else { ?>
	    			    <a href="<?php echo '/shop/' . $afLink . '/cat/' . $category->cat_id . '-' . RemoveSign($category->cat_name); ?>"><?php echo $category->cat_name; ?></a>
				    <?php } ?>
				</li>
				<?php
			    }
			}
			?>
                        <li><?php if ($shop_af->use_group == 2) { ?>
    			    <a class="hover" href="<?php echo '/shop/' . $afLink . '/pro_type/2-Tat-ca-coupon' ?>">Xem tất cả coupon</a></li>
			<?php } else { ?>
    			<a class="hover" href="<?php echo '/shop/' . $afLink ?>">Xem tất cả coupon</a></li>
		<?php } ?>
                </ul>
                </li>

		<?php if ($shop_af->use_group != 2) { ?>
    		<li class="<?php
		    if (isset($menuSelected) && $menuSelected == 'warranty') {
			echo 'active';
		    } else {
			echo 'normal db_li';
		    }
		    ?>">
    		    <a target="_self" href="/shop/warranty"><span><?php echo $this->lang->line('ads_menu_warranty_global'); ?></span></a>
    		</li>
		<?php } ?>                              

                <li class="<?php
		if (isset($menuSelected) && $menuSelected == 'contact') {
		    echo 'active';
		} else {
		    echo 'normal';
		}
		?>">
                    <a target="_self" href="/shop/contact"><span><?php echo $this->lang->line('contact_menu_detail_global'); ?></span></a>
                </li>		
                    <li>
                        <a class="back_home" target="_blank" href="<?php echo $mainURL; ?>"><span>Azibai</span></a>
                    </li>
                </ul>   
            </div>
        </nav>    
    </div>
</div>
<div class="headerbanner">        
    <div class="shop_banner">
	<div class="fix3by1" style="background: url('<?php echo $srcbanner ?>') no-repeat center center / cover"></div>
    </div>
</div>
<?php } else { $this->load->view('shop/common/m_menu'); ?> 

<div class="headerbanner">
    <div class="shop_banner">
    	<div class="fix16by9" style="background: url('<?php echo $srcbanner ?>') no-repeat center center / cover"></div>
    </div> 
    <div class="shop_logo text-center">
        <div style="vertical-align: middle; display: table-cell; width:100px; height:100px;">            
            <a href="/" style=" border: 1px solid #f9f9f9; display: block; height:100%; background: url('<?php echo $filelogo ?>') no-repeat center / 100% auto"></a>
        </div>
    </div>
    <div class="shop_name text-center">
        <h1 style="font-size:18px; margin: 20px 0;">
            <a href="/"><?php echo $siteGlobal->sho_name ?></a>
        </h1>
    </div>
</div>
<?php } ?> 








