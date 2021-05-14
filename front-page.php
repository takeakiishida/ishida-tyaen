<?php get_header(); ?>
        <!-- .main -->
        <main id="p-main" class="p-main">
            <!-- .news -->
            <section id="p-news" class="p-news">
                <div class="p-news-titleWrapper">
                    <h3 class="c-section__title c-section__title--vertical">お知らせ</h3>
                </div>
                <div class="p-news-contentWrapper">
                    <div class="p-news-wrapper">
                        <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $the_query = new WP_Query( array(
                                'post_status' => 'publish',
                                'post_type' => 'news', //ページの種類（例、page、post、カスタム投稿タイプ名）
                                'paged' => $paged,
                                'posts_per_page' => 2, // 表示件数
                                'orderby'     => 'date',
                                'order' => 'DESC'
                            ) );
                            if ($the_query->have_posts()) :
                                while ($the_query->have_posts()) : $the_query->the_post();
                        ?>
                            <article class="p-news-article">
                                <div class="p-news-article__date">
                                    <time datetime="<?= get_the_date(DATE_W3C); ?>"><?= esc_html(get_the_date()); ?></time>
                                </div>
                                <div class="p-news-article__category">
                                    <p>
                                        <?php // genreタクソノミーのターム名を表示
                                            $terms = get_the_terms($post->ID,'newsgenre');
                                            foreach( $terms as $term ) {
                                                echo $term->name;
                                            }
                                        ?>                                        
                                    </p>
                                </div>
                                <div class="p-news-article__txt">
                                    <a href="<?php the_permalink(); ?>">
                                        <p><?php the_title(); ?></p>
                                    </a>
                                </div>
                            </article>
                        <?php endwhile; wp_reset_postdata(); else: echo '<div><p>ありません。</p></div>'; endif; ?>
                    </div>
                    <div class="p-news-btn"><a href="<?php echo get_post_type_archive_link('news'); ?>" class="c-btn">過去のお知らせ</a></div>
                </div>
            </section>
            <!-- /.news -->
            <!-- .about -->
            <section id="p-about" class="p-about">
                <div class="p-about__wrapper">
                    <div class="p-about-top">
                        <div class="p-about-top__imgArea">
                            <img src="<?= mypath(); ?>img/syain.jpg" alt="" class="mask-2 blurTrigger">
                            <div class="p-about-top__flex">
                                <img src="<?= mypath(); ?>img/gift.jpg" alt="" class="blurTrigger delay-time03">
                                <img src="<?= mypath(); ?>img/soft.jpg" alt="" class="blurTrigger delay-time06">
                            </div>
                        </div>
                        <div class="p-about-top__txtArea">
                            <h3 class="c-section__title">石田茶園について</h3>
                            <img src="<?= mypath(); ?>img/irast.jpg" alt="">
                            <h4 class="c-section__subtitle">世界に日本茶好きを生み出す。</h4>
                            <p>情に棹させば流される。智に働けば角が立つ。どこへ越しても住みにくいと悟った時、詩が生れて、画が出来る。とかくに人の世は住みにくい。意地を通せば窮屈だ。</p>
                            <div class="p-about__btn"><a href="#" class="c-btn">私たちについて</a></div>
                        </div>
                    </div>
                    <div class="p-about-bottom">
                        <div class="p-about-bottom__imgArea">
                            <img src="<?= mypath(); ?>img/tyaba_m.jpg" alt="" class="blurTrigger delay-time09">
                        </div>
                        <div class="p-about-bottom__txtArea">
                            <h4 class="c-section__subtitle">茶葉のこだわり。</h4>
                            <p>情に棹させば流される。智に働けば角が立つ。どこへ越しても住みにくいと悟った時、詩が生れて、画が出来る。とかくに人の世は住みにくい。意地を通せば窮屈だ。</p>
                            <div class="p-about__btn"><a href="#" class="c-btn">こだわりを詳しく</a></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.about -->
            <!-- .product -->
            <section id="p-product" class="p-product">
                <h3 class="c-section__title">人気商品</h3>
                <div class="p-product__wrapper">
                    <div class="p-product__lists">
                        <div class="p-product__item">
                            <img src="<?= mypath(); ?>img/mockup.jpg" alt="">
                            <dl class="p-product__desc">
                                <dd>緑茶</dd>
                                <dt>こへ越しても住みにくいと悟った時、詩が生れて、画が出来る。とかくに人の世は住みにくい。意地を通せば窮屈だ。</dt>
                            </dl>
                            <div class="p-product__btn"><a href="#" class="c-btn">商品詳細へ</a></div>
                        </div>
                        <div class="p-product__item">
                            <img src="<?= mypath(); ?>img/junbi.jpg" alt="">
                            <dl class="p-product__desc">
                                <dd>抹茶</dd>
                                <dt>こへ越しても住みにくいと悟った時、詩が生れて、画が出来る。とかくに人の世は住みにくい。意地を通せば窮屈だ。</dt>
                            </dl>
                            <div class="p-product__btn"><a href="#" class="c-btn">商品詳細へ</a></div>
                        </div>
                        <div class="p-product__item">
                            <img src="<?= mypath(); ?>img/junbi.jpg" alt="">
                            <dl class="p-product__desc">
                                <dd>玄米茶</dd>
                                <dt>こへ越しても住みにくいと悟った時、詩が生れて、画が出来る。とかくに人の世は住みにくい。意地を通せば窮屈だ。</dt>
                            </dl>
                            <div class="p-product__btn"><a href="#" class="c-btn">商品詳細へ</a></div>
                        </div>
                    </div>
                </div>
                <p class="p-product-scene__Txt" id="p-product-scene">シーン別にもお選びいただけます。</p>
                <div class="p-product-scene__wrapper">
                    <figure class="blurTrigger delay-time03">
                        <a href="#"><img src="<?= mypath(); ?>img/kenkou.jpg" alt=""><span>お茶の健康成分を<br>しっかり味わいたい方へ</span></a>
                    </figure>
                    <figure class="blurTrigger delay-time06">
                        <a href="#"><img src="<?= mypath(); ?>img/sakura_m.jpg" alt=""><span>季節限定の<br>珍しい味を楽しみたい方へ</span></a>
                    </figure>
                    <figure class="blurTrigger delay-time09">
                        <a href="#"><img src="<?= mypath(); ?>img/teaback.jpg" alt=""><span>ティーバックでも<br>本格的に味わいたい方へ</span></a>
                    </figure>
                    <figure class="blurTrigger delay-time12">
                        <a href="#"><img src="<?= mypath(); ?>img/wagashi_m.jpg" alt=""><span>お茶と一緒に<br>和菓子を味わいたい方へ</span></a>
                    </figure>
                </div>
            </section>
            <!-- /.product -->
            <!-- .store -->
            <section id="p-store" class="p-store">
                <h3 class="c-section__title">店舗情報</h3>
                <p class="p-store__txt">オンラインストアの取り扱い商品は、店舗でもお買い求めいただけます。</p>
                <div class="p-store-access">
                    <div class="p-store-access__imgArea">
                        <div class="p-store-access__txtArea">
                            <ul >
                                <li class="p-store-access__detail"><p>営業時間：&ensp;9:00-20:00&ensp;※カフェL.O.は19時30分</p></li>
                                <li class="p-store-access__detail"><p>定休日：&ensp;火曜日</p></li>
                                <li class="p-store-access__detail"><p>住所：&ensp;東京都新宿区愛住町22 第三山田ビル</p></li>
                                <li class="p-store-access__detail"><p>電話番号：&ensp;03-1234-5678</p></li>
                                <li class="p-store-access__detail"><p>アクセス：&ensp;都営新宿線曙橋駅より徒歩2分</p></li>
                            </ul>
                            <div class="p-store-access__btn"><a href="<?php the_permalink(90);?>" class="c-btn">お問い合わせフォームへ</a></div>
                        </div>
                    </div>
                </div>
                <div class="p-store-cafe">
                        <p class="p-store__txt">併設カフェにおいては、オリジナル商品もお楽しみいただけます。ご来店お待ちしております。</p>
                        <ul class="p-store-cafe__menu">
                            <li class="p-store-cafe__item smoothTrigger delay-time03">
                                <img src="<?= mypath(); ?>img/ryokutya.jpg" alt="">
                                <p>こだわりの緑茶</p>
                            </li>
                            <li class="p-store-cafe__item smoothTrigger delay-time06">
                                <img src="<?= mypath(); ?>img/tai_m.jpg" alt="">
                                <p>黒たい焼きの抹茶アイス</p>
                            </li>
                            <li class="p-store-cafe__item smoothTrigger delay-time09">
                                <img src="<?= mypath(); ?>img/ice_m.jpg" alt="">
                                <p>抹茶のアイスクリーム</p>
                            </li>
                            <li class="p-store-cafe__item smoothTrigger delay-time12">
                                <img src="<?= mypath(); ?>img/menu.jpg" alt="">
                                <p>その他のメニュー<br>画像をクックして御覧ください。</p>
                            </li>
                        </ul>
                </div>
            </section>
            <!-- /.store -->
            <!-- .blog -->
            <section class="p-blog" id="p-blog">
                <h4 class="c-section__title">ブログ</h4>
                <div class="p-blog__wrapper">
                <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $the_query = new WP_Query( array(
                        'post_status' => 'publish',
                        'post_type' => 'blog', //ページの種類（例、page、post、カスタム投稿タイプ名）
                        'paged' => $paged,
                        'posts_per_page' => 3, // 表示件数
                        'orderby'     => 'date',
                        'order' => 'DESC'
                    ) );
                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                    <article class="p-blog__article">
                        <a href="<?php the_permalink(); ?>">
                            <?php if(has_post_thumbnail()): ?>
                            <figure><?php the_post_thumbnail(); ?></figure>
                            <?php endif; ?>
                            <p>
                                <!-- 日付を表示 -->
                                <time datetime="<?= get_the_date(DATE_W3C); ?>"><?= esc_html(get_the_date()); ?></time>
                                <i>
                                    <?php // タクソノミーのターム名を表示
                                        $terms = get_the_terms($post->ID,'genre');
                                        foreach( $terms as $term ) {
                                            echo $term->name;
                                        }
                                    ?>
                                </i>
                                <br>
                                <!-- タイトルを表示 -->
                                <?php the_title(); ?>
                            </p>
                        </a>
                    </article>
                <?php endwhile; wp_reset_postdata(); else: echo '<div><p>ありません。</p></div>'; endif; ?>
                </div>
                    <div class="p-blog__btn"><a href="<?php echo get_post_type_archive_link('blog');?>" class="c-btn">一覧で見る</a></div>
            </section>
            <!-- /.blog -->
        </main>
        <!-- /.main -->
<?php get_footer(); ?>
