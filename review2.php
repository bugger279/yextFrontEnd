<?php
global $id;
if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    Header('Location: index.php');
}
?>

<?php
    // $readAll = "http://123local.com/powerlistings/product/detail.php?id=$id";
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //     'key: ieurtjkosakwehua1457821244amsnashjad'
    // ));
    // curl_setopt($ch, CURLOPT_URL, $readAll);
    // $locations = curl_exec($ch);
    // $locations_json = json_decode($locations, true);
    // curl_close($ch);
?>

<?php
    // $writeReview = "http://123local.com/powerlistings/reviews/create.php";
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	// curl_setopt($ch, CURLOPT_POST, true);
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //     'key: ieurtjkosakwehua1457821244amsnashjad',
	// 	'Content-Type: application/json',
    // 	'Content-Length: ' . strlen($json)
    // ));
    // curl_close($ch);
    // echo $response;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php print_r($locations_json["records"][0]["name"]); ?> | Powerlisting</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fontawesome/css/font-awesome.min.css">
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div class="top-header">
<?php
    $readAllCategories = "http://123local.com/powerlistings/product/category.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'key: ieurtjkosakwehua1457821244amsnashjad'
    ));
    curl_setopt($ch, CURLOPT_URL, $readAllCategories);
    $categories = curl_exec($ch);
    $categories_json = json_decode($categories, true);
    curl_close($ch);
?>
    <div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="logo"><a href="index.php"><img class="img-responsive" src="images/123localLogo.png" alt="123local logo"></a></div>
        </div>
        <div class="col-md-9">
            <div class="menu-group">
                <ul class="main-menu">
                    <li><a class="dropdown-toggle" data-toggle="dropdown">Explore</a>
                        <ul class="dropdown-menu">
                            <?php foreach ($categories_json as $keys) {
                            foreach ($keys as $key) { ?>
                                <li><a class="dropdown-item" href="categories.php?category=<?php print_r($key["categoriesNameAlias"]); ?>"><?php print_r($key["categoryName"]); ?></a></li>
                            <?php }
                            } ?>
                        </ul>
                    </li>
                    <li><a class="add-listing" href="#"><i class="fa fa-user" aria-hidden="true"></i>Join Now</a></li>
                    <li><a class="add-listing" href="#"><i class="fa fa-plus" aria-hidden="true"></i>Add Listings</a></li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</div>
<div class="main-content">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="img-fluid" src="images/slider1.jpg" alt="First slide">
        <div class="slider-content">
            <h2>Find the Best Local Results for whatever You Need! Near Me is our Job.</h2>
            <h4>All You Need is 123 Local.  We have done the research and only deliver the best local results for you.  When you need to find anything Near Me, 123 Local is the Best!</h4>
        </div>
        </div>
        <div class="carousel-item">
        <img class="img-fluid" src="images/slider2.jpg" alt="Second slide">
        <div class="slider-content">
            <h2>Find the Best Local Results for whatever You Need! Near Me is our Job.</h2>
            <h4>All You Need is 123 Local.  We have done the research and only deliver the best local results for you.  When you need to find anything Near Me, 123 Local is the Best!</h4>
        </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
  <div class="review-form">
      <div class="container">
          <div class="row">
            <div class="formsmainWrapper col-md-12">
            <h2>Review Form</h2>
            <section class='rating-widget'>
                <div class='rating-stars'>
                    <ul id='stars'>
                    <li class='star' title='Poor' data-value='1'><i class='fa fa-star fa-fw'></i></li>
                    <li class='star' title='Fair' data-value='2'><i class='fa fa-star fa-fw'></i></li>
                    <li class='star' title='Good' data-value='3'><i class='fa fa-star fa-fw'></i></li>
                    <li class='star' title='Excellent' data-value='4'><i class='fa fa-star fa-fw'></i></li>
                    <li class='star' title='WOW!!!' data-value='5'><i class='fa fa-star fa-fw'></i></li>
                    </ul>
                </div>
            </section>
            <section class="content">
                <form class="content__form contact-form">
                    <div class="contact-form__input-group">
                    <label class="contact-form__label" for="authorName">Name</label>
                    <input class="contact-form__input contact-form__input--text" id="authorName" name="authorName" type="text"/>
                    </div>
                    <div class="contact-form__input-group">
                        <label class="contact-form__label" for="title">Review Summary</label>
                        <input class="contact-form__input contact-form__input--text" id="title" name="title" type="text"/>
                    </div>
                    <div class="contact-form__input-group">
                        <label class="contact-form__label" for="url">Review Source Url</label>
                        <input class="contact-form__input contact-form__input--text" id="url" name="url" type="text"/>
                    </div>
                    <div class="contact-form__input-group">
                    <label class="contact-form__label" for="content">Review</label>
                    <textarea class="contact-form__input contact-form__input--textarea" id="content" name="content" rows="6" cols="65"></textarea>
                    </div>
                    <input id="star" name="rating" type="hidden" value=""/>
                    <input id="listingId" name="listingId" type="hidden" value=""/>
                    <button id="submit" class="btn btn-primary contact-form__button" type="submit">Send It!</button>
                </form>
            </section>
            </div>
            <div class="col-md-12 results d-none">
            <h2 class="results__heading">Form Data</h2>
            <pre class="results__display-wrapper"><code class="results__display"></code></pre>
            </div>
          </div>
      </div>
  </div>
