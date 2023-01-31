<?php
/**
 */
class Ku
{
    # 1
    public static function tag($tag, $content='', $args=[])
    {
        return self::openTag($tag, $args) . $content . self::closeTag($tag);
    }
    
    # 1.1
    public static function openTag($tag, $args=[])
    {
        $params = self::arrayToStr($args);
        return "<$tag$params>";
    }

    # 1.1.1
    private static function arrayToStr($array)
    {
        if ( ! $array) {
            return '';
        }
        $str = '';
        foreach ($array as $key=>$val) {
            $str .= empty($val) ? " $key" : " $key=\"$val\"";
        }
        return $str;
    }
    
    # 1.2
    public static function closeTag($tag)
    {
        return "</$tag>";
    }

    # 2
    public static function button($content, $args=[])
    {
        if ( ! strstr($content, '<')) {
            $span['class'] = 'truncate';
            $content = self::tag('span', $content, $span);
        }

        $args['type'] = $args['type'] ?? 'button';
        return self::tag('button', $content, $args);
    }

    # 3
    public static function link($type, $href, $content='', $args=[])
    {   
        if ($type == 'button') $args['role'] = 'button';
        $args['href'] = $href;
        return self::tag('a', $content, $args);
    }

    # 4
    public static function icon($icon, $alt='', $width=20, $height=20)
    {
        $args['alt'] = empty($alt)
            ? ucfirst(trim(str_replace(['/', '-', '_', '.'], ' ', $icon)))
            : $alt;
        $args['loading'] = $args['loading'] ?? 'lazy';
        $args['src'] = "/img/icons/$icon.svg";
        $args['width'] = $width;
        $args['height'] = $height;
        return self::openTag('img', $args);
    }

    # 4.1
    public static function img($src, $width='', $height='', $alt='', $args=[])
    {
        $args['alt'] = empty($alt)
            ? ucfirst(trim(str_replace(['/', '-', '_', '.'], ' ', $src)))
            : $alt;

        if (stristr($src, '.mp4')) {
            return self::mp4($alt, $src, $width, $height, $args);
        }
        
        /*if (stristr($src, '.jpg') || stristr($src, '.jpeg')) {
            return self::avif($alt, $src, $width, $height, $args); 
        }*/

        $args['loading'] = $args['loading'] ?? 'lazy';
        $args['src'] = $src;
        $args['width'] = $width;
        if ($height) {
            $args['height'] = $height;
        }
        return self::openTag('img', $args);
    }

    # 4.1
    public static function mp4($alt, $src, $width='', $height='', $args=[])
    {
        $source['src'] = $src;
        $source['type'] = 'video/mp4';
        $content = self::openTag('source', $source);

        $args['autoplay'] = '';
        $args['loop'] = '';
        $args['muted'] = '';
        $args['playsinline'] = '';
        return self::tag('video', $content, $args);
    }

    # 4.2
    public static function avif($alt, $src, $width='', $height='', $args=[])
    {
        $avif['srcSet'] = str_replace(['.jpg', '.jpeg'], '.avif', $src);
        $avif['type'] = 'image/avif';
        $content = self::openTag('source', $avif);

        $webp['srcSet'] = str_replace(['.jpg', '.jpeg'], '.webp', $src);
        $webp['type'] = 'image/webp';
        $content .= self::openTag('source', $webp);

        $img['alt'] = $alt;
        $img['decoding'] = 'async';
        $img['loading'] = $args['loading'] ?? 'lazy';
        $img['src'] = $src;
        $img['width'] = $width;
        if ($height) {
            $img['height'] = $height;
        }
        $content .= self::openTag('img', $img);

        return self::tag('picture', $content, $args);
    }
}
