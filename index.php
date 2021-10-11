<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php require_once 'create.php'; ?>

    <div class="container">
    <?php 
    $mysqli = new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli->error()));
    $result = $mysqli->query("SELECT * FROM data") or die(mysqli_error($mysqli->error()));
    ?>
    <div class="row justify-content-center">
        <table class="table">
            <thead> 
                <tr>
                    <th> Name </th>

                    <th> Surname </th>
                    <th> Birthday </th>
                    <th colspan "2"> Action </th>
                </tr>
            </thead>
    <?php
    while ($row = $result->fetch_assoc()):  ?>
            <tr>
                <td> <?php echo $row['name'] ?></td>
                <td> <?php echo $row['surname'] ?></td>
                <td> <?php echo $row['birthday'] ?></td>
                <td>
                    <a href="index.php?edit=<?php echo $row['id']; ?>"
                    class = "btn btn-info"> edit </a>
                    <a href="create.php?delete=<?php echo $row['id']; ?>"
                    class = "btn btn-danger"> delete </a>
                   
                </td>
    <?php endwhile; ?>
            </tr>
        </table>
    </div>  
    <?php
    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

   
    pre_r($result->fetch_assoc());
    
    ?>
    <div class = "row justify-content-center">
    <form action='create.php' method="POST">
        <input type ="hidden" name="id" value = "<?php echo $id; ?>">
        <div class="form-group">
        <label> name </label>
        <input type = "text" name= "name" class = "form-control" value = "<?php echo $name;?>" placeholder = "input your name" >
        </div>
        <div class="form-group">
        <label> surname </label>
    
        <input type = "text" name= "surname" class = "form-control" value = "<?php echo $surname;?>"placeholder = "input your surname" >
        </div>
        <div class="form-group">
        <label> birthday </label>
        <input type = "text" name= "birthday" class = "form-control" value = "<?php echo $birthday;?>" placeholder = "input your birthday">
        </div>
        <div class="form-group">
        <?php 
        if ($update == true):
        ?>
        
        <button type="submit" class = "btn btn-primary" name= "update">update</button>
        <?php else: ?>
        <button type="submit" class = "btn btn-primary" name= "save">save</button>
        <?php endif; ?>
        
        </div>
    </form>
    </div>
    </div>
</body>
</html>