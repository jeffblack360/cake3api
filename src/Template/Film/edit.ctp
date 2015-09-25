<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $film->film_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $film->film_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Film'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Language'), ['controller' => 'Language', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Language', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Actor'), ['controller' => 'Actor', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Actor'), ['controller' => 'Actor', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Category'), ['controller' => 'Category', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Category', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="film form large-9 medium-8 columns content">
    <?= $this->Form->create($film) ?>
    <fieldset>
        <legend><?= __('Edit Film') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('release_year');
            echo $this->Form->input('language_id');
            echo $this->Form->input('original_language_id', ['options' => $language, 'empty' => true]);
            echo $this->Form->input('rental_duration');
            echo $this->Form->input('rental_rate');
            echo $this->Form->input('length');
            echo $this->Form->input('replacement_cost');
            echo $this->Form->input('rating');
            echo $this->Form->input('special_features');
            echo $this->Form->input('last_update');
            echo $this->Form->input('actor._ids', ['options' => $actor]);
            echo $this->Form->input('category._ids', ['options' => $category]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
