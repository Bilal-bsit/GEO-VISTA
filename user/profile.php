  <?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('inc/config.php');

if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
    exit();
}


$userId = $_SESSION['userid'];
$successMsg = $errorMsg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['FullName']);
    $email = trim($_POST['EmailId']);
    $phone = trim($_POST['MobileNumber']);
    $password = trim($_POST['Password']);
    $confirmPassword = trim($_POST['ConfirmPassword']);

    if ($password !== "" && $password !== $confirmPassword) {
        $errorMsg = "Passwords do not match.";
    } else {
        try {
            if ($password !== "") {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $dbh->prepare("UPDATE tblusers SET FullName = :name, EmailId = :email, MobileNumber = :phone, Password = :password WHERE id = :id");
                $stmt->execute([
                    ':name'     => $fullName,
                    ':email'    => $email,
                    ':phone'    => $phone,
                    ':password' => $hashedPassword,
                    ':id'       => $userId
                ]);
            } else {
                $stmt = $dbh->prepare("UPDATE tblusers SET FullName = :name, EmailId = :email, MobileNumber = :phone WHERE id = :id");
                $stmt->execute([
                    ':name'  => $fullName,
                    ':email' => $email,
                    ':phone' => $phone,
                    ':id'    => $userId
                ]);
            }

            $successMsg = "Profile updated successfully!";
        } catch (PDOException $e) {
            $errorMsg = "Error: " . $e->getMessage();
        }
    }
}
$stmt = $dbh->prepare("SELECT FullName, EmailId, MobileNumber FROM tblusers WHERE id = :id");
$stmt->execute([':id' => $userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("User not found.");
}
?>

 <?php
 include 'inc/head.php';
 
 ?>
 
 
 <div class="wrapper">
 
 
  <?php
 include 'inc/header.php';
 
 ?>
 
 

				

	<div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-caption">
                            <h1 class="page-title">Profile</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.page-header-->
        <!-- tour-service -->
        <div class="content">
            <div class="container">
                <div class="row">	
				 <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-12 ">
				
				<?php if ($successMsg): ?>
				<div class="alert alert-success"><?php echo $successMsg; ?></div>
				<?php endif; ?>
				<?php if ($errorMsg): ?>
					<div class="alert alert-danger"><?php echo $errorMsg; ?></div>
				<?php endif; ?>
				 
				 
				 <form method="POST">
                    <div class="form-group">
						<label>Full Name</label>
						<input type="text" class="form-control" name="FullName" value="<?php echo htmlspecialchars($user['FullName']); ?>" required>
					</div>

					<div class="form-group">
						<label>Mobile Number</label>
						<input type="text" class="form-control" name="MobileNumber" value="<?php echo htmlspecialchars($user['MobileNumber']); ?>" required>
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="EmailId" value="<?php echo htmlspecialchars($user['EmailId']); ?>" required>
					</div>

					<div class="form-group">
						<label>New Password <small>(Leave blank to keep current)</small></label>
						<input type="password" class="form-control" name="Password">
					</div>

					<div class="form-group">
						<label>Confirm New Password</label>
						<input type="password" class="form-control" name="ConfirmPassword">
					</div>

					<button type="submit" class="btn btn-primary">Update Profile</button>
						 
						 
						 
						 
						 </form>
						 
						 
						 
						 
                          </div>
				 
				   </div>
            </div>
        </div>
		
		
		
		
   <?php
   include 'inc/footer.php';
   
   ?>
    