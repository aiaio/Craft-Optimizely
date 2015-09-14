<?php

namespace Craft;

/**
 * Class Optimizely_SettingsModel represents Optimizely plugin settings.
 *
 * @package Craft
 */
class Optimizely_SettingsModel extends BaseModel
{
    /**
     * Define Optimizely plugin settings
     *
     * @return array
     */
    protected function defineAttributes()
    {
        return [
            'projectId' => array(
                'type' => AttributeType::String
            ),
            'automaticallyInclude' => array(
                'type' => AttributeType::Bool,
                'default' => false
            ),
        ];
    }

    /**
     * Define validation rules
     *
     * @return array with validation rules
     */
    public function rules()
    {
        // add the custom validator for validating Project Id
        $rules = parent::rules();
        $rules[] = array('projectId', 'Craft\Optimizely_ProjectIdValidator');

        return $rules;
    }
}