<?php

function login()
{
    $ci = get_instance();
    if (!$ci->session->userdata('nik')) {
        redirect('Auth');
    }
}


function blocked(){
	$ci = get_instance();
	if ($ci->session->userdata('role') == "User") {
		redirect('Auth/blocked');
	}
	
}