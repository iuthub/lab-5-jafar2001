<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="buyagrade.css" type="text/css" rel="stylesheet" />
</head>

<body>
<?php if($_REQUEST["username"] != '' && $_REQUEST["section"] != '' && $_REQUEST["credit_card"] != '' && $_REQUEST["cc"] != '') { ?>
    <h1>Thanks, sucker!</h1>

    <p>
        Your information has been recorded.
    </p>

    <hr />

    <form action="buyagrade.php" method="get">
        <div>
            <dl>
                <dt>Name</dt>
                <dd>
                    <label>
                        <?= $_REQUEST["username"] ?>
                    </label>
                </dd>

                <dt>Section</dt>
                <dd>
                    <label>
                        <?= $_REQUEST["section"] ?>
                    </label>
                </dd>

                <dt>Credit Card</dt>
                <dd>
                    <label>
                        <?= $_REQUEST["credit_card"] ?> (<?= $_REQUEST["cc"] ?>)
                    </label>
                </dd>

                <?php $putLine =  $_REQUEST["username"].";". $_REQUEST["section"].";". $_REQUEST["credit_card"].";". $_REQUEST["cc"]."\n";
                file_put_contents('all_suckers.txt', $putLine, FILE_APPEND);
                ?>

                <p>Here are all the suckers: </p>
                <p>
                    <?php $list = file('all_suckers.txt') ?>
                <ul>
                    <?php foreach ($list as $line) { ?>
                        <li><?php print $line?></li>
                    <?php } ?>
                </ul>
                </p>
            </dl>
        </div>
    </form>
<?php } else { ?>
    <h1>Sorry</h1>
    <p>
        You didn't fill out the form completely. <a href="buyagrade.html">Try again?</a>
    </p>
<?php } ?>
</body>
</html>