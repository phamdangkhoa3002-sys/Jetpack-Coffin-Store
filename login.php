
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>JETPACK COFFIN ADMIN</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;

    background:
    linear-gradient(
        rgba(0,0,0,.75),
        rgba(0,0,0,.75)
    ),
    url('imgs/oisnoanc.png');

    background-size:cover;
    background-position:center;
}

body::before{
    content:"";
    position:fixed;
    inset:0;

    background:
    radial-gradient(
        circle at center,
        transparent,
        rgba(0,0,0,.6)
    );
}

.login-box{
    position:relative;
    width:380px;
    padding:30px;

    border-radius:20px;

    background:rgba(15,15,15,.85);

    border:1px solid rgba(255,107,0,.3);

    backdrop-filter:blur(12px);

    box-shadow:
        0 0 20px rgba(255,107,0,.15),
        0 0 60px rgba(0,0,0,.7);

    z-index:1;
}

.logo{
    text-align:center;
    margin-bottom:20px;
}

.logo .coffin{
    font-size:50px;
    color:#ff6b00;
    margin-bottom:10px;
}

.logo h1{
    color:#ff6b00;
    font-size:30px;
    font-weight:900;
    letter-spacing:1.5px;
}

.logo h2{
    color:#ddd;
    margin-top:6px;
    font-size:13px;
    font-weight:400;
}

.logo p{
    color:#999;
    margin-top:8px;
    font-size:12px;
    font-style:italic;
}

.input-group{
    margin-bottom:16px;
}

.input-group label{
    display:block;
    color:#ddd;
    margin-bottom:6px;
    font-size:12px;
}

.input-box{
    position:relative;
}

.input-box i{
    position:absolute;
    left:13px;
    top:50%;
    transform:translateY(-50%);
    color:#ff6b00;
    font-size:13px;
}

.input-box input{
    width:100%;
    padding:11px 12px 11px 38px;

    border:none;
    outline:none;
    border-radius:9px;

    background:#222;
    color:white;
    font-size:13px;

    border:1px solid #333;
}

.input-box input:focus{
    border-color:#ff6b00;

    box-shadow:
    0 0 8px rgba(255,107,0,.3);
}

.login-btn{
    width:100%;
    border:none;
    border-radius:9px;
    padding:12px;

    background:
    linear-gradient(
        135deg,
        #ff6b00,
        #ff8f00
    );

    color:white;
    font-size:14px;
    font-weight:bold;
    cursor:pointer;
    transition:.3s;
}

.login-btn:hover{
    transform:translateY(-2px);

    box-shadow:
        0 8px 15px rgba(255,107,0,.35);
}

.register-btn{
    display:block;
    width:100%;
    margin-top:10px;
    padding:11px;

    text-align:center;
    border:1px solid #ff6b00;
    border-radius:9px;

    color:#ff8f00;
    background:transparent;

    font-size:13px;
    font-weight:bold;
    text-decoration:none;

    transition:.3s;
}

.register-btn:hover{
    background:#ff6b00;
    color:white;
    transform:translateY(-2px);
}

.footer{
    text-align:center;
    margin-top:18px;
    color:#777;
    font-size:11px;
}

.footer span{
    color:#ff6b00;
}

.quote{
    text-align:center;
    color:#999;
    margin-bottom:18px;
    font-size:11px;
    font-style:italic;
}

@media(max-width:420px){
    .login-box{
        width:100%;
        padding:25px;
    }

    .logo h1{
        font-size:26px;
    }
}

</style>
</head>

<body>

<div class="login-box">

    <div class="logo">

        <div class="coffin">
            ⚰️
        </div>

        <h1>JETPACK COFFIN</h1>

        <h2>ADMIN LOGIN SYSTEM</h2>

        <p>
            Bảo hành đến hết đời khách hàng.
        </p>

    </div>

    <div class="quote">
        "Khách hàng chỉ mua một lần.
        Chúng tôi hiểu điều đó."
    </div>

    <form method="POST" action="xuly.php">

        <div class="input-group">

            <label>Tên quản trị viên</label>

            <div class="input-box">

                <i class="fa-solid fa-user"></i>

                <input
                    type="text"
                    name="username"
                    placeholder="Nhập tài khoản..."
                    required
                >

            </div>

        </div>

        <div class="input-group">

            <label>Mật khẩu bí mật</label>

            <div class="input-box">

                <i class="fa-solid fa-key"></i>

                <input
                    type="password"
                    name="password"
                    placeholder="Nhập mật khẩu..."
                    required
                >

            </div>

        </div>

        <button type="submit" class="login-btn">
            <i class="fa-solid fa-door-open"></i>
            Đăng nhập quản trị
        </button>

        <a href="dangky.php" class="register-btn">
            <i class="fa-solid fa-user-plus"></i>
            Tạo tài khoản khách hàng
        </a>

    </form>

    <div class="footer">

        © 2026 <span>JETPACK COFFIN STORE</span>

        <br><br>

        "Chúng tôi không bán hy vọng.
        Chúng tôi bán giải pháp cuối cùng."

    </div>

</div>

</body>
</html>
