<?php
namespace Craft;

/**
 * Custom validator that validates that the given attribute is a valid Optimizely Project Id
 */
class Optimizely_ProjectIdValidator extends \CValidator
{
    /**
     * Validates that object attribute is a valid Optimizely Project Id
     *
     * @param \CModel $object object that contains the field
     * @param string $attribute name of the attribute that contains the Project Id
     */
    protected function validateAttribute($object, $attribute)
    {
        $projectId = $object->$attribute;

        if (empty($projectId))
        {
            $message = Craft::t('Project Id cannot be blank');
            $this->addError($object, $attribute, $message);
            return; // show only first error message
        }

        if (!ctype_digit($projectId))
        {
            $message = Craft::t('{attribute} is not a valid Optimizely Project Id', ['attribute' => $projectId]);
            $this->addError($object, $attribute, $message);
        }
    }
}

