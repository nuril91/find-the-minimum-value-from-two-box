<?php
include "menu.html";

$show4 = ""; ?>

<!-- form input -->
<h2>Case 4</h2>
<form method="post">
    <input type="number" name="sample" placeholder="-Input the number of boxs">
    <input type="submit" name="submit4">
</form>
<div>Output :
    <?php echo $show4; ?>
</div>

<?php
// function for case 4
function case4($input) {
    echo "<form method='post'>
        <input type='hidden' value='$input' name='sample'>
        <div style='width:10%;'>
            <div style='float:left;'>
                A<br>";
                for ($i = 0; $i < $input; $i++) {
                    if (isset($_POST['a'])) {
                        $va = $_POST['a'][$i];
                    } else {
                        $va = "";
                    }
                    echo "<input type='number' name='a[]' style='width:50px' value='$va'><br>";
                }
            echo "</div>
            <div style='float:right;'>
                B<br>";
                for ($j = 0; $j < $input; $j++) {
                    if (isset($_POST['b'])) {
                        $vb = $_POST['b'][$j];
                    } else {
                        $vb = "";
                    }
                    echo "<input type='number' name='b[]' style='width:50px' value='$vb'><br>";
                }
            echo "</div>
        </div>
        <div style='clear: both;'>
            <input type='submit' name='count'>
        </div>
    </form>";
}

if (isset($_POST['submit4'])) {
    $input = $_POST['sample'];
    $show4 = case4($input);
}

if (isset($_POST['count'])) {
    echo case4($_POST['sample']);
    $sample = $_POST['sample'];

    function result($sample) {
        // if value the lowest box A not same
        if (array_search(min($_POST['a']), $_POST['a']) <> array_search(min($_POST['b']), $_POST['b'])) {
            $a = intval(min($_POST['a'])) ."+". intval(min($_POST['b'])) ."=";
            $suma = intval(min($_POST['a'])) + intval(min($_POST['b']));
        } else {
            // if value the lowest box B same, find the second lowest in box B
            $array = $_POST['b'];
            sort($array);
            $a = intval(min($_POST['a'])) ."+". $array[1] ."=";
            $suma = intval(min($_POST['a'])) + $array[1];
        }

        if (array_search(min($_POST['b']), $_POST['b']) <> array_search(min($_POST['a']), $_POST['a'])) {
            $b = intval(min($_POST['b'])) ."+". intval(min($_POST['a'])) ."=";
            $sumb = intval(min($_POST['b'])) + intval(min($_POST['b']));
        } else {
            // if value the lowest box B same, find the second lowest in box B
            $array = $_POST['a'];
            sort($array);
            $b = intval(min($_POST['b'])) ."+". $array[1] ."=";
            $sumb = intval(min($_POST['b'])) + $array[1];
        }

        // find minimum sum of boxes
        if (min($suma,$sumb) == $suma) {
            echo $a;
        } else {
            echo $b;
        }
        echo min($suma,$sumb);
    }

    echo result($sample);
} ?>
