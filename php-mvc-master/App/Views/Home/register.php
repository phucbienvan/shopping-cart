<?php
include "layout/header.php";
//include "layout/slider.php";
?>
    <div class="register_account">
        <h3>Register New Account</h3>
        <form method="post">
            <table>
                <tbody>
                <tr>
                    <td>
                        <div>
                            <input type="text"  name="full_name" placeholder="Name">
                        </div>

                        <div>
                            <input type="text" name="email" placeholder="Email">
                        </div>
                    </td>
                    <td>
                        <div>
                            <input type="text" name="password" placeholder="Password">
                        </div>
                        <div>
                            <input type="text"  name="phone" placeholder="Phone">
                        </div>
                        <div>
                            <input type="submit" name="submit" value="Register">
                        </div>
                    </td>
                </tr>
                </tbody></table>
            <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
            <div class="clear"></div>
        </form>
    </div>
    <div class="clear"></div>
<?php
include "../App/Views/Home/layout/footer.php";
?>