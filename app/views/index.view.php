<?php require('partials/head.php'); ?>

<br><a href='/index?task=all'>ALL RECORDS</a>


<?php foreach ($parsedDatas as $parsedData) : ?>
    <li><?= $parsedData->id ?> </li>
    <li><?= $parsedData->doi ?> </li>
    <li><?= $parsedData->title ?> </li>
    <li><?= $parsedData->abstract ?> </li>
    <li><?= $parsedData->pub_date ?> </li>
    <br/>
    <br/>


<?php endforeach; ?>


<?php require('partials/footer.php'); ?>