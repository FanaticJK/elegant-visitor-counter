<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    elegant_visitor_counter
 * @subpackage elegant_visitor_counter/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    elegant_visitor_counter
 * @subpackage elegant_visitor_counter/public
 * @author     Your Name <email@example.com>
 */
class Elegant_visitor_counter_Public extends WP_Widget {
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $elegant_visitor_counter The ID of this plugin.
	 */
	private $elegant_visitor_counter;
	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $elegant_visitor_counter The name of the plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $elegant_visitor_counter = "", $version = "" ) {
		$this->elegant_visitor_counter = $elegant_visitor_counter;
		$this->version                 = $version;
		parent::__construct(
		// base ID of the widget
			'elegant_visitor_counter_plugin_widget',
			// name of the widget
			__( 'Elegant Visitor Counter Widget', 'elegant-visitor-counter' ),
			// widget options
			array(
				'description' => __( 'Widget to display daily, weekly and monthly visitor count', 'elegant-visitor-counter' )
			)
		);

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in elegant_visitor_counter_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The elegant_visitor_counter_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->elegant_visitor_counter, plugin_dir_url( __FILE__ ) . 'css/elegant-visitor-counter-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in elegant_visitor_counter_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The elegant_visitor_counter_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->elegant_visitor_counter, plugin_dir_url( __FILE__ ) . 'js/elegant-visitor-counter-public.js', array( 'jquery' ), $this->version, false );

	}

	function form( $instance ) {
		$defaults            = array(
			'visitors_today'      => 'yes',
			'visitors_yesterday'  => 'yes',
			'visitors_this_week'  => 'yes',
			'visitors_this_month' => 'yes',
			'total'               => 'yes'
		);
		$visitors_today      = ( isset( $instance['visitors_today'] ) ) ? $instance['visitors_today'] : $defaults['visitors_today'];
		$visitors_yesterday  = ( isset( $instance['visitors_yesterday'] ) ) ? $instance['visitors_yesterday'] : $defaults['visitors_yesterday'];
		$visitors_this_week  = ( isset( $instance['visitors_this_week'] ) ) ? $instance['visitors_this_week'] : $defaults['visitors_this_week'];
		$visitors_this_month = ( isset( $instance['visitors_this_month'] ) ) ? $instance['visitors_this_month'] : $defaults['visitors_this_month'];
		$total               = ( isset( $instance['total'] ) ) ? $instance['total'] : $defaults['total'];
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'visitors_today' ); ?>">Today:</label><br/>
            <select class="widefat" id="<?php echo $this->get_field_id( 'visitors_today' ); ?>"
                    name="<?php echo $this->get_field_name( 'visitors_today' ); ?>">
                <option <?php if ( $visitors_today == "yes" ) { ?> selected <?php } ?> value="yes">Yes</option>
                <option <?php if ( $visitors_today == "no" ) { ?> selected <?php } ?> value="no">No</option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'visitors_yesterday' ); ?>">Yesterday:</label><br/>
            <select class="widefat" id="<?php echo $this->get_field_id( 'visitors_yesterday' ); ?>"
                    name="<?php echo $this->get_field_name( 'visitors_yesterday' ); ?>">
                <option <?php if ( $visitors_yesterday == "yes" ) { ?> selected <?php } ?> value="yes">Yes</option>
                <option <?php if ( $visitors_yesterday == "no" ) { ?> selected <?php } ?> value="no">No</option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'visitors_this_week' ); ?>">This Week:</label><br/>
            <select class="widefat" id="<?php echo $this->get_field_id( 'visitors_this_week' ); ?>"
                    name="<?php echo $this->get_field_name( 'visitors_this_week' ); ?>">
                <option <?php if ( $visitors_this_week == "yes" ) { ?> selected <?php } ?> value="yes">Yes</option>
                <option <?php if ( $visitors_this_week == "no" ) { ?> selected <?php } ?> value="no">No</option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'visitors_this_month' ); ?>">This Month:</label><br/>
            <select class="widefat" id="<?php echo $this->get_field_id( 'visitors_this_month' ); ?>"
                    name="<?php echo $this->get_field_name( 'visitors_this_month' ); ?>">
                <option <?php if ( $visitors_this_month == "yes" ) { ?> selected <?php } ?> value="yes">Yes</option>
                <option <?php if ( $visitors_this_month == "no" ) { ?> selected <?php } ?> value="no">No</option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'total' ); ?>">Total:</label><br/>
            <select class="widefat" id="<?php echo $this->get_field_id( 'total' ); ?>"
                    name="<?php echo $this->get_field_name( 'total' ); ?>">
                <option <?php if ( $total == "yes" ) { ?> selected <?php } ?> value="yes">Yes</option>
                <option <?php if ( $total == "no" ) { ?> selected <?php } ?> value="no">No</option>
            </select>
        </p>
		<?php

	}

	function update( $new_instance, $old_instance ) {
		$instance                        = $old_instance;
		$instance['visitors_today']      = strip_tags( $new_instance['visitors_today'] );
		$instance['visitors_yesterday']  = strip_tags( $new_instance['visitors_yesterday'] );
		$instance['visitors_this_week']  = strip_tags( $new_instance['visitors_this_week'] );
		$instance['visitors_this_month'] = strip_tags( $new_instance['visitors_this_month'] );
		$instance['total']               = strip_tags( $new_instance['total'] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $instance );
		?>
        <aside class="widget" id="visitor-counter">
            <div class="visitor-counter-content">
				<?php if ( $instance['visitors_today'] == 'yes' ): ?>
                    <p>Today: <?php echo $this->evc_get_visit_count( 'D' ) ?></p>
				<?php endif; ?>
				<?php if ( $instance['visitors_yesterday'] == 'yes' ): ?>
                    <p>Yesterday: <?php echo $this->evc_get_visit_count( 'Y' ) ?></p>
				<?php endif; ?>
				<?php if ( $instance['visitors_this_week'] == 'yes' ): ?>
                    <p>This Week: <?php echo $this->evc_get_visit_count( 'W' ) ?></p>
				<?php endif; ?>
				<?php if ( $instance['visitors_this_month'] == 'yes' ): ?>
                    <p>This Month: <?php echo $this->evc_get_visit_count( 'M' ) ?></p>
					<?php
				endif;
				if ( $instance['visitors_this_month'] == 'yes' ): ?>
					<?php
					/*$splitNum = str_split( $this->evc_get_visit_count( 'T' ) );
					echo '<div class="v-counter">
                        <span>Visitor Number: </span>';
					foreach ( $splitNum as $num ) {
						echo '<span class="count-holder">' . $num . '</span>';
					}*/
					echo '<div class="v-counter">
                        <span>Total Visitors: </span>
                        <span class="count-holder">' . $this->evc_get_visit_count( 'T' ) . '</span>';
					echo '</div>';
				endif;
				?>
                <!--<p>Currently Online: <?php //echo evc_get_visit_count( 'C' ) ?></p>-->
            </div>
        </aside>

		<?php
	}

	function evc_get_visit_count( $interval = 'D' ) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'evc_log';
		if ( $interval == 'C' ) {
			$condition = "`Time` > DATE_SUB(NOW(), INTERVAL 5 HOUR)";
		} else if ( $interval == 'T' ) {
			$condition = "1";
		} elseif ( $interval == 'D' ) {
			$condition = "DATE(`Time`)=DATE(NOW())";
		} else if ( $interval == 'W' ) {
			$condition = "WEEKOFYEAR(`Time`)=WEEKOFYEAR(NOW())";
		} else if ( $interval == 'M' ) {
			$condition = "MONTH(`Time`)=MONTH(NOW())";
		} else if ( $interval == 'Y' ) {
			$condition = "DATE(`Time`)=DATE(NOW() - INTERVAL 1 DAY)";
		}
		$sql   = "SELECT COUNT(*) FROM $table_name WHERE " . $condition;
		$count = $wpdb->get_var( $sql );

		return $count;
	}

	function visitor_counter_plugin_widget() {
		register_widget( 'Elegant_visitor_counter_Public' );
	}

	function evc_log_user() {
//	    die('here');
		if ( $this->evc_check_ip_exist( $_SERVER['REMOTE_ADDR'] ) == 0 ) {
			global $wpdb;
			$table_name     = $wpdb->prefix . 'evc_log';
			$server_address = $_SERVER['REMOTE_ADDR'];
			$wpdb->insert(
				$table_name,
				array(
					'IP' => $_SERVER['REMOTE_ADDR'],
				),
				array(
					'%s',
				)
			);
		}
	}

	function evc_check_ip_exist( $ip ) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'evc_log';
		$sql        = "SELECT COUNT(*) FROM $table_name WHERE IP='" . $ip . "' AND DATE(Time)='" . date( 'Y-m-d' ) . "'";
		$count      = $wpdb->get_var( $sql );

		return $count;
	}
}
