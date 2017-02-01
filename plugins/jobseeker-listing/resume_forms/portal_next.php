<?php  
 function portal_next() {
        if(isset($_POST['ref-submit'])){

            foreach ($_POST as $key => $value) {
                if($key == "ref-submit")
                    continue;
                if(get_user_meta($user_id, '_profile_'.$key, true)){
                    $new_value = serialize($value);
                    update_user_meta( $user_id, '_profile_'.$key, $new_value );
                }
                else
                    add_user_meta($user_id, '_profile_'.$key, serialize($value));
            }

            wp_redirect(home_url('/profile'));

        }



        if(isset($_POST['done'])){
            $user_id = get_current_user_id();

            foreach ($_POST as $key => $value) {
                if($key == "done")
                    continue;
                if(get_user_meta($user_id, '_profile_'.$key, true)){
                    $new_value = serialize($value);
                    update_user_meta( $user_id, '_profile_'.$key, $new_value );
                }
                else
                    add_user_meta($user_id, '_profile_'.$key, serialize($value));
            }


            ob_start();
            ?>
                <div class="portal--next-container">
                    <div class="box-shadow">
                        <?php echo '<img src="'.get_stylesheet_directory_uri(). '/images/wwj_logo.png">';?>
                        <h1>Don’t leave your friends behind! Get them in the loop. Share the joy of fast and easy recruitment anytime, anywhere.</h1>

                        <?php echo '<img src="'.get_stylesheet_directory_uri(). '/images/bbq_house_1.jpg">';?>
                        <?php echo '<img src="'.get_stylesheet_directory_uri(). '/images/bbq_house_2.jpg">';?>

                        <p> Chance to win exclusive deals! Users who invite 5 friends from this page stand to earn vouchers and discounts ranging from retreat spas, popular eateries to BBQ catering. 
                            *Terms &amp; conditions apply
                        </p>

                        <form method="post">
                        <div class="material--form">
                            <div class="input-field">
                                <label class="active" for="ref_email_address">Email Address</label>
                                <input placeholder="" id="ref_email_address" type="text" class="validate" name="ref_email_address[]">
                            </div>
                            <div class="input-field">
                                <label class="active" for="ref_email_address">Email Address</label>
                                <input placeholder="" id="ref_email_address" type="text" class="validate" name="ref_email_address[]">
                            </div>
                            <div class="input-field">
                                <label class="active" for="ref_email_address">Email Address</label>
                                <input placeholder="" id="ref_email_address" type="text" class="validate" name="ref_email_address[]">
                            </div>
                            <div class="input-field">
                                <label class="active" for="ref_email_address">Email Address</label>
                                <input placeholder="" id="ref_email_address" type="text" class="validate" name="ref_email_address[]">
                            </div>
                            <div class="input-field">
                                <label class="active" for="ref_email_address">Email Address</label>
                                <input placeholder="" id="ref_email_address" type="text" class="validate" name="ref_email_address[]">
                            </div>
                        </div>
                        <div class="ref-container">
                            <input type="submit" name="ref-submit" value="Send">
                        </div>
                        </form>

                    </div>
                </div>
            <?php
            return ob_get_clean();
        }
        else{
            ob_start();
            ?>
            <div class="portal--next-container">
            <form action="" method="post">
            <ul class="slick-slider-variant-1">
                <li>
                    <div class="box-shadow">
                        <h1>What position level are you looking at? (Select one or more)</h1>

                        <div class="position-level-container chxbxs">
                            <div><input id="position_level_1" type="checkbox" name="position_level[]" value="Fresh / Entry Level"><label for="position_level_1">Fresh / Entry Level</label></div>
                            <div><input id="position_level_2" type="checkbox" name="position_level[]" value="Non-Executive"><label for="position_level_2">Non-Executive</label></div>
                            <div><input id="position_level_3" type="checkbox" name="position_level[]" value="Executive"><label for="position_level_3">Executive</label></div>
                            <div><input id="position_level_4" type="checkbox" name="position_level[]" value="Manager"><label for="position_level_4">Manager</label></div>
                            <div><input id="position_level_5" type="checkbox" name="position_level[]" value="Middle Management"><label for="position_level_5">Middle Management</label></div>
                            <div><input id="position_level_6" type="checkbox" name="position_level[]" value="Senior Management"><label for="position_level_6">Senior Management</label></div>
                            <div><input id="position_level_7" type="checkbox" name="position_level[]" value="Professional"><label for="position_level_7">Professional</label></div>
                        </div>

                    </div>
                    <p><a href="#" class="slider-next">NEXT</a></p>
                </li>
                <li>
                    <div class="box-shadow">
                        <h1>Which type of companies would you like to work for? (Select one or more)</h1>

                        <div class="company-type-container chxbxs">
                            <div><input id="company_type_1" type="checkbox" name="company_type[]" value="MNC"><label for="company_type_1">MNC ( > 1,000 Employees) </label></div>
                            <div><input id="company_type_2" type="checkbox" name="company_type[]" value="Medium"><label for="company_type_2">Medium( 250 > 1,000 Employees)</label></div>
                            <div><input id="company_type_3" type="checkbox" name="company_type[]" value="Small"><label for="company_type_3">Small < 250 Employees</label></div>
                        </div>
                    </div>
                    <p><a href="" class="slider-next">NEXT</a></p>
                </li>
                <li>
                    <div class="box-shadow">
                        <h1>Do you have any shift preference? (Select one)</h1>

                        <div class="shift-container chxbxs">
                            <div><input id="shift_reference_1" type="checkbox" name="shift_reference" value="Day Shift"><label for="shift_reference_1">Day Shift</label></div>
                            <div><input id="shift_reference_2" type="checkbox" name="shift_reference" value="Night Shift"><label for="shift_reference_2">Night Shift</label></div>
                            <div><input id="shift_reference_3" type="checkbox" name="shift_reference" value="Rotating Shift"><label for="shift_reference_3">Rotating Shift</label></div>
                            <div><input id="shift_reference_4" type="checkbox" name="shift_reference" value="No Shift"><label for="shift_reference_4">No Shift</label></div>
                        </div>
                    </div>
                    <p><a href="" class="slider-next">NEXT</a></p>
                </li>
                <li>
                    <div class="box-shadow">
                        <h1>Do you have any location preference? (Select one)</h1>

                        <input id="location_preference_1" type="checkbox" name="location_preference" value="Islandwide" style="display:none;">
                        <!-- <label for="location_preference_1">Islandwide</label> -->

                        <!-- <label><a href="#" class="portal-next--show_other_loc">Show other locations</a></label> -->

                        <div class="other-locations chxbxs">
                            <?php $locations = array(
                                    "D01 Cecil, Marina, People’s Park, Raffles Place",
                                    "D02 Anson, Tanjong Pagar",
                                    "D03 Queenstown, Tiong Bahru",
                                    "D04 Harbourfront,Telok Blangah, Sentosa Island",
                                    "D05 Clementi New Town, Hong Leong Garden, Pasir Panjang",
                                    "D06 Beach Road, High Street",
                                    "D07 Golden Mile, Middle Road",
                                    "D08 Little India",
                                    "D09 Cairnhill, Orchard, River Valley",
                                    "D10 Ardmore, Bukit Timah, Holland Road, Tanglin",
                                    "D11 Novena, Thomson, Watten Estate",
                                    "D12 Balestier, Serangoon, Toa Payoh",
                                    "D13 Macpherson, Braddell",
                                    "D14 Geylang, Eunos",
                                    "D15 Katong, Joo Chiat, Amber Road",
                                    "D16 Upper East Coast, Bedok, Eastwood, Kew Drive",
                                    "D17 Loyang, Changi",
                                    "D18 Tampines, Pasir Ris",
                                    "D19 Serangoon Garden, Hougang, Sengkang, Punggol",
                                    "D20 Bishan, Ang Mo Kio"
                                );

                                $count = 2;
                                foreach ($locations as $location) {
                                    echo '<div><input id="location_preference_'.$count.'" type="checkbox" name="location_preference[]" value="'.$location.'"><label for="location_preference_'.$count++.'">'.$location.'</label></div>';
                                }

                                ?>
                        </div>
                    </div>
                    <div style="text-align:center;"><input type="submit" class="slider-next-done" name='done' value="DONE"></div>
                </li>


            </ul>
            </form>
            </div>

            <?php
            return ob_get_clean();
        }

    }
    add_shortcode( 'portal-next', 'portal_next' );