<?php
defined('BASEPATH') or exit('No direct script access allowed');

// This is Redirect Controller. If you have a link to redirect, create a new public function below.
// Example :
//   Link to redirect to : https://discord.gg/wpu
//   Function Name       : wpu_server()
//   Result              : http://localhost/wpu-login-ci3/go/wpu_server -> Redirects you to WPU Server Invite.
class Redir extends CI_Controller
{
    public function discord()
    {
        redirect('https://discord.gg/NM6BX7v4bw');
    }
    public function line()
    {
        redirect('https://line.me/ti/p/0jkKN0KIdX');
    }
    public function instagram()
    {
        redirect('https://instagram.com/falcxxr');
    }
    public function twitter()
    {
        redirect('https://twitter.com/falcxxr');
    }
    public function invite_sandbox()
    {
        redirect('https://discord.com/oauth2/authorize?client_id=821228351795888199&permissions=2146954358&scope=bot');
    }
}
