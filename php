<?php
// File to store the count
$counter_file = 'counter.txt';

// Read the current value of the counter
if (file_exists($counter_file)) {
    $count = (int)file_get_contents($counter_file);
} else {
    $count = 0;
}

// Check if the increment button has been pressed
if (isset($_POST['increase'])) {
    $count++;
    // Save the updated count to the file
    file_put_contents($counter_file, $count);
}

// Check if the decrement button has been pressed
if (isset($_POST['decrease'])) {
    $count--;
    // Save the updated count to the file
    file_put_contents($counter_file, $count);
}

// Function to create a button
function createButton($name, $text, $color) {
    return "<button type='submit' name='{$name}' style='background-color: {$color}; margin: 0 10px;'>{$text}</button>";
}

// Generate buttons
$increaseButton = createButton('increase', 'Increase in Red', 'red');
$decreaseButton = createButton('decrease', 'Decrease in Blue', 'blue');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Counter</title>
    <style>
        body {
            text-align: center;
            margin-top: 50px;
        }
        form {
            display: inline-block;
            margin-bottom: 20px;
        }
        .counter {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- The form which will submit to the same page -->
<form method="post">
    <?php
    // Display the buttons
    echo $decreaseButton;
    echo $increaseButton;
    ?>
</form>

<!-- Display the current count -->
<div class="counter">
    <p>The button has been pressed <?php echo $count; ?> times.</p>
</div>

</body>
</html>
