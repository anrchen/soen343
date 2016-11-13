
<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
        class="close" title="Close Modal">&times;</span>

    <!-- Modal Content -->
    <form class="modal-content animate" action="loginValidation.php">
        <div class="imgcontainer">
            <img src="assets/img/simpleAvatar.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
            <input title="remember" type="checkbox" checked="checked"> Remember me
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</div>