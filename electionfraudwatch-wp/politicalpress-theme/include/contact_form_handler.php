<?php
/**
 * File Name: contact_form_handler.php
 *
 * Send message function to process contact form submission
 *
 */

add_action( 'wp_ajax_nopriv_send_message', 'send_message' );
add_action( 'wp_ajax_send_message', 'send_message' );

function send_message()
{
    if(isset($_POST['email'])):

        $nonce = $_POST['nonce'];

        if ( ! wp_verify_nonce( $nonce, 'send_message_nonce' ) )
            die ( __('Busted!','framework') );

        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $address = $_POST['target'];

        if(get_magic_quotes_gpc()) {
            $message = stripslashes($message);
        }

        $e_subject = __('You Have Received a Message From ','framework') . $name . '.';

        if(!empty($subject))
        {
            $e_subject = $subject . ':' . $name . '.';
        }

        $e_body = 	__("You have Received a message from: ", 'framework')
                    .$name
                    . "\n"
                    .__("Their additional message is as follows.", 'framework')
                    ."\r\n\n";

        $e_content = "\" $message \"\r\n\n";

        $e_reply = 	__("You can contact ", 'framework')
                    .$name
                    . __(" via email, ", 'framework')
                    .$email;

        $msg = $e_body . $e_content . $e_reply;

        if(wp_mail($address, $e_subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n","-f $address"))
        {
            _e("Message Sent Successfully!", 'framework');
        }
        else
        {
            _e("Server Error: WordPress mail method failed!", 'framework');
        }
    else:
        _e("Invalid Request !", 'framework');
    endif;

    die;

}


add_action( 'wp_ajax_nopriv_send_message_to_agent', 'send_message_to_agent' );
add_action( 'wp_ajax_send_message_to_agent', 'send_message_to_agent' );

function send_message_to_agent()
{
    if(isset($_POST['email'])):

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $address = $_POST['target'];
        $property_title = $_POST['property_title'];
        $property_permalink = $_POST['property_permalink'];

        if(get_magic_quotes_gpc()) {
            $message = stripslashes($message);
        }

        $e_subject = __('You Have Received a Message From ','framework') . $name . '.';

        $e_body = 	__("You have Received a message from: ", 'framework')
            .$name
            ."\r\n\n"
            .__("Message is sent using agent contact form on following property:", 'framework')
            . $property_title
            . "\n"
            .__("You can view the property using following URL:", 'framework')
            .$property_permalink
            ."\r\n\n"
            .__("Their additional message is as follows.", 'framework')
            ."\r\n\n";

        $e_content = "\" $message \"\r\n\n";

        $e_reply = 	__("You can contact ", 'framework')
            .$name
            . __(" via email, ", 'framework')
            .$email;

        $msg = $e_body . $e_content . $e_reply;

        if(wp_mail($address, $e_subject, $msg, "From: $email\r\nReply-To: $email\r\nReturn-Path: $email\r\n","-f $address"))
        {
            _e("Message Sent Successfully!", 'framework');
        }
        else
        {
            _e("Server Error: WordPress mail method failed!", 'framework');
        }
    else:
        _e("Invalid Request !", 'framework');
    endif;

    die;

}

?>