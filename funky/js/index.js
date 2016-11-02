// sleep time expects milliseconds
function sleep (time) {
  	return new Promise((resolve) => setTimeout(resolve, time));
}
$(document).ready(function(){
	var ketqua = $('#ketqua');
    $("#cobtn").click(function(){
    	if($("#ketqua").css("display") == "none") {
    		$("#ketqua").fadeIn("slow");
    		sleep(2000).then(() => {
			    $("#ps").fadeToggle("slow"); 
			}); 
    	} else {
    		$("#ketqua").fadeOut("slow");
    		$("#ps").fadeToggle("slow"); 
    	}
    });
    $("#khongbtn").hover(function() {
		$("#khongbtn").hide(); 
		sleep(500).then(() => {
		    $("#khongbtn").show(); 
		});    			
    });
    $("#khongbtn").click(function() {
    	if($("#ketqua2").css("display") == "none") {
    		$("#ketqua2").fadeIn("slow");
    	} else {
    		$("#ketqua2").fadeOut("slow");
    	}
    });
});