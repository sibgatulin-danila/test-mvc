<div class="container">
    <div class="card mb-5">
        <div class="card-header">
            <h2>Создать задачу:</h2>
        </div>
        <div class="card-body">
            <form class="js-form-create-task">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Имя пользователя</label>
                            <input name="username" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Описание задачи</label>
                    <textarea class="form-control" name="description" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>Tasks list</h2>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <?foreach ($arViewData['tasks'] as $arTask):?>
                    <li class="list-group-item" data-id="<?= $arTask['id'] ?>">
                        <form class="/">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input disabled value="<?=$arTask ['email'] ?>" type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Имя пользователя</label>
                                        <input disabled value="<?= $arTask ['username'] ?>" name="username" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Описание задачи</label>
                                <? if (isset($arViewData['is_admin']) && $arViewData['is_admin'] == true): ?>
                                    <textarea class="form-control"><?= $arTask['description'] ?></textarea>
                                <? else: ?>
                                    <textarea disabled class="form-control"><?= $arTask['description'] ?></textarea>
                                <? endif; ?>
                            </div>
                            <? if (isset($arViewData['is_admin']) && $arViewData['is_admin'] == true): ?>
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            <? endif; ?>
                        </form>
                    </li>
                <?endforeach;?>
                <? if (isset($arViewData['is_paginate'])
                    && isset($arViewData['page_count'])
                    && $arViewData['page_count'] > 1
                    && $arViewData['is_paginate'] == true): ?>
                    <nav aria-label="...">
                        <ul class="pagination pagination-lg mt-3">
                            <? for ($i = 1; $i <= $arViewData['page_count']; $i = $i + 1): ?>
                                <? if ($arViewData['current_page'] == $i): ?>
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">
                                            <?= $i ?>
                                            <span class="sr-only">(current)</span>
                                        </span>
                                    </li>
                                <? else: ?>
                                    <li class="page-item"><a class="page-link" href="#"><?= $i ?></a></li>
                                <? endif; ?>
                            <? endfor; ?>
                        </ul>
                    </nav>
                <? endif; ?>
            </ul>
        </div>
    </div>
</div>

