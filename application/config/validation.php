<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'registration' => array(
        array(
            'field' => 'name',
            'label' => 'name',
            'rules' => 'trim|required|is_unique[user_auth.name]',
            'errors' => array(
                'required' => 'The %s field is required.',
                'is_unique' => 'The %s already exists.'
            )
        ),
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'trim|required|valid_email|is_unique[user_auth.email]',
            'errors' => array(
                'required' => 'The %s field is required.',
                'valid_email' => 'Please enter a valid email address.',
                'is_unique' => 'The %s already exists.'
            )
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[6]',
            'errors' => array(
                'required' => 'The %s field is required.',
                'min_length' => 'The %s must be at least 6 characters long.'
            )
            ),
            array(
                'field' => 'cpassword',
                'label' => 'cpassword',
                'rules' => 'trim|required|matches[password]',
                'errors' => array(
                    'required' => 'The %s field is required.',
                    'matches' => 'The %s does not match the Password field.'
                )
            )
    )
);
