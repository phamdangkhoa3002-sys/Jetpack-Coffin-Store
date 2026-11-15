<?php
session_start();

if(
    isset($_GET['act']) &&
    $_GET['act'] == 'viewcart' &&
    isset($_GET['add'])
){
    if(
    isset($_GET['act']) &&
    $_GET['act'] == 'buynow' &&
    isset($_GET['id'])
){

    $id = (int)$_GET['id'];
$sqlView = "
UPDATE gh_sp_news
SET songuoixem = songuoixem + 1
WHERE id = $id
";

getData($sqlView);

    if(isset($_SESSION['cart'][$id])){

        $_SESSION['cart'][$id]++;

    }else{

        $_SESSION['cart'][$id] = 1;

    }

    header("Location: index.php?act=order");
    exit();
}

    $id = (int)$_GET['add'];

    if(isset($_SESSION['cart'][$id])){

        $_SESSION['cart'][$id]++;

    }else{

        $_SESSION['cart'][$id] = 1;

    }

    header("Location: index.php?act=viewcart");
    exit();
}

 if(!isset($_SESSION['user'])){
     header("location:login.php");
     exit();
}

    require("cons.php");
    require("function.php");

$sql = "SELECT * FROM gh_sp_sp";

$result = getData($sql);
?>

<?php

$tongSP = mysqli_num_rows(
    getRecords($conn,"id","gh_sp_sp")
);

$tongDonHang = mysqli_num_rows(
    getRecords($conn,"id","tbl_donhang")
);

$tongLienHe = mysqli_num_rows(
    getRecords($conn,"id","gh_lienhe")
);

?>



<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<meta charset="UTF-8">

<title>Danh sách sản phẩm</title>

<style>

/* =========================
   GENERAL
========================= */

body{

    margin:0;

    font-family:'Segoe UI',sans-serif;

    background-image:url('imgs/gradient-background.jpg');

    background-size:cover;

    background-position:center center;

    background-repeat:no-repeat;

    background-attachment:fixed;

    min-height:100vh;
}

a{
    text-decoration:none;
}

.content{
    padding:30px;
}

.dashboard{
    max-width:1400px;
    margin:auto;
}

/* =========================
   HEADER
========================= */

.header{
    background:#111827;
    color:#fff;
    text-align:center;
    padding:20px;
    box-shadow:0 2px 10px rgba(0,0,0,.15);
}

.header h1{
    margin:0;
}

.header-modern{

    background:
    linear-gradient(
        rgba(0,0,0,.35),
        rgba(0,0,0,.35)
    ),
    url('imgs/oisnoanc.png');

    background-size:cover;

    background-position:center 28%;

    min-height:100px;

    padding:40px 60px;

    display:flex;
    justify-content:space-between;
    align-items:center;

    color:white;
}
.logo{

    display:flex;
    align-items:center;
    gap:15px;

    font-size:32px;
    font-weight:bold;

    text-shadow:
    2px 2px 8px rgba(0,0,0,.6);
}

.site-logo{

    width:70px;
    height:70px;

    object-fit:contain;

    filter:
    drop-shadow(
        0 3px 8px rgba(0,0,0,.35)
    );
}

.search-box{
    display:flex;
    width:450px;
}

.search-box input{
    flex:1;
    border:none;
    padding:12px;
    border-radius:30px 0 0 30px;
    background:rgba(255,255,255,.95);

}

.search-box button{
    border:none;
    background:#ff6b00;
    color:white;
    padding:0 20px;
    border-radius:0 30px 30px 0;
    cursor:pointer;
}

.search-box button:hover{

    background:#ff8500;
}


/* =========================
   HERO
========================= */

