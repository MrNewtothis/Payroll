<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeNo     = $_POST['employeeNo'];
    $name           = $_POST['name'];
    $position       = $_POST['position'];
    $hourseWorked  = $_POST['hourseWorked'];

    // If no deduction is selected, set deductions as an empty array (Used ternary operator)
    $deductions = isset($_POST['deductions']) ? $_POST['deductions'] : [];

    // Pay rates (per hour) | Convert daily rate to hourly rate
    // Associative Array
    $positions = [
        "Instructor I"              => 890.75 / 8, 
        "Instructor II"             => 940.50 / 8,
        "Instructor III"            => 1200.75 / 8,
        "Associate Professor I"     => 1700.25 / 8,
        "Associate Professor II"    => 5000.75 / 8,
        "Associate Professor III"   => 7500.50 / 8
    ];

    // Deductions
    // Associative Array
    $deductionRates = [
        "GSIS"          => 550,
        "PhilHealth"    => 150,
        "Pagibig"       => 256
    ];

    // Gross pay (hRate * hWork)
    $grossPay = $positions[$position] * $hourseWorked;

   
    $totalDeductions = 0;
    $deductionsDetails = "";  

    // number_format() for adjusting how many decimals to show
    // Calculate total deductions and track of each deduction that has been picked
    foreach ($deductions as $deduction) {
        $totalDeductions += $deductionRates[$deduction];
        $deductionsDetails .= "<tr><td>$deduction</td><td>₱" . number_format($deductionRates[$deduction], 2) . "</td></tr>";
    }

    // Calculate Net Pay (Gross pay - Total deductions)
    $netPay = $grossPay - $totalDeductions;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="media/pic/ian.png" type="image/x-icon">
    <title>𝙿𝚊𝚢𝚛𝚘𝚕𝚕 𝚁𝚎𝚜𝚞𝚕𝚝</title>
</head>
<body>
    <video id="bg-video" autoplay muted loop>
        <source src="media/vid/Genshin.mp4" type="video/mp4">
        If this shows up, it's not supported.
    </video>

    <audio id="bg-audio" loop autoplay>
        <source src="media/audio/genshinbgm.mp3" type="audio/mpeg">
        If this shows up, it's not supported.
    </audio>

    <div class="container result-wrapper">
        <h2 class="text-center mb-4">Payroll Results for <font color='green'><?php echo $name; ?></font></h2>

        <table class="table table-bordered" border="1">
            <tr>
                <td><b>Employee No:</b></td><td><?php echo $employeeNo; ?></td>
            </tr>
            <tr>
                <td><b>Position:</b></td><td><?php echo $position; ?></td>
            </tr>
            <tr>
                <td><b>Hours Worked:</b></td><td><?php echo $hourseWorked; ?> hrs</td>
            </tr>
            <tr>
                <td><b>Gross Pay:</b></td><td>₱<?php echo number_format($grossPay, 2); ?></td>
            </tr>

            <?php if (!empty($deductions)): ?>
                <tr><td><b>Deductions Applied:</b></td>
                    <td>
                        <table class='table table-sm'>
                            <tr><th>Deduction Type</th><th>Amount</th></tr>
                            <?php echo $deductionsDetails; ?>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><b>Total Deductions:</b></td>
                    <td>₱<?php echo number_format($totalDeductions, 2); ?></td>
                </tr>
                    <?php else: ?>
                        <tr><td><b>Total Deductions:</b></td><td>₱0.00</td></tr>
                    <?php endif; ?>

                <tr>
                    <td><b>Net Pay:</b></td>
                    <td><b><u>₱<?php echo number_format($netPay, 2); ?></u></b></td>
                </tr>
        </table>

        <div>
            <a href='payroll.php' class='btn btn-secondary'>Go Back</a>
            <button class='btn btn-primary' onclick='window.print()'>Print</button>
        </div>
    </div>

    <div class="volume-control">
        <label for="volume">Volume:</label>
        <input type="range" id="volume" min="0" max="1" step="0.1" value="0.5" onchange="changeVolume(this.value)">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function changeVolume(value) {
            const audio = document.getElementById('bg-audio');
            audio.volume = value;  
        }

        document.addEventListener('click', function() {
            const audio = document.getElementById('bg-audio');
            if (audio.paused) {
                audio.play(); 
            }
        });
    </script>
</body>
</html>

<?php
}
?>
