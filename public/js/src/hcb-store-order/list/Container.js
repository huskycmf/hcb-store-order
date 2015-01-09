define([
    "dojo/_base/declare",
    "dojo/_base/array",
    "dojo/_base/lang",
    "dojo/on",
    'hc-backend/layout/main/content/_ContentMixin',
    "dijit/_TemplatedMixin",
    "dojo/text!./templates/Container.html",
    "dojo/i18n!../nls/Package",
    "dojo/request",
    "hc-backend/router",
    "hcb-store-order/list/widget/Grid",
    "hc-backend/dgrid/form/RefreshSelectedButton",
    "hc-backend/dgrid/form/DeleteSelectedButton"
], function(declare, array, lang, on, _ContentMixin, _TemplatedMixin,
            template, translation, request, router, Grid, RefreshSelectedButton,
            DeleteSelectedButton) {
    return declare('hcb-store-order.list.Container', [ _ContentMixin, _TemplatedMixin ], {
        //  summary:
        //      List container. Contains widgets who responsible for
        //      displaying list of clients.
        templateString: template,

        baseClass: 'storeOrderList',
        
        postCreate: function () {
            try {
                this._gridWidget = new Grid({'class': this.baseClass+'Grid'});
                this._deleteWidget = new DeleteSelectedButton({'label': translation['deleteSelectedButtonLabel'],
                    'target': router.assemble('/delete', {}, true),
                    'name': 'orders',
                    'class': this.baseClass+'Delete',
                    'grid': this._gridWidget});

                this._handleWidget =
                    new RefreshSelectedButton({'label': translation['handleSelectedButtonLabel'],
                    'target': router.assemble('/handle', {}, true),
                    'name': 'orders',
                    'class': this.baseClass+'Handle',
                    'grid': this._gridWidget});

                this._completeWidget =
                    new RefreshSelectedButton({'label': translation['completeSelectedButtonLabel'],
                    'target': router.assemble('/complete', {}, true),
                    'name': 'orders',
                    'class': this.baseClass+'Complete',
                    'grid': this._gridWidget});
            } catch (e) {
                 console.error(this.declaredClass, arguments, e);
                 throw e;
            }
        },

        startup: function () {
            try {
                this.addChild(this._handleWidget);
                this.addChild(this._completeWidget);
                this.addChild(this._deleteWidget);
                this.addChild(this._gridWidget);
                this.inherited(arguments);
            } catch (e) {
                 console.error(this.declaredClass, arguments, e);
                 throw e;
            }
        },

        refresh: function () {
            try {
                this._gridWidget.refresh({keepScrollPosition: true});
            } catch (e) {
                 console.error(this.declaredClass, arguments, e);
                 throw e;
            }
        }
    });
});