.hero-card{
    background:linear-gradient(135deg,#111827,#1f2937);
    color:white;
    border-radius:20px;
    padding:30px;
    margin-bottom:25px;
    box-shadow:0 10px 30px rgba(0,0,0,.15);
}

.hero-card h1{
    margin:0;
    font-size:32px;
}

.hero-card p{
    opacity:.85;
    margin-top:10px;
}
.welcome-banner{

    position:relative;

    min-height:420px;

    border-radius:25px;

    overflow:hidden;

    display:flex;
    flex-direction:column;

    justify-content:center;
    align-items:flex-end;

    text-align:right;

    padding:70px;

    background:
    linear-gradient(
        270deg,
        rgba(0,0,0,.92) 0%,
        rgba(0,0,0,.75) 35%,
        rgba(0,0,0,.35) 65%,
        rgba(0,0,0,.05) 100%
    ),
    url('imgs/12va6e12va6e12va.png');

    background-size:cover;
    background-position:center 59%;

    box-shadow:
        0 15px 40px rgba(0,0,0,.35);

    margin-bottom:30px;
}

.welcome-banner h1{

    font-size:52px;

    line-height:1.1;

    margin:0;

    max-width:650px;

    color:#ff6b00;

    font-weight:800;

    text-shadow:
        0 4px 15px rgba(0,0,0,.6);
}

.welcome-banner h2{

    margin-top:10px;

    font-size:36px;

    color:white;
}

.welcome-banner p{

    margin-top:20px;

    max-width:500px;

    font-size:20px;

    line-height:1.7;

    color:#e5e5e5;
}

/* =========================
   QUICK STATS
========================= */

.quick-stats{
    display:flex;
    gap:25px;
    margin:40px 0;
    
}

.stat-card{

    flex:1;
    display:flex;
    align-items:center;
    gap:20px;
    background:
    rgba(0, 0, 0, 0.7);
    border-radius:20px;
    padding:25px;
    position:relative;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    transition:.35s;
}

.stat-card::before{
    content:"";
    position:absolute;
    left:0;
    top:0;
    width:6px;
    height:100%;
    background:linear-gradient(#ff6b00,#ffb347);
}

.stat-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 40px rgba(0,0,0,.15);
}

.stat-icon{
    width:70px;
    height:70px;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;

    background:
    linear-gradient(
        135deg,
        #ff6b00,
        #ffb347
    );

    color:white;
    font-size:28px;
}

.stat-card:hover{

    transform:translateY(-8px);

    box-shadow:
    0 20px 40px rgba(255,107,0,.25);
}

.stat-info h2{
    margin:0;
    font-size:34px;
    color:white;
}

.stat-info p{
    margin-top:5px;
    color:white;
}

/* =========================
   SECTION
========================= */

.section-box{
 background:
    rgba(0, 0, 0, 0.7);
        padding:30px;
    border-radius:25px;
    margin:40px 0;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.section-box h2{
    margin-bottom:25px;
    color:#222;
}

/* =========================
   PRODUCTS
========================= */

.product-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(280px,1fr));
    gap:25px;
}

.product-card{
    display:flex;
    flex-direction:column;
    background:white;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    transition:.35s;
}

.product-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(0,0,0,.15);
}

.product-img{
    width:100%;
    height:280px;
    object-fit:cover;
    transition:.4s;
    border-color: black;
}

.product-card:hover .product-img{
    transform:scale(1.05);
border-color: black;

}

.product-info{
    background:
    rgba(0, 0, 0, 0.9);
    display:flex;
    flex-direction:column;
    flex:1;
    padding:18px;
}

.product-info h3{
    margin:10px 0;
    min-height:60px;
    color:white;
}

.price{
    font-size:24px;
    color:#e53935;
    font-weight:bold;
    margin-bottom:15px;
}

.badge{
    width:fit-content;
    background:#ff9800;
    color:white;
    padding:5px 12px;
    border-radius:20px;
    font-size:12px;
}

.product-actions{

    display:flex;
    gap:10px;

    margin-top:15px;
}

.buy-now-btn,
.cart-btn{

    flex:1;

    text-align:center;

    padding:12px;

    border-radius:12px;

    font-weight:bold;

    text-decoration:none;

    transition:.3s;
}

.buy-now-btn{

    background:
    linear-gradient(
        135deg,
        #ff6b00,
        #ffb347
    );
}

.buy-now-btn a{

color: white;
}

.buy-now-btn:hover{

    transform:translateY(-3px);
color: white;

    box-shadow:
    0 8px 20px rgba(255,107,0,.35);
}

.cart-btn{

    background:
    rgba(255,255,255,.08);

    border:
    1px solid rgba(255,255,255,.2);

    color:white;
}

.cart-btn:hover{

    background:
    rgba(255,255,255,.15);
}

/* =========================
   NEWS
========================= */

.news-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:25px;
}

.news-card{
    display:flex;
    flex-direction:column;
    background:
    rgba(0, 0, 0, 0.9);
        border-radius:20px;
    overflow:hidden;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    transition:.35s;
}

.news-card:hover{
    transform:translateY(-8px);
}

