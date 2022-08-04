<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>%title%</title>
</head>
<body <?= ( $body_class ?? false) ? set_attr('class',$body_class) : ''; ?> <?= ($body_id ?? false) ? set_attr('id',$body_id) : ''; ?>>
@include('_header')   
%@content%
</body>
</html>