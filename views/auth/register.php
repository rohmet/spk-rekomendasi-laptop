<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Us - SPK Laptop</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="auth-body">

    <div class="auth-container">
        <div class="auth-card">
            <span class="auth-brand">MEMBERSHIP</span>

            <h1 class="auth-title">Join the Club.</h1>
            <p class="auth-subtitle">Create an account to curate your favorite tech recommendations.</p>
            
            <?php if (!empty($error_message)): ?>
                <div class="editorial-alert">
                    <?= $error_message; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" name="username" id="username" class="editorial-input" placeholder="Choose a unique username" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="editorial-input" placeholder="Min. 6 characters" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="editorial-input" placeholder="Repeat your password" required>
                </div>

                <button type="submit" class="btn-editorial">
                    Create Account
                </button>
            </form>
            
            <div class="auth-footer">
                Already a member? <a href="index.php?controller=auth&action=login">Sign In</a>
            </div>
        </div>
    </div>

</body>
</html>