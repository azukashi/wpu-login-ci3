<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Falcxxdev';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // Validasi Lolos
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Jika usernya ada di database
        if ($user) {

            // Jika usernya aktif
            if ($user['is_active'] == 1) {

                // Cek Password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-times-circle"></i> Wrong password. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('./');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-times-circle"></i> This email has not been activated! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('./');
            }
        } else {
            // Usernya ilang / gak ada di database :D
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-times-circle"></i> Email isn\'t registred! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('./');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => '<i class="fas fa-times"></i> This email already registred!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => '<i class="fas fa-times"></i> Password doesn\'t match!',
            'min_length' => '<i class="fas fa-times"></i> Password must be 8 character'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register - falcxx dev';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1, // Ubah jadi 0 Kalau kamu test server nya di online dan uncomment semua fungsi yang dicomment.
                'date_created' => time()
            ];

            // // Siapkan Token
            // $token = base64_encode(random_bytes(32));
            // $user_token = [
            //     'email' => $email,
            //     'token' => $token,
            //     'date_created' => time()
            // ];


            $this->db->insert('user', $data);
            // $this->db->insert('user_token', $user_token);

            // $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="check-circle"></i> Your account has been created. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth');
        }
    }

    // private function _sendEmail($token, $type)
    // {
    //     $config = [
    //         'protocol' => 'smtp',
    //         'smtp_host' => 'ssl://smtp.gmail.com',
    //         'smtp_user' => 'falcxxdev@gmail.com',
    //         'smtp_pass' => 'gifaldy1029',
    //         'smpt_port' => 465,
    //         'mailtype' => 'html',
    //         'charset' => 'utf-8',
    //         'newline' => "\r\n"
    //     ];

    //     $this->load->library('email', $config);
    //     $this->email->initialize($config);

    //     $this->email->from('falcxxdev@gmail.com', 'falcxx dev');
    //     $this->email->to($this->input->post('email')); // Objek yang mau kita kirimi email

    //     if ($type == 'verify') {

    //         $this->email->subject('Account Verification'); // Subjek Email
    //         $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) .  '">Activate</a>'); // Isi Email
    //     }


    //     if ($this->email->send()) { // Perintah Kirim Email-nya.
    //         return true;
    //     } else {
    //         echo $this->email->print_debugger();
    //         die;
    //     }
    // }

    // public function verify()
    // {
    //     $email = $this->input->get('email');
    //     $token = $this->input->get('token');

    //     $user = $this->db->get_where('user', ['email' => $email])->row_array();

    //     if ($user) {
    //         $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

    //         if ($user_token) {
    //             if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
    //                 $this->db->set('is_active', 1);
    //                 $this->db->where('email', $email);
    //                 $this->db->update('user');

    //                 $this->db->delete('user_token', ['email' => $email]);

    //                 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-times"></i> ' . $email . ' has been activated! Please login. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    //                 redirect('auth');
    //             } else {
    //                 $this->db->delete('user', ['email' => $email]);
    //                 $this->db->delete('user_token', ['email' => $email]);

    //                 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-times"></i> Account Activation failed! Token expired. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    //                 redirect('auth');
    //             }
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-times"></i> Account Activation failed! Invalid Token. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    //             redirect('auth');
    //         }
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="fas fa-times"></i> Account Activation failed! Wrong Email. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    //         redirect('auth');
    //     }
    // }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="fas fa-sign-out-alt"></i> You have been logged out! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
