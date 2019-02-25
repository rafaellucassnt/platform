<?php

declare(strict_types=1);

namespace Orchid\Press\Http\Filters;

use Orchid\Screen\Field;
use Orchid\Platform\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Screen\Fields\RadioButtonsField;

class StatusFilter extends Filter
{
    /**
     * @var array
     */
    public $parameters = [
        'status',
    ];

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        return $builder->status($this->request->get('status'));
    }

    /**
     * @return Field
     */
    public function display(): Field
    {
        return RadioButtonsField::make('status')
            ->value($this->request->get('status'))
            ->options([
                'publish' => __('Published'),
                'draft'   => __('Draft'),
            ])
            ->title(__('Status'))
            ->autocomplete('off');
    }
}
