<?php
namespace SimpleCarousel;

use Zend\Math\Rand;

return [
    'view_manager' => [
        'template_path_stack' => [
            dirname(__DIR__) . '/view',
        ]
    ],
	'block_layouts' => [
        'factories' => [
            'carousel' => Service\BlockLayout\CarouselFactory::class,
        ],
    ],
    'form_elements' => [
        'invokables' => [
            Form\CarouselBlockForm::class => Form\CarouselBlockForm::class,
        ],
    ],
    'DefaultSettings' => [
        'CarouselBlockForm' => [
            'height' => '500px',
            'mobile_height' => '300px',
            'duration' => 500,
            'perPage' => 1,
            'layout' => 'full',
            'loop' => true,
            'draggable' => true,
            'title' => '',
            'autoSlide' => false,
            'autoSlideInt' => 5000,
            'blockContainerClass' => 'simple-carousel-'.Rand::getString(8, 'abcdefghijklmnopqrstuvwxyz', true),
            'customCss' => '',
            'captionFontSizeDesktop' => '14px',
            'captionFontSizeMobile' => '12px',
            'captionColor' => '#ffffff',
            'verticalPadding' => '20px',
            'horizontalPadding' => '20px',
            'captionPosX' => 'left',
            'captionPosY' => 'top',
        ]
    ]
];