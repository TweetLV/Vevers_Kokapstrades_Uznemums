<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ielogošanās sistēmā</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
	<div class="container" id="container">
		<div class="form-container sign-in-container">
			<form action="#" method="post">
				<h1>Ielogoties sistēmā</h1>

				<?php 
					if(isset($_POST['autorizeties'])){
						require ("connect_db.php");
						session_start();
						$Lietotajvards = mysqli_real_escape_string($savienojums, $_POST['lietotajs']);
						$Parole = mysqli_real_escape_string($savienojums, $_POST['parole']);

						$sqlVaicajums = "SELECT * FROM lietotaji WHERE lietotajvards='$Lietotajvards'";
						$rezultats = mysqli_query($savienojums, $sqlVaicajums);

						if(mysqli_num_rows($rezultats)>0){
							while($row = mysqli_fetch_array($rezultats)){
								$hashedPassword = $row['parole'];

								if(password_verify($Parole, $hashedPassword)){
									$_SESSION["username"] = $Lietotajvards;
									header("location:index.php");
								}else{
									echo "Nepareizs lietotājvārds vai parole!";
								}
							}
						}else{
							echo "Nepareizs lietotājvārds vai parole!";
						}
					}

					if(isset($_GET['logout'])){
						session_destroy();
					}
				?>
				<input type="text" name="lietotajs" placeholder="Lietotājvārds" />
				<input type="password" name="parole" placeholder="Parole" />
				<input type="submit" name="autorizeties" value="Ielogoties"/>
				
				<a href="registreties.php">Reģistrēties</a>
				
				<a href="index.php">Pievienoties kā viesis</a>
			</form>
		</div>
	</div>
</body>
</html>
