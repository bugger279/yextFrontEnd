<?php
global $id;
if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    Header('Location: index.php');
}
?>

<?php
    $readAll = "http://123local.com/powerlistings/product/detail.php?id=$id";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'key: ieurtjkosakwehua1457821244amsnashjad'
    ));
    curl_setopt($ch, CURLOPT_URL, $readAll);
    $locations = curl_exec($ch);
    $locations_json = json_decode($locations, true);
    curl_close($ch);
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
                <li><a id="explore-header" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-compass" aria-hidden="true"></i> Explore</a>
                  <ul class="dropdown-menu">
                    <?php foreach ($categories_json as $keys) {
                      foreach ($keys as $key) { ?>
                        <li><a class="dropdown-item" href="categories.php?category=<?php print_r($key["categoriesNameAlias"]); ?>"><i class="fa fa-list-alt" aria-hidden="true"></i><?php print_r($key["categoryName"]); ?></a></li>
                      <?php }
                    } ?>
                  </ul>
                </li>
                <!-- <li><a class="add-listing" href="#"><i class="fa fa-user" aria-hidden="true"></i>Join Now</a></li> -->
                <li><a class="add-listing" href="add.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Add Listings</a></li>
                </ul>
              </div>
              <form id="searchForm" action="search.php" method="post">
                  <div class="form-row align-items-center">
                      <div class="col-auto fieldInput">
                        <label class="sr-only" for="inlineFormInput">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="listing name" required  autocomplete="off">
                        <div class="result"><ul></ul></div>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </div>
              </form>
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
                <!-- <form action="self">
                    <div class="form-group">
                        <label for="authorName">Name:</label>
                        <input type="authorName" class="form-control" id="authorName">
                    </div>
                    <div class="form-group">
                        <label for="title">Review Brief:</label>
                        <input type="title" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content:</label>
                        <input type="content" class="form-control" id="content">
                    </div>
                    <div class="form-group">
                        <label for="source">Source:</label>
                        <input type="source" class="form-control" id="source">
                    </div>
                    <button type="submit" name="submit_review" class="btn btn-primary">Submit</button>
                </form> -->
<section class='rating-widget'>
  <!-- Rating Stars Box -->
  <div class='rating-stars text-center'>
    <ul id='stars'>
      <li class='star' title='Poor' data-value='1'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Fair' data-value='2'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Good' data-value='3'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Excellent' data-value='4'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='WOW!!!' data-value='5'>
        <i class='fa fa-star fa-fw'></i>
      </li>
    </ul>
  </div>  
  <div class='success-box'>
    <div class='clearfix'></div>
    <img alt='tick image' width='32' src='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA0MjYuNjY3IDQyNi42NjciIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQyNi42NjcgNDI2LjY2NzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiM2QUMyNTk7IiBkPSJNMjEzLjMzMywwQzk1LjUxOCwwLDAsOTUuNTE0LDAsMjEzLjMzM3M5NS41MTgsMjEzLjMzMywyMTMuMzMzLDIxMy4zMzMgIGMxMTcuODI4LDAsMjEzLjMzMy05NS41MTQsMjEzLjMzMy0yMTMuMzMzUzMzMS4xNTcsMCwyMTMuMzMzLDB6IE0xNzQuMTk5LDMyMi45MThsLTkzLjkzNS05My45MzFsMzEuMzA5LTMxLjMwOWw2Mi42MjYsNjIuNjIyICBsMTQwLjg5NC0xNDAuODk4bDMxLjMwOSwzMS4zMDlMMTc0LjE5OSwzMjIuOTE4eiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K'/>
    <div class='text-message'></div>
    <div class='clearfix'></div>
  </div>
</section>
    <form id="myform" action="" method="post">
        <div class="form-group form-field">
        <label for="authorName">Name</label>
        <input name="authorName" class="form-control" id="authorName" type="text" value="" aria-required="true" required="true">
        </div>
        <div class="form-group form-field">
        <label for="authorName">Name</label>
        <input name="authorName" class="form-control" id="authorName" type="text" value="" aria-required="true" required="true">
        </div>
        <div class="form-group form-field">
        <label for="title">Title</label>
        <input name="title" class="form-control" id="title" type="text" value="" aria-required="true" required="true">
        </div>
        <div class="form-group form-field">
        <label for="content">Content:</label>
        <textarea name="content" class="form-control" id="content" rows="1" cols="40" aria-required="true" required="true">
        </textarea>
        </div>
        <div class="form-group form-field">
        <label for="url">Url:</label>
        <input name="url" class="form-control" id="url" type="text" value="" aria-required="true" required="true">
        </div>
    <p><input id="submitReview" type="submit" /></p>
    </form>
    <h2>JSON</h2>
    <pre id="result"></pre>
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
<script>
$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
$(function() {
    $('form').submit(function() {
        $('#result').text(JSON.stringify($('form').serializeObject()));
        return false;
    });
});
</script>
<!-- For star rating -->
<script>
$(document).ready(function(){
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on   
    // Now highlight all the stars that's not after the current hovered star
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

  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    console.log(ratingValue);
    // JUST RESPONSE (Not needed)
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