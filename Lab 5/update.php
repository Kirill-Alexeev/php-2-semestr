<?php
    $selected_record_id = isset ($_GET['id']) ? $_GET['id'] : null;

    $sql_select_all = "SELECT `id`, `firstname`, `name` FROM `friends` ORDER BY `firstname`, `name`";
    $res = mysqli_query($connect, $sql_select_all);

    echo "<div class='container mt-3'>";
    while ($arr = mysqli_fetch_assoc($res)) {
        echo '<a href="?p=update&id='.$arr['id'].'">'.$arr['firstname'].' '.$arr['name'].'</a><br>';
    }
    echo "</div>";

    if ($selected_record_id !== null) {
        if (isset ($_POST['edit_submit'])) {
            $id = $selected_record_id;
            $new_firstname = $_POST['edit_firstname'];
            $new_name = $_POST['edit_name'];
            $new_lastname = $_POST['edit_lastname'];
            $new_date = $_POST['edit_date'];
            $new_phone = $_POST['edit_phone'];
            $new_email = $_POST['edit_email'];
            $new_adress = $_POST['edit_adress'];
            $new_comment = $_POST['edit_comment'];

            $update_query = "UPDATE `friends` SET `firstname`='$new_firstname', `name`='$new_name', 
            `lastname`='$new_lastname', `date`='$new_date', `phone`='$new_phone', 
            `adress`='$new_adress', `comment`='$new_comment' WHERE `id`='$id'";

            $result = mysqli_query($connect, $update_query);
            if ($result) {
                echo "Запись изменена";
            } else {
                echo "Ошибка в изменении".mysqli_error($connect);
            }
        }

        $query = "SELECT * FROM friends WHERE id = $selected_record_id";
        $result = mysqli_query($connect, $query);
        $record = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        echo "<form action='' method='post' class='container mt-3'>";
        echo "<input type='hidden' name='edit_id' value='{$record['id']}'>";
        echo "<div class='form-group'>";
        echo "<label for='edit_firstname'>First name:</label>";
        echo "<input type='text' name='edit_firstname' id='edit_firstname' value='{$record['firstname']}'><br>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='edit_name'>Name:</label>";
        echo "<input type='text' name='edit_name' id='edit_name' value='{$record['name']}'><br>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='edit_lastname'>Last name:</label>";
        echo "<input type='text' name='edit_lastname' id='edit_lastname' value='{$record['lastname']}'><br>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='edit_date'>Date:</label>";
        echo "<input type='date' name='edit_date' id='edit_date' value='{$record['date']}'><br>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='edit_phone'>Phone:</label>";
        echo "<input type='tel' name='edit_phone' id='edit_phone' value='{$record['phone']}'><br>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='edit_email'>Email:</label>";
        echo "<input type='email' name='edit_email' id='edit_email' value='{$record['email']}'><br>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='edit_adress'>Address:</label>";
        echo "<textarea name='edit_adress' id='edit_adress' rows='3'>{$record['adress']}</textarea>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='edit_comment'>Comment:</label>";
        echo "<textarea name='edit_comment' id='edit_comment' rows='3'>{$record['comment']}</textarea>";
        echo "</div>";
        echo "<button type='submit' name='edit_submit' class='btn btn-primary mb-3'>Update</button>";
        echo "</form>";
    }