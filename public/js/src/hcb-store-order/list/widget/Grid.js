define([
    "dojo/_base/declare",
    "hcb-store-order/store/OrderStore",
    "dgrid/OnDemandGrid",
    "dgrid/extensions/ColumnHider",
    "dgrid/extensions/ColumnResizer",
    "dgrid/extensions/DijitRegistry",
    "hc-backend/dgrid/_Selection",
    "hc-backend/dgrid/_Refresher",
    "hc-backend/dgrid/columns/timestamp",
    "dojo/dom-class",
    "dgrid/Keyboard",
    "dgrid/Selector",
    "dojo/i18n!../../nls/Package"
], function(declare, OrderStore,
            OnDemandGrid, ColumnHider, ColumnResizer, DijitRegistry,
            _Selection, _Refresher, timestamp, domClass, Keyboard,
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
            {label: translation['contactsLabel'], hidden: true,
                field: 'contacts', sortable: false, resizable: true},
            {label: translation['commentLabel'], hidden: true,
                field: 'comment', sortable: false, resizable: false},
            {label: translation['totalLabel'], hidden: false,
             field: 'total', sortable: false, resizable: false},
            {label: translation['deliveryLabel'], hidden: false,
             field: 'delivery', sortable: false, resizable: false},
            timestamp({label: translation['createdTimestampLabel'], field: 'createdTimestamp', sortable: true})
        ],

        renderRow: function (value, options) {
            try {
                var row = this.inherited(arguments);
                switch (value.status) {
                    case 1:
                        domClass.add(row, 'newStatus');
                        break;
                    case 2:
                        domClass.add(row, 'progressStatus');
                        break;
                    case 3:
                        domClass.add(row, 'succeedStatus');
                        break;
                }
                return row;
            } catch (e) {
                 console.error(this.declaredClass, arguments, e);
                 throw e;
            }
        },

        loadingMessage: translation['loadingMessage'],
        noDataMessage: translation['noDataMessage'],

        showHeader: true,
        allowTextSelection: true
    });
});
