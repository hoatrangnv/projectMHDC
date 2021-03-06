<link href="/templates/home/darkroomjs/css/darkroom.css" type="text/css" rel="stylesheet" />
<script src="/templates/home/darkroomjs/js/fabric.js"></script>
<script src="/templates/home/darkroomjs/js/darkroom.js"></script>
<script src="/templates/home/js/addnews-video.js?ver=<?=time();?>"></script>

<style type="text/css">
.shareModal-footer .permision .active{
  background-image: url(/templates/home/styles/images/svg/checked__circle.svg);
}
.fixed-modal-ios.cancel-fixed{
  position: unset;
}
.darkroom-button-group {
  padding: 5px;
  display: inline-block;
}
</style>

<div class="modal share-page" id="shareClick">
  <div class="modal-dialog modal-dialog-centered modal-dialog-sm slideInUp-animated">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Chia sẻ đến</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <div class="shr-data hidden" data-value="<?php //echo $share_url ?>" data-name="<?php //echo $this->filter->injection_html($share_name); ?>"></div> -->
      </div>
      <div class="modal-body shareChangeContent">
        <div class="div-temp-share"> 
        <?php if($this->session->userdata('sessionUser')){ ?>
          <div class="share-click-info-detail share-to-pages" data-id="">
            <div class="item congdong" data-toggle="modal" data-target="#">
              <div class="img"><img src="/templates/home/styles/images/svg/shareto_logo.svg" alt=""></div>
              <div class="txt">Trang cộng<br>đồng</div>
            </div>
            <div class="item">
              <div class="img"><img src="/templates/home/styles/images/svg/shareto_logo.svg" alt=""></div>
              <div class="txt">Trang cá<br>nhân</div>
            </div>
            <!-- <div class="item">
              <div class="img"><img src="/templates/home/styles/images/svg/shareto_logo.svg" alt=""></div>
              <div class="txt">Nhóm</div>
            </div>
            <div class="item">
              <div class="img"><img src="/templates/home/styles/images/svg/shareto_logo.svg" alt=""></div>
              <div class="txt">azichat</div>
            </div> -->
          </div>
        <?php } ?>
          <div class="shr-html-js hidden">
          </div>
        </div>
        <div class="upavatar-share">
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Popup change avt share -->
<div class="modal" id="avtShare">
  <div class="modal-dialog modal-dialog-centered modal-dialog-sm slideInUp-animated">
    <div class="modal-content">
      <div class="modal-body shareChangeContent">
        <div class="upavatar-share">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End popup change avt share -->
<div class="domain_site" data-site="<?php echo domain_site; ?>"></div>
<!-- Share mang xa hoi -->
<script id="js-share" type="text/template">
  <div class="share-click-info-detail">
    <div class="item share-fb">
      <div class="img"><img src="/templates/home/styles/images/svg/shareto_fb.svg" alt=""></div>
      <div class="txt">Facebook</div>
    </div>
    <div class="item" onclick="window.open('https://mail.google.com/mail/u/0/?view=cm&fs=1&to&tf=1&su={{SHARE_NAME}}&body={{SHARE_URL}}','google-share-dialog','width=800,height=600');return false;">
      <div class="img"><img src="/templates/home/styles/images/svg/shareto_email.svg" alt=""></div>
      <div class="txt">Email</div>
    </div>
    <div class="item" onclick="window.open('https://twitter.com/share?url={{SHARE_URL}}&text={{SHARE_NAME}}','twitter-share-dialog','width=800,height=600');return false;">
      <div class="img"><img src="/templates/home/styles/images/svg/shareto_twitter.svg" alt=""></div>
      <div class="txt">Twitter</div>
    </div>
    <div class="item share-zalo">
      <div class="img zalo-share-button" data-href="{{SHARE_URL}}" data-oaid="579745863508352884" data-layout="false" data-color="blue" data-customize=true data-callback="window.callback_zalo"><img src="/templates/home/styles/images/svg/shareto_zalo.svg" alt=""></div>
      <div class="txt">Zalo</div>
    </div>
    <div class="item js-copy" onclick="copy_text('{{SHARE_COPPY_URL}}');" data-toggle="modal" data-target="#modal_mess">
      <div class="img"><img src="/templates/home/styles/images/svg/shareto_link.svg" alt=""></div>
      <div class="txt">Sao chép<br>liên kết</div>
    </div>
  </div>
</script>

