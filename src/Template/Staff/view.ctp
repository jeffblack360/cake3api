<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Staff'), ['action' => 'edit', $staff->staff_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Staff'), ['action' => 'delete', $staff->staff_id], ['confirm' => __('Are you sure you want to delete # {0}?', $staff->staff_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Staff'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Staff'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Address'), ['controller' => 'Address', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Addres'), ['controller' => 'Address', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Store'), ['controller' => 'Store', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Store'), ['controller' => 'Store', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="staff view large-9 medium-8 columns content">
    <h3><?= h($staff->staff_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($staff->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($staff->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Addres') ?></th>
            <td><?= $staff->has('addres') ? $this->Html->link($staff->addres->address_id, ['controller' => 'Address', 'action' => 'view', $staff->addres->address_id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($staff->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Store') ?></th>
            <td><?= $staff->has('store') ? $this->Html->link($staff->store->store_id, ['controller' => 'Store', 'action' => 'view', $staff->store->store_id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($staff->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($staff->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Staff Id') ?></th>
            <td><?= $this->Number->format($staff->staff_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Update') ?></th>
            <td><?= h($staff->last_update) ?></tr>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $staff->active ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
</div>
