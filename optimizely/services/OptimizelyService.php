<?php

namespace Craft;

/**
 * Optimizely service
 *
 * @package Craft
 */
class OptimizelyService extends BaseApplicationComponent
{
    /**
     * Returns the script tag html element as string
     *
     * @return string
     */
    public function getSnippetHtml()
    {
        $projectId = $this->getProjectId();

        if ($projectId)
        {
            return '<script src="//cdn.optimizely.com/js/'.$projectId.'.js"></script>';
        }
    }

    /**
     * Returns the Project Id.
     *
     * @return mixed
     */
    private function getProjectId()
    {
        // try the general.php config
        $projectId = craft()->config->get('optimizelyProjectId');
        if (!$projectId)
        {
            // try the plugin settings
            $settings = craft()->plugins->getPlugin('optimizely')->getSettings();
            $projectId = $settings['projectId'];
        }

        return $projectId;
    }
}