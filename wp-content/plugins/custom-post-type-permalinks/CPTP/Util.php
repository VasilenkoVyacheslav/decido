<?php
/**
 * Utility
 *
 * @package Custom_Post_Type_Permalinks
 */

/**
 * Utility methods.
 *
 * @since 0.9.4
 * */
class CPTP_Util {

	/**
	 * CPTP_Util constructor.
	 *
	 * @private
	 */
	private function __construct() {
	}

	/**
	 * Get filtered post type.
	 *
	 * @return array
	 */
	public static function get_post_types() {
		$param     = array(
			'_builtin' => false,
			'public'   => true,
		);
		$post_type = get_post_types( $param );

		return array_filter( $post_type, array( __CLASS__, 'is_rewrite_supported_by' ) );

	}

	/**
	 * Check post type support rewrite.
	 *
	 * @param string $post_type post_type name.
	 *
	 * @return bool
	 */
	private static function is_rewrite_supported_by( $post_type ) {
		$post_type_object = get_post_type_object( $post_type );
		if ( false === $post_type_object->rewrite ) {
			$support = false;
		} else {
			$support = true;
		}

		/**
		 * Filters support CPTP for custom post type.
		 *
		 * @since 3.2.0
		 *
		 * @param bool $support support CPTP.
		 */
		$support = apply_filters( "CPTP_is_rewrite_supported_by_${post_type}", $support );

		/**
		 * Filters support CPTP for custom post type.
		 *
		 * @since 3.2.0
		 *
		 * @param bool $support support CPTP.
		 * @param string $post_type post type name.
		 */
		return apply_filters( 'CPTP_is_rewrite_supported', $support, $post_type );
	}

	/**
	 * Get taxonomies.
	 *
	 * @param bool $objects object or name.
	 *
	 * @return array
	 */
	public static function get_taxonomies( $objects = false ) {
		if ( $objects ) {
			$output = 'objects';
		} else {
			$output = 'names';
		}

		return get_taxonomies( array(
			'public'   => true,
			'_builtin' => false,
		), $output );
	}

	/**
	 * Get Custom Taxonomies parents slug.
	 *
	 * @version 1.0
	 *
	 * @param int|WP_Term|object $term Target term.
	 * @param string             $taxonomy Taxonomy name.
	 * @param string             $separator separater string.
	 * @param bool               $nicename use slug or name.
	 * @param array              $visited visited parent slug.
	 *
	 * @return string
	 */
	public static function get_taxonomy_parents_slug( $term, $taxonomy = 'category', $separator = '/', $nicename = false, $visited = array() ) {
		$chain  = '';
		$parent = get_term( $term, $taxonomy );
		if ( is_wp_error( $parent ) ) {
			return $parent;
		}

		if ( $nicename ) {
			$name = $parent->slug;
		} else {
			$name = $parent->name;
		}

		if ( $parent->parent && ( $parent->parent !== $parent->term_id ) && ! in_array( $parent->parent, $visited, true ) ) {
			$visited[] = $parent->parent;
			$chain     .= CPTP_Util::get_taxonomy_parents_slug( $parent->parent, $taxonomy, $separator, $nicename, $visited );
		}
		$chain .= $name . $separator;

		return $chain;
	}

	/**
	 * Get Custom Taxonomies parents.
	 *
	 * @deprecated
	 *
	 * @param int|WP_Term|object $term term.
	 * @param string             $taxonomy taxonomy.
	 * @param bool               $link show link html.
	 * @param string             $separator separator string.
	 * @param bool               $nicename use slug or name.
	 * @param array              $visited visited term.
	 *
	 * @return string
	 */
	public static function get_taxonomy_parents( $term, $taxonomy = 'category', $link = false, $separator = '/', $nicename = false, $visited = array() ) {
		$chain  = '';
		$parent = get_term( $term, $taxonomy );
		if ( is_wp_error( $parent ) ) {
			return $parent;
		}

		if ( $nicename ) {
			$name = $parent->slug;
		} else {
			$name = $parent->name;
		}

		if ( $parent->parent && ( $parent->parent !== $parent->term_id ) && ! in_array( $parent->parent, $visited, true ) ) {
			$visited[] = $parent->parent;
			$chain     .= CPTP_Util::get_taxonomy_parents( $parent->parent, $taxonomy, $link, $separator, $nicename, $visited );
		}
		if ( $link ) {
			$chain .= '<a href="' . get_term_link( $parent->term_id, $taxonomy ) . '" title="' . esc_attr( sprintf( __( 'View all posts in %s' ), $parent->name ) ) . '">' . esc_html( $name ) . '</a>' . esc_html( $separator );
		} else {
			$chain .= $name . $separator;
		}

		return $chain;
	}

	/**
	 * Get permalink structure.
	 *
	 * @since 0.9.6
	 *
	 * @param string|object $post_type post type name. / object post type object.
	 *
	 * @return string post type structure.
	 */
	public static function get_permalink_structure( $post_type ) {
		if ( is_string( $post_type ) ) {
			$pt_object = get_post_type_object( $post_type );
		} else {
			$pt_object = $post_type;
		}

		if ( ! empty( $pt_object->cptp_permalink_structure ) ) {
			$structure = $pt_object->cptp_permalink_structure;
		} else {

			$structure = get_option( $pt_object->name . '_structure' );
		}

		return apply_filters( 'CPTP_' . $pt_object->name . '_structure', $structure );
	}


	/**
	 * Get permalink structure front for date archive.
	 *
	 * @since 1.0.0
	 *
	 * @param string $post_type post type name.
	 *
	 * @return string
	 */
	public static function get_date_front( $post_type ) {
		$structure = CPTP_Util::get_permalink_structure( $post_type );

		$front = '';

		preg_match_all( '/%.+?%/', $structure, $tokens );
		$tok_index = 1;
		foreach ( (array) $tokens[0] as $token ) {
			if ( '%post_id%' === $token && ( $tok_index <= 3 ) ) {
				$front = '/date';
				break;
			}
			$tok_index ++;
		}

		return apply_filters( 'CPTP_date_front', $front, $post_type, $structure );
	}

	/**
	 * Get Option no_taxonomy_structure.
	 *
	 * @since 2.2.0
	 * @return bool
	 */
	public static function get_no_taxonomy_structure() {
		return ! ! intval( get_option( 'no_taxonomy_structure', true ) );
	}

	/**
	 * Sort Terms.
	 *
	 * @since 3.1.0
	 *
	 * @param WP_Term[]    $terms Terms array.
	 * @param string|array $orderby term object key.
	 * @param string       $order ASC or DESC.
	 *
	 * @return WP_Term[]
	 */
	public static function sort_terms( $terms, $orderby = 'term_id', $order = 'ASC' ) {

		if ( function_exists( 'wp_list_sort' ) ) {
			$terms = wp_list_sort( $terms, 'term_id', 'ASC' );
		} else {

			if ( 'name' === $orderby ) {
				usort( $terms, '_usort_terms_by_name' );
			} else {
				usort( $terms, '_usort_terms_by_ID' );
			}

			if ( 'DESC' === $order ) {
				$terms = array_reverse( $terms );
			}
		}

		return $terms;
	}
}
