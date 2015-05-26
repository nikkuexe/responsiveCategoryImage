<?php if (!defined('APPLICATION'))  exit();
// Modified from categoryimageheader by VrijVlinder, with derived code from @peregrine.


$PluginInfo['responsiveCategoryImage_vanilla'] = array(
    'Description' => 'Adds a responsive image to the tops of the category page.',
    'Version' => '0.9',
    'RequiredApplications' => array('Vanilla' => '2.1'),
    'License'=>"GNU GPL2",
    'Author' => "sq-do",
    'Icon' => "'icon"
);

class responsiveCategoryImage_vanilla extends Gdn_Plugin {

   public function Base_Render_Before($Sender) {
      $Sender->AddCssFile($this->GetResource('design/responsiveCategoryImage_vanilla.css', FALSE, FALSE));
   }
 
   public function CategoriesController_BeforeRenderAsset_Handler($Sender) {
     $AssetName = GetValueR('EventArguments.AssetName', $Sender);
     if ($AssetName == "Content") { 
        $Object = $Sender->Category;
        $PhotoUrl = $Object->PhotoUrl;
        if ($PhotoUrl) {
          echo sprintf('<div class="cat-image" style="background-image:url(%s);"></div>', $PhotoUrl);
         }
      }
   } 

}