<?php
session_start();

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
$success = $_SESSION['success'] ?? '';

unset($_SESSION['errors']);
unset($_SESSION['old']);
unset($_SESSION['success']);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Contact | David Olobo</title>

    <link rel="stylesheet"
          href="assets/css/style.css">

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>


<header>

    <div class="logo">
        David<span>.</span>
    </div>

    <nav>

        <a href="index.php">Home</a>
        <a href="contact.php">Contact</a>

    </nav>

</header>

<section class="contact-page">
    <!-- Success Message -->
    <?php if($success): ?>

        <div class="success-message">

            <?= htmlspecialchars($success) ?>

        </div>

    <?php endif; ?>

    <div class="contact-header">

        <h1>Let's Build Something Amazing 🚀</h1>

        <p>

            Whether it's AI, Data Engineering,
            Automation, Cloud or Web Development,
            I'd love to hear about your project.

        </p>

    </div>

    <form action="process_contact.php"
          method="POST"
          class="contact-form">

        <div class="form-group">

            <label>Name</label>

            <input
                type="text"
                name="name"
                placeholder="Your Name"
                value="<?= htmlspecialchars($old['name'] ?? '') ?>">

            <?php if(isset($errors['name'])): ?>

            <p class="error">

                <?= $errors['name'] ?>

            </p>

            <?php endif; ?>

        </div>

        <div class="form-group">

            <label>Email</label>

            <input
                type="email"
                name="email"
                placeholder="you@example.com"
                value="<?= htmlspecialchars($old['email'] ?? '') ?>">

            <?php if(isset($errors['email'])): ?>

            <p class="error">

                <?= $errors['email'] ?>

            </p>

            <?php endif; ?>

        </div>

        <div class="form-group">

            <label>Subject</label>

            <input
                type="text"
                name="subject"
                placeholder="Project Subject"
                value="<?= htmlspecialchars($old['subject'] ?? '') ?>">

            <?php if(isset($errors['subject'])): ?>

            <p class="error">

                <?= $errors['subject'] ?>

            </p>

            <?php endif; ?>

        </div>

        <div class="form-group">

            <label>Message</label>

        <textarea
            name="message"
            rows="8"
            placeholder="Tell me about your project..."><?= htmlspecialchars($old['message'] ?? '') ?></textarea>

            <?php if(isset($errors['message'])): ?>

            <p class="error">

            <?= $errors['message'] ?>

        </p>

        <?php endif; ?>

        </div>

        <button
            class="btn-primary"
            type="submit">

            <i class="fa-solid fa-paper-plane"></i>

            Send Message

        </button>

    </form>

</section>

</body>

</html>