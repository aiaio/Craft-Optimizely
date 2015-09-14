<?php
namespace Craft;

/**
 * Optimizely integration plugin
 *
 * Primary plugin class that defines basic information about the plugin
 * and handles installation/uninstallation, settings, hooks and events.
 * @package Craft
 */
class OptimizelyPlugin extends BasePlugin
{
    /**
     * Get plugin name
     *
     * @return string
     */
    public function getName()
    {
        return Craft::t('Optimizely');
    }

    /**
     * Return plugin version
     *
     * @return string
     */
    public function getVersion()
    {
        return '1.0.0';
    }

    /**
     * Return name of the developer
     *
     * @return string
     */
    public function getDeveloper()
    {
        return 'Alexander Interactive';
    }

    /**
     * Return URL to the developer's homepage
     *
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'http://www.alexanderinteractive.com';
    }

    /**
     * Renders a settings template
     *
     * @return mixed
     */
    public function getSettingsHtml()
    {
        return craft()->templates->render('optimizely/_settings', array(
            'settings' => $this->getSettings()
        ));
    }

    /**
     * Defines the settings model for this plugin.
     * Settings module implements the custom validation for plugin settings.
     *
     * @return Optimizely_SettingsModel
     */
    protected function getSettingsModel()
    {
        return new Optimizely_SettingsModel();
    }

    /**
     * Adds new Twig Extension
     *
     * @return OptimizelyTwigExtension
     */
    public function addTwigExtension()
    {
        Craft::import('plugins.optimizely.twigextensions.OptimizelyTwigExtension');

        return new OptimizelyTwigExtension();
    }

    /**
     * Includes the Optimizely Snippet in HEAD element automatically
     * if the user selects that option in settings
     */
    public function init()
    {
        if (!craft()->request->isCpRequest() && $this->settings['automaticallyInclude'])
        {
            $html = craft()->optimizely->getSnippetHtml();
            craft()->templates->includeHeadHtml($html, true);
        }
    }
}
