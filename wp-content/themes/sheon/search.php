<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since Template Mela 1.0
 */
get_header(); ?>
<?php if (get_option('tmpmela_page_sidebar') == 'yes') : ?>
    <section id="primary" class="content-area">
<?php else : ?>
    <section id="primary" class="main-content-inner-full">
<?php endif; ?>
    <div id="content" class="site-content" role="main">
        <div class="blog">
            <?php if (have_posts()) : ?>
                <!-- .page-header -->
                <?php
                // Start the Loop.
                while (have_posts()) : the_post();
                    /*
                     * Include the post format-specific template for the content. If you want to
                     * use this in a child theme, then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     */
                    get_template_part('content', get_post_format());
                endwhile;
            else :
                // If no content, include the "No posts found" template.
                get_template_part('content', 'none');
            endif;
            ?>
        </div>
        <?php tmpmela_paging_nav(); ?>
    </div>
    <!-- #content -->
    </section>
    <!-- #primary -->
<?php
if (get_option('tmpmela_page_sidebar') == 'yes') :
    get_sidebar('content');
    get_sidebar();
endif;
get_footer();
?>