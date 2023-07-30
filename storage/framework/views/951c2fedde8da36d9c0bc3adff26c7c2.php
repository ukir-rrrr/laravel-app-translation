<html>

<head>
    <meta charset='utf-8' />
</head>

<body>
    
    <form method="POST">
        <?php echo csrf_field(); ?>
        <textarea rows="10" cols="50" name="sentence"><?php echo e(isset($sentence) ? $sentence : ''); ?></textarea>
        <button type="submit">翻訳</button>
    </form>
</body>

</html>
<?php /**PATH /var/www/html/resources/views/translation.blade.php ENDPATH**/ ?>