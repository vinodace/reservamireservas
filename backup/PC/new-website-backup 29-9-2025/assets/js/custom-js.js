$(function(){
	   // Numbers only
   $(".number").keypress(function (e) {
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
         $(this).next(".errmsg")
            .html("Numbers only")
            .stop()
            .show()
            .fadeOut("slow");
         return false;
      }
   });

   // Alphabets only
   $(".alphabet").keypress(function (e) {
      // A-Z (65–90), a-z (97–122), backspace(8), space(32)
      if (e.which != 8 && e.which != 32 && (e.which < 65 || (e.which > 90 && e.which < 97) || e.which > 122)) {
         $(this).next(".errmsg")
            .html("Alphabets only")
            .stop()
            .show()
            .fadeOut("slow");
         return false;
      }
   });
});