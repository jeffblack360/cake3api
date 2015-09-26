<?php
namespace App\Model\Table;

use App\Model\Entity\Film;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Film Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Films
 * @property \Cake\ORM\Association\BelongsTo $Language
 * @property \Cake\ORM\Association\BelongsTo $Language
 * @property \Cake\ORM\Association\BelongsToMany $Actor
 * @property \Cake\ORM\Association\BelongsToMany $Category
 */
class FilmTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        
        $this->table('film');
        $this->displayField('title');
        $this->primaryKey('film_id');

        $this->belongsTo('Films', [
            'foreignKey' => 'film_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Language', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Language', [
            'foreignKey' => 'original_language_id'
        ]);
        $this->belongsToMany('Actor', [
            'foreignKey' => 'film_id',
            'targetForeignKey' => 'actor_id',
            'joinTable' => 'film_actor'
        ]);
        $this->belongsToMany('Category', [
            'foreignKey' => 'film_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'film_category'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('release_year');

        $validator
            ->add('rental_duration', 'valid', ['rule' => 'numeric'])
            ->requirePresence('rental_duration', 'create')
            ->notEmpty('rental_duration');

        $validator
            ->add('rental_rate', 'valid', ['rule' => 'decimal'])
            ->requirePresence('rental_rate', 'create')
            ->notEmpty('rental_rate');

        $validator
            ->add('length', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('length');

        $validator
            ->add('replacement_cost', 'valid', ['rule' => 'decimal'])
            ->requirePresence('replacement_cost', 'create')
            ->notEmpty('replacement_cost');

        $validator
            ->allowEmpty('rating');

        $validator
            ->allowEmpty('special_features');

        $validator
            ->requirePresence('last_update', 'create')
            ->notEmpty('last_update');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['film_id'], 'Films'));
        $rules->add($rules->existsIn(['language_id'], 'Language'));
        $rules->add($rules->existsIn(['original_language_id'], 'Language'));
        return $rules;
    }
}