.news-img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.news-content{
    display:flex;
    flex-direction:column;
    flex:1;
    padding:18px;
}

.news-content h4{
    margin:10px 0;
    min-height:55px;
    color: white;
}

.news-content p{
    color:white;
    overflow:hidden;
}

.news-date{
    font-size:12px;
    color:white;
}

.read-more{
    margin-top:auto;
    color:#ffb347;
    font-weight:bold;
}

.section-title{
    color:#ff6b00;
    font-size:28px;
    text-align:center;
    margin-bottom:30px;
}

.news-grid{
    display:grid;
    grid-template-columns:
        repeat(auto-fit,minmax(320px,1fr));
    gap:25px;
}

.news-card{
    background:#111;
    border:1px solid #2a2a2a;
    border-radius:15px;
    overflow:hidden;
    text-decoration:none;
    color:white;
    transition:.35s;
    box-shadow:0 4px 15px rgba(0,0,0,.25);
}

.news-card:hover{
    transform:translateY(-8px);
    border-color:#ff6b00;
    box-shadow:0 0 25px rgba(255,107,0,.25);
}

.news-image-wrapper{
    position:relative;
    overflow:hidden;
}

.news-img{
    width:100%;
    height:240px;
    object-fit:cover;
    transition:.4s;
}

.news-card:hover .news-img{
    transform:scale(1.08);
}

.news-date-badge{
    position:absolute;
    top:15px;
    right:15px;
    background:#ff6b00;
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:12px;
    font-weight:bold;
}

.news-content{
    padding:20px;
}

.news-content h4{
    color:#fff;
    font-size:20px;
    margin:0 0 12px;
    line-height:1.4;
}

.news-content p{
    color:#bfbfbf;
    line-height:1.7;
    margin-bottom:20px;
    min-height:80px;
}

.news-footer{
    display:flex;
    justify-content:space-between;
    align-items:center;
    border-top:1px solid #222;
    padding-top:15px;
}

.news-views{
    color:#999;
    font-size:14px;
}

.read-more{
    color:#ff6b00;
    font-weight:bold;
}

.news-card:hover .read-more{
    color:#ffb366;
}

/* =========================
   PROMOTION
========================= */

