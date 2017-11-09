<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_pm extends CI_Controller {

    public $base_uri = '/pm/';
    private $ci;


    function __construct()
    {
        parent::__construct();

        $this->ci = & get_instance();
        $this->config->load('form_validation', TRUE);
        $this->config->load('pm', TRUE);
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Pm_model', 'pm_model');
        $this->load->model('User_model', 'user_model');
        $this->lang->load('pm', 'english');
    }

    public function initialize($dateformat = "Y.m.d - H:i:s")
    {
        $this->pm_model->initialize($dateformat);
    }

    function index()
    {
        $this->messages();
    }

    function message($msg_id)
    {
        if( ! $msg_id) return;

        // Get message and flag it as read
        $is_logged_in = $this->session->userdata('is_logged_in');
        $user_id      = $is_logged_in['user_id'];
        $message      = $this->pm_model->get_message($msg_id , $user_id);

        if($message)
        {

            $message = reset($message);

            // Flag message as read
            $adas = $this->pm_model->flag_read($msg_id,'', $user_id );

            // Get recipients & get usernames instead of user ids for recipients and author
            $message[TF_PM_AUTHOR] = $this->user_model->get_username($message[TF_PM_AUTHOR]);
            $message[PM_RECIPIENTS] = $this->pm_model->get_recipients($message[TF_PM_ID]);
            $i = 0;
            foreach ($message[PM_RECIPIENTS] as $recipient)
            {
                $id = $recipient[TF_PMTO_RECIPIENT];
                $message[PM_RECIPIENTS][$i] = $this->user_model->get_username($id);
                $i++;
            }
            $data['message'] = $message;
        }
        else $data['message'] = array();

        $this->load->view('client_template/header');
        $this->load->view('client_msgs/details', $data);
        $this->load->view('client_template/footer');

    
    }
    public function ajax_messages($type = 0)
    {
        // Get & pass to view the messages view type (e.g. MSG_SENT)
        $is_logged_in = $this->session->userdata('is_logged_in');
        $user_id      = $is_logged_in['user_id'];

        $data = array();
        $data['type'] = $type;
        $messages = $this->pm_model->get_messages($type , $user_id);
        
    
        if($messages)
        {
                
            // Get recipients & get usernames instead of user ids
            // for recipients and author & render message body correctly
            $i = 0;
            foreach ($messages as $message)
            {

                $messages[$i][TF_PM_BODY]       = $this->render($messages[$i][TF_PM_BODY]);
                $messages[$i][TF_PM_AUTHOR]     = $this->user_model->get_username($message[TF_PM_AUTHOR]);
                $messages[$i][PM_RECIPIENTS]    = $this->pm_model->get_recipients($messages[$i][TF_PM_ID]);
                $j = 0;
                foreach ($messages[$i][PM_RECIPIENTS] as $recipient)
                {
                    $id = $recipient[TF_PMTO_RECIPIENT];
                    $messages[$i][PM_RECIPIENTS][$j] = $this->user_model->get_username($id);
                    $j++;
                }
                $i++;
            }
            $x = 0;
            foreach ($messages as $key => $msg_id) {                
                $messages[$x]['read_unread'] = $this->user_model->get_read_unread($msg_id['privmsg_id']);
                $x++;
            }
            $data['messages'] = $messages;
        }
        else $data['messages'] = array();
        echo    json_encode($data);
        exit;
        
    }

    function messages($type = MSG_NONDELETED)
    {
        // Get & pass to view the messages view type (e.g. MSG_SENT)
        $is_logged_in = $this->session->userdata('is_logged_in');
        $user_id      = $is_logged_in['client_id'];


        $data['type'] = $type;
        $messages = $this->pm_model->get_messages($type , $user_id);
        
        if($messages)
        {
            // Get recipients & get usernames instead of user ids
            // for recipients and author & render message body correctly
            $i = 0;
            foreach ($messages as $message)
            {
                $messages[$i][TF_PM_BODY]       = $this->render($messages[$i][TF_PM_BODY]);
                $messages[$i][TF_PM_AUTHOR]     = $this->user_model->get_username($message[TF_PM_AUTHOR]);
                $messages[$i][PM_RECIPIENTS]    = $this->pm_model->get_recipients($messages[$i][TF_PM_ID]);
                $j = 0;
                foreach ($messages[$i][PM_RECIPIENTS] as $recipient)
                {
                    $id = $recipient[TF_PMTO_RECIPIENT];
                    $messages[$i][PM_RECIPIENTS][$j] = $this->user_model->get_username($id);
                    $j++;
                }
                $i++;
            }
            $x = 0;
            foreach ($messages as $key => $msg_id) {                
                $messages[$x]['read_unread'] = $this->user_model->get_read_unread($msg_id['privmsg_id']);
                $x++;
            }
            $data['messages'] = $messages;
        }
        else $data['messages'] = array();

        $this->load->view('client_template/header');
        $this->load->view('client_msgs/inbox', $data);
        $this->load->view('client_template/footer');
    }
    public function sendme($post){
        $result = array();
        if(!empty($post)){
            if( $post['recipients']  == "Nursing" || $post['recipients']  == "J1" 
                || $post['recipients']  == "KBL"){
                
                $data = $this->user_model->getUser($post['recipients']);
                foreach ($data as $key => $value) {
                    $result[] = $value['user_email'];
                }
                return $result;
            }else{
                return array($post['recipients']);
            }
        }
    }
    function send($recipients = NULL, $subject = NULL, $body = NULL)
    {
        $recipients = $this->sendme($_POST);

        $rules      = $this->config->item('pm_form', 'form_validation');
        $this->form_validation->set_rules($rules);

        $data['found_recipients'] = TRUE; // assume we'll find recipients - set to FALSE below otherwise
        $data['suggestions'] = array(); // if recipients not found by exact search, save suggestions here
        $message = array();
        // Set default vals passed via parameters
        $message[PM_RECIPIENTS] = $recipients;
        $message[TF_PM_SUBJECT] = $subject;
        $message[TF_PM_BODY]    = $body;

        if($this->form_validation->run())
        {
            // Overwrite default vals from params if form validated with vals from POST
            $message[PM_RECIPIENTS] = $this->input->post(PM_RECIPIENTS, TRUE);
            $message[TF_PM_SUBJECT] = $this->input->post(TF_PM_SUBJECT, TRUE);
            $message[TF_PM_BODY]    = $this->input->post(TF_PM_BODY, TRUE);
            // Lets operate on copies of POST input to preserve orig vals in case of failure
            $recipients             =  $recipients;//explode(";", $this->input->post(PM_RECIPIENTS, TRUE));
            $subject                = $this->input->post(TF_PM_SUBJECT, TRUE);
            $body                   = $this->input->post(TF_PM_BODY, TRUE);


            $recipient_ids          = array();
            // Get user ids of recipients - if not found, get usernames of suggestions
            foreach ($recipients as $recipient)
            {
                $result = $this->user_model->get_userids(trim($recipient));
                array_push($recipient_ids, reset($result));

                //print_r($result);
                // Try non-exact search if none found to have suggestions - in this case $data['suggestions']
                // will contain an array with original strings as keys & arrays with suggestions as values.

                if( ! reset($result))
                {
                    $data['found_recipients'] = FALSE;
                    $suggestions = $this->user_model->get_userids(trim($recipient), FALSE);

                    if($suggestions)
                        foreach ($suggestions as $suggestion)
                            $data['suggestions'][$recipient] = $this->user_model->get_username($suggestion);
                }
            }

            if($data['found_recipients'])
            {

                if($this->pm_model->send_message_from_client($recipient_ids, $subject, $body))
                {
                    // On success: redirect to list view of messages
                    $this->session->set_flashdata('status', $this->lang->line('msg_sent'));
                    redirect($this->base_uri.'messages/'.MSG_NONDELETED);
                }
                else
                {
                    $status = $this->lang->line('msg_not_sent');
                    $this->session->set_flashdata('status', $status);
                    redirect($this->base_uri.'send/'.
                             $message[PM_RECIPIENTS].'/'.
                             $message[TF_PM_SUBJECT].'/'.
                             $message[TF_PM_BODY]);
                }
            }
            else $data['status'] = $this->lang->line('recipients_not_found');
        }

        // Only happens if sending msg unsuccessful above
        if(isset($status))
        {
            $data['status'] = $status;
            $this->session->set_flashdata('status', $status);
        }
        $data['message'] = $message;
        $data['employee_type'] = $this->user_model->getTypeEmployee();

        $this->load->view('client_template/header');
        $this->load->view('client_msgs/compose', $data);
        $this->load->view('client_template/footer');
    }


    function delete($msg_id, $type = MSG_NONDELETED, $redirect = TRUE)
    {
        if($msg_id >= 0){
            if($this->pm_model->flag_deleted($msg_id)){
                $status = $this->lang->line('msg_deleted');
            }else{
                $status = $this->lang->line('msg_not_deleted');
            }
        }else{
            $status = $this->lang->line('msg_invalid_id');
            $this->session->set_flashdata('status', $status);
        }

        // Redirect to $type (e.g. MSG_NONDELETED) view of messages
        if($redirect){
            redirect($this->base_uri.'messages/'.$type);
        }else{
            $this->session->keep_flashdata('status');
        }
    }

    function restore($msg_id, $redirect = TRUE)
    {
        if($msg_id >= 0){
            if($this->pm_model->flag_undeleted($msg_id)){
                $status = $this->lang->line('msg_restored');
            }else{
                $status = $this->lang->line('msg_not_restored');
            }
        }else{
            $status = $this->lang->line('msg_invalid_id');
            $this->session->set_flashdata('status', $status);
        }

            // Redirect to trash bin view of messages
        if($redirect){
            redirect($this->base_uri.'messages/'.MSG_DELETED);
        }else{
            $this->session->keep_flashdata('status');
        }
    }


    function render($message_body)
    {
        $message_body = strip_tags($message_body, '');
        $message_body = stripslashes($message_body);
        $message_body = nl2br($message_body);
        return $message_body;
    }
}

/* End of file Pm.php */