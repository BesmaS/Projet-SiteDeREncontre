<!DOCTYPE html>
<html lang="fr">
<head>
    <title>SpotiLove</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="js/common.js"></script>
    <?php
        // $css = Liste de css à charger pour cette page
        if (isset($css))
            foreach ($css as $path)
                printf('<link rel="stylesheet" type="text/css" href="%s" />', $path);
        
        // $js = Liste de javascript à charger pour cette page
        if (isset($js))
            foreach ($js as $path)
                printf('<script src="%s"></script>', $path);
    ?>
</head>
<body>