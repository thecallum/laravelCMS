<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public function parent(){
        return \App\Page::find($this->parent_page_id);
    }

    public function fullURL(){
        $currentParent = $this;
        $last = false;
        $params = [$currentParent->slug];

        do {
            $nextParent = $currentParent->parent();

            if ($nextParent == null) {
                $last = true;
            } else {
                $currentParent = $nextParent;
                $parentSlug = $currentParent->slug;

                if ($parentSlug !== '/') {
                    array_unshift($params, $parentSlug);
                }
            }
        } while ($last == false);

        $url = implode("/", $params);

        if (substr($url, 0, 1) != '/') {
            $url = '/' . $url;
        }

        return $url;
    }
}
