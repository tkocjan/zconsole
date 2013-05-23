<script>
$(document).ready(function(){
    var revertFields = true;
    
    var serverTypes = <?=$viewData->serverTypesJS?>;
    console.log(serverTypes);

    var jqDialog = $('#server_flavor_properties');
    var jqToggle = $('.server_flavor_details, .server_flavor_explanation, .server_flavor_power');
    var jqFlavor = $('#server_flavor_id');
    
    var jqSlider = $('#flavor_slider').slider({
        orientation: "horizontal",
        min: 0,
        max: serverTypes.length - 1,
        value: 0,
        //change: sliderChanged,
        slide: sliderMoved
    });
    
    //jqSlider.on('slideslide', slideSlide);
    function sliderMoved(event, ui){
        var codeName = serverTypes[ui.value].codeName;
        console.log('slider changed: codeName ='+codeName);
        selectServer(codeName);
        //console.log(jqSlider.slider('value')); //value not updated yet in slide callback!
    }
    
    function selectServer(codeName) {
        jqToggle.hide().filter('[data-flavor-id="'+codeName+'"]').show();
        jqFlavor.val(codeName);
    }
    
    function setSlider(codeName) {
        $.each(serverTypes, function(index, serverType){
            if (serverType.codeName == codeName) {
                console.log('index='+index);
                jqSlider.slider( "value",  index);
                selectServer(codeName);
                return false;
            }
        });        
    }

    jqDialog.dialog({
        autoOpen: false,
        width: 640,
        modal: true,
        buttons: {
            "Cancel": function(){ jqDialog.dialog("close"); },
            "Ok":  okDialog
        },
        open: openDialog,
        close: closeDialog
    });
    
    function openDialog(){
        revertFields = true;
        var curCodeName = jqFlavor.val();
        console.log('setting: codeName='+curCodeName);
        setSlider(curCodeName);
    }
    
    function okDialog(){
        console.log("slider('value')="+jqSlider.slider("value") );
        var codeName = jqFlavor.val();
        //change server type on create main page
        $('.flavor_toggled_content').hide()
            .filter('[data-flavor_id="'+codeName+'"]').show();
        var serverCost = parseFloat(serverTypes[jqSlider.slider("value")].serverCost);
        $('.flavor_cost_container').html(serverCost);
        var diskCost = parseFloat($('.disk_size_cost_container').html());    // gets first one like .eq(0)
        $('.total_server_cost').html( (serverCost + diskCost).toFixed(2) );

        jqFlavor.data('inf-orig', codeName);
        revertFields = false;
        jqDialog.dialog("close");        
    }

    function closeDialog(){
        console.log("revert="+revertFields);
        if (!revertFields)
            return;
        
        //reverting
        console.log("old="+jqFlavor.data('inf-orig'));
        setSlider(jqFlavor.data('inf-orig'));  // also sets jqFlavor.val()
    }
});
</script>
