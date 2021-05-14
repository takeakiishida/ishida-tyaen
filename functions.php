<?php 
    // style.cssの読み込み
    // wp_enqueue_style{'WPが管理するstyleの名前',どこにあるかパスで指定};
    add_action(
        'wp_enqueue_scripts',
        function(){
            wp_enqueue_style('mystyle',get_stylesheet_uri(),[], filemtime(get_theme_file_path('style.css')));
        }
    );

    //絶対パス取得関数
    function mypath(){
        // 絶対パスを取得しつつ、値を返すときにスラッシュを追加するようにする。
        return get_theme_file_uri() . '/';
    }

    //関数の中で読み込みを定義する。
    function mytheme_setup(){
        // ２段組レイアウトの有効化
        add_theme_support('mycols');

        //theme.min.cssの読み込み 
        add_theme_support('wp-block-styles');

        // editor-style.cssの有効化
        add_theme_support('editor-styles');
        // editor-style.cssの読みこみ
        add_editor_style('editor-style.css');

        // 縦横比を維持したレスポンシブを有効化
        add_theme_support('responsive-embeds');

        // ページのタイトルを表示させる。
        add_theme_support('title-tag');

        // link,style,scriptのhtml5対応
        add_theme_support('html5',array('style','script'));

        // 記事のサムネイル画像(アイキャッチ)を表示する。
        add_theme_support('post-thumbnails');
    }
    add_action('after_setup_theme','mytheme_setup');

    // ウィジェットを有効化する。（各記事の一番下に月別のページなどのアーカイブを表示する。）
    function mytheme_widgets() {
        register_sidebar(array(
            'id' => 'sidebar-1',
            'name' => 'フッターメニュー',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
        ));
    }
    add_action('widgets_init','mytheme_widgets');

    // dashiconを外部から参照可能にする。
    add_action( 'wp_enqueue_scripts', 'load_dashicons' );
    function load_dashicons() {
        wp_enqueue_style( 'dashicons' );
    }
?>