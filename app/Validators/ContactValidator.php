<?php

class ContactValidator
{
    /**
     * Validate contact form data.
     *
     * @param array $data
     * @return array
     */
    public function validate(array $data): array
    {
        $errors = [];

        // Name
        if (empty(trim($data['name'] ?? ''))) {
            $errors['name'] = 'Name is required.';
        }

        // Email
        if (empty(trim($data['email'] ?? ''))) {
            $errors['email'] = 'Email is required.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address.';
        }

        // Subject
        if (empty(trim($data['subject'] ?? ''))) {
            $errors['subject'] = 'Subject is required.';
        }

        // Message
        $message = trim($data['message'] ?? '');

        if ($message === '') {
            $errors['message'] = 'Message is required.';
        } elseif (strlen($message) < 20) {
            $errors['message'] = 'Message must be at least 20 characters.';
        }

        return $errors;
    }
}