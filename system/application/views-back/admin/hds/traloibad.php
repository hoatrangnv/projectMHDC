<?php $this->load->view('admin/common/header'); ?>
<?php $this->load->view('admin/common/menu'); ?>
<link type="text/css" href="<?php echo base_url(); ?>templates/admin/css/datepicker.css" rel="stylesheet" />	
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>templates/admin/js/ajax.js"></script>

<tr>
    <td valign="top">
        <table width="100%" border="0" align="center" class="main" cellpadding="0" cellspacing="0">
            <tr>
                <td width="2"></td>
                <td width="10" class="left_main" valign="top"></td>
                <td align="center" valign="top">
                    <!--BEGIN: Main-->
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td height="10"></td>
                        </tr>
                        <tr>
                            <td>
                                <!--BEGIN: Item Menu-->
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td width="5%" height="67" class="item_menu_left">
                                            <a href="<?php echo base_url(); ?>administ/traloivipham">
                                            	<img src="<?php echo base_url(); ?>templates/admin/images/item_badads.gif" border="0" />
                                            </a>
                                        </td>
                                        <td width="40%" height="67" class="item_menu_middle">Hỏi đáp vi phạm</td>
                                        <td width="55%" height="67" class="item_menu_right">
                                            <div class="icon_item" id="icon_item_1" onclick="ActionDelete('frmBadAds')" onmouseover="ChangeStyleIconItem('icon_item_1',1)" onmouseout="ChangeStyleIconItem('icon_item_1',2)">
                                                <table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td align="center">
                                                            <img src="<?php echo base_url(); ?>templates/admin/images/icon_delete.png" border="0" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text_icon_item" nowrap="nowrap"><?php echo $this->lang->line('delete_tool'); ?></td>
                                                    </tr>
                                                </table>
                                            </div>                                            
                                        </td>
                                    </tr>
                                </table>
                                <!--END Item Menu-->
                            </td>
                        </tr>
                        <tr>
                            <td height="10"></td>
                        </tr>
                        <tr>
                            <td align="center">
                                <!--BEGIN: Search-->
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td width="160" align="left">
                                            <input type="text" name="keyword" id="keyword" value="<?php if($haveAdsBad == true){echo $keyword;} ?>" maxlength="100" class="input_search" onfocus="ChangeStyle('keyword',1)" onblur="ChangeStyle('keyword',2)" onKeyPress="return SummitEnTerAdmin(this,event,'<?php echo base_url(); ?>administ/traloivipham/search/title/keyword/','keyword')"  />
                                        </td>
                                        <td width="120" align="left">
                                            <select name="search" id="search" onchange="ActionSearch('<?php echo base_url(); ?>administ/traloivipham/',1)" class="select_search">
                                               <!-- <option value="0"><?php //echo $this->lang->line('search_by_search'); ?></option>-->
                                                <option value="title"><?php echo $this->lang->line('title_search_bad'); ?></option>
                                                
                                            </select>
                                        </td>
                                        <td align="left">
                                            <img src="<?php echo base_url(); ?>templates/admin/images/icon_search.gif" border="0" style="cursor:pointer;" onclick="ActionSearch('<?php echo base_url(); ?>administ/traloivipham/',1)" alt="<?php echo $this->lang->line('search_tip'); ?>" />
                                        </td>
                                        <!---->
                                        <td width="115" align="left">
                                            <?php /*?><select name="filter" id="filter" onchange="ActionSearch('<?php echo base_url(); ?>administ/traloivipham/',2)" class="select_search">
                                                <option value="0"><?php echo $this->lang->line('filter_by_search'); ?></option>
                                                <option value="begindate"><?php echo $this->lang->line('begindate_search'); ?></option>
                                                <option value="enddate"><?php echo $this->lang->line('enddate_search'); ?></option>
                                                <option value="active"><?php echo $this->lang->line('active_search'); ?></option>
                                                <option value="deactive"><?php echo $this->lang->line('deactive_search'); ?></option>
                                            </select><?php */?>
                                        </td>
                                        <td id="DivDateSearch_1" width="10" align="center"><b>:</b></td>
                                        <td id="DivDateSearch_2" width="60" align="left">
                                            <select name="day" id="day" class="select_datesearch">
                                                <option value="0"><?php echo $this->lang->line('day_search'); ?></option>
                                                <?php $this->load->view('admin/common/day'); ?>
                                            </select>
                                        </td>
                                        <td id="DivDateSearch_3" width="10" align="center"><b>-</b></td>
                                        <td id="DivDateSearch_4" width="60" align="left">
                                            <select name="month" id="month" class="select_datesearch">
                                                <option value="0"><?php echo $this->lang->line('month_search'); ?></option>
                                                <?php $this->load->view('admin/common/month'); ?>
                                            </select>
                                        </td>
                                        <td id="DivDateSearch_5" width="10" align="center"><b>-</b></td>
                                        <td id="DivDateSearch_6" width="60" align="left">
                                            <select name="year" id="year" class="select_datesearch">
                                                <option value="0"><?php echo $this->lang->line('year_search'); ?></option>
                                                <?php $this->load->view('admin/common/year'); ?>
                                            </select>
                                        </td>
                                        <script>OpenTabSearch('0',0);</script>
                                        <td width="25" align="right">
                                           <?php /*?> <img src="<?php echo base_url(); ?>templates/admin/images/icon_search.gif" border="0" style="cursor:pointer;" onclick="ActionSearch('<?php echo base_url(); ?>administ/traloivipham/',2)" alt="<?php echo $this->lang->line('filter_tip'); ?>" /><?php */?>
                                        </td>
                                    </tr>
                                </table>
                                <!--END Search-->
                            </td>
                        </tr>
                        <tr>
                            <td height="5"></td>
                        </tr>
                        <form name="frmBadAds" method="post">
                        <tr>
                            <td>
                                <!--BEGIN: Content-->
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <?php if($haveAdsBad == true){ ?>
                                    <tr>
                                        <td  class="title_list">STT</td>   
                                          <td class="title_list" width="250">
                                           Câu trả lời
                                        </td>
                                                                          
                                        <td class="title_list">
                                            <?php echo $this->lang->line('title_list'); ?>
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_asc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>title/by/asc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_desc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>title/by/desc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                        </td>
                                    
                                         <td width="115" class="title_list">
                                            <?php echo $this->lang->line('poster_list'); ?>
                                            
                                        </td>
                                    
                                        <td width="60" class="title_list">
                                            <?php echo $this->lang->line('begindate_list'); ?>
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_asc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>begindate/by/asc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_desc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>begindate/by/desc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                        </td>
                                  
                                        <td width="60" class="title_list">

                                           User gởi
                                        </td>
                                        <td width="60" class="title_list">
                                           Ngày gởi
                                        </td>
                                         <td width="60" class="title_list">
                                          Xóa
                                        </td>
                                        
                                        
                                    </tr>
                                    <!---->
                              
                                    <?php $idDiv = 1; ?>
                                                                        
                                    <?php foreach($ads as $adsArray){ ?>                                 
                                    <tr style="background:#<?php if($idDiv % 2 == 0){echo 'F7F7F7';}else{echo 'FFF';} ?>;" id="DivRow_<?php echo $idDiv; ?>" onmouseover="ChangeStyleRow('DivRow_<?php echo $idDiv; ?>',<?php echo $idDiv; ?>,1)" onmouseout="ChangeStyleRow('DivRow_<?php echo $idDiv; ?>',<?php echo $idDiv; ?>,2)">
                                        <td class="detail_list" style="text-align:center;"><b><?php echo $sTT++; ?></b></td>
                                        <td class="detail_list">
                                            <a class="menu" href="<?php echo base_url(); ?>hoidap/<?php echo $adsArray->hds_category; ?>/<?php echo $adsArray->hds_id; ?>/<?php echo RemoveSign($adsArray->hds_title); ?>" target="_blank" alt="<?php echo $this->lang->line('view_tip'); ?>">
                                                
                                                <?php $vowels = array("&curren;");
						
						 						echo cut_string_unicodeutf8(htmlspecialchars_decode(html_entity_decode(str_replace($vowels,"#",$adsArray->answers_content))),200); ?>
                                            </a>                                          
                                        </td> 
                                        
                                       <td class="detail_list">
                                            <a class="menu" href="<?php echo base_url(); ?>hoidap/<?php echo $adsArray->hds_category; ?>/<?php echo $adsArray->hds_id; ?>/<?php echo RemoveSign($adsArray->hds_title); ?>" target="_blank" alt="<?php echo $this->lang->line('view_tip'); ?>">
                                                <?php echo $adsArray->hds_title; ?>
                                            </a>                                          
                                        </td>                                  
                                        <td class="detail_list">   
                                         <a href="<?php echo base_url()?>user/profile/<?php echo $adsArray->hds_user; ?>" target="_blank">                                         
                                               <?php echo Counter_model::getUSerIdNameToID($adsArray->hds_user); ?>
                                               </a>
                                                                                     
                                        </td>
                                      
                                        <td class="detail_list" style="text-align:center;"><b><?php echo $adsArray->up_date; ?></b></td>
                                       
                                         <td class="detail_list" style="text-align:center;" >
                                        
                                        <a href="<?php echo base_url()?>user/profile/<?php echo $adsArray->adb_user_id; ?>" target="_blank">
                                        	  <?php echo Counter_model::getUSerIdNameToID($adsArray->adb_user_id); ?>
                                              </a>
                                        </td>
                                        <td class="detail_list" style="text-align:center">
                                      	<b>
                                        	<?php echo date('d-m-Y', $adsArray->adb_date); ?>
                                        </b>
                                        </td>
                                         <td class="detail_list" style="text-align:center;">
                                        <a href="<?php echo base_url(); ?>administ/traloivipham/delete/<?php echo $adsArray->adb_id;  ?>/<?php echo $adsArray->answers_id;  ?>">
                                           <img  src="<?php echo base_url(); ?>templates/home/images/icon_remove_small1.gif" />
                                           </a>
                                        </td>
                                        
                                    </tr>
                                    <?php $idDiv++; ?>
                                    <?php } ?>
                                    <!---->
                                    <tr>
                                        <td class="show_page" colspan="9"><?php echo $linkPage; ?></td>
                                    </tr>
                                    <?php }else{ ?>
                                    <tr>
                                        <td width="25" class="title_list">STT</td>
                                        <td width="20" class="title_list">
                                            <input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'frmBadAds',0)" />
                                        </td>
                                        <td class="title_list">
                                            <?php echo $this->lang->line('title_list'); ?>
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_asc.gif" style="cursor:pointer;" border="0" />
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_desc.gif" style="cursor:pointer;" border="0" />
                                        </td>
                                        <td width="100" class="title_list">
                                            <?php echo $this->lang->line('place_ads_list'); ?>
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_asc.gif" style="cursor:pointer;" border="0" />
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_desc.gif" style="cursor:pointer;" border="0" />
                                        </td>
                                         <td width="115" class="title_list">
                                            <?php echo $this->lang->line('poster_list'); ?>
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_asc.gif" style="cursor:pointer;" border="0" />
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_desc.gif" style="cursor:pointer;" border="0" />
                                        </td>
                                        <td width="120" class="title_list">
                                            <?php echo $this->lang->line('category_list'); ?>
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_asc.gif" style="cursor:pointer;" border="0" />
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_desc.gif" style="cursor:pointer;" border="0" />
                                        </td>
                                        <td width="60" class="title_list">
                                            <?php echo $this->lang->line('status_list'); ?>
                                        </td>
                                        <td width="125" class="title_list">
                                            <?php echo $this->lang->line('begindate_list'); ?>
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_asc.gif" style="cursor:pointer;" border="0" />
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_desc.gif" style="cursor:pointer;" border="0" />
                                        </td>
                                        <td width="125" class="title_list">
                                            <?php echo $this->lang->line('enddate_list'); ?>
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_asc.gif" style="cursor:pointer;" border="0" />
                                            <img src="<?php echo base_url(); ?>templates/admin/images/sort_desc.gif" style="cursor:pointer;" border="0" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="show_page" colspan="9"></td>
                                    </tr>
                                    <?php } ?>
                                </table>
                                <!--END Content-->
                            </td>
                        </tr>
                        </form>
                    </table>
                    <!--END Main-->
                </td>
                <td width="10" class="right_main" valign="top"></td>
                <td width="2"></td>
            </tr>
            <tr>
                <td width="2" height="11"></td>
                <td width="10" height="11" class="corner_lb_main" valign="top"></td>
                <td height="11" class="middle_bottom_main"></td>
                <td width="10" height="11" class="corner_rb_main" valign="top"></td>
                <td width="2" height="11"></td>
            </tr>
        </table>
    </td>
</tr>
<?php $this->load->view('admin/common/footer'); ?>