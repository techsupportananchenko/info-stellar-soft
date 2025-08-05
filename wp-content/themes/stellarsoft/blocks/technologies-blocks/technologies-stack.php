<?php
/**
 * Block Name: Technologies Stack
 *
 * This is the template that displays Technologies Stack
 */

if (isset($block['data']['preview_image_help'])): ?>
    <img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else:
    //Take categories object from ACF choise.
    if (have_rows('technologies_stack_category')):
        $count_el = 1;
        while (have_rows('technologies_stack_category')):
            the_row();
            $category_name = get_sub_field('technologies_category_title');
            $posts = get_sub_field('technologies_posts');
            ?>
            <section class="technologies-stack  technologies-stack__element-<?= $count_el++;?>">
                <div class="technologies-stack__container">
                    <div class="technologies-stack__wrapper">
                        <?php if (!empty($category_name)): ?>
                            <h2 class="technologies-stack__title">
                                <?= $category_name; ?>
                            </h2>
                        <?php endif; ?>
                        <?php if (is_array($posts) && $posts): ?>
                            <div class="technologies-stack__content">
                                <div class="technologies-stack__description">
                                    <?php
                                    $category_description = '';
                                    foreach ($posts as $post):
                                        $post_id = $post->ID;
                                        $categories = get_the_terms($post_id, 'technologies-category');
                                        if (!is_wp_error($categories) && !empty($categories)):
                                            foreach ($categories as $category):
                                                if (empty($category_description)):
                                                    $category_description = $category->description; ?>
                                                    <p class="technologies-stack__text">
                                                        <?= $category_description; ?>
                                                    </p>
                                                    <?php break;
                                                endif;
                                                ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="technologies-stack__icons">
                                    <?php foreach ($posts as $post):
                                        $post_id = $post->ID;
                                        $post_name = $post->post_title;
                                        $post_link = get_permalink($post_id);
                                        $post_icon = get_field('technology_icon', $post_id);
                                        ?>
                                        <div class="technologies-stack__icon">
                                            <div class="technologies-stack__techlink">
                                            <img class="technologies-stack__techicon" src="<?= $post_icon['url']; ?>"
                                                alt="<?php echo esc_html($post_name); ?>">
                                            <p class="technologies-stack__techname">
                                                <?= $post_name; ?>
                                            </p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
<?php endif; ?>
