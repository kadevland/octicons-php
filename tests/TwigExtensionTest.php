<?php

class TwigExtensionTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function it_can_use_the_twig_helper_function_to_create_a_icon()
    {
        $twig = new \Twig_Environment(new \Twig_Loader_Array);
        $twig->addExtension(new \Octicons\Twig\OcticonTwigExtension());

        $compiled = $twig->createTemplate('{{ octicon("gear") }} Test')->render([]);

        $this->assertSame(<<<SVG
<svg version="1.1"
    aria-hidden="true"
    class="octicon-gear"
    viewBox="0 0 14 16"
    width="14"
    height="16"
>
<path fill-rule="evenodd" d="M14 8.76v-1.6l-1.94-.64-.45-1.09.88-1.84-1.13-1.13-1.81.91-1.09-.45L7.77 1h-1.6l-.63 1.94-1.11.45-1.84-.88-1.13 1.13.91 1.81-.45 1.09L0 7.22v1.59l1.94.64.45 1.09-.88 1.84 1.13 1.13 1.81-.91 1.09.45.69 1.92h1.59l.63-1.94 1.11-.45 1.84.88 1.13-1.13-.92-1.81.47-1.09L14 8.74v.02zm-7 2.23c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"/>
</svg> Test
SVG
            , $compiled);
    }

    /** @test */
    public function it_can_create_an_icon_with_options_using_the_twig_helper_function()
    {
        $twig = new \Twig_Environment(new \Twig_Loader_Array);
        $twig->addExtension(new \Octicons\Twig\OcticonTwigExtension());

        $compiled = $twig->createTemplate('{{ octicon("gear", ["test", "red"], 2) }} Test')->render([]);

        $this->assertSame(<<<SVG
<svg version="1.1"
    aria-hidden="true"
    class="octicon-gear test red"
    viewBox="0 0 14 16"
    width="28"
    height="32"
>
<path fill-rule="evenodd" d="M14 8.76v-1.6l-1.94-.64-.45-1.09.88-1.84-1.13-1.13-1.81.91-1.09-.45L7.77 1h-1.6l-.63 1.94-1.11.45-1.84-.88-1.13 1.13.91 1.81-.45 1.09L0 7.22v1.59l1.94.64.45 1.09-.88 1.84 1.13 1.13 1.81-.91 1.09.45.69 1.92h1.59l.63-1.94 1.11-.45 1.84.88 1.13-1.13-.92-1.81.47-1.09L14 8.74v.02zm-7 2.23c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3z"/>
</svg> Test
SVG
            , $compiled);
    }
}
