
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>ĐĂNG KÝ KHÁCH HÀNG - JETPACK COFFIN</title>

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
    padding:20px;

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

.register-box{
    position:relative;
    width:380px;
    max-width:100%;
    padding:28px;

    border-radius:20px;

    background:rgba(15,15,15,.9);

    border:1px solid rgba(255,107,0,.4);

    backdrop-filter:blur(12px);

    box-shadow:
        0 0 20px rgba(255,107,0,.15),
        0 0 60px rgba(0,0,0,.7);

    color:white;
    z-index:1;
}

.logo{
    text-align:center;
    margin-bottom:20px;
}

.logo .icon{
    font-size:40px;
    color:#ff6b00;
    margin-bottom:8px;
}

.logo h1{
    color:#ff6b00;
    font-size:27px;
    font-weight:900;
    letter-spacing:1px;
}

.logo p{
    color:#aaa;
    margin-top:6px;
    font-size:12px;
}

.input-group{
    margin-bottom:13px;
}

.input-group label{
    display:block;
    color:#ddd;
    margin-bottom:5px;
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
    font-size:12px;
}

.input-box input{
    width:100%;
    padding:10px 12px 10px 36px;

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

.register-btn{
    width:100%;
    border:none;
    border-radius:9px;
    padding:12px;

    margin-top:5px;

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

.register-btn:hover{
    transform:translateY(-2px);

    box-shadow:
        0 8px 15px rgba(255,107,0,.35);
}

.back{
    display:block;
    text-align:center;
    margin-top:15px;

    color:#ff8f00;
    font-size:12px;
    text-decoration:none;
}

.back:hover{
    text-decoration:underline;
}

.footer{
    text-align:center;
    margin-top:18px;
    color:#777;
    font-size:10px;
}

.footer span{
    color:#ff6b00;
}

@media(max-width:420px){
    .register-box{
        width:100%;
        padding:23px;
    }

    .logo h1{
        font-size:24px;
    }
}

</style>
</head>

<body>

<div class="register-box">

    <div class="logo">

        <div class="icon">
            <i class="fa-solid fa-user-plus"></i>
        </div>

        <h1>JETPACK COFFIN</h1>

        <p>ĐĂNG KÝ TÀI KHOẢN KHÁCH HÀNG</p>

    </div>

    <form action="xuly_dangky.php" method="POST">

        <div class="input-group">

            <label>Họ và tên</label>

            <div class="input-box">
                <i class="fa-solid fa-user"></i>

                <input
                    type="text"
                    name="ten"
                    placeholder="Nhập họ và tên"
                    maxlength="100"
                    required
                >
            </div>

        </div>

        <div class="input-group">

            <label>Tên tài khoản</label>

            <div class="input-box">
                <i class="fa-solid fa-id-card"></i>

                <input
                    type="text"
                    name="username"
                    placeholder="Nhập tên đăng nhập"
                    maxlength="100"
                    required
                >
            </div>

        </div>

        <div class="input-group">

            <label>Mật khẩu</label>

            <div class="input-box">
                <i class="fa-solid fa-lock"></i>

                <input
                    type="password"
                    name="password"
                    placeholder="Nhập mật khẩu"
                    required
                >
            </div>

        </div>

        <div class="input-group">

            <label>Xác nhận mật khẩu</label>

            <div class="input-box">
                <i class="fa-solid fa-key"></i>

                <input
                    type="password"
                    name="confirm_password"
                    placeholder="Nhập lại mật khẩu"
                    required
                >
            </div>

        </div>

        <div class="input-group">

            <label>Số điện thoại</label>

            <div class="input-box">
                <i class="fa-solid fa-phone"></i>

                <input
                    type="text"
                    name="dienthoai"
                    placeholder="Nhập số điện thoại"
                    maxlength="20"
                >
            </div>

        </div>

        <div class="input-group">

            <label>Email</label>

            <div class="input-box">
                <i class="fa-solid fa-envelope"></i>

                <input
                    type="email"
                    name="email"
                    placeholder="Nhập địa chỉ email"
                    maxlength="150"
                    required
                >
            </div>

        </div>

        <button type="submit" class="register-btn">
            <i class="fa-solid fa-user-check"></i>
            Tạo tài khoản
        </button>

    </form>

    <a href="login.php" class="back">
        <i class="fa-solid fa-arrow-left"></i>
        Quay lại đăng nhập
    </a>

    <div class="footer">
        © 2026 <span>JETPACK COFFIN STORE</span>
    </div>

</div>

</body>
</html>
