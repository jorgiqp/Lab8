<?php
session_start();
require_once '../../conn.php';

$user_id = $_GET['id'];
$user = mysqli_query($conn, "SELECT * FROM `criminal` WHERE `id` = '$user_id'");
$user = mysqli_fetch_assoc($user);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Update criminal</title>
</head>
<body style="font-family: cursive;">
    <center>
    <h2> Update criminal record </h2>
    <div class = "header" style="background-color:black ;" style ="width: 600px;">
    <a href="search.php" style="color: white;" class="q">Back!</a>
    </div>
    <br>
        <form action="updatecreate.php" method="post">
            <div class="col-md-3"> 
                <div class="qqq" style="border-style: solid;"> 
                <input type="hidden" name="id" value="<?= $user['id']?>">
                <p>Criminal`s name</p>
                    <input name="name" type="text" class="form-control" placeholder="Input name" value="<?= $user['name']?>">
                    <p>Crime type</p>
                    <select name="type" class="form-control" id="name">
                        <option name="name1" class="form-control"><?= $user['crime']?></option>
                        <option name="name1" class="form-control">Vandalism</option>
                        <option name="name1" class="form-control">Assault</option>
                        <option name="name1" class="form-control">Drug Possession</option>
                        <option name="name1" class="form-control">Murder</option>
                        <option name="name1" class="form-control">Fraud</option>
                        <option name="name1" class="form-control">Burglary</option>
                        <option name="name1" class="form-control">Theft</option>
                    </select>
                    <p>Description of crime</p>
                    <textarea name="desc" class="form-control"><?= $user['des']?></textarea>
                    <p>Date</p>
                    <select name="officer" class="form-control" id="name">
                        <option name="name1" class="form-control"><?= $user['officer']?></option>
                        <?php
                        $images = mysqli_query($conn, "SELECT `fio`, `id` FROM `officer`");
                        while($images1 = mysqli_fetch_assoc($images)){
                            ?>
                        <option class="form-control" value="<?=$images1['fio'];?>"><?=$images1['fio'];?></option>
                        <?php
                        }
                        ?>
                    </select>                
                    <br>
                    <button type="submit" class="form-control">Update</button>
                    <br>        
                   
            </div><br>
            <?php
                        if($_SESSION['message']){
                        echo '<p class="msg">'. $_SESSION['message'] . '</p>';
                        }                            
                        unset($_SESSION['message']);                              
                    ?>
        </form>       
    </center>             
</body>
</html>
<style>
.qqq{
    position: static;
    border: 4px double black; /* ?????????????????? ?????????????? */
    background: #f3f3f3; /* ???????? ???????? */
    padding: 10px; /* ???????? ???????????? ???????????? */
    
    border-radius: 30px;
} 
</style>