<?php get_header(); ?>    
    <main>
        <div class="p-news-top__wrapper">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $the_query = new WP_Query( array(
                'post_status' => 'publish',
                'post_type' => 'news', //ページの種類（例、page、post、カスタム投稿タイプ名）
                'paged' => $paged,
                'posts_per_page' => 10, // 表示件数
                'orderby'     => 'date',
                'order' => 'DESC'
            ) );
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                <article class="p-news-top__article">
                    <div class="p-news-top__date">
                        <time datetime="<?= get_the_date(DATE_W3C); ?>"><?= get_the_date(); ?></time>
                    </div>
                    <div class="p-news-top__category">
                        <p>
                            <?php // genreタクソノミーのターム名を表示
                                $terms = get_the_terms($post->ID,'newsgenre');
                                foreach( $terms as $term ) {
                                    echo $term->name;
                                }
                            ?>
                        </p>
                    </div>
                    <div class="p-news-top__txt">
                        <a href="<?php the_permalink(); ?>">
                            <p><?php the_title(); ?></p>
                        </a>
                    </div>
                </article>
            <?php endwhile; else: echo '<div><p>記事がありません。</p></div>'; endif; ?>
        </div>
        <!-- ページネーション -->
        <div class="pnavi">
            <div class="pnavi__wrapper">
                <?php
                    $big = 9999999999;
                    $arg = array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'current' => max( 1, get_query_var('paged') ),
                        'mid_size' => 1,
                        'total'   => $the_query->max_num_pages
                    );
                    echo paginate_links($arg);
                ?>
            </div>    
        </div>
    </main>
<?php get_footer(); ?>