<?php
	session_start();
	include("config.php");

	if(isset($_POST["submitbuttoni"]))
	{
		if(empty($_POST["email"]) || empty($_POST["password"]))
		{
			$error = "Duhet të plotësohen të dy fushat";
		}
		else
		{
			$emri = mysqli_real_escape_string($lidhe, $_POST['email']);
			$fjalekalimi = mysqli_real_escape_string($lidhe, $_POST['password']);

			$sql = "SELECT * FROM perdoruesi WHERE Email=? AND passwordi=?";
			$stmt = mysqli_prepare($lidhe, $sql);

			if ($stmt)
			{
				mysqli_stmt_bind_param($stmt, "ss", $emri, $fjalekalimi);
				mysqli_stmt_execute($stmt);

				$result = mysqli_stmt_get_result($stmt);

				if(mysqli_num_rows($result) == 1)
				{
					$rreshti = mysqli_fetch_array($result, MYSQLI_ASSOC);
					$_SESSION['emri'] = $rreshti['Emri'];
					$sql = "SELECT ID_Perdoruesi FROM perdoruesi WHERE Emri='" . $_SESSION['emri'] . "'";
					$result = mysqli_query($lidhe, $sql);
	
	
					$row = mysqli_fetch_array($result);
					$_SESSION['id'] = $row['ID_Perdoruesi'];
	
	
	
	
					header("location: index.php");
					exit();
				}
				else
				{
					$error = "Gabim emri ose fjalëkalimi";
				}

				mysqli_stmt_close($stmt);
			}
			else
			{
				$error = "Pati një problem me përgatitjen e deklaratës.";
			}
		}
	}
?>
