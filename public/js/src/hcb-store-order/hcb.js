define([
    "dojo/_base/declare",
    'hc-backend/layout/main/content/package',
    "dojo/i18n!./nls/Package",
    'xstyle/css!./css/order.css'
], function(declare, _Package, translation) {

    return declare("StoreOrderPackage", [ _Package ], {
        title: translation['packageTitle']
    });
});
