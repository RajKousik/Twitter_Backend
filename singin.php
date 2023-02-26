<?php  include_once "header.php"; ?> 

<body>
    
    <div class="wrapper">
        <section class="form signup">
            <header>Twitter Application</header>
            <form action="#" enctype="multipart/form-data" autocomplete="off">
                <div class="error-txt"></div>
                <div class="flex">
                    <div class="field input">
                        <label>First Name</label>
                        <input type="text" name="fname" placeholder="First Name" required>
                    </div>
                    <div class="field input">
                        <label>Middle Name</label>
                        <input type="text" name="mname" placeholder="Middle Name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                    <div>
                      <label>
                        <input type="radio" name="gender" value="male">
                        Male
                      </label>
                      <label>
                        <input type="radio" name="gender" value="female">
                        Female
                      </label>
                      <label>
                        <input type="radio" name="gender" value="other">
                        Other
                      </label>
                    </div>

                    <div class="field input">
                        <label>Age</label>
                        <input type="number" name="age" placeholder="age" required>
                    </div>
                    <div class="field input">
                        <label>Phone No</label>
                        <input type="number" name="phoneno" placeholder="phoneno" pattern="[0-9]{10}"required>
                    </div>
                </div>
               <div class="field input">
                    <label>Email Address</label>
                    <input type="text" name="email" placeholder="Enter your email" required>
                </div>
                <div class="flex">
                    <div class="field input">
                        <label>Password</label>
                        <input type="password" id="pwd" name="password" placeholder="Password" required>
                        <i class="fas fa-eye" id="pwdEye"></i>
                    </div>
                    <div class="field input">
                        <label>Re-type Password</label>
                        <input type="password" id="confirm" name="cpassword" placeholder="Confirm" required>
                        <i class="fas fa-eye" id="confirmEye"></i>
                    </div>
                </div>
                <div class="field image">                                                       
                    <label for="formFile" class="form-label">Upload Your Profile</label>
                    <input class="form-control" name="image" type="file" id="formFile" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Start to Chat">
                </div>
            </form>
            <div class="link">Already Signed Up? <a href="login.php">Login Here</a></div>
        </section>
    </div>

</body>
</html>