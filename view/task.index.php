<h2>TAsks list</h2>

<ul>
    <?foreach ($arData['tasks'] as $arTask):?>
        <li><?= $arTask ['email'] . ' - ' . $arTask ['username'] . ' - ' . $arTask ['description']?></li>
    <?endforeach;?>
</ul>