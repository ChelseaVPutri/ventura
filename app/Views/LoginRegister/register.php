<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS.'login-register.css'; ?>">
    <title>Register</title>
    <link rel="icon" href="<?php echo ASSET.'logo.png'; ?>">
</head>
<body>
    <header>
        <div class="navbar">
            <img src="<?php echo ASSET.'logo.png'; ?>" id="logo">
            <nav>
                <a href="login">Login</a>
                <a href="register">Register</a>
            </nav>
        </div>
    </header>

    <div class="formContainer">
        <div class="formBox">
            <h2>Register</h2>
            <p>Sudah punya akun? <a href="login" id="sign-link">Login</a></p>

            <?php
                if(session()->getFlashdata('eror')) {
                    echo session()->getFlashdata('eror');
                }; 
            ?>

            <form action="service/save" method="post">
                <div class="inputField">
                    <input type="email" id="username" name="email" placeholder="Email"required>
                </div>
                <div class="inputField">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="inputField">
                    <input type="password" id="username" name="password" placeholder="Password"required>
                </div>
                <div class="inputField" style="display: flex;">
                    <input style="width: 50%;" type="text" id="captcha" name="captcha" placeholder="Masukkan kode captcha"required>
                    <input style="width: 20%; display:flex; align-items: center; flex: 1; border: none; outline: none; color: #EA6932; font-weight: bold;"
                    id="captcha-rand" name="captcha-random" value="<?= $randnum; ?>" readonly>
                </div>


                
                <button type="submit" name="submit" value="register">Register</button>
                
                <div class="inputField" id="separator">
                    <hr class="line">
                    <p id="atau">ATAU</p>
                    <hr class="line">
                </div>
                
                <div class="inputField" id="google-logo">
                  
                        <img src="/uts/assets/google.png" id="google" style="width: 100%; height: 50px; padding-top: 10px;">
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>