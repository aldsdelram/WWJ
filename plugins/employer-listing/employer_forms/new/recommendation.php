<?php
function recommendations_func() {

    $user_id = get_current_user_id();
    
    if(isset($_POST['ref-submit'])){
        foreach ($_POST as $key => $value) {
            if($key == "ref-submit")
                continue;
            $new_value = $value;
            update_user_meta( $user_id, '_profile_'.$key, $new_value );
        }

        wp_redirect(home_url('/employer/dashboard/registration/success/'));
    }
?>

<div id="next-container">
    <div class="next-content" style="background:url('<?=wp_get_attachment_url(608) ?>')">
        <div class="header">
            Don’t leave your friends behind! Share the joy of fast and easy recruitment anytime, anywhere.
        </div>

        <div class="images">
            <?php echo '<img src="'.wp_get_attachment_url(607).'">';?><br/>
            <?php echo '<img src="'.wp_get_attachment_url(606).'">';?>
        </div>

        <p><strong>EARN YOURSELF 5 CREDITS + A CHANCE TO WIN EXCLUSIVE DEALS!</strong></p>

        <p>Users who invite 5 friends from this page stand to earn vouchers and discounts ranging from retreat spas, popular eateries to BBQ catering. <span class="tac">*Terms &amp; conditions apply</span>
        </p>

        <form method="post">
            <div class="resume-content">
                <div class="form-group">
                    <label for="ref_email_address">Email Address</label>
                    <input name="ref_email_address[]" class="input-field validate" type="text">
                </div>
                <div class="form-group">
                    <label for="ref_email_address">Email Address</label>
                    <input name="ref_email_address[]" class="input-field validate" type="text">
                </div>
                <div class="form-group">
                    <label for="ref_email_address">Email Address</label>
                    <input name="ref_email_address[]" class="input-field validate" type="text">
                </div>
                <div class="form-group">
                    <label for="ref_email_address">Email Address</label>
                    <input name="ref_email_address[]" class="input-field validate" type="text">
                </div>
                <div class="form-group">
                    <label for="ref_email_address">Email Address</label>
                    <input name="ref_email_address[]" class="input-field validate" type="text">
                </div>

                <div class="btn-panel rd-row rd-middle-xs rd-center-xs">
                    <input type="submit" name="ref-submit" value="Send">
                </div>
            </div>
        </form>
    </div>
</div>

<?php

return ob_get_clean();
}

add_shortcode( 'employer-recommendations', 'recommendations_func' );
