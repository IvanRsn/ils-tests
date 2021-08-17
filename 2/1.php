<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ILS: Test 2</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(function() {
            $('#id1').on('click', function() {
                let $thisTextArea = $(this);
                $.get(
                    // Тут можно использовать полный URL: http://a.ru/1.txt , только его не существует.
                    // Как и при подключении jQuery в src. Нет необходимости настраивать домен a.ru, но будем иметь в виду
                    // что в задании он указан. Представим, что наши 1.php и 1.txt лежат на нём в корне.
                    '1.txt', 
                    function(data) {
                        $thisTextArea.text(data);
                    }
                )
            });
        });
    </script>
</head>
<body>
    <textarea name="id1_name" id="id1" cols="30" rows="10">Кликни сюда, для получения данных из 1.txt</textarea>
</body>
</html>