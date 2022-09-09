 <?php ?>

    <body>
    <style>
        .mo_modal{
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .mo_modal_content{
            font-size:13px;
            display:flex;
            flex-direction:column;
            align-items:left;
            margin: 10px 10%;
        }

        .mo-modal-footer{
            display:flex;
            justify-content:right;
            /* gap:10px; */
        }

        .mo_feedback{
            margin: 8px 0;
            font-weight:500;
        }

        hr{
            margin:0;
        }

    </style>

    <!-- The Modal -->
    <div id="wpns_feedback_modal" class="mo_modal">

        <!-- Modal content -->
        <div class="mo_wpns_modal-content">
            <h3 style="margin: 3%; text-align:center;"><b>Please give us your feedback</b><span class="mo_wpns_close dashicons dashicons-no" style="cursor: pointer"></span>
            </h3>
            <hr>
            <form name="f" method="post" action="" id="mo_mmp_feedback">

                <?php wp_nonce_field("moppm_feedback");?>
                <input type="hidden" name="option" value="moppm_feedback"/>
                <div class="mo_modal_content">
                    <p style="font-weight:500">Please let us know why you are deactivating the plugin. Your feedback will help us make it better for you and other users</p>
                    <div>
                        <div class="mo_feedback">
                            <input type="radio" id="mo_fbk_1" name="mo_feedback" value="I'll reactivate it later" required>
                            <label for="mo_fbk_1">I'll reactivate it later</label>
                        </div>
                        <div class="mo_feedback">
                            <input type="radio" id="mo_fbk_2" name="mo_feedback" value="The plugin is not working" required>
                            <label for="mo_fbk_2">The plugin is not working</label>
                        </div>
                        <div class="mo_feedback">
                            <input type="radio" id="mo_fbk_3" name="mo_feedback" value="I could not understand how to use it" required>
                            <label for="mo_fbk_3">I could not understand how to use it</label>
                        </div>
                        <div class="mo_feedback">
                            <input type="radio" id="mo_fbk_4" name="mo_feedback" value="specific_feature" required>
                            <label for="mo_fbk_4">looking for specific feature</label>
                        </div>
                        <div class="mo_feedback">
                            <input type="radio" id="mo_fbk_5" name="mo_feedback" value="It's not what I am looking for" required>
                            <label for="mo_fbk_5">It's not what I am looking for</label>
                        </div>
                        <div class="mo_feedback">
                            <input type="radio" id="mo_fbk_6" name="mo_feedback" value="other" required>
                            <label for="mo_fbk_6">Other</label>
                        </div>
                    </div>
                    <br>                        
                    <div>
                        <div>
                            <input type="hidden" id="query_mail" name="query_mail" required value="<?php echo esc_attr($email); ?>" readonly="readonly"/>
                            <input type="hidden" name="edit" id="edit" onclick="editName()" value=""/>
                            </label>
                        </div>
                        <textarea id="wpns_query_feedback" name="wpns_query_feedback" rows="2" style="width:100%" placeholder="Tell us!" hidden></textarea>
                        <input type="checkbox" name="get_reply" value="reply">Do not reply</input>
                    </div>
                    <br>
                    <div class="mo-modal-footer">
                        <input type="submit" name="miniorange_feedback_submit" class="button button-primary button-large"style="background-color:#224fa2; padding: 1% 3% 1% 3%;color: white;cursor: pointer;" value="Submit & Deactivate"/>
                        <span width="30%">&nbsp;&nbsp;</span>
                        <input type="button" name="moppm_skip_feedback"
                               style="background-color:#224fa2; padding: 1% 3% 1% 3%;color: white;cursor: pointer;" value="Skip" onclick="document.getElementById('moppm_feedback_form_close').submit();"/>
                    </div>
                </div>
                    
                <br>
                   
                
            </form>
            <form name="f1" method="post" action="" id="moppm_feedback_form_close">
                <?php wp_nonce_field("moppm_feedback");?>
                <input type="hidden" name="option" value="moppm_skip_feedback"/>
            </form>
        </div>
    </div>

    </div>

    <script>

        jQuery("[name='mo_feedback']").change((e)=>{

        if(jQuery("#mo_fbk_6").is(":checked") || jQuery("#mo_fbk_4").is(":checked")){
            jQuery("#wpns_query_feedback").show();
            jQuery("#wpns_query_feedback").prop("required",true);
        }
        else{
            jQuery("#wpns_query_feedback").hide();
            jQuery("#wpns_query_feedback").prop("required",false);
        }
        });

        jQuery("[type='radio']").show();

        jQuery('a[aria-label="Deactivate Password Policy Manager"]').click(function () {

            var mo_modal = document.getElementById('wpns_feedback_modal');

            var span = document.getElementsByClassName("mo_wpns_close")[0];

            // When the user clicks the button, open the mo2f_modal
            mo_modal.style.display = "flex";
            document.querySelector("#wpns_query_feedback").focus();
            span.onclick = function () {
                mo_modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the mo2f_modal, mo2f_close it
            window.onclick = function (event) {
                if (event.target == mo_modal) {
                    mo_modal.style.display = "none";
                }
            }
            return false;

        });
    </script>

<?php ?>