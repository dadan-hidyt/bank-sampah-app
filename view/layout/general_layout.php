<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('part/_head')
    <title>%title%</title>
</head>

<body <?= set_body_class($body_class); ?>>
    %@content%
</body>

</html>