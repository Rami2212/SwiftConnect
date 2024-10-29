    <?php include_once '../includes/header.php'; ?>
    <?php
    
    require "../config/config.php";  

    // if (!isset($_SESSION['username'])) {
    //     echo "<script> window.location.href ='" . APPURL . "'; </script>";
    //     exit(); 
    // }

    if(isset($_POST['submit-button'])){

        if(!isset($_POST['firstName']) && !isset($_POST['lastName']) && !isset($_POST['company']) 
            && !isset($_POST['postalCode']) && !isset($_POST['additionalInfo']) && !isset($_POST['email']) && !isset($_POST['phone'])){

                
        }
        else{
            
            $fname = $_POST['firstName'];
            $lname = $_POST['lastName'];
            $company = $_POST['company'];
            $postalCode = $_POST['postalCode'];
            $description = $_POST['additionalInfo'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $user_id = $_SESSION['user_id'];

            $sql = "INSERT INTO orders(fname,lname,company_name,Postal_code,description,email,phone_number,user_id) VALUES ('$fname',' $lname','$company','$postalCode','$description','$email','$phone','$user_id')";


            if($conn->query($sql)){
                echo "Order placed successfully";
            }
            else{
                echo "Error";
            }
            
        }
    }




?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Package Management</title>
        <link rel="stylesheet" href="../includes/header.css">
        <link rel="stylesheet" href="../includes/footer.css">
        <link rel="stylesheet" href="delivery_details.css">
    </head>

    <body>



        <div class="body-container">
            <div class="form-container">
                <h1 class="form-title">Package Management</h1>
                <form id="packageForm" class="form-content">
                    <div class="grid-container">
                        <div>
                            <label for="firstName" class="label">First Name</label>
                            <input type="text" id="firstName" name="firstName" class="input-field" required>
                            <p class="error-message hidden" id="firstNameError"></p>
                        </div>
                        <div>
                            <label for="lastName" class="label">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="input-field" required>
                            <p class="error-message hidden" id="lastNameError"></p>
                        </div>
                        <div>
                            <label for="company" class="label">Company</label>
                            <input type="text" id="company" name="company" class="input-field">
                            <p class="error-message hidden" id="companyError"></p>

                        </div>
                        <div>
                            <label for="postalCode" class="label">Postal Code</label>
                            <input type="text" id="postalCode" name="postalCode" class="input-field" required>
                            <p class="error-message hidden" id="postalCodeError"></p>
                        </div>
                        <div class="span-cols">
                            <label for="additionalInfo" class="label">Additional Information</label>
                            <textarea id="additionalInfo" name="additionalInfo" rows="3"
                                class="textarea-field"></textarea>
                        </div>
                        <div>
                            <label for="email" class="label">Email</label>
                            <input type="email" id="email" name="email" class="input-field" required>
                            <p class="error-message hidden" id="emailError"></p>
                        </div>
                        <div>
                            <label for="phone" class="label">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="input-field" required>
                            <p class="error-message hidden" id="phoneError"></p>
                        </div>
                    </div>
                    <div class="checkbox-container">
                        <label class="checkbox-label">
                            <input type="checkbox" name="SwiftConnectServicePoint" class="checkbox">
                            <span class="checkbox-text">At a SwiftConnect ServicePoint (Free)</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="button" class="previous-button">Previous</button>
                        <button type="submit" class="submit-button">Proceed to Checkout</button>
                    </div>
                </form>
            </div>
        </div>

        <?php include_once '../includes/footer.php'; ?>

        <script>
        document.getElementById('packageForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const fields = ['firstName', 'lastName', 'company',
                'postalCode', 'email', 'phone'
            ];
            let isValid = true;
            fields.forEach(field => {
                const input = document.getElementById(field);
                const error = document.getElementById(field + 'Error');
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('error-border');
                    error.textContent = 'This field is required';
                    error.classList.remove('hidden');
                } else {
                    input.classList.remove('error-border');
                    error.classList.add('hidden');
                }
            });
            if (isValid) {
                alert('Form submitted successfully!');
            }
        });
        </script>
    </body>

    </html>