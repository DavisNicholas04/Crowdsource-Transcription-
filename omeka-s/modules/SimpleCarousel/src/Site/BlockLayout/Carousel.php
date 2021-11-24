<?php
namespace SimpleCarousel\Site\BlockLayout;

use Omeka\Api\Representation\SiteRepresentation;
use Omeka\Api\Representation\SitePageRepresentation;
use Omeka\Api\Representation\SitePageBlockRepresentation;
use Omeka\Site\BlockLayout\AbstractBlockLayout;
use Zend\View\Renderer\PhpRenderer;

use Laminas\ServiceManager\Factory\FactoryInterface;

use SimpleCarousel\Form\CarouselBlockForm;
use Laminas\Form\FormElementManager;

class Carousel extends AbstractBlockLayout
{
	/**
     * @var FormElementManager
     */
    protected $formElementManager;

    /**
     * @var array
     */
	protected $defaultSettings = [];
	
    /**
     * @param FormElementManager $formElementManager
     * @param array $defaultSettings
     */
    public function __construct(FormElementManager $formElementManager, array $defaultSettings)
    {
        $this->formElementManager = $formElementManager;
        $this->defaultSettings = $defaultSettings;
    }

	public function getLabel() {
		return 'SimpleCarousel';
	}

	public function form(PhpRenderer $view, SiteRepresentation $site,
        SitePageRepresentation $page = null, SitePageBlockRepresentation $block = null
    ) {
		$form = $this->formElementManager->get(CarouselBlockForm::class);

		$data = $block
			? $block->data() + $this->defaultSettings
			: $this->defaultSettings;
		$form->setData([
			'o:block[__blockIndex__][o:data][height]' => $data['height'],
            'o:block[__blockIndex__][o:data][mobile_height]' => $data['mobile_height'],
			'o:block[__blockIndex__][o:data][duration]' => $data['duration'],
			'o:block[__blockIndex__][o:data][perPage]' => $data['perPage'],
			'o:block[__blockIndex__][o:data][loop]' => $data['loop'],
			'o:block[__blockIndex__][o:data][draggable]' => $data['draggable'],
            'o:block[__blockIndex__][o:data][layout]' => $data['layout'],
			'o:block[__blockIndex__][o:data][title]' => $data['title'],
			'o:block[__blockIndex__][o:data][autoSlide]' => $data['autoSlide'],
			'o:block[__blockIndex__][o:data][autoSlideInt]' => $data['autoSlideInt'],
            'o:block[__blockIndex__][o:data][blockContainerClass]' => $data['blockContainerClass'],
            'o:block[__blockIndex__][o:data][customCss]' => $data['customCss'],
            'o:block[__blockIndex__][o:data][captionFontSizeDesktop]' => $data['captionFontSizeDesktop'],
            'o:block[__blockIndex__][o:data][captionFontSizeMobile]' => $data['captionFontSizeMobile'],
            'o:block[__blockIndex__][o:data][captionColor]' => $data['captionColor'],
            'o:block[__blockIndex__][o:data][verticalPadding]' => $data['verticalPadding'],
            'o:block[__blockIndex__][o:data][horizontalPadding]' => $data['horizontalPadding'],
            'o:block[__blockIndex__][o:data][captionPosX]' => $data['captionPosX'],
            'o:block[__blockIndex__][o:data][captionPosY]' => $data['captionPosY'],
		]);
		$form->prepare();

		$html = '';
		$html .= $view->blockAttachmentsForm($block);
		$html .= '<a href="#" class="collapse" aria-label="collapse"><h4>' . $view->translate('Options'). '</h4></a>';
		$html .= '<div class="collapsible" style="padding-top:6px;">';
		$html .= $view->formCollection($form);
        $html .= '</div>';
		return $html;
    }

	public function render(PhpRenderer $view, SitePageBlockRepresentation $block)
	{
		$attachments = $block->attachments();
        if (!$attachments) {
            return '';
		}

		$items = [];

		foreach ($attachments as $attachment)
		{
		    try {
		        if($attachment->item() !== null) {
                    foreach($attachment->item()->media() as $media)
                    {
                        $mediaType = $media->mediaType();
                        $mediaRenderer = $media->renderer();
                        if ((strpos($mediaType, 'image/') !== false) || (strpos($mediaRenderer, 'youtube') !== false)) {
                            $item = new \stdClass();
                            $item->title = $attachment->item()->title();
                            $item->subtitle = $attachment->caption();

                            //added a link to the show page as well
                            $item->showLink = $attachment->item()->url();
                            $item->url = $media->originalUrl();
                            array_push($items, $item);
                        }
                    }
                }
            }
			catch(\Throwable $ex) {

            }
		}
		
		return $view->partial('common/block-layout/simple-carousel', [
            'block_id' => $block->id(),
			'height' => $block->dataValue('height'),
            'mobile_height' => $block->dataValue('mobile_height'),
			'duration' => $block->dataValue('duration'),
			'perPage' => $block->dataValue('perPage'),
			'loop' => $block->dataValue('loop'),
			'draggable' => $block->dataValue('draggable'),
			'layout' => $block->dataValue('layout'),
			'title' => $block->dataValue('title'),
			'items' => $items,
			'autoSlide' => $block->dataValue('autoSlide'),
			'autoSlideInt' => $block->dataValue('autoSlideInt'),
            'blockContainerClass' => $block->dataValue('blockContainerClass'),
            'customCss' => $block->dataValue('customCss'),
            'captionFontSizeDesktop' => $block->dataValue('captionFontSizeDesktop'),
            'captionFontSizeMobile' => $block->dataValue('captionFontSizeMobile'),
            'captionColor' => $block->dataValue('captionColor'),
            'verticalPadding' => $block->dataValue('verticalPadding'),
            'horizontalPadding' => $block->dataValue('horizontalPadding'),
            'captionPosX' => $block->dataValue('captionPosX'),
            'captionPosY' => $block->dataValue('captionPosY'),
		]);
	}
}
