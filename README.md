# Craft Optimizely
Plugin that allows you to integrate Optimizely in CraftCMS. It adds a script in the HEAD tag of the page.

## Installation:

To install Optimizely plugin, follow these steps:

1. Upload the `optimizely` folder to `craft/plugins/` folder.
2. Browse to Settings > Plugins in the Craft control panel and install the Optimizely plugin.

## Configuration

You can set the Optimizely Project Id in the plugin in two ways:

1. Go to the plugin settings page and enter the Optimizely Project Id.
2. Add new setting `optimizelyProjectId` to the general.php configuration file: 

```
return array(
   ...
   'optimizelyProjectId' => '1234567890'
   ...
);
```
If you've added Optimizely Project Id to both places, the value from the general.php file will take precedence.

## Usage

For simple usage, go to the plugin settings page and turn on the *Automatically include Optimizely Snippet* setting. This will automatically add the Optimizely script to the HEAD tag of your page; after all your CSS and JS scripts in the template by using [includeHeadHtml](https://buildwithcraft.com/classreference/services/TemplatesService#includeHeadHtml-detail) method from Craft's template service.

## Advance usage

If you need full control over where the Optimizely script is placed, you can use the Twig function `getOptimizelySnippet` to render the script:

```
{{ getOptimizelySnippet() }}
```

In that case, you should turn off *Automatically include Optimizely Snippet* toggle in the plugin settings so that the snippet is not added twice.

