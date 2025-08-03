
<?php
$userData = null;

if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];

    $stmt = $dbh->prepare("SELECT * FROM tblusers WHERE ID = :id");
    $stmt->bindParam(':id', $userid, PDO::PARAM_INT);
    $stmt->execute();

    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userData) {
        $_SESSION['name'] = $userData['FullName'];
        $_SESSION['email'] = $userData['EmailId'];
    }
}
?>





        <!-- header-section-->
        <div class="header-wrapper">
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-7 col-md-8 d-none d-xl-block d-sm-block">
                            <div class="top-header-content">
                                <ul class="list-none">
                                    <li><i class="fa fa-envelope top-header-icon"></i>geovita@travel.com</li>
                                    <li><i class="fa fa-phone top-header-icon"></i>+92313-4568932</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-4 col-md-3 col-sm-6 col-8 d-none d-block d-sm-block">
                            <div class="top-header-content">
                                <div class="top-social"> <a href="#" class="btn-social-icon"><i class="fa fa-facebook"></i></a> <a href="#" class="btn-social-icon"><i class="fa fa-twitter"></i></a> <a href="#" class="btn-social-icon"><i class="fa fa-linkedin"></i></a> <a href="#" class="btn-social-icon"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="btn-social-icon"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-xl-1 col-lg-1 col-md-1 col-sm-1 col-4">
                            <a href="#" class="search-icon" data-toggle="modal" data-target="#exampleModal">
                           <i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-section-->
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-2 col-md-3 col-sm-3 col-12">
                            <div class="logo"> <a href="index.php"><img src="images/logo.png" alt=""> </a> </div>
                        </div>
                        <div class="col-xl-9 col-lg-10 col-md-9 col-sm-12 col-12">
                            <!-- navigations-->
                            <div class="navigation">
                                <div id="navigation">
                                    <ul>
                                        <li class="active"><a href="index.php">Home</a></li>
                                        <li><a href="tourlist.php">Tour Packages</a>
                                            
                                        </li>
                                        <li><a href="about.php">About</a></li>
										<li><a href="gallery.php">Gallery</a> </li>
                                        <li><a href="contact.php">Contact</a></li>
										<li><a href="clientreviews.php">Clients Reviews</a> </li>
											<?php
								
								include('inc/config.php'); 

								if (isset($_SESSION['userid'])) {
									$user_id = $_SESSION['userid'];

									$stmt = $dbh->prepare("SELECT * FROM tblusers WHERE id = :id");
									$stmt->execute([':id' => $user_id]);

									if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
										?>
										
										<li class="has-sub"><a href="#"><?php echo htmlspecialchars($row['FullName']); ?></a>
                                            <ul>
                                                <li><a href="Profile.php">Profile</a></li>
                                                <li><a href="my-booking.php">Bookings</a></li>
                                                <li><a href="logout.php">Logout</a></li>
                                            </ul>
                                        </li>
										<?php
									}
								} else {
									echo '<a class="nav-link" href="login.php">Login</a>';
								}
								?>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.navigations-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. header-section-->
