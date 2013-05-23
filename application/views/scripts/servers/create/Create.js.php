<script>
$(document).ready(function(){
    //get defaults
    $(':input').each(function(){
        $(this).data('inf-orig', this.value);
        //console.log(this);
        //console.log(this.name+'='+$(this).data('inf-orig')+','+$(this).attr('value') );
    });        
    $(':checkbox, :radio, option').data('inf-orig', false);
    $(':checked').data('inf-orig', true);
    
    //for each image that pops up dialog, set the onclick
    $('a.ui-popup').on('click', function () {
        var jqDialog = $(this.getAttribute('data-content-selector'));
        if ( jqDialog.is(':data(dialog)') ) {    // if dialog created
            //tooltips removes title from <a> tag, get it from aria-describedby
            jqDialog.dialog('option', 'title', $('#'+this.getAttribute('aria-describedby')).text() );
            jqDialog.dialog('open');
        }
        else {
            console.log('Dialog not created: element below');
            console.log(jqDialog[0]);
        }
    });
    
    $('#default_application_properties').dialog({
        autoOpen: false,
        width: 600,
        modal: true,
        buttons: {
            "Cancel": function(){$(this).dialog("close");},
            "Ok":  function(){$(this).dialog("close");}
        }
    });
    
    $('#runtime_properties').dialog({
        autoOpen: false,
        width: 760,
        modal: true,
        buttons: {
            "Cancel": function(){$(this).dialog("close");},
            "Ok":  function(){$(this).dialog("close");}
        }
    });
    
    $('#app_selector').dialog({
        autoOpen: false,
        width: 700,
        modal: true,
        buttons: {
            "Cancel": function(){$(this).dialog("close");},
            "Ok":  function(){$(this).dialog("close");}
        }
    });
    
    $('#cloud_account_properties').dialog({
        autoOpen: false,
        width: 400,
        modal: true,
        buttons: {
            "Cancel": function(){$(this).dialog("close");},
            "Ok":  function(){$(this).dialog("close");}
        }
    });
    
    $('#cloud_region_properties').dialog({
        autoOpen: false,
        width: 400,
        modal: true,
        buttons: {
            "Cancel": function(){$(this).dialog("close");},
            "Ok":  function(){$(this).dialog("close");}
        }
    });
    
    $('#cloud_ip_properties').dialog({
        autoOpen: false,
        width: 400,
        modal: true,
        buttons: {
            "Cancel": function(){$(this).dialog("close");},
            "Ok":  function(){$(this).dialog("close");}
        }
    });
});
</script>
    