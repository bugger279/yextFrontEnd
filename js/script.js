$(document).ready(function () {
  //ADD NEW NUMBER
  // Add new element
  $(".add-phone-number").click(function () {

    // Finding total number of elements added
    var total_element = $(".phone-number").length;

    // last <div> with element class id
    var lastid = $(".phone-number:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[2]) + 1;

    $(".phone-number:last").after("<div class='row phone-number' id='phone-number-" + nextindex + "'></div>");
    // Adding element to <div>
    $("#phone-number-" + nextindex).append("<div class='col-3'><div class='form-group'><label>Number</label><input type='tel' name='number[]' class='form-control' data-validation='phone' data-content='Number cannot be empty'></div></div><div class='col-3'><div class='form-group'><label>Country Code</label><input type='tel' name='phone-country-code[]' class='form-control' validation='noempty' data-content='Country Code cannot be empty'></div></div><div class='col-3'><div class='form-group'><label>Description</label><input type='text' name='phone-description[]' class='form-control' data-validation='noempty' data-content='Description cannot be empty'></div></div><div class='col-2'><div class='form-group'><label>Type</label><input type='text' name='type[]' class='form-control' data-validation='noempty' data-content='Type cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_phone_number_" + nextindex + "' class='remove-phone-number x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-phone-number', function () {

    // $(".remove-phone-number").click(function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[3];

    // Remove <div> with id
    $("#phone-number-" + deleteindex).remove();

  });



   //ADD NEW EMAIL
  // Add new element
  $(".add-email").click(function () {

    // Finding total number of elements added
    var total_element = $(".email").length;

    if(total_element == 0){
      var nextindex = 1;
      $(".inner-email:last").after("<div class='row email' id='email-" + nextindex + "'></div>");
    }
    else{
    // last <div> with element class id
    var lastid = $(".email:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[1]) + 1;
    $(".email:last").after("<div class='row email' id='email-" + nextindex + "'></div>");
    }


    // Adding element to <div>
    $("#email-" + nextindex).append("<div class='col-5'><div class='form-group'><label>Email ID</label><input type='email' name='email-address[]' class='form-control' data-validation='email' data-content='Email cannot be empty'> </div></div><div class='col-5'><div class='form-group'><label>Description</label><input type='text' name='email-description[]' class='form-control' data-validation='noempty' data-content='Description cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_email_" + nextindex + "' class='remove-email x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-email', function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[2];

    // Remove <div> with id
    $("#email-" + deleteindex).remove();

  });



  //ADD NEW CATEGORIES
  // Add new element
  $(".add-categories").click(function () {

    // Finding total number of elements added
    var total_element = $(".categories").length;

    if(total_element == 0){
      var nextindex = 1;
      $(".inner-categories:last").after("<div class='row categories' id='categories-" + nextindex + "'></div>");
    }
    else{
    // last <div> with element class id
    var lastid = $(".categories:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[1]) + 1;
    $(".categories:last").after("<div class='row categories' id='categories-" + nextindex + "'></div>");
    }


    // Adding element to <div>
    $("#categories-" + nextindex).append("<div class='col-5'><div class='form-group'><label>Name</label><input type='text' name='category-name[]' class='form-control'></div></div><div class='col-5'><div class='form-group'><label>ID</label><input type='text' name='category-id[]' class='form-control'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_categories_" + nextindex + "' class='remove-categories x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-categories', function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[2];

    // Remove <div> with id
    $("#categories-" + deleteindex).remove();

  });





  //ADD NEW HOURS
 // Add new element
 $(".add-MONDAY").click(function () {

  // Finding total number of elements added
  var total_element = $(".MONDAY").length;

  if(total_element == 0){
    var nextindex = 1;
    $(".inner-MONDAY:last").after("<div class='row MONDAY' id='MONDAY-" + nextindex + "'></div>");
  }
  else{
  // last <div> with element class id
  var lastid = $(".MONDAY:last").attr("id");
  var split_id = lastid.split("-");
  var nextindex = Number(split_id[1]) + 1;
  $(".MONDAY:last").after("<div class='row MONDAY' id='MONDAY-" + nextindex + "'></div>");
  }


  // Adding element to <div>
  $("#MONDAY-" + nextindex).append(" <div class='col-5'><div class='form-group'><label>Starts</label><input type='text' name='start-MONDAY[]' class='form-control' data-validation='noempty' data-content='Start Time cannot be empty'></div></div><div class='col-5'><div class='form-group'><label>End</label><input type='text' name='end-MONDAY[]' class='form-control' data-validation='noempty' data-content='End Time cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_MONDAY_" + nextindex + "' class='remove-MONDAY x-mark'>X</span></div></div>");
});

// Remove element
$('.container').on('click', '.remove-MONDAY', function () {

  var id = this.id;
  var split_id = id.split("_");
  var deleteindex = split_id[2];

  // Remove <div> with id
  $("#MONDAY-" + deleteindex).remove();

});




$(".add-TUESDAY").click(function () {

  // Finding total number of elements added
  var total_element = $(".TUESDAY").length;

  if(total_element == 0){
    var nextindex = 1;
    $(".inner-TUESDAY:last").after("<div class='row TUESDAY' id='TUESDAY-" + nextindex + "'></div>");
  }
  else{
  // last <div> with element class id
  var lastid = $(".TUESDAY:last").attr("id");
  var split_id = lastid.split("-");
  var nextindex = Number(split_id[1]) + 1;
  $(".TUESDAY:last").after("<div class='row TUESDAY' id='TUESDAY-" + nextindex + "'></div>");
  }


  // Adding element to <div>
  $("#TUESDAY-" + nextindex).append(" <div class='col-5'><div class='form-group'><label>Starts</label><input type='text' name='start-TUESDAY[]' class='form-control' data-validation='noempty' data-content='Start Time cannot be empty'></div></div><div class='col-5'><div class='form-group'><label>End</label><input type='text' name='end-TUESDAY[]' class='form-control' data-validation='noempty' data-content='End Time cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_TUESDAY_" + nextindex + "' class='remove-TUESDAY x-mark'>X</span></div></div>");
});

// Remove element
$('.container').on('click', '.remove-TUESDAY', function () {

  var id = this.id;
  var split_id = id.split("_");
  var deleteindex = split_id[2];

  // Remove <div> with id
  $("#TUESDAY-" + deleteindex).remove();

});




$(".add-WEDNESDAY").click(function () {

  // Finding total number of elements added
  var total_element = $(".WEDNESDAY").length;

  if(total_element == 0){
    var nextindex = 1;
    $(".inner-WEDNESDAY:last").after("<div class='row WEDNESDAY' id='WEDNESDAY-" + nextindex + "'></div>");
  }
  else{
  // last <div> with element class id
  var lastid = $(".WEDNESDAY:last").attr("id");
  var split_id = lastid.split("-");
  var nextindex = Number(split_id[1]) + 1;
  $(".WEDNESDAY:last").after("<div class='row WEDNESDAY' id='WEDNESDAY-" + nextindex + "'></div>");
  }


  // Adding element to <div>
  $("#WEDNESDAY-" + nextindex).append(" <div class='col-5'><div class='form-group'><label>Starts</label><input type='text' name='start-WEDNESDAY[]' class='form-control' data-validation='noempty' data-content='Start Time cannot be empty'></div></div><div class='col-5'><div class='form-group'><label>End</label><input type='text' name='end-WEDNESDAY[]' class='form-control' data-validation='noempty' data-content='End Time cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_WEDNESDAY_" + nextindex + "' class='remove-WEDNESDAY x-mark'>X</span></div></div>");
});

// Remove element
$('.container').on('click', '.remove-WEDNESDAY', function () {

  var id = this.id;
  var split_id = id.split("_");
  var deleteindex = split_id[2];

  // Remove <div> with id
  $("#WEDNESDAY-" + deleteindex).remove();

});




$(".add-THURSDAY").click(function () {

  // Finding total number of elements added
  var total_element = $(".THURSDAY").length;

  if(total_element == 0){
    var nextindex = 1;
    $(".inner-THURSDAY:last").after("<div class='row THURSDAY' id='THURSDAY-" + nextindex + "'></div>");
  }
  else{
  // last <div> with element class id
  var lastid = $(".THURSDAY:last").attr("id");
  var split_id = lastid.split("-");
  var nextindex = Number(split_id[1]) + 1;
  $(".THURSDAY:last").after("<div class='row THURSDAY' id='THURSDAY-" + nextindex + "'></div>");
  }


  // Adding element to <div>
  $("#THURSDAY-" + nextindex).append(" <div class='col-5'><div class='form-group'><label>Starts</label><input type='text' name='start-THURSDAY[]' class='form-control' data-validation='noempty' data-content='Start Time cannot be empty'></div></div><div class='col-5'><div class='form-group'><label>End</label><input type='text' name='end-THURSDAY[]' class='form-control' data-validation='noempty' data-content='End Time cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_THURSDAY_" + nextindex + "' class='remove-THURSDAY x-mark'>X</span></div></div>");
});

// Remove element
$('.container').on('click', '.remove-THURSDAY', function () {

  var id = this.id;
  var split_id = id.split("_");
  var deleteindex = split_id[2];

  // Remove <div> with id
  $("#THURSDAY-" + deleteindex).remove();

});



$(".add-FRIDAY").click(function () {

  // Finding total number of elements added
  var total_element = $(".FRIDAY").length;

  if(total_element == 0){
    var nextindex = 1;
    $(".inner-FRIDAY:last").after("<div class='row FRIDAY' id='FRIDAY-" + nextindex + "'></div>");
  }
  else{
  // last <div> with element class id
  var lastid = $(".FRIDAY:last").attr("id");
  var split_id = lastid.split("-");
  var nextindex = Number(split_id[1]) + 1;
  $(".FRIDAY:last").after("<div class='row FRIDAY' id='FRIDAY-" + nextindex + "'></div>");
  }


  // Adding element to <div>
  $("#FRIDAY-" + nextindex).append(" <div class='col-5'><div class='form-group'><label>Starts</label><input type='text' name='start-FRIDAY[]' class='form-control' data-validation='noempty' data-content='Start Time cannot be empty'></div></div><div class='col-5'><div class='form-group'><label>End</label><input type='text' name='end-FRIDAY[]' class='form-control' data-validation='noempty' data-content='End Time cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_FRIDAY_" + nextindex + "' class='remove-FRIDAY x-mark'>X</span></div></div>");
});

// Remove element
$('.container').on('click', '.remove-FRIDAY', function () {

  var id = this.id;
  var split_id = id.split("_");
  var deleteindex = split_id[2];

  // Remove <div> with id
  $("#FRIDAY-" + deleteindex).remove();

});



$(".add-SATURDAY").click(function () {

  // Finding total number of elements added
  var total_element = $(".SATURDAY").length;

  if(total_element == 0){
    var nextindex = 1;
    $(".inner-SATURDAY:last").after("<div class='row SATURDAY' id='SATURDAY-" + nextindex + "'></div>");
  }
  else{
  // last <div> with element class id
  var lastid = $(".SATURDAY:last").attr("id");
  var split_id = lastid.split("-");
  var nextindex = Number(split_id[1]) + 1;
  $(".SATURDAY:last").after("<div class='row SATURDAY' id='SATURDAY-" + nextindex + "'></div>");
  }


  // Adding element to <div>
  $("#SATURDAY-" + nextindex).append(" <div class='col-5'><div class='form-group'><label>Starts</label><input type='text' name='start-SATURDAY[]' class='form-control' data-validation='noempty' data-content='Start Time cannot be empty'></div></div><div class='col-5'><div class='form-group'><label>End</label><input type='text' name='end-SATURDAY[]' class='form-control' data-validation='noempty' data-content='End Time cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_SATURDAY_" + nextindex + "' class='remove-SATURDAY x-mark'>X</span></div></div>");
});

// Remove element
$('.container').on('click', '.remove-SATURDAY', function () {

  var id = this.id;
  var split_id = id.split("_");
  var deleteindex = split_id[2];

  // Remove <div> with id
  $("#SATURDAY-" + deleteindex).remove();

});




$(".add-SUNDAY").click(function () {

  // Finding total number of elements added
  var total_element = $(".SUNDAY").length;

  if(total_element == 0){
    var nextindex = 1;
    $(".inner-SUNDAY:last").after("<div class='row SUNDAY' id='SUNDAY-" + nextindex + "'></div>");
  }
  else{
  // last <div> with element class id
  var lastid = $(".SUNDAY:last").attr("id");
  var split_id = lastid.split("-");
  var nextindex = Number(split_id[1]) + 1;
  $(".SUNDAY:last").after("<div class='row SUNDAY' id='SUNDAY-" + nextindex + "'></div>");
  }


  // Adding element to <div>
  $("#SUNDAY-" + nextindex).append(" <div class='col-5'><div class='form-group'><label>Starts</label><input type='text' name='start-SUNDAY[]' class='form-control' data-validation='noempty' data-content='Start Time cannot be empty'></div></div><div class='col-5'><div class='form-group'><label>End</label><input type='text' name='end-SUNDAY[]' class='form-control' data-validation='noempty' data-content='End Time cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_SUNDAY_" + nextindex + "' class='remove-SUNDAY x-mark'>X</span></div></div>");
});

// Remove element
$('.container').on('click', '.remove-SUNDAY', function () {

  var id = this.id;
  var split_id = id.split("_");
  var deleteindex = split_id[2];

  // Remove <div> with id
  $("#SUNDAY-" + deleteindex).remove();

});




  //ADD NEW IMAGES
  // Add new element
  $(".add-images").click(function () {

    // Finding total number of elements added
    var total_element = $(".images").length;

    if(total_element == 0){
      var nextindex = 1;
      $(".inner-images:last").after("<div class='row images' id='images-" + nextindex + "'></div>");
    }
    else{
    // last <div> with element class id
    var lastid = $(".images:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[1]) + 1;
    $(".images:last").after("<div class='row images' id='images-" + nextindex + "'></div>");
    }


    // Adding element to <div>
    $("#images-" + nextindex).append("<div class='col-3'><div class='form-group'><label>Image Width</label><input type='text' name='image-width[]' class='form-control' data-validation='numericonly' data-content='Image Width cannot be empty'></div></div><div class='col-3'><div class='form-group'><label>Image Height</label><input type='text' name='image-height[]' class='form-control' data-validation='numericonly' data-content='Image Height cannot be empty'> </div> </div> <div class='col-2'> <div class='form-group'><label>Image Type</label><select class='form-control' name='image-type[]'><option value='LOGO' >LOGO</option><option value='STOREFRONT' >STOREFRONT</option><option value='GALLERY' >GALLERY</option><option value='HEADSHOT' >HEADSHOT</option></select></div></div><div class='col-3'><div class='form-group'><label>Image URL</label><input type='url' name='image-url[]' class='form-control' data-validation='url' data-content='Image URL cannot be empty'>  </div>  </div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_images_" + nextindex + "' class='remove-images x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-images', function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[2];

    // Remove <div> with id
    $("#images-" + deleteindex).remove();

  });



   //ADD NEW VIDEOS
  // Add new element
  $(".add-videos").click(function () {

    // Finding total number of elements added
    var total_element = $(".videos").length;

    if(total_element == 0){
      var nextindex = 1;
      $(".inner-videos:last").after("<div class='row videos' id='videos-" + nextindex + "'></div>");
    }
    else{
    // last <div> with element class id
    var lastid = $(".videos:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[1]) + 1;
    $(".videos:last").after("<div class='row videos' id='videos-" + nextindex + "'></div>");
    }


    // Adding element to <div>
    $("#videos-" + nextindex).append("<div class='col-5'><div class='form-group'><label>Video URL</label><input type='url' name='video-url[]' class='form-control' data-validation='url' data-content='Video URL cannot be empty'></div></div><div class='col-5'><div class='form-group'><label>Video Description</label><input type='text' name='video-description[]' class='form-control' data-validation='noempty' data-content='Video Description cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_videos_" + nextindex + "' class='remove-videos x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-videos', function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[2];

    // Remove <div> with id
    $("#videos-" + deleteindex).remove();

  });
	
	
	
 //ADD NEW PAYMENTS
  // Add new element
  $(".add-payments").click(function () {

    // Finding total number of elements added
    var total_element = $(".payments").length;

    if(total_element == 0){
      var nextindex = 1;
      $(".inner-payments:last").after("<div class='row payments' id='payments-" + nextindex + "'></div>");
    }
    else{
    // last <div> with element class id
    var lastid = $(".payments:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[1]) + 1;
    $(".payments:last").after("<div class='row payments' id='payments-" + nextindex + "'></div>");
    }


    // Adding element to <div>
    $("#payments-" + nextindex).append("<div class='col-11'><div class='form-group'> <label>Payment Option</label> <input type='url' name='payment-option[]' class='form-control' data-validation='noempty' data-content='Payment Option cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_payments_" + nextindex + "' class='remove-payments x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-payments', function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[2];

    // Remove <div> with id
    $("#payments-" + deleteindex).remove();

  });	



   //ADD NEW URLS
  // Add new element
  $(".add-urls").click(function () {

    // Finding total number of elements added
    var total_element = $(".urls").length;

    if(total_element == 0){
      var nextindex = 1;
      $(".inner-urls:last").after("<div class='row urls' id='urls-" + nextindex + "'></div>");
    }
    else{
    // last <div> with element class id
    var lastid = $(".urls:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[1]) + 1;
    $(".urls:last").after("<div class='row urls' id='urls-" + nextindex + "'></div>");
    }


    // Adding element to <div>
    $("#urls-" + nextindex).append("<div class='col-3'> <div class='form-group'>   <label>Display URLs</label>   <input type='url' name='url-display[]' class='form-control' data-validation='url' data-content='Display URL cannot be empty'> </div>   </div>   <div class='col-3'> <div class='form-group'>   <label>Description</label>   <input type='text' name='url-description[]' class='form-control' data-validation='noempty' data-content='Description cannot be empty'> </div>   </div>   <div class='col-2'> <div class='form-group'>   <label>Type</label>   <input type='text' name='url-type[]' class='form-control' data-validation='noempty' data-content='Type cannot be empty'> </div>   </div>   <div class='col-3'> <div class='form-group'>   <label>URL</label>   <input type='url' name='url-url[]' class='form-control' data-validation='url' data-content='URL cannot be empty'> </div>   </div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_urls_" + nextindex + "' class='remove-urls x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-urls', function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[2];

    // Remove <div> with id
    $("#urls-" + deleteindex).remove();

  });	



  //ADD NEW KEYWORDS
  // Add new element
  $(".add-keywords").click(function () {

    // Finding total number of elements added
    var total_element = $(".keywords").length;

    if(total_element == 0){
      var nextindex = 1;
      $(".inner-keywords:last").after("<div class='row keywords' id='keywords-" + nextindex + "'></div>");
    }
    else{
    // last <div> with element class id
    var lastid = $(".keywords:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[1]) + 1;
    $(".keywords:last").after("<div class='row keywords' id='keywords-" + nextindex + "'></div>");
    }


    // Adding element to <div>
    $("#keywords-" + nextindex).append("<div class='col-11'><div class='form-group'><label>Keyword</label><input type='text' name='keyword[]' class='form-control' data-validation='noempty' data-content='Keyword cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_keywords_" + nextindex + "' class='remove-keywords x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-keywords', function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[2];

    // Remove <div> with id
    $("#keywords-" + deleteindex).remove();

  });	




  //ADD NEW LISTS
  // Add new element
  $(".add-lists").click(function () {

    // Finding total number of elements added
    var total_element = $(".lists").length;

    if(total_element == 0){
      var nextindex = 1;
      $(".inner-lists:last").after("<div class='row lists' id='lists-" + nextindex + "'></div>");
    }
    else{
    // last <div> with element class id
    var lastid = $(".lists:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[1]) + 1;
    $(".lists:last").after("<div class='row lists' id='lists-" + nextindex + "'></div>");
    }


    // Adding element to <div>
    $("#lists-" + nextindex).append("<div class='col-3'><div class='form-group'><label>Name</label><input type='text' name='list-name[]' class='form-control' data-validation='noempty' data-content='Twitter cannot be empty'></div></div><div class='col-3'><div class='form-group'><label>Description</label><input type='text' name='list-description[]' class='form-control' data-validation='noempty' data-content='Description cannot be empty'></div></div><div class='col-3'><div class='form-group'><label>Type</label><select class='form-control' name='list-type[]'> <option value='MENU'>MENU</option> <option value='PRODUCTS'>PRODUCTS</option> <option value='BIOS'>BIOS</option> <option value='EVENTS'>EVENTS</option></select></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_lists_" + nextindex + "' class='remove-lists x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-lists', function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[2];

    // Remove <div> with id
    $("#lists-" + deleteindex).remove();

  });	


  //ADD NEW SPECIALITIES
  // Add new element
  $(".add-specialities").click(function () {

    // Finding total number of elements added
    var total_element = $(".specialities").length;

    if(total_element == 0){
      var nextindex = 1;
      $(".inner-specialities:last").after("<div class='row specialities' id='specialities-" + nextindex + "'></div>");
    }
    else{
    // last <div> with element class id
    var lastid = $(".specialities:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[1]) + 1;
    $(".specialities:last").after("<div class='row specialities' id='specialities-" + nextindex + "'></div>");
    }


    // Adding element to <div>
    $("#specialities-" + nextindex).append("<div class='col-11'><div class='form-group'><label>Speciality</label><input type='text' name='speciality[]' class='form-control' data-validation='noempty' data-content='Speciality cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_specialities_" + nextindex + "' class='remove-specialities x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-specialities', function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[2];

    // Remove <div> with id
    $("#specialities-" + deleteindex).remove();

  });	



    //ADD NEW BRANDS
  // Add new element
  $(".add-brands").click(function () {

    // Finding total number of elements added
    var total_element = $(".brands").length;

    if(total_element == 0){
      var nextindex = 1;
      $(".inner-brands:last").after("<div class='row brands' id='brands-" + nextindex + "'></div>");
    }
    else{
    // last <div> with element class id
    var lastid = $(".brands:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[1]) + 1;
    $(".brands:last").after("<div class='row brands' id='brands-" + nextindex + "'></div>");
    }


    // Adding element to <div>
    $("#brands-" + nextindex).append(" <div class='col-11'><div class='form-group'><label>Brand</label><input type='text' name='brand[]' class='form-control' data-validation='noempty' data-content='Brand cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_brands_" + nextindex + "' class='remove-brands x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-brands', function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[2];

    // Remove <div> with id
    $("#brands-" + deleteindex).remove();

  });	



     //ADD NEW PRODUCTS
  // Add new element
  $(".add-products").click(function () {

    // Finding total number of elements added
    var total_element = $(".products").length;

    if(total_element == 0){
      var nextindex = 1;
      $(".inner-products:last").after("<div class='row products' id='products-" + nextindex + "'></div>");
    }
    else{
    // last <div> with element class id
    var lastid = $(".products:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[1]) + 1;
    $(".products:last").after("<div class='row products' id='products-" + nextindex + "'></div>");
    }


    // Adding element to <div>
    $("#products-" + nextindex).append("<div class='col-11'><div class='form-group'><label>Product</label><input type='text' name='product[]' class='form-control' data-validation='noempty' data-content='Products cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_products_" + nextindex + "' class='remove-products x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-products', function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[2];

    // Remove <div> with id
    $("#products-" + deleteindex).remove();

  });	
  
  
   //ADD NEW SERVICES
  // Add new element
  $(".add-services").click(function () {

    // Finding total number of elements added
    var total_element = $(".services").length;

    if(total_element == 0){
      var nextindex = 1;
      $(".inner-services:last").after("<div class='row services' id='services-" + nextindex + "'></div>");
    }
    else{
    // last <div> with element class id
    var lastid = $(".services:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[1]) + 1;
    $(".services:last").after("<div class='row services' id='services-" + nextindex + "'></div>");
    }


    // Adding element to <div>
    $("#services-" + nextindex).append("<div class='col-11'><div class='form-group'><label>Service</label><input type='text' name='service[]' class='form-control' data-validation='noempty' data-content='Service cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_services_" + nextindex + "' class='remove-services x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-services', function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[2];

    // Remove <div> with id
    $("#services-" + deleteindex).remove();

  });	



     //ADD NEW ASSOCIATION
  // Add new element
  $(".add-associations").click(function () {

    // Finding total number of elements added
    var total_element = $(".associations").length;

    if(total_element == 0){
      var nextindex = 1;
      $(".inner-associations:last").after("<div class='row associations' id='associations-" + nextindex + "'></div>");
    }
    else{
    // last <div> with element class id
    var lastid = $(".associations:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[1]) + 1;
    $(".associations:last").after("<div class='row associations' id='associations-" + nextindex + "'></div>");
    }


    // Adding element to <div>
    $("#associations-" + nextindex).append("<div class='col-11'><div class='form-group'><label>Association</label><input type='text' name='association[]' class='form-control' data-validation='noempty' data-content='Association cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_association_" + nextindex + "' class='remove-associations x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-associations', function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[2];

    // Remove <div> with id
    $("#associations-" + deleteindex).remove();

  });	


       //ADD NEW LANGUAGE
  // Add new element
  $(".add-languages").click(function () {

    // Finding total number of elements added
    var total_element = $(".languages").length;

    if(total_element == 0){
      var nextindex = 1;
      $(".inner-languages:last").after("<div class='row languages' id='languages-" + nextindex + "'></div>");
    }
    else{
    // last <div> with element class id
    var lastid = $(".languages:last").attr("id");
    var split_id = lastid.split("-");
    var nextindex = Number(split_id[1]) + 1;
    $(".languages:last").after("<div class='row languages' id='languages-" + nextindex + "'></div>");
    }


    // Adding element to <div>
    $("#languages-" + nextindex).append("<div class='col-11'><div class='form-group'><label>Language</label><input type='text' name='language[]' class='form-control' data-validation='noempty' data-content='Speciality cannot be empty'></div></div><div class='col-1 padding-top-30'><div class='form-group'><span id='remove_association_" + nextindex + "' class='remove-languages x-mark'>X</span></div></div>");
  });

  // Remove element
  $('.container').on('click', '.remove-languages', function () {

    var id = this.id;
    var split_id = id.split("_");
    var deleteindex = split_id[2];

    // Remove <div> with id
    $("#languages-" + deleteindex).remove();

  });	

});