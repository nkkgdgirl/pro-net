<?php
    $pdo = new PDO("mysql:host=localhost; dbname=system_hospital; charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
?>

<?php
    $stmt = $pdo->prepare("UPDATE doctor SET doctor.password=? WHERE did=?"); 
    $stmt->bindParam(1, $_POST["password"]); 
    $stmt->bindParam(2, $_POST["did"]);

    $oldPass = $pdo->prepare("SELECT password FROM doctor WHERE did = ?");
    $oldPass->bindParam(1,$_POST['did']);
    $oldPass->execute();
    $row = $oldPass->fetch();
    echo $row['password'];
    if($oldPass->execute()){
        $row = $oldPass->fetch();
        if($_POST['Opass'] != $row['password']){
            echo "Old Passworld ไม่ถูกต้อง";
        }else{
            if($stmt->execute()){
                echo "finish" . $_POST["did"] . "Change Password";
                echo "กลับหน้าหลัก" . "<a href='4.php'>This is a link</a>";
            }
        }
    }

    // $stmt = $pdo->prepare("UPDATE doctor SET doctor.password=? WHERE did=?"); 
    // $stmt->bindParam(1, $_POST["password"]); 
    // $stmt->bindParam(2, $_POST["did"]); 
    // if ($stmt->execute()){
    //     echo "finish" . $_POST["did"] . "Change Password";
    //     echo "กลับหน้าหลัก" . "<a href='4.php'>This is a link</a>";
    // }

    
?>