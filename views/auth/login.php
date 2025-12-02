<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SPK Laptop</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="auth-body">

    <div class="auth-card">
        <div class="auth-header">
            <a href="index.php" class="auth-logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path d="M20.089.58c1.063-.875 2.9-.914 2.075.962-1.045 2.378-2.865 4.411-3.987 6.865-.177.402-.206.854-.084 1.275l2.928 10.55c.06.217-.074.394-.299.394h-2.02c-.671 0-1.355-.524-1.53-1.172l-.117-.439c-.048-.183-.023-.379.069-.545.533-.972.895-2.028 1.07-3.123.02-.122-.163-.157-.206-.041-1.104 2.986-3.816 5.256-7.324 5.448-.474.026-2.656.019-2.585-.662.776-.94 1.383-1.738 1.586-1.8.232.808 2.69 1.4 3.573-1.664.463-1.61.077-2.798-.277-4.34-.045-.196-.012-.402.092-.575 1.319-2.182 2.895-3.742 4.293-5.72.135-.192-.08-.37-.245-.203-5.666 5.687-9.158 12.875-15.132 18.339-.66.603-1.42 1.32-2.141 1.831C-4.301 26.225 1.078 20.035 1.619 18.404c.162-.487.785-2.288.781-2.635-.008-.657-.363-1.033-.503-1.632C.561 8.384 4.68 3.01 10.565 3.463c1.347.105 3.518 1.173 4.715.842C16.606 3.942 18.874 1.581 20.089.58zm-6.2 7.297c-.915-1.18-3.04-1.854-4.482-1.672-5.012.628-6.859 6.57-3.229 10.193.501.5 8.243-7.834 7.711-8.521z" fill="#111"/></svg>
                comel<span style="color: var(--accent-orange);">.</span>
            </a>
            <p class="auth-subtitle">Silakan login untuk melanjutkan</p>
        </div>
        
        <?php if (!empty($error_message)): ?>
            <div class="alert-error">
                <i class="fas fa-exclamation-circle"></i> <?= $error_message; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            
            <div class="form-check">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat saya di perangkat ini</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block">
                Masuk Sekarang
            </button>
        </form>
        
        <div class="auth-footer">
            Belum punya akun? <a href="index.php?controller=auth&action=register">Daftar disini</a>
            <br><br>
            <a href="index.php" style="color: var(--text-secondary); font-size: 0.85rem;">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </div>

</body>
</html>