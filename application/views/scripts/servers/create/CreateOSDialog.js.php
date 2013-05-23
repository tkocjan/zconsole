<script>
$(document).ready(function(){
    var osRevert = true;    
    
    var jqOSDialog = $('#server_os_properties').dialog({
        autoOpen: false,
        width: 640,
        modal: true,
        buttons: {
            "Cancel": function(){$(this).dialog("close");},
            "Ok":  osOk
        },
        open: function(){osRevert = true;},
        close: osClose
    });

    function osClose(){
        console.log("revert="+osRevert);
        if (!osRevert)
            return;
        
        //reverting
        $(':radio', jqOSDialog).each(function(){
            if ( $(this).data('inf-orig') )
                $(this).click();
        });
    }
    
    function osOk(){
        $(':radio', jqOSDialog).each(function(){
            $(this).data('inf-orig', this.checked);      // or $(this).is(':checked')
            console.log("name="+this.name+" "+this.checked);
        });
        osRevert = false;
        
        //change logo on create main page
        var code = $('.server_image_selector:checked', jqOSDialog).val();
        $('.os_toggled_content').hide()
            .filter('[data-base_image_id="'+code+'"]').show();
        
        jqOSDialog.dialog("close");
    }

    var jqClass32 = $('.32_bits');
    var jqClass64 = $('.64_bits');
    var jqRadioOS = $('.server_image_selector');

    $('#bits_32').on('click', function(){
        var jqSelRadioOS =  jqRadioOS.filter(':checked');
        console.log(jqSelRadioOS);
        console.log(jqSelRadioOS[0]);
        if (jqSelRadioOS.attr('data-image-bits') == '32')
            return;
        jqClass64.hide();
        jqClass32.css('display', 'list-item');
        // set the corresponding 32 bit one
        jqRadioOS.filter(
            '[data-image-flavor="'+jqSelRadioOS.attr('data-image-flavor')+'"]' +
            '[data-image-flavor-version="'+jqSelRadioOS.attr('data-image-flavor-version')+'"]' +
            '[data-image-bits="32"]')
            .click();
    });

    $('#bits_64').on('click', function(){
        var jqSelRadioOS =  jqRadioOS.filter(':checked');
        if (jqSelRadioOS.attr('data-image-bits') == '64')
            return;
        jqClass32.hide();
        jqClass64.css('display', 'list-item');
        // set the corresponding 64 bit one
        jqRadioOS.filter(
            '[data-image-flavor="'+jqSelRadioOS.attr('data-image-flavor')+'"]' +
            '[data-image-flavor-version="'+jqSelRadioOS.attr('data-image-flavor-version')+'"]' +
            '[data-image-bits="64"]')
            .click();            
    });

    jqRadioOS.on('click', function(){
        $('.server_image_selector_item').removeClass('os_selected');
        $(this).parent().addClass('os_selected');
        var jqDetails = $('.server_component_details').hide();
        var sel = jqDetails.filter('[data-component-id="'+$(this).val()+'"]');
        console.log(sel[0]);
        sel.show();
    });
});

</script>
