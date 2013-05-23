        <div id="server_disk_properties">
            <table class="disk_size_container full_width">
                <tbody><tr>
                        <td class="server_disk_details_td" type="none">
                            <div class="server_disk_details ui-widget-content ui-corner-all">
                                <div style="width: 100%; height: 100%;">
                                    <div class="disk_title">
                                        <input class="disk_size_input auto_resize_field filtered" 
                                               id="server_disk_size" name="server[disk_size]" 
                                               size="30" value="10" type="text">
                                        <a href="#" class="disk_size_input_toggler"><span id="disk_size_value" class="disk_size_value">10</span> GB <img alt="Pencil" src="<?=$app_path?>/images/fff-icons/pencil.png?1354120685"></a>
                                    </div>
                                    <div class="disk_image">
                                        &nbsp;
                                        <img alt="Hard_drive_82px" src="<?=$app_path?>/images/hard_drive_82px.png?1354120685" valign="middle">
                                        &nbsp;
                                    </div>
                                    <div class="disk_details">
                                        <big>$<span data-gb-price="0.11" id="disk_size_cost" class="disk_size_cost" 
                                                    data-component-cost="true">1.10</span></big>
                                        /month
                                    </div>
                                </div>
                            </div>
                        </td>
                        <!-- / %td{:valign => "middle", :style => "width: 16px;"}= image_tag "fff-icons/drive.png" -->
                        <td valign="top">
                            <div class="disk_size_slider_container" style="font-size: 12px; margin-top: 16px;">
                                <img alt="Hd_slider" src="<?=$app_path?>/images/hd_slider.png">
                                <div id="disk_size_slider" class="disk_size_slider" data-slider-min="10" data-value-from="disk_size"></div>
                            </div>
                            <div style="display:none; margin-top: 16px; color: green; font-size: 11px; 
                                margin-left: 16px; text-align: center; width: 350px;">
                                <span class="os_free_tier"><span class="cpu_free_tier">
                                    <span class="disk_size_free_tier"><span style="color: green">
                                        <img alt="" src="<?=$app_path?>/images/fff-icons/accept.png?" valign="bottom"> 
                                            Free Tier Eligible</span> 
                                        <a href="http://wiki.bitnami.org/BitNami_Cloud_Hosting/FAQ#Why_AWS_Free_Tier_servers_still_show_as_charges_in_the_BCH_console" 
                                           target="_blank">more info</a>
                                     </span></span></span></div>
                        </td>
                        <!-- / %td{:valign => "middle", :style => "width: 24px;"}= image_tag "fff-icons/drive-large.png" -->
                    </tr>
                </tbody></table>

        </div>
<?php include('CreateDiskDialog.js.php');?>
