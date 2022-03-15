<nav>
    <div id="footer">
        <ul>
            <li><a href="designbelts/" target="_blank" title="iTailor Custom Made Belts"><span>CUSTOM BELT</span>
                    29.95 $</a></li>
            <li><a href="http://www.itailor.com/designshirts/" target="_blank" title="iTailor Tailored Shirts"><span data-lang="tailored-shirts" data-traffic="link-shirt">TAILORED SHIRTS</span> 39.95 $</a>
            </li>
            <li><a href="http://www.itailor.com/designsuits/" target="_blank" title="iTailor Tailored Suits"><span data-lang="tailored-suits" data-traffic="link-suit">TAILORED SUITS</span> 139 $</a></li>
            <li><a href="http://www.itailor.com/about-us.php" target="_blank" title="iTailor About Us" data-lang="about-us" data-traffic="link-about">About Us</a></li>
            <li><a href="http://www.itailor.com/faq.php" target="_blank" title="iTailor FAQ" data-lang="faq" data-traffic="link-faq">FAQ</a></li>
            <li><a href="http://www.itailor.com/contact-us.php" target="_blank" title="iTailor Contact Us" data-lang="contact-us" data-traffic="link-contact">Contact Us</a></li>
            <li data-traffic="link-subscribe" class="linkSubscribe" data-lang="subscribe">SUBSCRIBE</li>
        </ul>
    </div>
</nav>
<div id="modal">
    <div id="login-box">
        <h2 data-lang="login">Login</h2>
        <form id="login-form" name="login-form" method="post" action="designshoes/">
            @csrf
            <div><span data-lang="email">Email*:</span><input type="email" name="email"></div>
            <div><span data-lang="password">Password*:</span><input type="password" name="password"></div>
            <p class="p1"><a href="designshoes/#" class="forgetpass" data-lang="forgot-password" data-traffic="popup-forgot">Forgot your Password</a></p>
            <div>
                <button type="button" class="btnstep" id="submitform" data-lang="login">Login</button>
                <button type="button" class="btnstep" onclick="closeModal('modal')" data-lang="exit">EXIT</button>
            </div>
            <p class="p2"><a href="javascript:void(0)" class="btnstep RegMember" data-lang="register-new-member" data-traffic="popup-register">Register New Member</a></p>

            <span data-lang="detail-login">For first time customers,please proceed to design your order.During
                checkout,you will be able to submit your email and password to setup an account with us.Enjoy your
                designing experience on iTailor.</span>
        </form>
    </div>
    <div id="forgot-box">
        <h2><span data-lang="forgot-password">Forgot your Password</span></h2>
        <span style="margin-bottom:80px">
            <span data-lang="detail-forget-line1">Just enter the email address associated with your itailor account
                below and click send.</span>
            <br>
            <br>
            <span data-lang="detail-forget-line2">You will shortly receive an email containing your password.</span>
        </span>
        <form id="forgot-form" name="forgot-form" method="post" action="designshoes/">
            <div><span data-lang="email">Email*:</span><input type="email" name="lostpass" style="width: 70%"></div>
            <div>
                <button type="button" class="btnstep" id="submitforgot" data-lang="send">Send</button>
                <button type="button" class="btnstep" onclick="closeModal('modal')" data-lang="exit">EXIT</button>
            </div>
        </form>
    </div>
</div>
<div id="modal-paypal"><img id="plp" src="{{asset('images/loader6.gif')}}">
</div>


<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->


</body>

</html>