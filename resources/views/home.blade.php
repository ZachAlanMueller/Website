<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <style>
        @include('css.homecss')
    </style>
    <script>
        @include('js.homejs')
    </script>
<!--
    
-->
</head>
<body id="body">
    <div id="nav">
        <ul>
            <li class="home"><a href="#">Home</a></li>
            <li class="programs"><a href="#">Programs</a></li>
            <li class="relaxation"><a href="#">Relaxation</a></li>
            <li class="blog"><a href="#">Blog</a></li>
            <li class="contact"><a href="#">Contact</a></li>
        </ul>
    </div>
    <title>Zach Alan Mueller</title>
    <h1 id="description">
        Zach Alan Mueller
    </h1>
    <!--- github button -->
    <div class="buttons">
        <a class="github-button" href="https://github.com/ZachAlanMueller" data-style="mega" aria-label="Follow @ZachAlanMueller on GitHub">@ZachAlanMueller</a>
        <script async defer id="github-bjs" src="https://buttons.github.io/buttons.js"></script>
    </div>
    <!--- github button -->
    <header>    
        <div id="sidenav_back"></div>
        <div id="sidenav">
            <ul>
                <li class="summary"><a href="#">Summary</a></li>
                <li class="family"><a href="#">Family</a></li>
                <li class="career"><a href="#">Career</a></li>
                <li class="friendship"><a href="#">Friendship</a></li>
                <li class="recreation"><a href="#">Recreation</a></li>
                <li class="spiritual"><a href="#">Spiritual</a></li>
            </ul>
        </div>
    </header>
    <div class="paragraph">    
        <p id="psummary">
            Beginning 
        </p>
        <p id="pfamily">
            Family
        </p>
        <p id="pcareer">
            Career
        </p>
        <p id="pfriendship">
            Friendship
        </p>
        <p id="precreation">
            Recreation
        </p>
        <p id="pspiritual">
            Spiritual
        </p>
    </div>
</body>
</html>