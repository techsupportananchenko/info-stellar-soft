<?php
/**
 * Block Name: Cases
 *
 * This is the template that displays Cases Section
 */

if (isset($block['data']['preview_image_help'])) : ?>
    <img src="<?php echo $block['data']['preview_image_help'] ?>" style="width:100%; height:auto;">
<?php else :
    $title = get_field('title') ?? false;
    $description = get_field('description') ?? false;
    $cases = get_field('cases'); // Relationship.
    ?>
    <section class="cases-section">
        <div class="cases-section__container">
            <div class="section-head">
                <?php if ($title) :
                    $title_target = $title['target'] ? $title['target'] : '_self'; ?>
                    <div class="section-head__title">
                        <a class="section-head__link" target="<?php echo esc_attr($title_target); ?>"
                           href="<?php echo $title['url'] ?>">
                            <h2><?php echo $title['title'] ?></h2>
                            <div class="new-btn new-btn--tertiary section-head__btn">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M9.02082 7.48528L9.02082 8.48528L11.0208 8.48528V7.48528H9.02082ZM10.0208 1.82842H11.0208V0.828422L10.0208 0.828422L10.0208 1.82842ZM4.36396 0.828422L3.36396 0.828422L3.36396 2.82842L4.36396 2.82842L4.36396 0.828422ZM11.0208 7.48528V1.82842L9.02082 1.82842L9.02082 7.48528H11.0208ZM10.0208 0.828422L4.36396 0.828422L4.36396 2.82842L10.0208 2.82842L10.0208 0.828422ZM9.31371 1.12132L0.12132 10.3137L1.53553 11.7279L10.7279 2.53553L9.31371 1.12132Z"
                                            fill="#E3E3E3"/>
                                </svg>
                            </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="section-head__text">
                        <?php echo apply_filters('the_content', $description) ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($cases) :
                ?>
                <div class="cases__items cases-slider">
                    <div class="cases__items-wrapper swiper-wrapper">
                        <?php foreach ($cases as $post) :
                            $id = $post->ID ?? false;
                            $title = get_the_title($id) ?? false;
                            $post_excerpt = get_the_excerpt($id) ?? false;
                            $post_link = get_the_permalink($id) ?? false;
                            $thumbnail = get_the_post_thumbnail($id) ?? false;
                            $technologies = get_field('technologies', $id) ?? false;
                            ?>
                            <div class="cases-item swiper-slide">
                                <a href="<?php echo $post_link; ?>" class="cases-item__wrapper">
                                    <?php if ($thumbnail) : ?>
                                        <div class="cases-item__img">
                                            <?php echo $thumbnail ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="cases-item__content">
                                        <?php if ($title) : ?>
                                            <div class="cases-item__head">
                                                <h3 class="cases-item__title"><?php echo wp_kses_post($title) ?></h3>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($post_excerpt): ?>
                                            <p class="cases-item__excerpt">
                                                <?php echo $post_excerpt; ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if ($technologies) :
                                            $technologies_ids = array_column($technologies, 'technology');;
                                            $technologies_preview = array_slice($technologies_ids, 0, 3);
                                            $technologies_others = array_slice($technologies_ids, 3);
                                            ?>
                                            <div class="cases-item__technologies">
                                                <?php foreach ($technologies_preview as $id) :
                                                    $icon = get_field('technology_icon', $id) ?? false;
                                                    ?>
                                                    <?php if ($icon) : ?>
                                                    <div class="cases-item__icon">
                                                        <?php echo wp_get_attachment_image($icon['id'], 'full', 'false', ['class' => 'works-slide__icon-item', 'alt' => $title]) ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                                <?php if ($technologies_others): ?>
                                                    <?php foreach ($technologies_others as $id) :
                                                        $icon = get_field('technology_icon', $id) ?? false;
                                                        ?>
                                                        <?php if ($icon) : ?>
                                                        <div class="cases-item__icon cases-item__icon--others">
                                                            <?php echo wp_get_attachment_image($icon['id'], 'full', 'false', ['class' => 'works-slide__icon-item', 'alt' => $title]) ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>

                                        <?php endif; ?>
                                    </div>
                                    <div class="cases-item__link">
                                        <button class="cases-item__link-item new-btn new-btn--fourth">
                                            <?php _e('View Details', 'stellarsoft') ?>
                                        </button>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="cases__navigation">
                        <div class="slider-nav">
                            <button type="button" class="slider-nav__btn slider-nav__btn--prev js-cases-prev">
                                <svg width="15" height="12" viewBox="0 0 15 12" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M6.70711 9.29289L7.41421 10L6 11.4142L5.29289 10.7071L6.70711 9.29289ZM2 6L1.29289 6.70711L0.585787 6L1.29289 5.29289L2 6ZM5.29289 1.29289L6 0.585786L7.41421 2L6.70711 2.70711L5.29289 1.29289ZM5.29289 10.7071L1.29289 6.70711L2.70711 5.29289L6.70711 9.29289L5.29289 10.7071ZM1.29289 5.29289L5.29289 1.29289L6.70711 2.70711L2.70711 6.70711L1.29289 5.29289ZM2 5L15 5V7L2 7V5Z"/>
                                </svg>
                            </button>
                            <div class="slider-nav__pagination js-cases-pagination"></div>
                            <button type="button" class="slider-nav__btn slider-nav__btn--next js-cases-next">
                                <svg width="15" height="12" viewBox="0 0 15 12" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M8.29289 9.29289L7.58579 10L9 11.4142L9.70711 10.7071L8.29289 9.29289ZM13 6L13.7071 6.70711L14.4142 6L13.7071 5.29289L13 6ZM9.70711 1.29289L9 0.585786L7.58579 2L8.29289 2.70711L9.70711 1.29289ZM9.70711 10.7071L13.7071 6.70711L12.2929 5.29289L8.29289 9.29289L9.70711 10.7071ZM13.7071 5.29289L9.70711 1.29289L8.29289 2.70711L12.2929 6.70711L13.7071 5.29289ZM13 5L0 5L0 7L13 7V5Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>
<?php endif; ?>


