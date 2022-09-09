<?php
    
class MOPPM_Messages
{
    const SUPPORT_FORM_VALUES               = "Please submit your query along with email.";
    const SUPPORT_FORM_SENT                 = "Thanks for getting in touch! We shall get back to you shortly.";
    const SUPPORT_FORM_ERROR                = "Your query could not be submitted. Please try again.";

    const ERROR                             = "Error processing your request. Please try again.";
    const REQUIRED_FIELDS                   = "Please enter all the required fields";
    const RESET_PASS                        = "You password has been reset successfully and sent to your registered email. Please check your mailbox.";

    const PASS_LENGTH                       = "Choose a password with minimum length 6.";
    const REG_SUCCESS                       = 'Your account has been retrieved successfully.';
    const ACCOUNT_EXISTS                    = 'You already have an account with miniOrange. Please enter a valid password.';
    const PASS_MISMATCH                     = 'Password and Confirm Password do not match.';
  
    public static function showMessage($message, $data = array())
    {
        $message = constant("self::".$message);
        foreach ($data as $key => $value) {
            $message = str_replace("{{" . $key . "}}", $value, $message);
        }
        return $message;
    }
}
