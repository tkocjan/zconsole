<script>
$(document).ready(function(){
   var minDisk = 10;
   var maxDisk = 1000;
   var gbCost = 0.11;
   var revertFields = true;
   
    var jqDialog = $('#server_disk_properties');
    var jqSize = $('#disk_size_value');
    var jqCost = $('#disk_size_cost');
    var jqField = $('#server_disk_size');
    
    var jqSlider = $('#disk_size_slider').slider({
        orientation: "horizontal",
        min: minDisk,
        max: maxDisk,
        value: minDisk,
        //change: sliderChanged,
        slide: sliderMoved
    });
    
    function sliderMoved(event, ui){
        updateElements(ui.value);
    }
    
    function updateElements(diskSize) {
        jqSize.html(diskSize);
        jqCost.html((diskSize * gbCost).toFixed(2));
        jqField.val(diskSize);
    }
    
    function setSlider(diskSize) {
        jqSlider.slider("value", diskSize);
        updateElements(diskSize);
    }
    
    jqDialog.dialog({
        autoOpen: false,
        width: 640,
        modal: true,
        open: openDialog,
        close: closeDialog,
        buttons: {
            "Cancel": function(){jqDialog.dialog("close");},
            "Ok":  okDialog
        }
    });
    
    function openDialog() {
        revertFields = true;
        var diskSize = parseInt(jqField.val());
        
        setSlider(diskSize);
    }
    
    function okDialog(){
        var diskSize = parseInt(jqField.val());
        var diskCost = diskSize * gbCost;
        //change disk size & cost on create main page
        $('.disk_size_value_container').html(diskSize);
        $('.disk_size_cost_container').html(diskCost.toFixed(2));
        var serverCost = parseFloat($('.flavor_cost_container').html());    // gets first one like .eq(0)
        $('.total_server_cost').html( (serverCost + diskCost).toFixed(2) );
        
        jqField.data('inf-orig', diskSize);
        revertFields = false;
        jqDialog.dialog("close");        
    }

    function closeDialog(){
        console.log("revert="+revertFields);
        if (!revertFields)
            return;
        
        setSlider(jqField.data('inf-orig'));  // also sets jqField.val()
    }
});
</script>
