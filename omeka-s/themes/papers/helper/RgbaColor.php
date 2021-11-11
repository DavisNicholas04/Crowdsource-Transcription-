<?php 
namespace OmekaTheme\Helper;

use Laminas\View\Helper\AbstractHelper;

class RgbaColor extends AbstractHelper
{
    public function __invoke($hexColor = null) 
    {
        if ($hexColor == 'transparent') {
            return;
        }
        if (strlen($hexColor) < 6) {
            $hexColor = "#{$hexcolor[0]}{$hexcolor[0]}{$hexcolor[1]}{$hexcolor[1]}{$hexcolor[2]}{$hexcolor[2]}";
        }
        list($colorR, $colorG, $colorB) = sscanf($hexColor, "#%02x%02x%02x");
        return "rgba({$colorR},{$colorG},{$colorB}, .08)";
    }
}