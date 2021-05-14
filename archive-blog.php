<?php get_header(); ?>
    <main>
        <div class="p-blog-top__wrapper">
            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $the_query = new WP_Query( array(
                    'post_status' => 'publish',
                    'post_type' => 'blog', //ページの種類（例、page、post、カスタム投稿タイプ名）
                    'paged' => $paged,
                    'posts_per_page' => 6, // 表示件数
                    'orderby'     => 'date',
                    'order' => 'DESC'
                ) );
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post();
            ?>
                <article class="p-blog-top__article">
                    <a href="<?php the_permalink(); ?>">
                        <!-- サムネイル画像を表示する -->
                        <?php if(has_post_thumbnail()): ?>
                            <figure><?php the_post_thumbnail(); ?></figure>
                        <?php endif; ?>
                        <p>
                            <!-- 日付を表示 -->
                            <time datetime="<?= get_the_date(DATE_W3C); ?>"><?= esc_html(get_the_date()); ?></time>
                            <!-- カテゴリー名を表示 -->
                            <i>
                                <?php // genreタクソノミーのターム名を表示
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
