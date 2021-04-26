<?php
include "layout/header.php";
//include "layout/slider.php";
?>
    <div class="main">
        <div class="content">
            <div class="login_panel">
                <h3>Existing Customers</h3>
                <p>Sign in with the form below.</p>
                <form  method="post" id="member">
                    <input name="email" type="text" value="Email" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
                    <input name="password" type="text" value="Password" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
                    <input type="submit" name="submit" value="Login">
                </form>
                <p class="note"><a href="/register">Register</a></p>
            </div>

            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php
include "../App/Views/Home/layout/footer.php";
?>