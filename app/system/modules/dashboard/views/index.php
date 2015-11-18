<?php $view->script('dashboard', 'system/dashboard:app/bundle/index.js', ['vue', 'uikit-autocomplete']) ?>

<div id="dashboard" v-cloak>

    <div class="uk-alert uk-alert-info" v-show="hasUpdate"><a href="admin/system/update">{{ 'Pagekit %version% is available! Please update now.' | trans update }}</a></div>

    <div class="uk-margin uk-flex uk-flex-right" data-uk-margin>
        <div class="uk-button-dropdown" data-uk-dropdown="{ mode: 'click' }">
            <a class="uk-button uk-button-primary" @click.prevent>{{ 'Add Widget' || trans }}</a>
            <div class="uk-dropdown uk-dropdown-small uk-dropdown-flip">
                <ul class="uk-nav uk-nav-dropdown">
                    <li v-for="type in getTypes()">
                        <a class="uk-dropdown-close" @click="add(type)">{{ type.label }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="uk-grid uk-grid-medium uk-grid-match" data-uk-grid-margin>
        <div class="uk-width-medium-1-3" v-for="i in [0,1,2]">

            <ul class="uk-sortable pk-sortable" data-:column="i">
                <li v-for="widget in widgets | column i" :data-id="widget.id" :data-idx="widget.idx">
                    <panel class="uk-panel uk-panel-box uk-visible-hover-inline" :widget="widget"></panel>
                </li>
                <!-- TODO: fix workaround-->
                <li class="uk-hidden" v-if="false">Vue fix for empty lists<li>
            </ul>

        </div>

    </div>

</div>
