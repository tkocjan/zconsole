        <div id="server_os_properties" title="Operating System">
                <table class="component_selector_container" style="width: 100%;">
                    <tbody><tr>
                            <td class="server_component_details_td" valign="top">
                                <div class="ui-widget-content ui-corner-all">
                                    <div class="server_component_details ui-corner-all" data-component-id="56"><div class="server_component_title">Ubuntu Linux</div><div class="server_component_image">&nbsp;<img alt="Component-ubuntu" src="<?=$app_path?>/images/logo-target/component-ubuntu.png?1354120685">&nbsp; &nbsp;</div><div class="server_component_subtitle"><big>12.04 LTS 64bits</big></div></div>
                                    <div class="server_component_details ui-corner-all" data-component-id="57" style="display:none;"><div class="server_component_title">Ubuntu Linux</div><div class="server_component_image">&nbsp;<img alt="Component-ubuntu" src="<?=$app_path?>/images/logo-target/component-ubuntu.png?1354120685">&nbsp; &nbsp;</div><div class="server_component_subtitle"><big>12.04 LTS 32bits</big></div></div>
                                    <div class="server_component_details ui-corner-all" data-component-id="58" style="display:none;"><div class="server_component_title">Ubuntu Linux</div><div class="server_component_image">&nbsp;<img alt="Component-ubuntu" src="<?=$app_path?>/images/logo-target/component-ubuntu.png?1354120685">&nbsp; &nbsp;</div><div class="server_component_subtitle"><big>10.04 LTS 64bits</big></div></div>
                                    <div class="server_component_details ui-corner-all" data-component-id="59" style="display:none;"><div class="server_component_title">Ubuntu Linux</div><div class="server_component_image">&nbsp;<img alt="Component-ubuntu" src="<?=$app_path?>/images/logo-target/component-ubuntu.png?1354120685">&nbsp; &nbsp;</div><div class="server_component_subtitle"><big>10.04 LTS 32bits</big></div></div>
                                    <div class="server_component_details ui-corner-all" data-component-id="27" style="display:none;"><div class="server_component_title">Fedora Linux</div><div class="server_component_image">&nbsp;<img alt="Component-fedora" src="<?=$app_path?>/images/logo-target/component-fedora.png?1354120685">&nbsp; &nbsp;</div><div class="server_component_subtitle"><big>14  64bits</big></div></div>
                                    <div class="server_component_details ui-corner-all" data-component-id="26" style="display:none;"><div class="server_component_title">Fedora Linux</div><div class="server_component_image">&nbsp;<img alt="Component-fedora" src="<?=$app_path?>/images/logo-target/component-fedora.png?1354120685">&nbsp; &nbsp;</div><div class="server_component_subtitle"><big>14  32bits</big></div></div>
                                    <div class="server_component_details ui-corner-all" data-component-id="54" style="display:none;"><div class="server_component_title">RedHat Linux</div><div class="server_component_image">&nbsp;<img alt="Component-redhat" src="<?=$app_path?>/images/logo-target/component-redhat.png?1354120685">&nbsp; &nbsp;</div><div class="server_component_subtitle"><big>6.3 Enterprise 64bits</big></div></div>
                                    <div class="server_component_details ui-corner-all" data-component-id="55" style="display:none;"><div class="server_component_title">RedHat Linux</div><div class="server_component_image">&nbsp;<img alt="Component-redhat" src="<?=$app_path?>/images/logo-target/component-redhat.png?1354120685">&nbsp; &nbsp;</div><div class="server_component_subtitle"><big>6.3 Enterprise 32bits</big></div></div>
                                    <div class="server_component_details ui-corner-all" data-component-id="52" style="display:none;"><div class="server_component_title">Amazon Linux</div><div class="server_component_image">&nbsp;<img alt="Component-amazon" src="<?=$app_path?>/images/logo-target/component-amazon.png?1354120685">&nbsp; &nbsp;</div><div class="server_component_subtitle"><big>2012.09.0  64bits</big></div></div>
                                    <div class="server_component_details ui-corner-all" data-component-id="53" style="display:none;"><div class="server_component_title">Amazon Linux</div><div class="server_component_image">&nbsp;<img alt="Component-amazon" src="<?=$app_path?>/images/logo-target/component-amazon.png?1354120685">&nbsp; &nbsp;</div><div class="server_component_subtitle"><big>2012.09.0  32bits</big></div></div>
                                </div>
                            </td>
                            <td style="padding-top:10px; padding-left:20px; padding-right: 10px;" valign="top">
                                <ul type="none">
                                    <li>
                                        Architecture
                                        <input class="server_image_selector_bits" data-popup-id="image_bits_32" 
                                               id="bits_32" name="image[bits]" value="32" type="radio">
                                        <label for="image_bits_32">32 bits</label>
                                        <input checked="checked" class="server_image_selector_bits" 
                                               data-popup-id="image_bits_64" id="bits_64" 
                                               name="image[bits]" value="64" type="radio">
                                        <label for="image_bits_64">64 bits</label>
                                        &nbsp;
                                        <img data-tooltip-added="true" alt="?" class="tooltip_icon" src="<?=$app_path?>/images/fff-icons/help.png?1354120685" title="Please note that the selected architecture will affect the available server types in future resizes.">
                                    </li>
                                </ul>
                                <ul type="none">
                                    <li class="64_bits os_selected server_image_selector_item">
                                        <input checked="checked" class="server_image_selector" data-image-bits="64" data-image-default-disk="10" data-image-disk="10" data-image-flavor-version="12.04" data-image-flavor="ubuntu" data-image-revision="14" data-image-used-disk="2.4" data-platform-flavor="linux" data-validate="true" id="server_base_image_id_56" name="server[base_image_id]" style="width: auto !important;" value="56" type="radio">
                                        <span class="radio_toggler">
                                            <img alt="Os-ubuntu" src="<?=$app_path?>/images/icons/os-ubuntu.gif?1354120685" title="Ubuntu Linux 12.04 LTS 64bits" align="absmiddle">  Ubuntu Linux 12.04 LTS
                                        </span>
                                    </li>
                                    <li class="32_bits server_image_selector_item" style="display:none">
                                        <input class="server_image_selector" data-image-bits="32" data-image-default-disk="10" data-image-disk="10" data-image-flavor-version="12.04" data-image-flavor="ubuntu" data-image-revision="14" data-image-used-disk="2.4" data-platform-flavor="linux" data-validate="true" id="server_base_image_id_57" name="server[base_image_id]" style="width: auto !important;" value="57" type="radio">
                                        <span class="radio_toggler">
                                            <img alt="Os-ubuntu" src="<?=$app_path?>/images/icons/os-ubuntu.gif?1354120685" title="Ubuntu Linux 12.04 LTS 32bits" align="absmiddle">  Ubuntu Linux 12.04 LTS
                                        </span>
                                    </li>
                                    <li class="64_bits server_image_selector_item">
                                        <input class="server_image_selector" data-image-bits="64" data-image-default-disk="10" data-image-disk="10" data-image-flavor-version="10.04" data-image-flavor="ubuntu" data-image-revision="14" data-image-used-disk="2.4" data-platform-flavor="linux" data-validate="true" id="server_base_image_id_58" name="server[base_image_id]" style="width: auto !important;" value="58" type="radio">
                                        <span class="radio_toggler">
                                            <img alt="Os-ubuntu" src="<?=$app_path?>/images/icons/os-ubuntu.gif?1354120685" title="Ubuntu Linux 10.04 LTS 64bits" align="absmiddle">  Ubuntu Linux 10.04 LTS
                                        </span>
                                    </li>
                                    <li class="32_bits server_image_selector_item" style="display:none">
                                        <input class="server_image_selector" data-image-bits="32" data-image-default-disk="10" data-image-disk="10" data-image-flavor-version="10.04" data-image-flavor="ubuntu" data-image-revision="14" data-image-used-disk="2.4" data-platform-flavor="linux" data-validate="true" id="server_base_image_id_59" name="server[base_image_id]" style="width: auto !important;" value="59" type="radio">
                                        <span class="radio_toggler">
                                            <img alt="Os-ubuntu" src="<?=$app_path?>/images/icons/os-ubuntu.gif?1354120685" title="Ubuntu Linux 10.04 LTS 32bits" align="absmiddle">  Ubuntu Linux 10.04 LTS
                                        </span>
                                    </li>
                                    <li class="64_bits server_image_selector_item">
                                        <input class="server_image_selector" data-image-bits="64" data-image-default-disk="10" data-image-disk="3" data-image-flavor-version="14" data-image-flavor="fedora" data-image-revision="7" data-image-used-disk="2.0" data-platform-flavor="linux" data-validate="true" id="server_base_image_id_27" name="server[base_image_id]" style="width: auto !important;" value="27" type="radio">
                                        <span class="radio_toggler">
                                            <img alt="Os-fedora" src="<?=$app_path?>/images/icons/os-fedora.gif?1354120685" title="Fedora Linux 14  64bits" align="absmiddle">  Fedora Linux 14 
                                            <span style="color:gray; font-weight: normal;">
                                                beta
                                            </span>
                                        </span>
                                    </li>
                                    <li class="32_bits server_image_selector_item" style="display:none">
                                        <input class="server_image_selector" data-image-bits="32" data-image-default-disk="10" data-image-disk="3" data-image-flavor-version="14" data-image-flavor="fedora" data-image-revision="7" data-image-used-disk="1.9" data-platform-flavor="linux" data-validate="true" id="server_base_image_id_26" name="server[base_image_id]" style="width: auto !important;" value="26" type="radio">
                                        <span class="radio_toggler">
                                            <img alt="Os-fedora" src="<?=$app_path?>/images/icons/os-fedora.gif?1354120685" title="Fedora Linux 14  32bits" align="absmiddle">  Fedora Linux 14 
                                            <span style="color:gray; font-weight: normal;">
                                                beta
                                            </span>
                                        </span>
                                    </li>
                                    <li class="64_bits server_image_selector_item">
                                        <input class="server_image_selector" data-image-bits="64" data-image-default-disk="10" data-image-disk="10" data-image-flavor-version="6.3" data-image-flavor="redhat" data-image-revision="14" data-image-used-disk="2.2" data-platform-flavor="redhat" data-validate="true" id="server_base_image_id_54" name="server[base_image_id]" style="width: auto !important;" value="54" type="radio">
                                        <span class="radio_toggler">
                                            <img alt="Os-redhat" src="<?=$app_path?>/images/icons/os-redhat.gif?1354120685" title="RedHat Enterprise Linux 6.3 64bits" align="absmiddle">  RedHat Enterprise Linux 6.3
                                            <span style="color:gray;">
                                                native
                                                <img data-tooltip-added="true" alt="Information" class="tooltip_icon " src="<?=$app_path?>/images/fff-icons/information.png?1354120685" title="The native RedHat LAMP stack will be used. Only PHP applications can be added if you select this Operating System." align="absmiddle">
                                            </span>
                                        </span>
                                    </li>
                                    <li class="32_bits server_image_selector_item" style="display:none">
                                        <input class="server_image_selector" data-image-bits="32" data-image-default-disk="10" data-image-disk="10" data-image-flavor-version="6.3" data-image-flavor="redhat" data-image-revision="14" data-image-used-disk="2.0" data-platform-flavor="redhat" data-validate="true" id="server_base_image_id_55" name="server[base_image_id]" style="width: auto !important;" value="55" type="radio">
                                        <span class="radio_toggler">
                                            <img alt="Os-redhat" src="<?=$app_path?>/images/icons/os-redhat.gif?1354120685" title="RedHat Enterprise Linux 6.3 32bits" align="absmiddle">  RedHat Enterprise Linux 6.3
                                            <span style="color:gray;">
                                                native
                                                <img data-tooltip-added="true" alt="Information" class="tooltip_icon " src="<?=$app_path?>/images/fff-icons/information.png?1354120685" title="The native RedHat LAMP stack will be used. Only PHP applications can be added if you select this Operating System." align="absmiddle">
                                            </span>
                                        </span>
                                    </li>
                                    <li class="64_bits server_image_selector_item">
                                        <input class="server_image_selector" data-image-bits="64" data-image-default-disk="10" data-image-disk="10" data-image-flavor-version="2012.09.0" data-image-flavor="amazon" data-image-revision="14" data-image-used-disk="1.6" data-platform-flavor="linux" data-validate="true" id="server_base_image_id_52" name="server[base_image_id]" style="width: auto !important;" value="52" type="radio">
                                        <span class="radio_toggler">
                                            <img alt="Amazon_icon_20x20" src="<?=$app_path?>/images/icons/amazon_icon_20x20.gif?1354120685" title="Amazon Linux 2012.09.0  64bits" align="absmiddle">  Amazon Linux 2012.09.0 
                                            <span style="color:gray;">
                                                native
                                                <img data-tooltip-added="true" alt="Information" class="tooltip_icon " src="<?=$app_path?>/images/fff-icons/information.png?1354120685" title="The native Amazon LAMP stack will be used. Only PHP applications can be added if you select this Operating System." align="absmiddle">
                                            </span>
                                        </span>
                                    </li>
                                    <li class="32_bits server_image_selector_item" style="display:none">
                                        <input class="server_image_selector" data-image-bits="32" data-image-default-disk="10" data-image-disk="10" data-image-flavor-version="2012.09.0" data-image-flavor="amazon" data-image-revision="14" data-image-used-disk="1.5" data-platform-flavor="linux" data-validate="true" id="server_base_image_id_53" name="server[base_image_id]" style="width: auto !important;" value="53" type="radio">
                                        <span class="radio_toggler">
                                            <img alt="Amazon_icon_20x20" src="<?=$app_path?>/images/icons/amazon_icon_20x20.gif?1354120685" title="Amazon Linux 2012.09.0  32bits" align="absmiddle">  Amazon Linux 2012.09.0 
                                            <span style="color:gray;">
                                                native
                                                <img data-tooltip-added="true" alt="Information" class="tooltip_icon " src="<?=$app_path?>/images/fff-icons/information.png?1354120685" title="The native Amazon LAMP stack will be used. Only PHP applications can be added if you select this Operating System." align="absmiddle">
                                            </span>
                                        </span>
                                    </li>
                                </ul>
                            </td>
                            <td style="padding-bottom:10px; font-size:11px;" valign="bottom">
                                <a href="http://wiki.bitnami.org/BitNami_Cloud_Hosting/Base_stack" target="_blank" title="Check revision components">rev. <span class="image_revision">14</span></a>
                            </td>
                        </tr>
                    </tbody></table>

        </div>
<?php include('CreateOSDialog.js.php');?>