.promo-banner{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:30px;
    border-radius:20px;
    color:white;
    background:linear-gradient(135deg,#ff6b6b,#ff9f43);
}

.promo-btn{
    background:white;
    color:#ff6b6b;
    padding:12px 25px;
    border-radius:10px;
    font-weight:bold;
}

/* =========================
   SERVICES
========================= */

.highlight-row{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
}

.highlight-box{
    text-align:center;
  background:
    rgba(0, 0, 0, 0.9);
        padding:25px;
    border-radius:20px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
    transition:.3s;
}

.highlight-box:hover{
    transform:translateY(-8px);
}

.service-icon{
    font-size:40px;
        color: #ffb347;
    margin-bottom:15px;
}

/* =========================
   ADMIN TABLES
========================= */

.admin-panel{
    background:black;
    border-radius:20px;
    padding:25px;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
    color: white;
}

 

.user-info, .user-infoh2, .user-infop{
    color: #ffffff;

}

table{
    width:100%;
    border-collapse:collapse;
    background:black;
        color: white;


}

th{
    border:1px solid #222222;
    padding:12px;
    background: #222222;


}

td{
    border:1px solid #222222;
    padding:12px;
        background:black;
                    color: white;
}

img{
    border-radius:5px;
}

.add-btn{
    display:inline-block;
    background:#ff6b00;
        color:white ;

    padding:10px 15px;
    border-radius:5px;
    margin-bottom:20px;
}


.admin1, .admin2, .admin3, .admin4 {
        color: #ffb347;

}

.edit-btn{
    background:#007bff;
    color:white;
    padding:6px 10px;
    border-radius:5px;
}

.delete-btn{
    background:#dc3545;
    color:white;
    padding:6px 10px;
    border-radius:5px;
}

/* =========================
   FOOTER
========================= */

footer{
    text-align:center;
    margin-top:20px;
    color:gray;
}

/* =========================
   ANIMATION
========================= */

@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

.product-card,
.news-card,
.stat-card{
    animation:fadeUp .6s ease;
}

header{
    text-align: center;
    margin-bottom: 30px;
}

header a{
    text-decoration: none;
    margin: 0 10px;
        color: #ffb347;
    font-weight: bold;
}

.featured-news{

    display:flex;
    gap:30px;

    background:#111;

    border:2px solid #ff6b00;

    border-radius:20px;

    overflow:hidden;

    margin:40px 0;

    box-shadow:
        0 15px 40px rgba(0,0,0,.3);
}

.featured-news-image{

    flex:1;
}

.featured-news-image img{

    width:100%;
    height:100%;

    object-fit:cover;

    display:block;
}

.featured-news-content{

    flex:1;

    padding:35px;

    display:flex;

    flex-direction:column;

    justify-content:center;
}

.news-badge{

    display:inline-block;

    background:#ff6b00;

    color:white;

    padding:8px 14px;

    border-radius:999px;

    font-size:13px;

    font-weight:bold;

    margin-bottom:15px;
}

.featured-news-content h2{

    color:white;

    font-size:34px;

    margin-bottom:15px;

    line-height:1.3;
}

.news-date{

    color:#ffb066;

    margin-bottom:15px;
}

.news-summary{

    color:#ddd;

    line-height:1.8;

    margin-bottom:25px;
}

.read-more-btn{

    align-self:flex-start;

    background:#ff6b00;

    color:white;

    padding:12px 22px;

    border-radius:10px;

    text-decoration:none;

    font-weight:bold;

    transition:.3s;
}

.read-more-btn:hover{

    background:#ff8533;

    transform:translateY(-2px);
}



</style>

</head>

<body>


<link rel="stylesheet" href="css/style.css">

<!-- HEADER -->
<div class="header-modern">

<div class="logo">

    <img
        src="imgs/output-onlinepngtools (3).png"
        alt="Logo"
        class="site-logo"
    >

    <span>
        SHOP FASHION
    </span>

</div>

    <div class="search-box">

        <input
            type="text"
            placeholder="Tìm sản phẩm..."
        >

        <button>
            <i class="fa-solid fa-search"></i>
        </button>

    </div>

</div>

<div class="menu">
<ul>

<?php

$menu = [

    "🏠 Trang chủ"      => "index.php",
    "ℹ️ Giới thiệu"     => "index.php?act=intro",
    "🛍 Sản phẩm"       => "index.php?act=product",
    "📰 Tin tức"        => "index.php?act=news",
    "☎ Liên hệ"         => "index.php?act=contact",
    "⚙ Quản trị SP"     => "index.php?act=admin-product",
    "📄 Quản trị Tin"   => "index.php?act=admin-news",
    "🛒 Giỏ hàng"       => "index.php?act=viewcart"

];

foreach($menu as $key => $link){

    echo "<li>";

    echo "<a href='$link'>$key</a>";

// MENU SẢN PHẨM
if($key == "🛍 Sản phẩm"){

    $result_dm = getRecords(
        $conn,
        "*",
        "gh_sp_theloai",
        "",
        "id DESC"
    );

    echo '<ul class="submenu">';

    while($row_dm = mysqli_fetch_assoc($result_dm)){

        echo '
            <li>
                <a href="index.php?act=product&idloai='.$row_dm['id'].'">
                    '.$row_dm['ten'].'
                </a>
            </li>
        ';
    }

    echo '</ul>';
}



echo "</li>";
}

?>

</ul>
</div>

<div id="mainCarousel"
     class="carousel slide carousel-fade"
     data-bs-ride="carousel"
     data-bs-interval="3000">

    <!-- Indicators -->
    <div class="carousel-indicators">

        <button type="button"
                data-bs-target="#mainCarousel"
                data-bs-slide-to="0"
                class="active">
        </button>

        <button type="button"
                data-bs-target="#mainCarousel"
                data-bs-slide-to="1">
        </button>

        <button type="button"
                data-bs-target="#mainCarousel"
                data-bs-slide-to="2">
        </button>

    </div>

    <!-- Slides -->
    <div class="carousel-inner">

        <div class="carousel-item active">

            <a href="index.php?act=product">

             <img
        src="https://png.pngtree.com/background/20230610/original/pngtree-white-caskets-lined-up-in-a-room-with-a-fireplace-and-picture-image_3113063.jpg"
        class="d-block w-100 carousel-img">

                <div class="carousel-caption">

                <h2>Jetpack Coffin Store</h2>
                <p>Một lần nằm xuống, một đời sang chảnh.</p>

                </div>

            </a>

        </div>

        <div class="carousel-item">

            <a href="index.php?act=product">

        <img
        src="https://png.pngtree.com/background/20230611/original/pngtree-white-flowers-decorate-a-coffin-at-a-funeral-service-picture-image_3140937.jpg"
        class="d-block w-100 carousel-img">

                <div class="carousel-caption">


             <h2>Jetpack Coffin Store</h2>
            <p>Đời có thể mệt, nhưng chỗ nghỉ thì phải đẹp.</p>

                </div>

            </a>

        </div>

        <div class="carousel-item">

            <a href="index.php?act=news">


      <img
        src="https://png.pngtree.com/background/20230616/original/pngtree-variety-of-orange-and-white-flowers-are-lined-up-on-a-picture-image_3640233.jpg"
        class="d-block w-100 carousel-img">

                <div class="carousel-caption">


                  <h2>Jetpack Update</h2>
                <p>Cuộc sống vẫn tiếp diễn… cho đến khi không còn nữa. Tin tức vẫn cập nhật mỗi ngày.</p>

                </div>

            </a>

        </div>

    </div>

    <!-- Prev -->
    <button class="carousel-control-prev"
            type="button"
            data-bs-target="#mainCarousel"
            data-bs-slide="prev">

        <span class="carousel-control-prev-icon"></span>

    </button>

    <!-- Next -->
    <button class="carousel-control-next"
            type="button"
            data-bs-target="#mainCarousel"
            data-bs-slide="next">

        <span class="carousel-control-next-icon"></span>

    </button>

</div>

<!-- CONTENT -->
<div class="content">

<?php

if(isset($_GET['act'])){

    $act = $_GET['act'];

    switch($act){

        case 'intro':
            include "module/intro.php";
            break;

        case 'product':
            include "module/product.php";
            break;

        case 'news':
            include "module/news.php";
            break;

        case 'contact':
            include "module/contact.php";
            break;

        case 'admin-product':
            include "module/admin-product.php";
            break;

        case 'admin-news':
            include "module/admin-news.php";
            break;
        case 'viewcart':
            include "module/viewcart.php";
             break;
    case 'chitietsp':
        include "module/chitietsp.php";
        break;
    case 'chitiettintuc':
    include 'module/chitiettintuc.php';
    break;

        case 'order':
    include "module/order.php";
    break;

        default:
            include "module/home.php";
            break;
    }

}else{

    $tongSP = mysqli_num_rows(
        getData("SELECT id FROM gh_sp_sp")
    );

    $tongNews = mysqli_num_rows(
        getData("SELECT id FROM gh_sp_news")
    );

    $tongLienHe = mysqli_num_rows(
        getData("SELECT id FROM gh_lienhe")
    );

?>

<div class="welcome-banner">

<h1>
    JETPACK COFFIN STORE
</h1>

<p>
    Khách hàng của chúng tôi
    chưa từng phàn nàn về sản phẩm.
    Tỷ lệ quay lại mua hàng: 0%.
    Mức độ hài lòng: Vĩnh viễn.
</p>
</div>

<!-- THỐNG KÊ -->
<div class="quick-stats">

    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-box-open"></i>
        </div>

        <div class="stat-info">
            <h2><?= $tongSP ?></h2>
            <p>Tổng sản phẩm</p>
        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-cart-shopping"></i>
        </div>

        <div class="stat-info">
            <h2><?= $tongDonHang ?></h2>
            <p>Đơn hàng đã đặt</p>
        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon">
            <i class="fa-solid fa-phone"></i>
        </div>

        <div class="stat-info">
            <h2><?= $tongLienHe ?></h2>
            <p>Khách hàng liên hệ</p>
        </div>

    </div>

</div>

<?php

$featuredProducts = getData("
    SELECT *
    FROM gh_sp_sp
    WHERE anhien = 1
    ORDER BY id DESC
    LIMIT 3
");




?>

<!-- SẢN PHẨM NỔI BẬT -->
<div class="section-box">

    <h2>⭐ Sản phẩm nổi bật</h2>

    <div class="product-grid">

    <?php while($sp = mysqli_fetch_assoc($featuredProducts)){ ?>

<div class="product-card">

    <a
        href="index.php?act=chitietsp&id=<?= $sp['id']; ?>"
        class="product-link"
    >

        <img
            src="<?= $sp['hinh1']; ?>"
            class="product-img"
        >

        <div class="product-info">

            <span class="badge">
                Nổi bật
            </span>

            <h3>
                <?= $sp['ten']; ?>
            </h3>

            <p class="price">
                <?= number_format($sp['price']); ?> VNĐ
            </p>

        </div>

    </a>

<a href="index.php?act=chitietsp&id=<?= $sp['id']; ?>" class="featured-buy-btn">
    👁️ Xem sản phẩm
</a>

</div>

    <?php } ?>

    </div>
<div class="view-all-wrap">

    <a
        href="index.php?act=product"
        class="view-all-btn"
    >
        ⚰️ Xem tất cả sản phẩm
    </a>

</div>
</div>

<?php

$news = getData("
    SELECT *
    FROM gh_sp_news
    WHERE anhien = 1
    ORDER BY ngaycapnhat DESC
    LIMIT 3
");

?>
<!-- TIN TỨC -->
<div class="section-box">

    <h2 class="section-title">
        📰 Tin Tức Mới Nhất
    </h2>

    <div class="news-grid">

    <?php while($n = mysqli_fetch_assoc($news)){ ?>

        <a
            class="news-card"
            href="index.php?act=chitiettintuc&id=<?= $n['id']; ?>"
        >

            <div class="news-image-wrapper">

                <?php if(!empty($n['hinh'])){ ?>

                <img
                    src="<?= $n['hinh']; ?>"
                    class="news-img"
                    alt="<?= htmlspecialchars($n['ten']); ?>"
                >

                <?php } ?>

                <span class="news-date-badge">
                    📅 <?= date("d/m/Y", strtotime($n['ngaycapnhat'])); ?>
                </span>

            </div>

            <div class="news-content">

                <h4>
                    <?= htmlspecialchars($n['ten']); ?>
                </h4>

                <p>

                    <?= mb_substr(
                        strip_tags($n['tomtat']),
                        0,
                        120
                    ); ?>

                    ...

                </p>

                <div class="news-footer">

                    <span class="news-views">

                        👁 <?= number_format($n['songuoixem']); ?>

                    </span>

                    <span class="read-more">
                        Đọc tiếp →
                    </span>

                </div>

            </div>

        </a>

    <?php } ?>

    </div>

</div>

<?php



$sqlFeatured = "
SELECT *
FROM gh_sp_news
WHERE anhien = 1
ORDER BY
    songuoixem DESC,
    noibat DESC,
    ngaycapnhat DESC
LIMIT 1
";

$featuredNews = getData($sqlFeatured);

?>

<?php
if(mysqli_num_rows($featuredNews) > 0){

    $news = mysqli_fetch_assoc($featuredNews);
?>

<div class="featured-news">

    <div class="featured-news-image">

 <img
    src="<?= $news['hinh']; ?>"
    alt="<?= htmlspecialchars($news['ten']); ?>"
>

    </div>

    <div class="featured-news-content">

        <span class="news-badge">
            🔥 TIN NỔI BẬT NHẤT
        </span>

        <h2>
            <?= $news['ten']; ?>
        </h2>

        <p class="news-date">

            📅
            <?= date(
                'd/m/Y',
                strtotime($news['ngaycapnhat'])
            ); ?>

        </p>

        <p class="news-summary">

            <?= $news['tomtat']; ?>

        </p>

        <a
            href="index.php?act=chitiettintuc&id=<?= $news['id']; ?>"
            class="read-more-btn"
        >
            Xem chi tiết →
        </a>

    </div>

</div>

<?php } ?>


<!-- DỊCH VỤ -->
<div class="highlight-row">

    <a class="highlight-box">

            <div class="service-icon">
    <i class="fa-solid fa-truck-fast"></i>
</div>

<h3>Giao hàng toàn quốc</h3>

<p>
    Miễn phí vận chuyển cho đơn từ 5.000.000.000 VNĐ
</p>
       

    </a>

    <a  class="highlight-box">

<div class="service-icon">
    <i class="fa-solid fa-cart-shopping"></i>
</div>

<h3>Giỏ hàng</h3>

<p>
    Kiểm tra sản phẩm đã chọn
</p>
       

    </a>

    <a  class="highlight-box">

<div class="service-icon">
    <i class="fa-solid fa-headset"></i>
</div>

<h3>Hỗ trợ 24/7</h3>

<p>
    Đội ngũ tư vấn luôn sẵn sàng hỗ trợ
</p>
       

    </a>

</div>

<?php

}

?>

</div>
 

</header>



<footer>


</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>