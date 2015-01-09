define([
    "dojo/_base/declare",
    "dojo/_base/lang",
    "hcb-store-order/store/OrderStore",
    "dgrid/OnDemandGrid",
    "put-selector/put",
    "dgrid/extensions/ColumnHider",
    "dgrid/extensions/ColumnResizer",
    "dgrid/extensions/DijitRegistry",
    "hc-backend/dgrid/_Selection",
    "hc-backend/dgrid/_Refresher",
    "hc-backend/dgrid/columns/timestamp",
    "hc-backend/dgrid/columns/editor",
    "dgrid/Keyboard",
    "dgrid/Selector",
    "dojo/i18n!../../nls/Package"
], function(declare, lang, OrderStore,
            OnDemandGrid, put, ColumnHider, ColumnResizer, DijitRegistry,
            _Selection, _Refresher, timestamp, editor, Keyboard,
            selector, translation) {
    
    return declare('hcb-store-order.list.widget.Grid',
                   [ OnDemandGrid, ColumnHider, ColumnResizer,
                     Keyboard, _Selection, _Refresher, DijitRegistry ], {
        //  summary:
        //      Grid widget for displaying all available clients
        //      as list
        store: OrderStore,

        columns: [
            selector({ label: "", width: 40, selectorType: "checkbox" }),
            {label: translation['idLabel'], hidden: false, field: 'id', sortable: true, resizable: false},
            {label: translation['statusLabel'], hidden: false, field: 'status',
             sortable: false,
             get: function (object) {
                 switch(object.status) {
                     case 1:
                         return translation['newStatus'];
                     case 2:
                         return translation['progressStatus'];
                     case 3:
                         return translation['succeedStatus'];
                 }
            }, resizable: false},
            {label: translation['productsLabel'], hidden: false,
             field: 'products', sortable: false, resizable: false},
            {label: translation['totalLabel'], hidden: false,
             field: 'total', sortable: false, resizable: false},
            {label: translation['deliveryLabel'], hidden: false,
             field: 'delivery', sortable: false, resizable: false},
            timestamp({label: translation['createdTimestampLabel'], field: 'timestamp', sortable: true})
        ],

        loadingMessage: translation['loadingMessage'],
        noDataMessage: translation['noDataMessage'],

        showHeader: true,
        allowTextSelection: true
    });
});
