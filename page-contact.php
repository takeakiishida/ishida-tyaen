<?php get_header(); ?>    
<main class="p-contact">
    <p class="p-contact__txt">石田茶園の商品やご注文方法などについての各種 ご質問・お問合せ・ご意見などございましたらお気軽にお尋ねください。</p>
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
