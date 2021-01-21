<?php 

$row = $select_stmt->fetch(PDO::FETCH_ASSOC);

if(!empty($row)){
    $errorMsg = "Nom d'utilisan incorret";
}else{
    if($row['role'] == 'admin'){
        if($password == $row['password']){
            ///
        }else{
            /// error password
        }
    } else{

        if(password_verify($password,$row['password'])){
            
        }

    }
}
