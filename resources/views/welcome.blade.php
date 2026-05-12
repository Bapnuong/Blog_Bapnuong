<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blog System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

body{

    margin:0;
    padding:0;

    font-family:Arial, Helvetica, sans-serif;

    background:
        linear-gradient(
            135deg,
            #f8fafc,
            #fff7ed,
            #ffffff
        );

    min-height:100vh;

    overflow-x:hidden;
}

.navbar{

    display:flex;
    justify-content:space-between;
    align-items:center;

    padding:25px 80px;

    background:rgba(255,255,255,.75);

    backdrop-filter:blur(20px);

    border-bottom:1px solid rgba(255,255,255,.4);

    position:sticky;
    top:0;

    z-index:1000;
}

.logo{

    font-size:38px;

    font-weight:900;

    color:#f97316;
}

.nav-buttons{

    display:flex;
    gap:15px;
}

.btn{

    padding:14px 28px;

    border-radius:18px;

    text-decoration:none;

    font-weight:bold;

    transition:.35s;
}

.login-btn{

    background:white;

    color:#2563eb;

    border:1px solid #dbeafe;
}

.login-btn:hover{

    background:#2563eb;

    color:white;

    transform:translateY(-3px);
}

.register-btn{

    background:
        linear-gradient(
            135deg,
            #f97316,
            #ec4899
        );

    color:white;

    box-shadow:
        0 15px 40px rgba(249,115,22,.25);
}

.register-btn:hover{

    transform:translateY(-4px);
}

.hero{

    min-height:90vh;

    display:flex;
    justify-content:center;
    align-items:center;

    text-align:center;

    padding:40px;

    position:relative;
}

.hero-content{

    max-width:900px;

    z-index:2;
}

.hero h1{

    font-size:88px;

    line-height:1.1;

    margin-bottom:25px;

    font-weight:900;

    background:
        linear-gradient(
            to right,
            #0f172a,
            #f97316
        );

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;

    animation:float 4s ease-in-out infinite;
}

.hero p{

    font-size:24px;

    color:#64748b;

    line-height:1.8;

    margin-bottom:45px;
}

.hero-buttons{

    display:flex;
    justify-content:center;

    gap:20px;

    flex-wrap:wrap;
}

.start-btn{

    background:
        linear-gradient(
            135deg,
            #f97316,
            #ec4899
        );

    color:white;

    padding:18px 36px;

    border-radius:20px;

    text-decoration:none;

    font-size:18px;

    font-weight:bold;

    box-shadow:
        0 15px 40px rgba(249,115,22,.25);

    transition:.35s;
}

.start-btn:hover{

    transform:translateY(-5px);
}

.learn-btn{

    background:white;

    color:#2563eb;

    border:1px solid #dbeafe;

    padding:18px 36px;

    border-radius:20px;

    text-decoration:none;

    font-size:18px;

    font-weight:bold;

    transition:.35s;
}

.learn-btn:hover{

    background:#2563eb;

    color:white;

    transform:translateY(-5px);
}

.circle{

    position:absolute;

    border-radius:50%;

    filter:blur(90px);

    opacity:.35;
}

.circle1{

    width:320px;
    height:320px;

    background:#fb923c;

    top:-100px;
    left:-100px;
}

.circle2{

    width:350px;
    height:350px;

    background:#60a5fa;

    bottom:-120px;
    right:-100px;
}

@keyframes float {

    0%{
        transform:translateY(0px);
    }

    50%{
        transform:translateY(-12px);
    }

    100%{
        transform:translateY(0px);
    }
}

@media(max-width:768px){

    .navbar{
        padding:20px;
    }

    .hero h1{
        font-size:54px;
    }

    .hero p{
        font-size:18px;
    }

    .hero-buttons{
        flex-direction:column;
    }

    .start-btn,
    .learn-btn{
        width:100%;
    }

}

</style>

</head>

<body>

<div class="circle circle1"></div>
<div class="circle circle2"></div>

<nav class="navbar">

    <div class="logo">
        BLOG.
    </div>

    <div class="nav-buttons">

        @auth

            <a href="/dashboard" class="btn register-btn">
                Dashboard
            </a>

        @else

            <a href="{{ route('login') }}" class="btn login-btn">
                Login
            </a>

            <a href="{{ route('register') }}" class="btn register-btn">
                Register
            </a>

        @endauth

    </div>

</nav>

<section class="hero">

    <div class="hero-content">

        <h1>
            Share Your Ideas
            With The World
        </h1>

        <p>

            Create posts, connect with people,
            share your thoughts and build your own
            modern blogging platform using Laravel.

        </p>

        <div class="hero-buttons">

            <a href="{{ route('register') }}" class="start-btn">
                Get Started
            </a>

            <a href="{{ route('login') }}" class="learn-btn">
                Login
            </a>

        </div>

    </div>

</section>

</body>
</html>
