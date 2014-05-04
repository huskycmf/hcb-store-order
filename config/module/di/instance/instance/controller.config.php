<?php
return array(
    // Order

    'HcbStoreOrder-Controller-Collection-List' => array(
        'parameters' => array(
            'paginatorDataFetchService' => 'HcbStoreOrder-Service-Collection-FetchQbBuilder',
            'viewModel' => 'HcbStoreOrder-Paginator-ViewModel-JsonModel-Order'
        )
    ),

    'HcbStoreOrder-Controller-Collection-Delete' => array(
        'parameters' => array(
            'inputData' => 'HcbStoreOrder-Data-Collection-Entities-ByIds-Order',
            'serviceCommand' => 'HcbStoreOrder-Service-Collection-Delete',
            'jsonResponseModelFactory' => 'HcbStoreOrder-Json-View-StatusMessageDataModelFactory'
        )
    )
);
