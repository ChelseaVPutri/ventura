<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= CSS.'login-register.css'; ?>">
    <link rel="icon" href="<?= ASSET.'logo.png'; ?>">
    <title><?= $title; ?></title>
</head>
<body>

    <header>
        <div class="navbar">
            <a href="pages/home"><img src="<?= ASSET.'logo.png'; ?>" id="logo"></a>
            <nav>
                <a href="login">Login</a>
                <a href="register">Register</a>
            </nav>
        </div>
    </header>

    <div class="formContainer">
        <div class="formBox">
            <h2>Login</h2>
            <p>Belum punya akun? <a href="register" id="sign-link">Register</a></p>
            <form method="post" action="<?= base_url('service/loginAction'); ?>">
                <?php
                    if(session()->getFlashdata('gagal'))
                    {
                        echo session()->getFlashdata('gagal');
                    }
                    elseif(session()->getFlashdata('notfound')){
                        echo session()->getFlashdata('notfound');        
                    }
                ?>
                <div class="inputField">
                    <input type="text" id="username" name="username" placeholder="Username" required autofocus>
                </div>
                <div class="inputField">
                    <input type="password" id="username" name="password" placeholder="Password"required>
                </div>
                <div class="inputField" style="display: flex;">
                    <input style="width: 50%;" type="text" id="captcha" name="captcha" placeholder="Masukkan kode captcha"required>
                    <input style="width: 20%; display:flex; align-items: center; flex: 1; border: none; outline: none; color: #EA6932; font-weight: bold;"
                    id="captcha-rand" name="captcha-random" value="<?= $rand; ?>" readonly>
                </div>
                
                <button type="submit" name="submit" value="register">Login</button>
                
                <!-- <div class="inputField" id="separator">
                    <hr class="line">
                    <p id="atau">ATAU</p>
                    <hr class="line">
                </div>
                
                <div class="inputField" id="google-logo">
                    <img src="<//?php echo ASSET.'google.png'; ?>" id="google"> -->
            </form>
            
        </div>
    </div>
</body>
</html>