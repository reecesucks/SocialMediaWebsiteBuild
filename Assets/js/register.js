$(document).ready(function(){

  //on click hide sign show REgistration
  $("#signup").click(function(){
    $("#first").slideUp("slow", function(){
      $("#second").slideDown("slow");
    });
  });

  $("#signin").click(function(){
    $("#second").slideUp("slow", function(){
      $("#first").slideDown("slow");
    });
  });

});
