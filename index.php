<?php

$page = $_GET["p"];
$offset = 4 * ($page - 1);

$dbms = new mysqli("localhost", "root", "Madushi927@", "pagination", "3306");
$q = "SELECT * FROM user LIMIT 4 OFFSET " . $offset . "";  // 4 mehema ganna nisa single court ain krnwa '4'
$resultset = $dbms->query($q);

?>

<table class="t">
    <tr class="h">
        <td>ID</td>
        <td>NAME</td>
        <td>EMAIL</td>
        <td>MOBILE</td>
        <td>CITY</td>
    </tr>


    <?php

    for ($x = 0; $x < 4; $x++) {
        $data = $resultset->fetch_assoc();
        if ($data != null) {

    ?>
            <tr>
                <td><?php echo $data["id"] ?></td>
                <td><?php echo $data["name"] ?></td>
                <td><?php echo $data["email"] ?></td>
                <td><?php echo $data["mobile"] ?></td>
                <td><?php echo $data["city"] ?></td>
            </tr>
    <?php
        }
    }
    ?>

    <?php
    $q2 = "SELECT * FROM user";
    $resultset2 = $dbms->query($q2);
    $n = $resultset2->num_rows;
    $t = $n / 4;
    $t2 = intval($t); // convert double to int

    if ($n % 4 != 0) {
        $t2 = $t2 + 1;
    }
    ?>


    <tr>
        <td colspan="5" style="border: none;padding-top: 10px;">
            <?php
            if ($page != 1) {
            ?>
                <button class="btn" onclick="m(<?php echo $page - 1; ?>);">Previous</button>
            <?php
            }
            ?>


            <?php
            for ($i = 1; $i <= $t2; $i++) {

                if ($i == $page) {
            ?>
                    <button onclick="m(<?php echo $i; ?>);" class="s"><?php echo $i; ?></button>
                <?php
                } else {

                ?>
                    <button onclick="m(<?php echo $i; ?>);"><?php echo $i; ?></button>
            <?php
                }
            }
            ?>

            <?php

            if ($page != $t2) {
            ?>
                <button class="btn" onclick="m(<?php echo $page + 1; ?>);">Next</button>
            <?php
            }

            ?>



        </td>
    </tr>
</table>