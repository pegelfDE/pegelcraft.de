<?php

$arrayBBCodes=array(
    ''=>        array('type'=>BBCODE_TYPE_ROOT, 'childs'=>'!'),
    'i'=>       array('type'=>BBCODE_TYPE_NOARG, 'open_tag'=>'<i>',
                        'close_tag'=>'</i>', 'childs'=>'url'),
    'url'=>     array('type'=>BBCODE_TYPE_OPTARG,
                        'open_tag'=>'<a href="{PARAM}">', 'close_tag'=>'</a>',
                        'default_arg'=>'{CONTENT}',
                        'childs'=>''),
    'img'=>     array('type'=>BBCODE_TYPE_NOARG,
                        'open_tag'=>'<img class="img-responsive img-thumbnail" src="', 'close_tag'=>'" >',
                        'childs'=>''),
    'b'=>       array('type'=>BBCODE_TYPE_NOARG, 'open_tag'=>'<b>',
                        'close_tag'=>'</b>'),
    'size'=>    array('type'=>BBCODE_TYPE_ARG, 'open_tag'=>'<span style="font-size: {PARAM}px;">',
                        'close_tag'=>'</span>'),
    'align'=>   array('type'=>BBCODE_TYPE_ARG, 'open_tag'=>'<div class="text-{PARAM}">',
                        'close_tag'=>'</div>'),
    'wise'=>    array('type'=>BBCODE_TYPE_ARG,  'open_tag'=>'<div class="alert alert-{PARAM}">',
                        'close_tag'=>'</div>'),
    'list'=>    array('type'=>BBCODE_TYPE_NOARG, 'open_tag'=>'<ul>',
                        'close_tag'=>'</ul>', 'child'=>'*'),
    '*'=>       array('type'=>BBCODE_TYPE_NOARG, 'open_tag'=>'<li>',
                        'parent'=>'list'),
    'u'=>       array('type'=>BBCODE_TYPE_NOARG, 'open_tag'=>'<u>',
                        'close_tag'=>'</u>'),
    'code'=>    array('type'=>BBCODE_TYPE_NOARG, 'open_tag'=>'<pre><code>',
                        'close_tag'=>'</code></pre>')
);
$BBHandler=bbcode_create($arrayBBCodes);

?>