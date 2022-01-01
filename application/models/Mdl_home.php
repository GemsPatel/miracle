<?php
class Mdl_home extends CI_Model
{
    /**
     * @abstract function will save newsletter subscriber
     */
    function newsletter()
    {
        $dataPost = $this->input->post();

        $data['newsletter_email'] = $dataPost['newsletter_email'];
        $data['newsletter_ip_address'] = $this->input->ip_address();
        
        $this->db->insert('newsletter_subscriber ', $data);

        $data['newsletter_id'] = $this->db->insert_id();

        $subject = 'Thank You for Subscribing at freegstbills.com';
        $mail_body = $this->load->view('templates/header-template', '', TRUE);
        $mail_body .= $this->load->view('templates/newsletter-subscribe', '', TRUE);
        $mail_body .= $this->load->view('templates/footer-template', array( 'newsletter_id' => $data['newsletter_id'], 'email_id' => $data['newsletter_email'] ), TRUE);
        
        sendMail( $data['newsletter_email'], $subject, $mail_body );
    }
}