<link href="/templates/home/css/addnews-v2.css" type="text/css" rel="stylesheet" />
<link href="/templates/home/styles/css/tintuc/popup-info-detail.css" type="text/css" rel="stylesheet" />
<script src="/templates/home/js/addnews-preview-v2.js"></script>
<script src="/templates/home/jR3DCarousel/jR3DCarousel.js"></script>

<?php 

$show_vol = true;
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
if(stripos($ua,'ipod') !== false || stripos($ua,'iphone') !== false || stripos($ua,'ipad') !== false ) {
	$show_vol = false;
}

?>

<div class="modal modal-show-detail" id="modal-show-detail-img-news"  tabindex="-1" role="dialog" aria-hidden="true">

	<a data-dismiss="modal" title="Đóng" class="back btn-chitiettin back mt10 mr10" style="width: 80px"><img style="filter: invert(100%);" src="/templates/home/styles/images/svg/prev.svg" class="ml00">&nbsp;Đóng</a>

	<!-- <a class="back">
		<img src="/templates/home/styles/images/svg/back02.svg"" data-dismiss="modal" alt="Close gallery" title="Quay lại">
	</a> -->
  	<div class="modal-dialog modal-lg modal-show-detail-dialog" role="document">
      <!-- Modal Header -->
        <!-- <div class="modal-header"></div> -->
      <!-- Modal body -->
      <div class="modal-content container">
	    <div class="modal-body">
	        <div class="row">
	            <div class="col-lg-7 popup-image-sm">
					<div class="">						
						<div class="jR3DCarouselGallery">
							<div class="jR3DCarouselCustomSlide">
					          <div class="big-img">
						        <div class="tag position-tag">
						            <img class="image_main_tag" src="/templates/home/styles/images/default/error_image_400x400.jpg" alt="">
						            <div class="tag-number-selected">
						              <img src="/templates/home/icons/boxaddnew/tag.svg" alt="" >
						              <span class="number">0</span>
						            </div> 
						        </div>   
					          </div>     
					        </div>
						</div>

					</div>

					
		            <div class="action md">
		                <?php $this->load->view('home/share/bar-btn-share-js', array('show_md_7' => 1, 'show_md_5' => 0, 'show_sm' => 0)); ?>
		            </div>
					<div class="all-slider md">
	                    <div class="tag-list-product hidden">
	                      <img src="/templates/home/styles/images/svg/close_.svg" alt="" class="closebox">
	                      <ul class="slider tag-list-product-slider"></ul>
	                    </div>

	                    <div class="luot-xem-tin sm">
	                    	<img src="/templates/home/styles/images/svg/up_white.svg" class="mr05" alt="">Lướt xem
	                    </div>

	                    <div class="list-image-recent">
	                      	<div class="sm text-center mb05 dong-luot-xem-tin">
					          <img src="/templates/home/styles/images/svg/down_1.svg" alt="">
					        </div>
							<ul class="style-weblink list-image-recent-slider"></ul>
	                    </div>
	                </div>
					<!--  -->
		        </div>

	            <!-- info -->
	            <div class="col-lg-5 md">
	              <div class="post">
	                <div class="post-head">
	                  <div class="post-head-name">
	                    <div class="avata">
	                    	<a href="#" class="pop_shop_avatar">
		                      <img class="pop_shop_img" src="/templates/home/styles/images/default/error_image_400x400.jpg" alt="oppo">
		                    </a>
	                    </div>
	                    <div class="title">
                    	  <a href="#" class="pop_shop_avatar">
                      		<span class="pop_shop_name"></span>
                      	  </a>
	                      <br>
	                      <span class="pop_new_date"></span>
	                      <span>
	                        <img class="mr10 ml20 mt05" src="/templates/home/styles/images/svg/quadiacau.svg" width="14" alt="">
	                      </span>
	                      <span style="color: #737373; font-weight: normal; border-left: 1px solid #c4c4c4" class="pl10">
	                        <img class="mt10" src="/templates/home/styles/images/svg/eye_gray.svg" width="16" alt=""> 8K
	                      </span>
	                    </div>
	                  </div>

	                  <div class="post-head-more">
	                    <span>
	                      <img class="icon-img" src="/templates/home/styles/images/svg/3dot.svg" alt="more">
	                    </span>

	                    <div class="show-more hidden">
	                      <p class="save-post"><img class="icon-img" src="/templates/home/styles/images/svg/savepost.svg" alt="">Lưu bài viết</p>
	                      <ul class="show-more-detail">
	                        <li><a href="#">Chỉnh sửa bài viết</a></li>
	                        <li><a href="#">Thay đổi ngày</a></li>
	                        <li><a href="#">Tắt thông báo cho bài viết này</a></li>
	                        <li><a href="#">Ẩn khỏi dòng thời gian</a></li>
	                        <li><a href="#">Xóa </a></li>
	                        <li><a href="#">Tắt tính năng dịch</a></li>
	                        <li><a href="#">Kiểm duyệt bình luận</a></li>
	                      </ul>
	                    </div>
	                  </div>

	                </div>

	                <div class="info-product">
	                  <div class="descrip">
	                    <p class="pop-descrip">
	                      <!-- <span class="seemore">Xem tiếp</span> -->
	                    </p>

	                    <div class="hagtag"></div>
	                  </div>
	                </div>
	                <div class="action">
	                  <?php $this->load->view('home/share/bar-btn-share-js', array('show_md_7' => 0, 'show_md_5' => 1, 'show_sm' => 0)); ?>
	                  <!-- <div id="comment_block_popup"></div> -->
	                </div>
	              </div>
	            </div>
	            <!-- info -->
	        </div>
	        
	    </div>
      </div>
    </div>

    <div class="sm">
    	<div class="sm tieude-sm">
	        <div class="tieude-sm-head">
	          <div class="avata">
	          	<a href="#" class="pop_shop_avatar">
		          <img  class="pop_shop_img" src="" alt=""><span class="pop_shop_name"></span>
		        </a>
	          </div>
	          <div class="time">
	          	<!-- <img src="/templates/home/styles/images/svg/check_blue.svg" width="15" class="mr10" alt=""> -->
	          	<span class="pop_new_date"></span>
	          </div>
	          <a href="" class="btn-chitiettin btn-chitiettin-js mt10 mr10">Chi tiết tin <img src="/templates/home/styles/images/svg/next.svg" style="filter: invert(100%);"></a>
	        </div>
	        <h3 class="pop-descrip-title"></h3>
	    </div>
	    <div class="action">
            <?php $this->load->view('home/share/bar-btn-share-js', array('show_md_7' => 0, 'show_md_5' => 0, 'show_sm' => 1)); ?>
        </div>
		<div class="all-slider">
            <div class="tag-list-product hidden">
              <img src="/templates/home/styles/images/svg/close_.svg" alt="" class="closebox">
              <ul class="slider tag-list-product-slider"></ul>
            </div>

            <div class="luot-xem-tin sm">
            	<img src="/templates/home/styles/images/svg/up_white.svg" class="mr05" alt="">Lướt xem
            </div>

            <div class="list-image-recent">
              	<div class="sm text-center mb05 dong-luot-xem-tin">
		          <img src="/templates/home/styles/images/svg/down_1.svg" alt="">
		        </div>
				<ul class="style-weblink list-image-recent-slider"></ul>
            </div>
        </div>
    </div>

</div>

<div id="modal-show-comment-sm">
	<div class="comment-mobile-header">
		<img class="icon-img button-back" src="/templates/home/styles/images/svg/back.svg" alt="">
		<h4>Danh sách bình luận</h4>
		<img class="icon-img button-home" src="/templates/home/styles/images/svg/home_black.svg" alt="">
	</div>
	<div class="infomation-user-comment">
		
	</div>
	<!-- <div id="comment_block_popup"></div> -->
</div>