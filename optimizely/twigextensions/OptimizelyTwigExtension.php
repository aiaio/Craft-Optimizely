<?php
namespace Craft;

class OptimizelyTwigExtension extends \Twig_Extension
{
    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            'getOptimizelySnippet' => new \Twig_Function_Method($this, 'getOptimizelySnippetFunction'),
        );
    }

    /**
     * Returns getOptimizelySnippet() wrapped in a \Twig_Markup object.
     *
     * @return \Twig_Markup
     */
    public function getOptimizelySnippetFunction()
    {
        $html = craft()->optimizely->getSnippetHtml();
        return TemplateHelper::getRaw($html);
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'optimizely';
    }
}