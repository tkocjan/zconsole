<script>
$(document).ready(function(){
    var cancelCreate = false;
    $('a[data-operation="cancel"]').button({ icons: {secondary: "ui-icon-cancel-color"} })
        .on('click', function(){
           cancelCreate = true;
           var cancelElement = this; 
           $('#CancelDialog').dialog({
                width: 400,
                modal: true,
                buttons: {
                    "Cancel": function() { $(this).dialog("destroy"); },
                    "OK": function () {
                        $(this).dialog("destroy");
                        location.assign(cancelElement.href);
                    }
                }
           }); 
           return false;    //don't do href
        });
    
    $('a[data-operation="build_and_launch"]').button({ icons: {secondary: "ui-icon-launch-color"} })
        .on('click', waitCheckName );

    var secs=0, maxSecs=10;
    function waitCheckName(){
        //if (!jqForm.dialog("isOpen")) { // causes exception... which is kind of ok
        //if form destroyed
        if ( cancelCreate ) {
            secs=0;
            cancelCreate = false;
            return;
        }
        //jqForm.dialog("disable");
        //if done loading
        if (!jqFields.hasClass(loadingClassName)) {
            secs=0;
            checkNamesAndCreate();
            return;
        }
        secs++;

        //if max reached
        if (secs >= maxSecs) {
            secs=0;
            alert("waitCheckName: Timed out");
            //jqForm.dialog("enable");
            return;
        }
        //max has not been reached, set another timeout
        setTimeout(waitCheckName, 1000);
    }

    function checkNamesAndCreate(){
        //if any field errors
        if (jqFields.hasClass(errorClassName) ) {
            alert("Please correct the Name or Domain Name");
            //jqForm.dialog("enable");
            return;
        }
        console.log("checkNamesAndCreate: Names valid");

        jWaiting(		
            'Launching Server...',
            {
                autoHide : false, // added in v2.0
                clickOverlay : false, // added in v2.0
                HorizontalPosition : 'center',
                VerticalPosition : 'center',
                ShowOverlay : true
            }
        );
        
        /*
        var formData = {
            serverName: jqServerName.val(),
            publicDNS: jqPublicDNS.val()
        };
        */
        var formData = {};
        
        $(':input').each(function(){
            formData[this.name] = this.value;
        });

        $(':checkbox, :radio').filter(':checked').each(function(){
            formData[this.name] = this.value;
        });

        $.ajax({
            type: "post",
            url: "<?=$app_path?>/ajax/create-server",
            data: formData,
            dataType: "json",
            timeout: 10000,
            success: function(data) {
                if (data.success != true) {
                    $.jNotify._close();
                    alert("createServer: Server returned false");
                    return;
                }
                location.assign('<?=$app_path?>/servers');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $.jNotify._close();
                alert("createServer: Ajax failure");
                return;
            }
        });            
    }
    
    var errorClassName = "error";
    var validClassName = "valid";
    var loadingClassName = "ui-icon-loading";
    var errorWrapperClassName = "field_with_errors"
//    var jqFields = $(":text", "#rename_server_form");
//    var jqlabels = $("label[for]", "#rename_server_form");
    //var jqFields = $("#rename_server_form :text");
    var jqForm = $("#new_server");
    var jqNameTable = $("#NameTable");
    var jqLabels = $("label[for]", jqNameTable);
    var jqServerName = $("#server_name");
    var jqPublicDNS = $("#server_server_domain_name_attributes_name");
    var jqFields = jqServerName.add(jqPublicDNS);
    
    jqForm.validate({
        debug: true,
        errorElement: "span",
        errorClass: errorClassName,
        validClass: validClassName,        
        onfocusout: function(element){  // had to add when I disabled onkeyup
            // make OK until ajax
            //$("#"+element.id + "_Hidden").val( $(element).val() );
            $(element).valid();
        },
        onkeyup: function(element){
            console.log("onkeyup");
            console.log(element);
            $(element).removeClass(errorClassName).removeClass(validClassName).removeClass(loadingClassName);
        },
        errorPlacement: errorPlacement,
        highlight: highlight,
        unhighlight: unhighlight
    });
    
    function errorPlacement(error, element) {
        console.log("errorPlacement: element = ");
        console.log(element);
        $(element).attr("title", $(error).html());
    }
    
    function highlight(element, errorClass, validClass) {
        console.log("highlight: id=" + element.id + " errorClass="+errorClass+" validClass="+validClass);
        $(element).addClass(errorClassName).removeClass(validClassName).removeClass(loadingClassName);
        var jqLabel = $('label[for="' + element.id + '"]', jqNameTable).parent();
        console.log(jqLabel[0]);
        jqLabel.addClass(errorWrapperClassName);
    }

    function unhighlight(element, errorClass, validClass, doAjax) { // added doAjax to normal args
        if (typeof(doAjax)==='undefined') doAjax = true;

        console.log("unhighlight: id=" + element.id+" errorClass="+errorClass+" validClass="+validClass);
        var saveElement = element;

        $(element).attr("title", "");
        $(element).removeClass(errorClassName).removeClass(loadingClassName).addClass(validClassName);
        var jqLabel = $('label[for="' + element.id + '"]', jqNameTable).parent();
        console.log(jqLabel[0]);
        jqLabel.removeClass(errorWrapperClassName);
                        
        //if value not changed, no need to ajax
        if (element.value == element.defaultValue)
            return; 

        //if ajax response called unhighlight, don't do again
        if (!doAjax)
            return;
        
        $(element).addClass(loadingClassName);
        // ajax to see if taken
        $.ajax({
            type: "get",
            url: "<?=$app_path?>/ajax/check-name",
            data: {
                form: "create",
                serverId: 0,    // not used
                field: element.getAttribute('field'),
                value: element.value
            },
            dataType: "json",
            timeout: 10000,
            success: function(data) {
                console.log("success: field="+data.field+" error="+data.error);
                if (data.error == "")
                    unhighlight(saveElement, errorClassName, validClassName, false);
                else {
                    highlight(saveElement, errorClassName, validClassName);
                    //errorPlacement expects error in tags
                    errorPlacement("<span>"+data.error+"</span>", saveElement);
                }
            }
            //error: function(jqXHR, textStatus, errorThrown) {
            //    alert("checkName: Ajax failure: "+textStatus);
            //}
        });
    }
});
</script>