<!-- Share noi bo -->
<div class="modal shareModal" id="shareModal">
  <div class="modal-dialog modal-dialog-centered modal-dialog-sm slideInUp-animated">
    <div class="modal-content">
      <div class="modal-body-js">
        
      </div>
      <!-- End modal-body shareChangeContent-->
      <div class="modal-footer">
        <div class="shareModal-footer">
          <div class="permision">
            <p>
              <label class="checkbox-style-circle">
                <!-- <input type="radio" name="share_permission" value="1" checked="checked"> -->
                <span class="show-permision active">Công khai</span>
              </label>
              <i class="fa fa-angle-down"></i>
            </p>
            <div class="permision-list">
              <ul class="item-check">
                <li >
                  <label class="checkbox-style-circle">
                    <input type="radio" name="share_permission" value="1" data-text="Công khai">
                    <span class="active">Công khai</span>
                  </label>
                </li>
                <li >
                  <label class="checkbox-style-circle">
                    <input type="radio" name="share_permission" value="2" data-text="Bạn bè">
                    <span>Bạn bè</span>
                  </label>
                </li>
                <li>
                  <label class="checkbox-style-circle">
                    <input type="radio" name="share_permission" value="3" data-text="Chỉ mình tôi">
                    <span>Chỉ mình tôi</span>
                  </label>
                </li>
              </ul>
            </div>
          </div>
          <div class="buttons-direct">
            <button class="btn-cancle">Hủy</button>
            <button class="btn-share">Tạo</button>
          </div>
        </div>
      </div>
      <!-- End modal-footer -->
    </div>
  </div>
</div>

<script id="js-share-content" type="text/template">
  <!-- Modal Header -->
  <div class="modal-header shareModal-title">
    <div class="shareModal-title-content dropdown">
      <h4 class="modal-title" data-toggle="dropdown">Chia sẻ đến trang cộng đồng <i class="fa fa-angle-down"></i></h4>
    </div>
    <button type="button" class="close" data-dismiss="modal">×</button>
  </div>
 
  <!-- Modal body -->
  <div class="modal-body shareChangeContent" id="sharePost">
    <div class="shareModal-comment">
      <div class="shareModal-addnewcomment">
        <div class="shareModal-addnewcomment-typing">
          <div class="avata">
            <img src="<?php echo DOMAIN_CLOUDSERVER ?>media/images/avatar/{{SHARE_USER_LOGO}}" alt="{{SHARE_USER_NAME}}">
          </div>
          <div class="typearea">
            <textarea class="yourcomment" name="" id="" placeholder="Ý kiến của bạn về nội dung này?"></textarea>
            <button class="typearea-btnaddimg">
              <img src="/templates/home/images/svg/camera.svg" class="icon" alt="Video">
              <input type="hidden" value="" name="domain_post">
              <input type="hidden" value="" name="personal">
              <input type="file" class="buttonAddImage" id="gallery-photo-add" data-type="company" name="video" accept="video/*,  video/x-m4v, video/webm, video/x-ms-wmv, video/x-msvideo, video/3gpp, video/flv, video/x-flv, video/mp4, video/quicktime, video/mpeg, video/ogv, .ts, .mkv,image/*" multiple="true">
            </button>
          </div>
        </div>
        <div class="shareModal-addnewcomment-gallery" id="boxaddimagegallery">
        </div>
      </div>
      <div class="shareModal-contentwasshared">
        <div class="shareModal-uncollapse">
          <div class="shareModal-contentwasshared-header">
            <div class="header-nameuser">
              <div class="header-name">
                <div class="avata">
                  <img src="{{SHARE_SHOP_LOGO}}" alt="{{SHARE_SHOP_NAME}}" style="border-radius: 50%;">
                </div>
                <div class="title two-lines">
                  <a class="one-line title-nameuser" href="{{SHARE_SHOP_LINK}}">{{SHARE_SHOP_NAME}}</a>
                  <span>{{SHARE_DATE_NEWS}}</span>
                  <span class="numbersee"><img src="asset/images/svg/eye_gray.svg" width="16" alt="">{{SHARE_VIEW_NEWS}} <span class="md">lượt xem</span></span>
                </div>
              </div>
              <div class="header-right hidden-text">
                <div class="btn-friend-{{SHARE_USER_ID}} {{SHARE_CLASS_FRIEND}}" data-id="{{SHARE_USER_ID}}" data-name="{{SHARE_SHOP_NAME}}">
                  <div class="btn {{SHARE_CSS_FRIEND}}-{{SHARE_USER_ID}} {{SHARE_CSS_FRIEND}} show">
                    {{SHARE_FRIEND_STATUS}}
                  </div>
                </div>
              </div>
            </div>
            <div class="header-title">
                <a href="{{SHARE_NEWS_LINK}}" target="_blank">
                  {{SHARE_NEWS_CONTENT}}
                  <span class="seemore">
                      <strong>Xem tiếp</strong>
                  </span>
                </a>
            </div>
          </div>
          <div class="shareModal-contentwasshared-body">
            <div class="video">
              <!-- <img class="az-volume" src="asset/images/svg/icon-volume-off.svg" width="32" /> -->
                {{SHARE_NEWS_VIDEO}}
            </div>
            <div class="list-slider">
              <!-- <span class="pagingInfo button-gray" id="pagingInfo1"></span> -->
              <ul class="slider slider-for slider-img-share" id="slider-for_">
                {{SHARE_NEWS_SLIDER}}
              </ul>
            </div>
          </div>
          <div class="button-showmore hidden">
            <button class="text">Hiển thị chi tiết <i class="fa fa-angle-down"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal body -->
