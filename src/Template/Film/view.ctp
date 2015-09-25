<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Film'), ['action' => 'edit', $film->film_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Film'), ['action' => 'delete', $film->film_id], ['confirm' => __('Are you sure you want to delete # {0}?', $film->film_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Film'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Film'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Language'), ['controller' => 'Language', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Language', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Actor'), ['controller' => 'Actor', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Actor'), ['controller' => 'Actor', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Category'), ['controller' => 'Category', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Category', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="film view large-9 medium-8 columns content">
    <h3><?= h($film->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($film->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Language') ?></th>
            <td><?= $film->has('language') ? $this->Html->link($film->language->name, ['controller' => 'Language', 'action' => 'view', $film->language->language_id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Film Id') ?></th>
            <td><?= $this->Number->format($film->film_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Language Id') ?></th>
            <td><?= $this->Number->format($film->language_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Rental Duration') ?></th>
            <td><?= $this->Number->format($film->rental_duration) ?></td>
        </tr>
        <tr>
            <th><?= __('Rental Rate') ?></th>
            <td><?= $this->Number->format($film->rental_rate) ?></td>
        </tr>
        <tr>
            <th><?= __('Length') ?></th>
            <td><?= $this->Number->format($film->length) ?></td>
        </tr>
        <tr>
            <th><?= __('Replacement Cost') ?></th>
            <td><?= $this->Number->format($film->replacement_cost) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Update') ?></th>
            <td><?= h($film->last_update) ?></tr>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($film->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Release Year') ?></h4>
        <?= $this->Text->autoParagraph(h($film->release_year)); ?>
    </div>
    <div class="row">
        <h4><?= __('Rating') ?></h4>
        <?= $this->Text->autoParagraph(h($film->rating)); ?>
    </div>
    <div class="row">
        <h4><?= __('Special Features') ?></h4>
        <?= $this->Text->autoParagraph(h($film->special_features)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Actor') ?></h4>
        <?php if (!empty($film->actor)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Actor Id') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Last Update') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($film->actor as $actor): ?>
            <tr>
                <td><?= h($actor->actor_id) ?></td>
                <td><?= h($actor->first_name) ?></td>
                <td><?= h($actor->last_name) ?></td>
                <td><?= h($actor->last_update) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Actor', 'action' => 'view', $actor->actor_id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Actor', 'action' => 'edit', $actor->actor_id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Actor', 'action' => 'delete', $actor->actor_id], ['confirm' => __('Are you sure you want to delete # {0}?', $actor->actor_id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Category') ?></h4>
        <?php if (!empty($film->category)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Last Update') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($film->category as $category): ?>
            <tr>
                <td><?= h($category->category_id) ?></td>
                <td><?= h($category->name) ?></td>
                <td><?= h($category->last_update) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Category', 'action' => 'view', $category->category_id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Category', 'action' => 'edit', $category->category_id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Category', 'action' => 'delete', $category->category_id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->category_id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
