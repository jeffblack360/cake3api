<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Film'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Language'), ['controller' => 'Language', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Language', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actor'), ['controller' => 'Actor', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Actor'), ['controller' => 'Actor', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Category'), ['controller' => 'Category', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Category', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="film index large-9 medium-8 columns content">
    <h3><?= __('Film') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('film_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('language_id') ?></th>
                <th><?= $this->Paginator->sort('original_language_id') ?></th>
                <th><?= $this->Paginator->sort('rental_duration') ?></th>
                <th><?= $this->Paginator->sort('rental_rate') ?></th>
                <th><?= $this->Paginator->sort('length') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($film as $film): ?>
            <tr>
                <td><?= $this->Number->format($film->film_id) ?></td>
                <td><?= h($film->title) ?></td>
                <td><?= $this->Number->format($film->language_id) ?></td>
                <td><?= $film->has('language') ? $this->Html->link($film->language->name, ['controller' => 'Language', 'action' => 'view', $film->language->language_id]) : '' ?></td>
                <td><?= $this->Number->format($film->rental_duration) ?></td>
                <td><?= $this->Number->format($film->rental_rate) ?></td>
                <td><?= $this->Number->format($film->length) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $film->film_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $film->film_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $film->film_id], ['confirm' => __('Are you sure you want to delete # {0}?', $film->film_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
