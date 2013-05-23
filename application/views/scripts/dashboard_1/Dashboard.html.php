<div class="ui-layout-center">
    <h2 class="header">Dashboard</h2>
    <h1>Dashboard</h1>
    
    <div id="notification-container">
 
        <div id="themeroller" class="ui-state-error" style="width:250px; display:none">
            <!-- close link -->
            <a class="ui-notify-close" href="#">
                <span class="ui-icon ui-icon-close" style="float:right"></span>
            </a>

            <!-- alert icon -->
            <span style="float:left; margin:2px 5px 0 0; " class="ui-icon ui-icon-alert"></span>

            <h1>#{title}</h1>
            <p>#{text}</p>
        </div>
        <!-- other templates here, if you'd like.. -->
    </div>
    
</div>
<!--script>
var handler = $("#notification-container")
      .notify()
      .notify("create", "themeroller", { title:"foo", text:"bar" }, { custom:true });
</script-->

<!--script>
//  $(document).ready(function(){
//    $("a.jnotify_exemple").click(function(e){
//	  e.preventDefault();
	  jWaiting(
		'Just a test !!<br />You can write HTML code <strong>bold</strong>, <i>italic</i>, <u>underline</u>',
		{
		  autoHide : false, // added in v2.0
		  clickOverlay : true, // added in v2.0
		  MinWidth : 250,
		  TimeShown : 3000,
		  ShowTimeEffect : 200,
		  HideTimeEffect : 200,
		  LongTrip :20,
		  HorizontalPosition : 'center',
		  VerticalPosition : 'center',
		  ShowOverlay : true,
   		  ColorOverlay : '#000',
		  OpacityOverlay : 0.3,
		  onClosed : function(){ // added in v2.0
		   
		  },
		  onCompleted : function(){ // added in v2.0
		   
		  }
		}
             );
//	  });
//    });
</script-->
<!--script>
  $(function(){
      $.toast({
        message:"<img src='<?=$app_images->statusIcon['Processing']?>' /> A Toast To You!",
        displayTime:4000,
        inTime:100,
        outTime:400
    });
  });
</script-->
