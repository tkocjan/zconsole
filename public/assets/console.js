var myLayout, innerLayout; // a var is required because this page utilizes: myLayout.allowOverflow() method

$(document).ready(function () {
    $(document).tooltip();

    myLayout = $('body').layout({
        //center__paneSelector:	".outer-center",

        north__resizable: false,
        north__closable: false,
        north__allowOverflow: true,        
        north__showOverflowOnHover: true,
        //north__size: 75,
 
        south__resizable: false,                    
        south__closable: false,
        //south__size: 10,

        east__initClosed: true,
        east__size: 400,
        
        center__onresize: "innerLayout.resizeAll" 
    });

    innerLayout = $('#splitted-content').layout({ 
        south__size: 225
        //spacing_open: 8,
        //spacing_closed: 8
        //center__paneSelector: ".inner-center",
        //south__paneSelector: ".inner-south" 
    });
    
    $.jNotify._close(); 
    
});
