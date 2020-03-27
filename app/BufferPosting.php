<?php

namespace Bulkly;

use Illuminate\Database\Eloquent\Model;

class BufferPosting extends Model
{

    public function group()
    {
        return $this->hasOne(SocialPostGroups::Class, 'id', 'group_id');
    }

    public function account()
    {
        return $this->hasOne(SocialAccounts::Class, 'id', 'account_id');
    }


}
