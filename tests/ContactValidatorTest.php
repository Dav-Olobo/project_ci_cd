<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../app/Validators/ContactValidator.php';

class ContactValidatorTest extends TestCase
{
    private ContactValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new ContactValidator();
    }

    public function testValidSubmission()
    {
        $data = [
            'name' => 'David',
            'email' => 'david@example.com',
            'subject' => 'Project',
            'message' => 'This message is definitely longer than twenty characters.'
        ];

        $errors = $this->validator->validate($data);

        $this->assertEmpty($errors);
    }

    public function testEmptyName()
    {
        $data = [
            'name' => '',
            'email' => 'david@example.com',
            'subject' => 'Project',
            'message' => 'This message is definitely longer than twenty characters.'
        ];

        $errors = $this->validator->validate($data);

        $this->assertArrayHasKey('name', $errors);
    }

    public function testInvalidEmail()
    {
        $data = [
            'name' => 'David',
            'email' => 'invalid-email',
            'subject' => 'Project',
            'message' => 'This message is definitely longer than twenty characters.'
        ];

        $errors = $this->validator->validate($data);

        $this->assertArrayHasKey('email', $errors);
    }

    public function testEmptySubject()
    {
        $data = [
            'name' => 'David',
            'email' => 'david@example.com',
            'subject' => '',
            'message' => 'This message is definitely longer than twenty characters.'
        ];

        $errors = $this->validator->validate($data);

        $this->assertArrayHasKey('subject', $errors);
    }

    public function testShortMessage()
    {
        $data = [
            'name' => 'David',
            'email' => 'david@example.com',
            'subject' => 'Project',
            'message' => 'Too short'
        ];

        $errors = $this->validator->validate($data);

        $this->assertArrayHasKey('message', $errors);
    }
}