</div>
<div class="footer bg-dark text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>&copy; <?php echo(date('Y')-1); ?> -  <?php echo(date('Y')); ?>  | All Rights Reserved | <a href="https://www.gsmresults.com/" target="_blank">Web Design Tucson</a> by GSM Marketing Agency</p>
            </div>
        </div>
    </div>
</div>
<!-- For converting Form Data to JSON -->
<script>
  var jsonData = null;
  const isValidElement = element => {
      return element.name && element.value;
  };

  const isValidValue = element => {
    return (!['checkbox', 'radio'].includes(element.type) || element.checked);
  };
  const isCheckbox = element => element.type === 'checkbox';
  const isMultiSelect = element => element.options && element.multiple;
  const getSelectValues = options => [].reduce.call(options, (values, option) => {
    return option.selected ? values.concat(option.value) : values;
  }, []);
  
  const formToJSON_deconstructed = elements => {
      const reducerFunction = (data, element) => {
      data[element.name] = element.value;
      return data;
    };
    const reducerInitialValue = {};
    console.log('Initial `data` value:', JSON.stringify(reducerInitialValue));
    const formData = [].reduce.call(elements, reducerFunction, reducerInitialValue);

    return formData;
  };

  const formToJSON = elements => [].reduce.call(elements, (data, element) => {

    if (isValidElement(element) && isValidValue(element)) {
      if (isCheckbox(element)) {
        data[element.name] = (data[element.name] || []).concat(element.value);
      } else if (isMultiSelect(element)) {
        data[element.name] = getSelectValues(element);
      } else {
        data[element.name] = element.value;
      }
    }
    return data;
  }, {});

  const handleFormSubmit = event => {
  event.preventDefault();
  jsonData = formToJSON(form.elements);
  console.log(jsonData);
  const dataContainer = document.getElementsByClassName('results__display')[0];
  dataContainer.textContent = JSON.stringify(jsonData, null, "  ");
  document.cookie = jsonData;

  };
  const form = document.getElementsByClassName('contact-form')[0];
  form.addEventListener('submit', handleFormSubmit);
</script>

<script>
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {
    document.cookie = name+'=; Max-Age=-99999999;';
}
</script>

<script>
form.addEventListener('submit', () => {
  var data = document.querySelector('.results__display').textContent;
    var dataMain = data.replace("\\", "");
    setCookie('ppkcookie', jsonData ,7);
    var x = getCookie('ppkcookie');
    console.log("akshjas");
    console.log(x.authorName);
});
</script>


<!-- For star rating -->
<script>
$(document).ready(function(){
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on   
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });

  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10);
    var stars = $(this).parent().children('li.star');
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    document.querySelector('#star').value = ratingValue;
    var msg = "";
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    responseMessage(msg);
  });
});

function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
</script>
<pre id="result"></pre>

</body>
</html>