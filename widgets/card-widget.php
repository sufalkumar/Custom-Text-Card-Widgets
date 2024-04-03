<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Elementor Text Card Widget.
 *
 * Elementor widget that inserts a card with title and description.
 *
 * @since 1.0.0
 */
class Elementor_Custom_Text_Card_Widget extends \Elementor\Widget_Base { 
  

    // Widget Name
	public function get_name() {
		return 'card';
	}

	// Widget Title
	public function get_title() {
		return esc_html__( 'Text Card', 'custom-text-card-widget' );
	}

	// Widget Icon.
	public function get_icon() {
		return 'eicon-menu-card';
	}

    // Widget Help Link
	public function get_custom_help_url() {
		return 'https://sufalkumar.com/';
	}

	// Widget Categories
	public function get_categories() {
		return [ 'general' ];
	}

	// Widget Keywords
	public function get_keywords() {
		return [ 'card', 'textcard', 'text'];
	}

	// Register Card Widget
	protected function register_controls() { 

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'custom-text-card-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'card_image',
			[
				'label' => esc_html__( 'Choose Image', 'custom-text-card-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'card_title',
			[
				'label' => esc_html__( 'Text Card Title', 'custom-text-card-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Your card title', 'custom-text-card-widget' ),
			]
		);


		$this->add_control(
			'card_description',
			[
				'label' => esc_html__( 'Text Card Description', 'custom-text-card-widget' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block'   => true,
				'placeholder' => esc_html__( 'Your card description', 'custom-text-card-widget' ),
			]
		);	

		$this->end_controls_section();


		// Style Section

		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'custom-text-card-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Card Title Style

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'custom-text-card-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cards h3' => 'color: {{VALUE}};',
				],
				'default' => '#333'
			]
		);

		// Title Typography

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .cards h3',
			]
		);

		// Card Title Description Style

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Description Color', 'custom-text-card-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => ['{{WRAPPER}} .cards p' => 'color: {{VALUE}};',],
				'default' => '#333',
				'separator'=> 'before'
			]
		);

		// Description Typography

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .cards p',
			]
		);


		// Card Alignment

		$this->add_control(
			'card_align',
			[
				'label' => esc_html__( 'Alignment', 'custom-text-card-widget' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'custom-text-card-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'custom-text-card-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'custom-text-card-widget' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .cards' => 'text-align: {{VALUE}};',
				],
				'separator'=> 'before'
			]
		);





		$this->end_controls_section();

	}

	// Render Card widget output on the frontend
	protected function render() { 

		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();

		// get the individual values of the input
	
		$card_image = $settings['card_image']['url'];
		$card_title = $settings['card_title'];
		$card_description = $settings['card_description'];

		?>

        <!-- Start rendering the output -->

        <div class="cards">
		    <img src="<?php echo $card_image;?>" alt="">
            <h3 class="card_title"><?php echo $card_title;  ?></h3>
            <p class= "card__description"><?php echo $card_description;  ?></p>
        </div>

        <!-- End rendering the output -->

        <?php
		

	}						


}