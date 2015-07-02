<?php
/**
 * Created by PhpStorm.
 * User: MochammadAde
 * Date: 7/2/2015
 * Time: 11:43 AM
 */
?>
<html>
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('kube/css/kube.min.css')?>"/>
</head>
<body style="width:80%;margin: 40px auto">
<div class="units-container">
    <form method="post" action="" class="forms">
        <?php if(Session::has('register_success')): ?>
        <div class="message message-success">
            <span class="close"></span>
            <?php echo Session::get('register_success') ?>
        </div>
        <?php endif; ?>
        <br>
        <h3>Form Registration</h3>
        <label>
            Email <span class="error"><?php echo $errors->first('email')?></span>
            <input type="text" name="email" value="<?php echo Form::old('email')?>" class="width-50"/>
        </label>
        <label>
            Password <span class="error"><?php echo $errors->first('password')?></span>
            <input type="password" name="password" value="<?php echo Form::old('password')?>" class="width-50"/>
        </label>
        <label>
            Password Confirmation <span class="error"><?php echo $errors->first('password_confirmation')?></span>
            <input type="password" name="password_confirmation" value="<?php echo Form::old('password_confirmation')?>" class="width-50"/>
        </label>
        <input type="submit" class="btn" value="submit">
    </form>
</div>
</body>
</html>