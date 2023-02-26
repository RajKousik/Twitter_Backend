
<?php  include_once "header.php"; ?>

<body>
   
     <div class="wrapper">
     <div class="wrapper">
        <section class="form login">
            <header>Twitter Application</header>
            <form action="#" autocomplete="off">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" id="pwd" name="password" placeholder="Enter you rpassword">
                    <i class="fas fa-eye" id="pwdEye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Start to Chat">
                </div>
            </form>
            <div class="link">Don't have an Account? <a href="signin.php">SignUp Here</a></div>
        </section>
    </div>

</body>
</html>
