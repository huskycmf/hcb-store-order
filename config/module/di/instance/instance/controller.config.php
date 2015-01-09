<?php
return array(
    // Order

    'HcbStoreOrder-Controller-Collection-List' => array(
        'parameters' => array(
            'paginatorDataFetchService' => 'HcbStoreOrder-Service-Collection-FetchQbBuilder',
            'viewModel' => 'HcbStoreOrder-Paginator-ViewModel-JsonModel-Order'
        )
    ),

    'HcbStoreOrder-Controller-View' => array(
        'parameters' => array(
            'fetchService' => 'HcbStoreOrder-Service-FetchService',
            'extractor' => 'HcbStoreOrder-Stdlib-Extractor-Resource'
        )
    ),

    'HcbStoreOrder-Controller-Collection-Delete' => array(
        'parameters' => array(
            'inputData' => 'HcbStoreOrder-Data-Collection-Entities-ByIds-Order',
            'serviceCommand' => 'HcbStoreOrder-Service-Collection-Delete',
            'jsonResponseModelFactory' => 'HcbStoreOrder-Json-View-StatusMessageDataModelFactory'
        )
    ),
    'HcbStoreOrder-Controller-Collection-Handle' => array(
        'parameters' => array(
            'inputData' => 'HcbStoreOrder-Data-Collection-Entities-ByIds-Order',
            'serviceCommand' => 'HcbStoreOrder-Service-Collection-Handle',
            'jsonResponseModelFactory' => 'HcbStoreOrder-Json-View-StatusMessageDataModelFactory'
        )
    ),
    'HcbStoreOrder-Controller-Collection-Complete' => array(
        'parameters' => array(
            'inputData' => 'HcbStoreOrder-Data-Collection-Entities-ByIds-Order',
            'serviceCommand' => 'HcbStoreOrder-Service-Collection-Complete',
            'jsonResponseModelFactory' => 'HcbStoreOrder-Json-View-StatusMessageDataModelFactory'
        )
    )
);
