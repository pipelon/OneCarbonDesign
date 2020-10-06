<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage TemplateMela
 * @since TemplateMela 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
    <div class="entry-main-content">
        <?php if (is_search() || !is_single()) : ?>
            <?php if (has_post_thumbnail() && !post_password_required()) : ?>
                <?php $postImage = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
                <div class="entry-thumbnail-outer">
                    <div class="entry-thumbnail">
                        <?php
                        the_post_thumbnail('tmpmela-blog-posts-list');
                        $postImage = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <?php if (is_search() || !is_single()) : ?>
            <div class="post-content <?php if (empty($postImage)): ?> non <?php endif; ?> ">
                <div class="entry-content-other">
                    <?php
                    if ($post->post_title == '') :
                        $entry_meta_class = "empty-entry-header";
                    else :
                        $entry_meta_class = "";
                    endif; ?>
                    <div class="entry-meta date">
                        <?php tmpmela_entry_date(); ?>
                    </div>
                    <div class="entry-main-header <?php echo esc_attr($entry_meta_class); ?>">
                        <header class="entry-header">
                            <h3 class="entry-title"><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark"><?php the_title_attribute(); ?></a></h3>
                        </header>
                        <!--  entry-header -->
                    </div>
                    <div class="entry-content-inner">
                        <div class="entry-meta-inner">
                            <?php if (!empty(tmpmela_posts_short_description())): ?>
                                <div class="entry-meta">
                                    <div class="entry-summary">
                                        <div class="excerpt"><?php echo tmpmela_posts_short_description(); ?> </div>
                                    </div><!-- .entry-summary -->
                                </div>
                            <?php endif; ?>
                            <!--  entry-meta -->
                        </div>
                        <!--  entry-meta-inner -->
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="entry-content-other">
                <?php
                if ($post->post_title == '') :
                    $entry_meta_class = "empty-entry-header";
                else :
                    $entry_meta_class = "";
                endif; ?>
                <div class="entry-main-header <?php echo esc_attr($entry_meta_class); ?>">
                    <header class="entry-header">
                        <h3 class="entry-title">
                            <?php the_title_attribute(); ?>
                        </h3>
                    </header>
                    <div class="entry-content-inner">
                    <div class="entry-meta-inner">
                        <div class="entry-meta">
                            <?php tmpmela_entry_date(); ?>
                            <?php tmpmela_author_link(); ?>
                            <?php tmpmela_tags_links(); ?>
                            <?php tmpmela_categories_links(); ?>
                            <?php edit_post_link(esc_html__('Edit', 'sheon'), '<span class="edit-link"><i class="fa fa-pencil"></i>', '</span>'); ?>
                        </div>
                        <!-- entry-meta -->
                    </div>
                    <!-- entry-meta-inner -->
                    </div>
                    <!-- entry-content-inner -->
                </div>
                <!-- entry-main-header -->
                <!-- entry-header single blog-->
                
                <div class="entry-content">
                    <?php
                    the_post_thumbnail('tmpmela-blog-posts-list');
                    $postImage = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                    ?>
                    <?php the_content(wp_kses(__('Continue reading <span class="meta-nav">&rarr;</span>', 'sheon'), tmpmela_allowed_html())); ?>
                    <?php wp_link_pages(array('before' => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'sheon') . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
                </div>
                <!-- entry-content -->
            </div>
        <?php endif; ?>
    </div>
</article>