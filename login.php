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

    overflow:hidden;
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

    width:450px;

    padding:45px;

    border-radius:25px;

    background:
    rgba(15,15,15,.85);

    border:1px solid rgba(255,107,0,.3);

    backdrop-filter:blur(12px);

    box-shadow:
        0 0 25px rgba(255,107,0,.15),
        0 0 80px rgba(0,0,0,.7);

    z-index:1;
}

.logo{

    text-align:center;

    margin-bottom:30px;
}

.logo .coffin{

    font-size:70px;

    color:#ff6b00;

    margin-bottom:15px;
}

.logo h1{

    color:#ff6b00;

    font-size:38px;

    font-weight:900;

    letter-spacing:2px;
}

.logo h2{

    color:#ddd;

    margin-top:8px;

    font-size:16px;

    font-weight:400;
}

.logo p{

    color:#999;

    margin-top:10px;

    font-style:italic;
}

.input-group{

    margin-bottom:22px;
}

.input-group label{

    display:block;

    color:#ddd;

    margin-bottom:8px;

    font-size:14px;
}

.input-box{

    position:relative;
}

.input-box i{

    position:absolute;

    left:15px;

    top:50%;

    transform:translateY(-50%);

    color:#ff6b00;
}

.input-box input{

    width:100%;

    padding:14px 14px 14px 45px;

    border:none;

    outline:none;

    border-radius:12px;

    background:#222;

    color:white;

    font-size:15px;

    border:1px solid #333;
}

.input-box input:focus{

    border-color:#ff6b00;

    box-shadow:
    0 0 10px rgba(255,107,0,.3);
}

.login-btn{

    width:100%;

    border:none;

    border-radius:12px;

    padding:15px;

    background:
    linear-gradient(
        135deg,
        #ff6b00,
        #ff8f00
    );

    color:white;

    font-size:16px;

    font-weight:bold;

    cursor:pointer;

    transition:.3s;
}

.login-btn:hover{

    transform:translateY(-3px);

    box-shadow:
        0 10px 20px rgba(255,107,0,.35);
}

.footer{

    text-align:center;

    margin-top:25px;

    color:#777;

    font-size:13px;
}

.footer span{

    color:#ff6b00;
}

.quote{

    text-align:center;

    color:#999;

    margin-bottom:25px;

    font-size:13px;

    font-style:italic;
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