<?php

return [ 
    'title' => 'Mikheev Person Page',
    'home' => 'Home',
    'about' => 'About',
    'contact' => 'Contact',
    'login' => 'Login',
    'logout' => 'Logout',
    'admin_panel' => 'Admin panel',
    'name' => 'Name',
    'email' => 'Email',
    'subject' => 'Subject',
    'body' => 'Body',
    'verification_code'=> 'Verification Code',
    'submit' => 'Submit',
    'contact_description' => 'If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.',
    'contact_alert' => '        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>',
    'login_description' => 'Please fill out the following fields to login:',
    'username' => 'Username',
    'password' => 'Password',
    'remember_me' => 'Remember me',
    'index_h1' => 'Mikheev Person Page',
    'index_p1' => 'This is my personal page created to improve skills in the yii framework and broaden my horizons in web development. The site is written in php, js, jquery, html, css + composer and git',
    'index_p2' => 'In total, the site now has 3 pages including this.',
    'index_h2' => 'About',
    'index_p3' => '<a href="/site/about">On this page</a> you can see all the diplomas and certificates I received',
    'index_h3' => 'Contact',
    'index_p4' => '<a href="/site/contact">On this page</a> can contact me',
    'index_h4' => 'Repositories',
    'index_p5'=> '<a href="https://github.com/lokres/personPage">Git page</a>',
];