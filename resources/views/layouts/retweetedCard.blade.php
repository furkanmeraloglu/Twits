<div><i class="fa fa-retweet text-grey-dark mr-2"></i><a href="{{ route('users.show', $item->tweet->user) }}"><span
    class="text-xs text-grey-dark">{{ 'Retweeted from ' . '@' . $item->tweet->user->nickname }}</span></a>
</div>
