<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise 4: Form Validation</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        label .required {
            color: red;
        }
        input[type="text"],
        input[type="email"],
        input[type="url"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }
        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        .radio-group {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }
        .radio-option {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        input[type="radio"] {
            width: auto;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #5568d3;
        }
        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
        .field-error {
            border-color: red !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Form</h1>
        
        <?php
        /**
         * Exercise 4: Form Validation
         * ICT726 Tutorial 9
         * 
         * Validation Rules:
         * - Name: Required, letters and whitespace only
         * - Email: Required, valid email format
         * - Website: Optional, valid URL if provided
         * - Comment: Optional, multi-line textarea
         * - Gender: Required, must select one
         */
        
        // Initialize variables
        $name = $email = $website = $comment = $gender = '';
        $errors = [];
        $success = false;
        
        // Process form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get form data
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $website = trim($_POST['website'] ?? '');
            $comment = trim($_POST['comment'] ?? '');
            $gender = $_POST['gender'] ?? '';
            
            // Validation Rules
            
            // Name: Required, letters and whitespace only
            if (empty($name)) {
                $errors['name'] = 'Name is required';
            } elseif (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
                $errors['name'] = 'Name must only contain letters and whitespace';
            }
            
            // Email: Required, valid email format
            if (empty($email)) {
                $errors['email'] = 'Email is required';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Invalid email format';
            }
            
            // Website: Optional, valid URL if provided
            if (!empty($website)) {
                if (!filter_var($website, FILTER_VALIDATE_URL)) {
                    $errors['website'] = 'Invalid URL format';
                }
            }
            
            // Comment: Optional (no validation needed, just store it)
            
            // Gender: Required
            if (empty($gender)) {
                $errors['gender'] = 'Gender selection is required';
            }
            
            // If no errors, form is valid
            if (empty($errors)) {
                $success = true;
            }
        }
        ?>
        
        <?php if ($success): ?>
            <div class="success">
                <strong>Success!</strong> Form submitted successfully.<br><br>
                <strong>Submitted Data:</strong><br>
                Name: <?php echo htmlspecialchars($name); ?><br>
                Email: <?php echo htmlspecialchars($email); ?><br>
                Website: <?php echo !empty($website) ? htmlspecialchars($website) : 'Not provided'; ?><br>
                Comment: <?php echo !empty($comment) ? nl2br(htmlspecialchars($comment)) : 'Not provided'; ?><br>
                Gender: <?php echo htmlspecialchars($gender); ?><br>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="name">
                    Name <span class="required">*</span>
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="<?php echo htmlspecialchars($name); ?>"
                       class="<?php echo isset($errors['name']) ? 'field-error' : ''; ?>">
                <?php if (isset($errors['name'])): ?>
                    <div class="error"><?php echo $errors['name']; ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="email">
                    E-mail <span class="required">*</span>
                </label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="<?php echo htmlspecialchars($email); ?>"
                       class="<?php echo isset($errors['email']) ? 'field-error' : ''; ?>">
                <?php if (isset($errors['email'])): ?>
                    <div class="error"><?php echo $errors['email']; ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="website">Website</label>
                <input type="url" 
                       id="website" 
                       name="website" 
                       placeholder="https://example.com"
                       value="<?php echo htmlspecialchars($website); ?>"
                       class="<?php echo isset($errors['website']) ? 'field-error' : ''; ?>">
                <?php if (isset($errors['website'])): ?>
                    <div class="error"><?php echo $errors['website']; ?></div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea id="comment" 
                          name="comment" 
                          placeholder="Enter your comment here..."><?php echo htmlspecialchars($comment); ?></textarea>
            </div>
            
            <div class="form-group">
                <label>
                    Gender <span class="required">*</span>
                </label>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" 
                               id="male" 
                               name="gender" 
                               value="Male"
                               <?php echo $gender === 'Male' ? 'checked' : ''; ?>>
                        <label for="male" style="font-weight: normal;">Male</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" 
                               id="female" 
                               name="gender" 
                               value="Female"
                               <?php echo $gender === 'Female' ? 'checked' : ''; ?>>
                        <label for="female" style="font-weight: normal;">Female</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" 
                               id="other" 
                               name="gender" 
                               value="Other"
                               <?php echo $gender === 'Other' ? 'checked' : ''; ?>>
                        <label for="other" style="font-weight: normal;">Other</label>
                    </div>
                </div>
                <?php if (isset($errors['gender'])): ?>
                    <div class="error"><?php echo $errors['gender']; ?></div>
                <?php endif; ?>
            </div>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
