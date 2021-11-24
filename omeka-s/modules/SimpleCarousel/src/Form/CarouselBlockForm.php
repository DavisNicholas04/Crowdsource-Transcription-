<?php
namespace SimpleCarousel\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class CarouselBlockForm extends Form
{
	public function init()
	{
		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][height]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Carousel height',
                'info' => 'Please enter a number with CSS units.',
            ],
		]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][mobile_height]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Carousel mobile height',
                'info' => 'Please enter a number with CSS units.',
            ],
        ]);

		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][duration]',
            'type' => Element\Number::class,
            'options' => [
				'label' => 'Duration (milliseconds)',
				'info' => 'Slide transition duration in milliseconds.'
            ],
		]);

		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][perPage]',
            'type' => Element\Number::class,
            'options' => [
				'label' => 'Image Per page',
				'info' => 'The number of slides to be shown.'
			],
			'attributes' => [
				'min' => 1,
                'max' => 10,
			]
		]);

		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][loop]',
			'type' => Element\Checkbox::class,
            'options' => [
				'label' => 'Loop',
			]
		]);

		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][draggable]',
			'type' => Element\Checkbox::class,
            'options' => [
				'label' => 'Draggable',
			]
		]);

		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][title]',
			'type' => Element\Text::class,
            'options' => [
				'label' => 'Title (option)',
			]
		]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][layout]',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'Slide layout',
                'value_options' => [
                    'full' => 'Full width',
                    'caption_left' => 'Caption left, image right',
                    'caption_right' => 'Image left, caption right',
                ],
                'info' => 'Please choose between full width, caption left / image right and image left / caption right.'
            ],
        ]);

		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][autoSlide]',
			'type' => Element\Checkbox::class,
            'options' => [
				'label' => 'Auto Slide',
			]
		]);

		$this->add([
			'name' => 'o:block[__blockIndex__][o:data][autoSlideInt]',
			'type' => Element\Text::class,
            'options' => [
				'label' => 'Slide Interval (milliseconds)',
				'info' => 'Shows next slide every given millisecond.'
			]
		]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][captionFontSizeDesktop]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Caption font size (desktop)',
                'info' => 'Please enter a number with CSS units.'
            ]
        ]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][captionFontSizeMobile]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Caption font size (mobile)',
                'info' => 'Please enter a number with CSS units.'
            ]
        ]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][captionColor]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Caption color',
                'info' => 'Please enter a color in HEX or RGB unit'
            ]
        ]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][verticalPadding]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Vertical padding',
                'info' => 'Please enter a number with CSS units.'
            ]
        ]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][horizontalPadding]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Horizontal padding',
                'info' => 'Please enter a number with CSS units.'
            ]
        ]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][captionPosX]',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'Caption alignment (horizontal)',
                'value_options' => [
                    'left' => 'Left',
                    'middle' => 'Middle',
                    'right' => 'Right',
                ],
                'info' => 'Please choose between left, middle and right alignment.'
            ],
        ]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][captionPosY]',
            'type' => Element\Select::class,
            'options' => [
                'label' => 'Caption alignment (vertical)',
                'value_options' => [
                    'top' => 'Top',
                    'middle' => 'Middle',
                    'bottom' => 'Bottom',
                ],
                'info' => 'Please choose between top, middle and bottom alignment.'
            ],
        ]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][blockContainerClass]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Block container class',
                'info' => 'This class can be used to attach CSS for this block.',
            ],
        ]);

        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][customCss]',
            'type' => Element\Textarea::class,
            'options' => [
                'label' => 'Custom CSS',
            ],
            'attributes' => [
                'class' => '',
                'rows'  => 10,
            ],
        ]);
	}
}
