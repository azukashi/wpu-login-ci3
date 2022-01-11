<?php

function is_logged_in()
{
    // Panggil Instansi dari CodeIgniter 3 agar variabel '$this' bisa berfungsi.
    $ci = get_instance();
    // Cek Apakah user sudah login atau belum. Jika belum, maka tidak diizinkan meng-akses views user, dll.
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        // Mengenali Role Setiap User. Jika Sebagai member, Kita halang untuk mengakses Halaman admin.
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        // Query ke Database (Karena lokasi data role_id ada di database)
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        // Query User Access
        $userAccess = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

        // Pengecekan
        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
