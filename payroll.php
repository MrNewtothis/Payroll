<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="media/pic/ian.png" type="image/x-icon">
    <title>𝙿𝚊𝚢𝚛𝚘𝚕𝚕 𝚆𝚎𝚋 𝙰𝚙𝚙</title>
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

    <div class="container form-wrapper">
        <div class="form-container">
            <h1 class="text-center mb-4">Payroll Web Application</h1>

            <form action="payslip.php" method="POST">
                <div class="mb-3">
                    <label for="employeeNo" class="form-label">Employee No. (Required)</label>
                    <input type="text" class="form-control" id="employeeNo" name="employeeNo" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name (Required, max 100 characters)</label>
                    <input type="text" class="form-control" id="name" name="name" maxlength="100" required>
                </div>
                <div class="mb-3">
                    <label for="position" class="form-label">Position</label>
                    <select class="form-select" id="position" name="position" required>
                        <option value="">Select Position</option>
                        <option value="Instructor I">Instructor I</option>
                        <option value="Instructor II">Instructor II</option>
                        <option value="Instructor III">Instructor III</option>
                        <option value="Associate Professor I">Associate Professor I</option>
                        <option value="Associate Professor II">Associate Professor II</option>
                        <option value="Associate Professor III">Associate Professor III</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="hourseWorked" class="form-label">Hours Worked (Numbers only)</label>
                    <input type="number" class="form-control" id="hourseWorked" name="hourseWorked" required>
                </div>
                <div class="mb-3">
                    <label for="deductions" class="form-label">Deductions (Select at least one)</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="deductions[]" id="gsis" value="GSIS">
                        <label class="form-check-label" for="gsis">GSIS</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="deductions[]" id="philhealth" value="PhilHealth">
                        <label class="form-check-label" for="philhealth">PhilHealth</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="deductions[]" id="pagibig" value="Pagibig">
                        <label class="form-check-label" for="pagibig">Pag-IBIG</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Compute Payroll</button>
            </form>
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
