<?php
include 'navbar.php';
include 'controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Details</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="form-container">
        <form action="controller.php" method="POST" id="educationForm">
            <div id="education-container">
                <div class="education-entry">
                    <div class="form-group">
                        <label for="qualification_1">Qualification:</label>
                        <select id="qualification_1" name="qualification[]" required>
                            <option value="">Select Qualification</option>
                            <option value="High School">High School</option>
                            <option value="Diploma">Diploma</option>
                            <option value="Bachelor's">Bachelor's</option>
                            <option value="Master's">Master's</option>
                            <option value="PhD">PhD</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="institute_1">Institute:</label>
                        <input type="text" id="institute_1" name="institute[]" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="year_of_passout_1">Year of Passout:</label>
                        <input type="number" id="year_of_passout_1" name="year_of_passout[]" min="1900" max="2099" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="percentage_1">Percentage:</label>
                        <input type="number" id="percentage_1" name="percentage[]" min="0" max="100" step="0.01" required>
                    </div>
                </div>
            </div>

            <button type="button" class="add-education-btn" id="addEducationBtn">
                <i class="fas fa-plus-circle"></i> Add Another Education
            </button>
            
            <div class="form-group">
                <input type="submit" name="submit_education_details" value="Save Education Details">
            </div>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const educationContainer = document.getElementById('education-container');
        const addEducationBtn = document.getElementById('addEducationBtn');
        let educationCount = 1;

        addEducationBtn.addEventListener('click', function() {
            educationCount++;
            
            // Create new education entry
            const newEntry = document.createElement('div');
            newEntry.classList.add('education-entry');
            newEntry.innerHTML = `

                <br><hr><br>

                <div class="form-group">
                    <label for="qualification_${educationCount}">Qualification:</label>
                    <select id="qualification_${educationCount}" name="qualification[]" required>
                        <option value="">Select Qualification</option>
                        <option value="High School">High School</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Bachelor's">Bachelor's</option>
                        <option value="Master's">Master's</option>
                        <option value="PhD">PhD</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="institute_${educationCount}">Institute:</label>
                    <input type="text" id="institute_${educationCount}" name="institute[]" required>
                </div>
                
                <div class="form-group">
                    <label for="year_of_passout_${educationCount}">Year of Passout:</label>
                    <input type="number" id="year_of_passout_${educationCount}" name="year_of_passout[]" min="1900" max="2099" required>
                </div>
                
                <div class="form-group">
                    <label for="percentage_${educationCount}">Percentage:</label>
                    <input type="number" id="percentage_${educationCount}" name="percentage[]" min="0" max="100" step="0.01" required>
                </div>

                
            `;
            
            educationContainer.appendChild(newEntry);
        });
    });
    </script>
</body>
</html>

<?php
    include('footer.php');
?>