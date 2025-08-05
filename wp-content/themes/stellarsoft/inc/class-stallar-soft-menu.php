<?php
/**
 * Create Mega Menu with Custom post type.
 * Used content blocks from ACF.
 */

class Stellar_Soft_Mega_Menu extends Walker_Nav_Menu
{


	private array $submenu_ids = [];
	private int $current_parent_item_id = 0;

	private bool $has_mega_menu = false;


	public function get_awards_blocks($menu_item_id, &$output, $device = ''): void
	{
		$is_show_awards_blocks = get_field('add_blocks_with_awards', $menu_item_id);


		if ($is_show_awards_blocks) {
			$awards_blocks = get_field('blocks_awards', $menu_item_id) ?? false;
			$output .= '<div class="mega-menu__awards mega-menu__awards--' . $device . '">';
			foreach ($awards_blocks as $award_block) {
				$award = $award_block['awards'];
				$output .= '<div class="mega-menu__award">';
				$output .= '<img src=' . $award . ' alt="mega-menu-award" class="mega-menu__award-icon">';
				$output .= '</div>';
			}
			$output .= '</div>';
		}
	}

	public
	function start_lvl(&$output, $depth = 0, $args = null)
	{
		$this->submenu_ids = [];


		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat($t, $depth);


		// Default class.
		$classes = array('sub-menu');
		$classes[] = $depth === 0 ? 'mega-menu__titles titles' : '';
		$class_names = implode(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
		$atts = array();
		$atts['class'] = !empty($class_names) ? $class_names : '';


		$atts = apply_filters('nav_menu_submenu_attributes', $atts, $args, $depth);
		$attributes = $this->build_atts($atts);


		$output .= $depth === 0 ? "<div class='mega-menu'>" : '';
		$output .= $depth === 0 ? "<div class='mega-menu__wrap wrap'>" : '';
		$output .= "{$n}{$indent}<ul{$attributes}>{$n}";


	}


	public
	function end_lvl(&$output, $depth = 0, $args = null)
	{


		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}
		$indent = str_repeat($t, $depth);
		$output .= "$indent</ul>{$n}";


		//Create mega menu when inner have depth
		if ($depth == 0 && !empty($this->submenu_ids)) {
			$output .= '<div class="mega-menu__content">';

			foreach ($this->submenu_ids as $menu_item) {
				//Return to view title our menu item.
				add_filter('view-title', function ($title) use ($menu_item) {
					$title_sub_men_item = get_the_title($menu_item);
					return __('All ' . $title_sub_men_item);
				});
				$menu_views = get_field('select_menu_view', $menu_item);
				$output .= '<div class="mega-menu__inbound" data-mega-menu-content="' . $menu_item . '">';
				if (is_object($menu_views) && !empty($menu_views->post_content)) {
					$output .= apply_filters('the_content', $menu_views->post_content);

					//Method displaying awards items.
					$this->get_awards_blocks($menu_item, $output, 'mobile');

				}
				$output .= "</div>";

			}

			$output .= "</div>";


		}
	}


	public
	function start_el(&$output, $data_object, $depth = 0, $args = null, $current_object_id = 0)
	{


		if ($depth == 0) {
			$this->current_parent_item_id = $data_object->ID;
			$this->has_mega_menu = $args->walker->has_children;
		} elseif ($depth == 1 && $data_object->menu_item_parent == $this->current_parent_item_id) {
			$this->submenu_ids[] = $data_object->ID;
		}
		$menu_item = $data_object;
		$menus_id = $menu_item->ID;
		$is_enable_mega_menu = get_field('show_mega_menu', $menus_id);
		$is_main_mega_menu_link = get_field('make_this_link_the_main_link', $menus_id) ? 'mega-menu__main-link' :
			'';
		$has_mega_menu = $this->has_mega_menu && $depth === 0 ? 'list__item--has-mega-menu' : '';
		$has_mega_menu_link = $this->has_mega_menu && $depth === 0 ? 'menu__link--has-mega-menu' : '';
		//Blocks awards fields.
		$is_show_awards_blocks = get_field('add_blocks_with_awards', $menu_item);
		$awards_blocks = $is_show_awards_blocks ? get_field('blocks_awards', $menu_item) : false;


		if ($depth === 1 && $is_enable_mega_menu && $menu_item->menu_item_parent != 0 || $is_main_mega_menu_link) {
			$output .= '<li class="mega-menu__item titles__item menu-item-' . $menu_item->ID . ' ' . $is_main_mega_menu_link . '">';
			$output .= '<div class="mega-menu__heading h3 titles__heading  menu-item-' . $menu_item->ID . '">';
			$output .= '<a ' .
				($is_main_mega_menu_link ? '' : 'data-menu-link-content="' . $menu_item->ID . '"') .
				'class="mega-menu__link titles__link" href="' . esc_url($menu_item->url) . '">' .
				esc_html($menu_item->title) .
				'</a>';
			$output .= '</div>';
			$output .= "</li>";

			//Blocks with awards.
			$this->get_awards_blocks($menu_item->ID, $output, 'desktop');

		} else {
			$output .= '<li class="list__item ' . $has_mega_menu . ' menu-item-' . $menu_item->ID . '">';
			$output .= '<a data-barba-prefetch class="menu__link ' . $has_mega_menu_link . '" href="' . esc_url($menu_item->url) . '">' . esc_html($menu_item->title) . '';
			$output .= '</a>';
		}


	}


	public
	function end_el(&$output, $data_object, $depth = 0, $args = null)
	{
		if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
			$t = '';
			$n = '';
		} else {
			$t = "\t";
			$n = "\n";
		}

		$output .= "</li>{$n}";


	}


}
