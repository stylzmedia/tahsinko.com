<?php

// namespace App\Repositories;

use App\Models\Settings;

class Info {
    // Site Info
    public static function Settings($group, $name){
        $q = Settings::where('group', $group)->where('name', $name)->first();

        // Null Check
        if ($q){
            return $q->value;
        }else{
            return null;
        }
    }
    /*
     * return social info
     * */
    public static function Social($data,$name){
        $q = $data->where('name', $name)->first();

        // Null Check
        if ($q){
            return $q->value;
        }else{
            return null;
        }
    }

    // Site Info by Group
    public static function SettingsGroup($group){
        return Settings::where('group', $group)->get();
    }

    // Site Info by Keys
    public static function SettingsGroupKey($group = 'general'){
        $query = Settings::where('group', $group)->get();

        // Generate Output
        $output = [];
        foreach($query as $data){
            if($data->name == 'logo' || $data->name == 'dark_logo' || $data->name == 'favicon' || $data->name == 'og_image'){
                $output[$data->name] = asset('uploads/info/' . $data->value);
            }else{
                $output[$data->name] = $data->value;
            }
        }
        return $output;
    }



    public static function pageTemplates(){
        $template = array();
        $template[] = [
            'name' => 'About Us',
            'blade' => 'about'
        ];

        $template[] = [
            'name' => 'Product',
            'blade' => 'product'
        ];

        $template[] = [
            'name' => 'Project',
            'blade' => 'project'
        ];

        $template[] = [
            'name' => 'Services',
            'blade' => 'service'
        ];

        $template[] = [
            'name' => 'News',
            'blade' => 'news.news'
        ];

        $template[] = [
            'name' => 'AllClients',
            'blade' => 'all-clients'
        ];

        $template[] = [
            'name' => 'Team',
            'blade' => 'team'
        ];

        $template[] = [
            'name' => 'Media',
            'blade' => 'gallery.galleries'
        ];

        $template[] = [
            'name' => 'FAQ',
            'blade' => 'faq'
        ];


        $template[] = [
            'name' => 'Contact Us',
            'blade' => 'contactUs'
        ];

        return $template;
    }
}
