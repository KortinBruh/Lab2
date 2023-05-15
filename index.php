<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nurses</title>
</head>
<body>
    <h2>Перелік палат, у яких чергує обрана медсестра</h2>
    <form action="GetWards.php" method="post">
        
        <select name="name">
            <?php
            include("conn.php");
            require_once("conn.php");
            $collections = (new MongoDB\Client)->Lb6->duty;
            $nurses = $collections->distinct('name');
          foreach($nurses as $nurse)
         {
             echo '<option value = "' .$nurse . '">' .$nurse . '</option>';
         }
        ?>
        </select>
            <input type="submit" value="Результат">
    </form>
     <h2>Mедсестри обраного відділення</h2>
    <form action="GetAllNurseOfDepartment.php" method="post">
        
        <select name="department">
            <?php
            include("conn.php");
            require_once("conn.php");
            $collections = (new MongoDB\Client)->Lb6->duty;
            $departments = $collections->distinct('department');
          foreach($departments as $department)
         {
             echo '<option value = "' .$department . '">' .$department . '</option>';
         }
        ?>
        </select>
            <input type="submit" value="Результат">
    </form>
    <h2>Перелік усіх чергувань (у будь-яких палатах) у зазначену зміну в зазначеному відділенні</h2>
<form action="GetShifts.php" method="post">
    <select name="department" id="department-select">
        <?php
            include("conn.php");
            require_once("conn.php");
            $collections = (new MongoDB\Client)->Lb6->duty;
            $departments = $collections->distinct('department');
            foreach($departments as $department) {
                echo '<option value="' .$department . '">' .$department . '</option>';
            }
        ?>
    </select>
    <select name="shift" id="shift-select">
        <?php
            $shifts = $collections->distinct('shift');
            foreach($shifts as $shift) {
                echo '<option value="' .$shift . '">' .$shift . '</option>';
            }
        ?>
    </select>
    <input type="submit" value="Результат">
</form>
    <script>
        const data = localStorage.getItem("request");
        const result = JSON.parse(data);
        if (result.length > 0) {
            let output = "";
            result.forEach(function(element){
                output += " " + element;
            });
            document.write("Попередній запит:" + output);
        }
    </script>
</body>
</html>