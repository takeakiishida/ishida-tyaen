<?php get_header(); ?>
    <main class="p-blog-detail p-blog-detail--flex">
        <div class="p-blog-detail__wrapper">
            <!-- メインループ -->
            <?php if(have_posts()):while(have_posts()): the_post();?>
                <!-- 日付 -->
                <time datetime="<?= get_the_date(DATE_W3C); ?>"><?= esc_html(get_the_date()); ?></time>
                <!-- カテゴリー名 -->
                <i class="p-blog-detail__category">
                <?php // タクソノミーのターム名を表示
                    $terms = get_the_terms($post->ID,'genre');
                    foreach( $terms as $term ) {
                        echo $term->name;
                    }
                ?>
                </i>
                <!-- タイトル -->
                <h2 class="p-blog-detail__title"><?php the_title(); ?></h2>
                <!-- メイン画像 -->
                <?php if ( get_field( 'img' ) ) : ?>
                    <?php 
                        $image = get_field('img');
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                        if( $image ) {
                            echo wp_get_attachment_image( $image, $size );
                        }
                    ?>
                <?php endif; ?>
                <!-- 本文 -->
                <?php if ( get_field( 'text' ) ) : ?>
                    <div class="p-blog-detail__text"><?php the_field( 'text' ); ?></div>
                <?php endif; ?>          
                <!-- シェアボタン -->
                <aside class="c-share">
                    <h2><span class="dashicons dashicons-share"></span> SHARE</h2>
                    <div class="mypostlist">
                        <a href="https://twitter.com/share?url=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo urlencode( get_the_title() ); ?>" class="mytwitter" onclick="window.open(this.href, 'new', 'width=500,height=400'); return false;">
                            <span class="dashicons dashicons-twitter"></span>
                            <span class="screen-reader-text">Twitter</span>
                        </a>
                        <a href="https://www.facebook.com/share.php?u=<?php echo urlencode( get_permalink() ); ?>" class="myfacebook" onclick="window.open(this.href, 'new', 'width=500,height=400'); return false;">
                            <span class="dashicons dashicons-facebook-alt"></span>
                            <span class="screen-reader-text">Facebook</span>
                        </a>
                    </div>
                </aside>
                <!-- ポストナビゲーション→同じカテゴリの記事だけ取得 -->
                <?php the_post_navigation(array('in_same_term' => 'true',)); ?>
            <?php endwhile; endif; ?>
            <!-- お知らせ用リンクとブログ用リンクで切り替える -->
            <div class="p-blog-detail__link">
                <!-- カスタム投稿のアーカイブページへのリンク -->
                <a href="<?php echo get_post_type_archive_link('blog');?>">&gt;&gt;一覧に戻る</a>
            </div>
            <div class="p-blog-detail__link">
                <a href="<?= home_url(); ?>">&gt;&gt;TOPに戻る</a>
            </div>
        </div>
        <!-- サイドバー -->
        <aside class="p-blog-aside">
            <h3>最近のブログ</h3>
            <div class="mypostlist">
                <!-- メインクエリ(メインループ)以外のデータが欲しい場合は、サブクエリ(サブループ)で取得する -->
                <?php
                    // get_posts()はデフォルトだと、最新５件のデータを取得する。
                    $myposts = get_posts([
                        // 表示件数
                        'posts_per_page' => 5,
                        //見ている記事はRELATEDの中に表示しない。（教科書P266）
                        'post__not_in' => array(get_the_ID()),
                        //表示している記事と同じカテゴリーの記事を表示するようにする。(教科書P266)
                        'category__in' => wp_get_post_categories(get_the_ID()),
                        //日付の降順で表示
                        'orderby' => 'DESC',
                        // 投稿タイプは、カスタム投稿（ブログ）
                        'post_type' => 'blog'
                    ]);
                    if($myposts):
                        // $post以外の名前の変数は使ってはいけない。
                        foreach($myposts as $post):
                            setup_postdata($post);
                ?>
                <article class="p-blog-aside__article">
                    <div class="<?php 
                        if(has_post_thumbnail()): echo "p-blog-aside__img"; 
                        endif;
                    ?>">
                        <a href="<?php the_permalink(); ?>">
                            <?php if(has_post_thumbnail()): ?>
                                <figure><?php the_post_thumbnail(); ?></figure>
                            <?php endif; ?>
                        </a>
                    </div>
                    <!-- サムネイルが存在しない場合、タイトル幅は100%にする。※お知らせ用 -->
                    <div class="<?php 
                        if(has_post_thumbnail()): echo "p-blog-aside__title"; 
                        endif;
                    ?> p-blog-aside__title--font">
                        <a href="<?php the_permalink(); ?>">
                            <h4><?php the_title(); ?></h4>
                        </a>
                    </div>    
                </article>
                <?php endforeach; wp_reset_postdata(); endif;?>
            </div>
        </aside>
    </main>
<?php get_footer(); ?>
