<?php

namespace ElipZis\Setting\Nova;

use Alexwenzel\DependencyContainer\DependencyContainer;
use Alexwenzel\DependencyContainer\HasDependencies;
use DateTimeInterface;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

/**
 */
class Setting extends Resource
{
    use HasDependencies;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \ElipZis\Setting\Models\Setting::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'key';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'key',
        'value'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make(__('Key'))->sortable(true)->readonly(static function ($request) {
                return $request->isUpdateOrUpdateAttachedRequest();
            }),
            Select::make(__('Type'), 'type')
                ->options(\ElipZis\Setting\Models\Setting::TYPES)
                ->displayUsingLabels()
                ->sortable()
                ->readonly(static function (NovaRequest $request) {
                    return $request->isUpdateOrUpdateAttachedRequest();
                }),

            //The type dependent fields
            DependencyContainer::make([
                Text::make(__('Value'), 'value')
            ])->dependsOn('type', 'string'),

            DependencyContainer::make([
                Number::make(__('Value'), 'value')
            ])->dependsOn('type', 'integer'),

            DependencyContainer::make([
                Number::make(__('Value'), 'value')
            ])->dependsOn('type', 'double'),

            DependencyContainer::make([
                Date::make(__('Value'), 'value', function ($value) {
                    if (!is_null($value) && $value instanceof DateTimeInterface) {
                        return $value->format('Y-m-d');
                    }
                })
            ])->dependsOn('type', 'date'),

            DependencyContainer::make([
                DateTime::make(__('Value'), 'value', function ($value) {
                    if (!is_null($value) && $value instanceof DateTimeInterface) {
                        return $value->format('Y-m-d H:i:s.u');
                    }
                })
            ])->dependsOn('type', 'datetime'),

            DependencyContainer::make([
                Boolean::make(__('Value'), 'value')
            ])->dependsOn('type', 'boolean'),

            DependencyContainer::make([
                Code::make(__('Value'), 'value')->json()
            ])->dependsOn('type', 'array'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
