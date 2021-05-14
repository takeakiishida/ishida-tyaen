<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>石田茶園</title>
</head>
<body id="body">
    <!-- .header -->
    <header class="<?php 
                        // 各IDによって、ヘッダーの背景画像を変更する。
                        if(is_home()): echo "p-header"; 
                            //投稿タイプを取得し、カスタム投稿(blog)であれば、ブログ用の背景画像を適用 
                            elseif( get_query_var('post_type') == 'blog' ): echo "p-blog-top";

                            // ニュース用の背景画像を適用
                            // elseif( get_the_ID() == 8 || get_post_type() == 'post'): echo "p-news-top";
                            elseif( get_query_var('post_type') == 'news' ): echo "p-news-top";

                            // お問い合わせ用の背景画像を適用
                            elseif( get_the_ID() == 90): echo "p-contact-top";                        
                        endif;
                    ?>">
            <div class="l-header l-header--flex">
                <h1 class="p-header__logo">
                    <a href="<?= home_url(); ?>"><img src="<?= mypath(); ?>img/logo.png" alt="ロゴ"></a>
                </h1>
                <div class="l-header-hamburger">
                        <div class="l-header-hamburger__area">
                            <span class="l-header-hamburger__line"></span>
                            <span class="l-header-hamburger__line"></span>
                            <span class="l-header-hamburger__line"></span>
                        </div>
                </div> 
            </div> 
            <?php if(is_home()): ?>
                <div class="p-header__txt">
                    <p>美味しい日本茶を、<br>&emsp;&emsp;&emsp;&emsp;&emsp;すべての人へ。</p>
                </div>
            <?php endif; ?>

            <!-- TOPページ以外で表示する -->
            <?php if(!is_home()): ?>
                <div class="p-news-top__title">
                    <h2>
                        <?php 
                            // 各ページのヘッダータイトルを設定する。
                            if( get_query_var('post_type') == 'blog' ): echo "ブログ";
                                elseif( get_query_var('post_type') == 'news' ): echo "お知らせ";
                                elseif( get_the_ID() == 90): echo "お問い合わせ";
                            endif;
                        ?>
                    </h2>
                </div>
            <?php endif; ?>
            <nav class="l-header-hamburger__nav">
                <div class="l-header-hamburger__nav--flex">
                    <div class="l-header-hamburger__box l-header-hamburger__box--buy l-header-hamburger__box--flex ">
                        <div class="l-header-hamburger__inner blurTrigger">
                            <p class="l-header-hamburger__title">買う</p>
                            <ul>
                                <li><a href="<?= home_url(); ?>#p-product">人気商品</a></li>
                                <li><a href="<?= home_url(); ?>#p-product-scene">シーン別に購入する</a></li>
                                <li><a href="#">オンラインストアへ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="l-header-hamburger__box l-header-hamburger__box--eat l-header-hamburger__box--flex">
                        <div class="l-header-hamburger__inner blurTrigger">
                            <p class="l-header-hamburger__title">食べる</p>
                            <ul>
                                <li><a href="<?= home_url(); ?>#p-store">店舗情報</a></li>
                                <li><a href="#">カフェメニュー</a></li>
                            </ul>  
                        </div>
                    </div>
                    <div class="l-header-hamburger__box l-header-hamburger__box--know l-header-hamburger__box--flex">
                        <div class="l-header-hamburger__inner blurTrigger">
                            <p class="l-header-hamburger__title">知る</p>
                            <ul>
                                <li><a href="<?= home_url(); ?>#p-about">石田茶園について</a></li>
                                <li><a href="#">茶葉のこだわり</a></li>
                                <li><a href="<?php echo get_post_type_archive_link('news'); ?>">お知らせ</a></li>
                                <li><a href="<?php echo get_post_type_archive_link('blog');?>">ブログ</a></li>
                                <li><a href="<?php the_permalink(90);?>">お問い合わせ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <?php wp_head(); ?>
    </header>
    <!-- /.header -->
<?php if ( !is_home() ) :?>
    <!-- パンくずリスト -->
    <div class="c-breadcrumb">
        <?php bcn_display(); ?>
    </div>
<?php endif; ?>