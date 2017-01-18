$(document).ready(function(){
  setTimeout(function(){
        $.get("../php/check.php", function(data){
        if(data==0) window.location.href="../php/logout.php";
        });
    },1*60*1000);
});