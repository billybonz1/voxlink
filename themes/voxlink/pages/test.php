<?php
/*Template Name: Test*/
get_header();
?>
    <?php
    $user = get_user_by("ID","1");
    print_r($user);
    ?>
<?php get_footer(); ?>