<?php
// functions.php

// Returns an array of hardcoded users (static users)
function getUsers() {
    return [
        ['email' => 'user1@example.com', 'password' => 'password1'],
        ['email' => 'user2@example.com', 'password' => 'password2'],
        ['email' => 'user3@example.com', 'password' => 'password3'],
        ['email' => 'user4@example.com', 'password' => 'password4'],
        ['email' => 'user5@example.com', 'password' => 'password5']
    ];
}

// Validates login credentials for empty or incorrect format
function validateLoginCredentials($email, $password) {
    $errors = [];

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    return $errors;
}

// Checks if the provided credentials match any in the users array
function checkLoginCredentials($email, $password, $users) {
    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            return true;
        }
    }
    return false;
}

// Displays errors in a Bootstrap alert box
function displayErrors($errors) {
    if (empty($errors)) return '';

    $html = '<div class="alert alert-danger">';
    foreach ($errors as $error) {
        $html .= "<p>$error</p>";
    }
    $html .= '</div>';

    return $html;
}

// functions.php

function validateStudentData($student_data) {
    $errors = [];
    if (empty($student_data['student_id'])) {
        $errors[] = "Student ID is required.";
    }
    if (empty($student_data['first_name'])) {
        $errors[] = "First name is required.";
    }
    if (empty($student_data['last_name'])) {
        $errors[] = "Last name is required.";
    }
    return $errors;
}

// functions.php

function validateSubjectData($subject_data) {
    $errors = [];
    if (empty($subject_data['subject_code'])) {
        $errors[] = "Subject code is required.";
    }
    if (empty($subject_data['subject_name'])) {
        $errors[] = "Subject name is required.";
    }
    return $errors;
}

function checkDuplicateSubjectData($subject_data) {
    $errors = [];
    if (isset($_SESSION['subject_data'])) {
        foreach ($_SESSION['subject_data'] as $subject) {
            if ($subject['subject_code'] === $subject_data['subject_code']) {
                $errors[] = "A subject with this code already exists.";
                break;
            }
        }
    }
    return $errors;
}

?>
