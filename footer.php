        <!-- .footer -->
        <footer id="p-footer" class="p-footer">
            <div class="p-footer--flex">
                <div class="p-footer-left">
                    <div class="p-footer-logo">
                        <img src="<?= mypath(); ?>img/logo.png" alt="ロゴ">
                    </div>
                    <div class="p-footer-companyName">
                        <p>石田茶園</p>
                    </div>
                    <div class="p-footer-address">
                        <p>〒123-4567<br>東京都新宿区愛住町２２第３山田ビル２F</p>
                        <p>TEL.03-1234-5678<span> (営業時間 9:00～20:00)</span></p>
                    </div>
                </div>
                <div class="p-footer-right">
                    <ul class="p-footer-nav">
                        <li class="p-footer-nav__item"><a href="<?= home_url(); ?>#p-about">石田茶園について</a></li>
                        <li class="p-footer-nav__item"><a href="<?php echo get_post_type_archive_link('news'); ?>">お知らせ</a></li>
                        <li class="p-footer-nav__item"><a href="<?php echo get_post_type_archive_link('blog');?>">ブログ</a></li>
                        <li class="p-footer-nav__item"><a href="<?php the_permalink(90);?>">お問い合わせ</a></li>
                    </ul>
                </div>
            </div>
            <div class="p-footer-copyright">
                <small>COPYRIGHT &copy;2021 ISHIDA TYAEN ALLRIGHTS RESERVED.</small>
            </div>
        </footer>
        <!-- /.footer -->
        <p id="page-top"><a href="#body">Topへ</a></p>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="js/swiper.min.js"></script> -->
    <script src="<?= mypath(); ?>js/jquery.smooth-scroll.min.js"></script>
    <script src="<?= mypath(); ?>js/index.js"></script>
    <?php wp_footer(); ?>
</body>
</html>