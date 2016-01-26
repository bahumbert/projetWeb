<?php ob_start();

if (isset($_GET["user"])){
	deleteuser($_GET["user"]);
}

function deleteuser($user){
// Deletes a user

	$error = "";
	if ($user != null ){
		$user = strtolower($user);

		$file = fopen(__DIR__."/files/login.json", "r");
		$line = fgets($file);
		$arr = json_decode($line,true);
		fclose($file);

		if (isset($arr[$user])){
// If he exists obviously

			$file = fopen(__DIR__."/files/login.json", "w");
			if (!$file){
				$error = 7;
			}
			else {

				$file2 = fopen(__DIR__."/files/roles.json", "r");
				$line2 = fgets($file2);
				$arr2 = json_decode($line2,true);
				fclose($file2);

				$file2 = fopen(__DIR__."/files/roles.json", "w");
				if (!$file2){
					$error = 7;
				}
				else {

					unset($arr[$user]);
// Deletion there
					echo "<br/>ecriture=".fputs($file, json_encode($arr));
					fclose($file);

					unset($arr2[$user]);
					echo "<br/>ecriture=".fputs($file2, json_encode($arr2));
					fclose($file2);
					$error = 4;
				}
			}

		}
		else $error = 5;
	}
	else $error = 6;

	ob_end_flush();
	header("Location: admin.php?error2=".$error);
	exit();
}
?>
