<?php 
if (!defined('ABSPATH')){
	exit;
}
if (!class_exists('tsc_customizer')){
	class tsc_customizer{
		public function __construct(){
			add_action('customize_register',array($this,'tsc_customizer_register'));
			add_action('init',array($this,'stc_live_preview'));
		}
	    public static function tsc_customizer_register($wp_customize){
			$wp_customize->add_panel('child_panel',array(
			       'title' => __('Child Theme Options','twentyseventeen-child')
			));
			$wp_customize->add_section('slider_section',array(
			        'title'=> __('Slider Setting','twentyseventeen-child'),
				    'panel'=>'child_panel'
			));
			$wp_customize->add_setting('slider_title',array(
			        'default'=>'Write Your Slider Title Here',
				    'transport'=>'postMessage'
			));
			$wp_customize->add_control('slider_title',array(
			         'label'=>__('Slider Title','twentyseventeen-child'),
				     'type'=>'text',
				     'section'=>'slider_section',
				     'settings'=>'slider_title'
			));
			$wp_customize->add_setting('slider_paragraph',array(
			        'default'=>'Write Your Slider Paragraph Here',
				    'transport'=>'postMessage'
			));
			$wp_customize->add_control('slider_paragraph',array(
			         'label'=>__('Slider Paragraph','twentyseventeen-child'),
				     'type'=>'textarea',
				     'section'=>'slider_section',
				     'settings'=>'slider_paragraph'
			));
			$wp_customize->add_setting('slider_bg_img1',array(
			        'default'=> '',
				    'transport'=>'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'slider_bg_img1',array(
			          'label'=>__('Slider Background Image 1','twentyseventeen-child'),
			          'section'=>'slider_section',
			          'settings'=>'slider_bg_img1'   
			 )));
			$wp_customize->add_setting('slider_bg_img2',array(
			        'default'=> '',
				    'transport'=>'postMessage'
			));
			$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'slider_bg_img2',array(
			          'label'=>__('Slider Background Image 2','twentyseventeen-child'),
			          'section'=>'slider_section',
			          'settings'=>'slider_bg_img2'   
			 )));
			$wp_customize->add_section('resume',array(
			          'title'=>__('Resume Upload','twentyseventeen-child'),
				      'panel'=>'child_panel'
			));
			$wp_customize->add_setting('resume',array(
			          'default'=>'',
				      'transport' => 'refresh'
			));
			$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'resume',array(
			          'label'=>__('Upload Your Resume Here','twentyseventeen-child'),
				      'section'=>'resume',
				      'settings'=>'resume'
			)));
			$wp_customize->add_section('social_section',array(
			        'title'=>__('Social Links','twentyseventeen-child'),
				    'panel'  => 'child_panel'
			));
			  $wp_customize->add_setting('social_bg_img',array(
			        'default'=> '',
				    'transport'=>'postMessage'
			));
			 $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'social_bg_img',array(
			          'label'=>__('Social Link Background Image','twentyseventeen-child'),
			          'section'=>'social_section',
			          'settings'=>'social_bg_img'   
			 )));
			$wp_customize->add_setting('social_title',array(
				       'default'=> '',
					   'transport'=>'postMessage'
			));
			$wp_customize->add_control('social_title',array(
			           'label'=>__('Social Title','twentyseventeen-child'),
				       'type' =>'text',
				       'section'=>'social_section',
			           'settings'=>'social_title' 
			));
			$wp_customize->add_setting('twitter',array(
				       'default'=> '',
					   'transport'=>'postMessage'
			));
			$wp_customize->add_control('twitter',array(
			           'label'=>__('Twitter Link','twentyseventeen-child'),
				       'type' =>'text',
				       'section'=>'social_section',
			           'settings'=>'twitter' 
			));
			$wp_customize->add_setting('pinterest',array(
				       'default'=> '',
					   'transport'=>'postMessage'
			));
			$wp_customize->add_control('pinterest',array(
			           'label'=>__('Pinterest Link','twentyseventeen-child'),
				       'type' =>'text',
				       'section'=>'social_section',
			           'settings'=>'pinterest' 
			));
			$wp_customize->add_setting('facebook',array(
				       'default'=> '',
					   'transport'=>'postMessage'
			));
			$wp_customize->add_control('facebook',array(
			           'label'=>__('Facebook Link','twentyseventeen-child'),
				       'type' =>'text',
				       'section'=>'social_section',
			           'settings'=>'facebook' 
			));
			$wp_customize->add_setting('instagram',array(
				       'default'=> '',
					   'transport'=>'postMessage'
			));
			$wp_customize->add_control('instagram',array(
			           'label'=>__('Instagram Link','twentyseventeen-child'),
				       'type' =>'text',
				       'section'=>'social_section',
			           'settings'=>'instagram' 
			));
		}
		public static function stc_live_preview(){
			wp_enqueue_script('stc-customizer',get_stylesheet_directory_uri().'/customizer/customizer.js',array('jquery','customize-preview'),'v1010',true);
		}
    }
	
}
return new tsc_customizer;