</script>

<script id="js-share-product" type="text/template">
  <!-- Modal Header -->
  <div class="modal-header shareModal-title">
    <div class="shareModal-title-content dropdown">
      <h4 class="modal-title" data-toggle="dropdown">Chia sẻ đến trang cộng đồng <i class="fa fa-angle-down"></i></h4>
    </div>
    <button type="button" class="close" data-dismiss="modal">×</button>
  </div>
 
  <!-- Modal body -->
  <div class="modal-body shareChangeContent" id="sharePost">
    <div class="shareModal-comment">
      <div class="shareModal-addnewcomment">
        <div class="shareModal-addnewcomment-typing">
          <div class="avata">
            <img src="<?php echo DOMAIN_CLOUDSERVER ?>media/images/avatar/{{SHARE_USER_LOGO}}" alt="{{SHARE_USER_NAME}}" style="border-radius: 50%;">
          </div>
          <div class="typearea">
            <textarea class="yourcomment" name="" id="" placeholder="Ý kiến của bạn về nội dung này?"></textarea>
            <button class="typearea-btnaddimg">
              <img src="/templates/home/images/svg/camera.svg" class="icon" alt="Video">
              <input type="hidden" value="" name="domain_post">
              <input type="hidden" value="" name="personal">
              <input type="file" class="buttonAddImage" id="gallery-photo-add" data-type="company" name="video" accept="video/*,  video/x-m4v, video/webm, video/x-ms-wmv, video/x-msvideo, video/3gpp, video/flv, video/x-flv, video/mp4, video/quicktime, video/mpeg, video/ogv, .ts, .mkv,image/*" multiple="true">
            </button>
          </div>
        </div>
        <div class="shareModal-addnewcomment-gallery" id="">
        </div>
      </div>
      <div class="shareModal-contentwasshared">
        <div class="shareModal-uncollapse">
          <div class="shareModal-contentwasshared-header">
            <div class="header-nameuser">
              <div class="header-name">
                <div class="avata">
                  <img src="{{SHARE_SHOP_LOGO}}" alt="{{SHARE_SHOP_NAME}}" style="border-radius: 50%;">
                </div>
                <div class="title two-lines">
                  <a class="one-line title-nameuser" href="{{SHARE_SHOP_LINK}}">{{SHARE_SHOP_NAME}}</a>
                  <span>{{SHARE_PRODUCT_CREATE}}</span>
                  <span class="numbersee"><img src="asset/images/svg/eye_gray.svg" width="16" alt="">{{SHARE_PRODUCT_VIEWS}} <span class="md">lượt xem</span></span>
                </div>
              </div>
              <div class="header-right hidden-text">
                <div class="btn btn-friend-{{SHARE_USER_ID}} {{SHARE_CLASS_FRIEND}}" data-id="{{SHARE_USER_ID}}">
                  <div class="{{SHARE_CSS_FRIEND}}-{{SHARE_USER_ID}} {{SHARE_CSS_FRIEND}} show">
                    {{SHARE_FRIEND_STATUS}}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="shareModal-contentwasshared-body">
            <div class="flash-sale flash-sale-content">
              <a href="#">
                <div class="img"><img src="{{SHARE_PRODUCT_IMG}}" alt="">
                  {{SHARE_PRODUCT_FLASHSALE}}
                </div>
                <div class="info">
                  <div class="settime-ctv">
                    <div class="settime">{{SHARE_PRODUCT_DATESALE}}</div>
                    <div class="ctv"><img src="/templates/home/styles/images/svg/CTV.svg" height="20" alt=""></div>
                  </div>                          
                  <p class="txt two-lines">{{SHARE_PRODUCT_NAME}}</p>
                  <div class="price">
                    <span class="dong">đ</span>
                    {{SHARE_PRODUCT_PRICE}}
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="button-showmore hidden">
            <button class="text">Hiển thị chi tiết <i class="fa fa-angle-down"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal body -->
</script>

<div class="box_fb">
  <div class="f_id" data-value="<?php echo FACEBOOK_ID; ?>"></div>
  <div class="f_secrect" data-value="<?php echo FACEBOOK_SERECT; ?>"></div>
</div>

<script src="/templates/home/styles/js/share/share.js"></script>
<script src="/templates/home/styles/js/share/popup-avatar-share.js"></script>

<div class="modal modalglobal" id="modalglobal" style="z-index: 1054;">
  <div class="modal-dialog modal-dialog-centered modal-dialog-sm slideInUp-animated">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="listfriends-content show-more-detail show-detail-user">
          <div class="block">
            <div class="detail">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>