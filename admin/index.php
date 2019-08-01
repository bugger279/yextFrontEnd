<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header("Location: login.php");
    }

include "include/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POWERLISTING | ADMIN LOGIN</title>
    <script src="../js/jquery.min.js"></script>
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/fontawesome/css/font-awesome.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="top-header">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <div class="logo"><a href="index.php"><img class="img-responsive" src="../images/123localLogo.png" alt="123local logo"></a></div>
        </div>
        </div>
    </div>
    </div>
    <div class="welcome-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="admin_nick">Welcome <?php print_r($_SESSION["username"]); ?><a href="logout.php" class="btn btn-warning logOut"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></h2>
                </div>
            </div>
        </div>
    </div>
    <?php
/*        $readAll = "http://123local.com/powerlistings/product/read.php";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'key: ieurtjkosakwehua1457821244amsnashjad'
        ));
        curl_setopt($ch, CURLOPT_URL, $readAll);
        $locations = curl_exec($ch);
        $locations_json = json_decode($locations, true);
        curl_close($ch);*/
	
	
	
		if(isset($_GET['id']))
		{
			$messageCode = $_GET['id'];
			
			echo "<div class='message-rows'><div class='container'><div class='row'><div class='col-md-12'>";
			
			if($messageCode == "success")
			{
				echo "<h3 class='text-success message text-center'>Listing Deleted</h3>";
			}
			
			else
			{
				echo "<h3 class='text-danger message text-center'>Please try again later</h3>";
				
			}
			
			echo "</div></div></div></div>";
			
			
		}
	
    ?>
    <div class="listing-rows">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Listing Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$sql = "SELECT locationId, name, status FROM locations ";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
							
							while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        						extract($row);

							?>
                                <tr>
                                <th scope="row"><?php echo $locationId; ?></th>
                                <td><?php echo $name; ?></td>
									<td><select class="dropdown" onChange="changeStatus(this);">
										<option value="LIVE" <?php if($status == 'LIVE'){echo 'selected';} ?>>LIVE</option>
										<option value="AVAILABLE" <?php if($status == 'AVAILABLE'){echo 'selected';} ?>>AVAILABLE</option>
										<option value="ACTIVE" <?php if($status == 'ACTIVE'){echo 'selected';} ?>>ACTIVE</option>
										<option value="CLAIMED" <?php if($status == 'CLAIMED'){echo 'selected';} ?>>CLAIMED</option>
										<option value="SUPPRESSED" <?php if($status == 'SUPPRESSED'){echo 'selected';} ?>>SUPPRESSED</option>
										<option value="BLOCKED" <?php if($status == 'BLOCKED'){echo 'selected';} ?>>BLOCKED</option>
										</select><input type="hidden" value="<?php echo $locationId; ?>" class="listingid"></td>
                                <td class="action-btns">
                                    <a href="delete.php?id=<?php echo $locationId; ?>"  onclick="return confirmDelete()" ><i class="fa fa-window-close" aria-hidden="true"></i></a>
									<a href="edit.php?id=<?php echo $locationId; ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                </td>
                            </tr>

                      <?php  } ?>
                        </tbody>
                        </table>
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
        function confirmDelete() {
            var r = confirm("Are you sure you want to delete this listing?");
            if (r == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
	<script>
		function changeStatus(stat)
		{
			var status = stat.value;
			var id = $(stat).next('input').val();
			//alert(status);
			
			
		
			
			$.ajax({
				type: "POST",
				dataType: "text",
				url: "edit-status.php",
				data: {"status": status, "id": id},
				success: function(response)
				{
				
					if(response){
					alert("Status Changed");
					}
					else{
						alert("Error");
					}
				

				}
			});
			
		}
	</script>
</body>
</html>