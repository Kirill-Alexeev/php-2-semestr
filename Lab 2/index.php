<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Lab 2</title>
</head>
<body>
    <?php
        $string = '10 + X = 33';
        $array = explode(' ', $string);
        $indexValue = 0;
        $order = 0;
        $answer = 0;

        if ($array[0] === 'X') {
            $indexValue += 2; 
            $order += 0;
        } else {
            $indexValue += 0;
            $order += 1;
        }

        switch ($array[1]) {
            case '+':
                $answer += (int)$array[array_key_last($array)] - (int)$array[$indexValue];
                break;
            case '*':
                $answer += (int)$array[array_key_last($array)] / (int)$array[$indexValue];
                break;
            case '-':
                if ($order == 1) {
                    $answer += (int)$array[$indexValue] - (int)$array[array_key_last($array)];
                } else {
                    $answer += (int)$array[$indexValue] + (int)$array[array_key_last($array)];
                }
                break;
            case '/':
                if ($order == 1) {
                    $answer += (int)$array[$indexValue] / (int)$array[array_key_last($array)];
                } else {
                    $answer += (int)$array[$indexValue] * (int)$array[array_key_last($array)];
                }
                break;
            
            default:
                echo 'Ошибка! Такого знака не существует!';
                break;
        }

        echo $answer;
    ?>
</body>
</html>