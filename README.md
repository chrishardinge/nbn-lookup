# nbn-finder
A simple package to check NBN availability at a given address.

This is an initial release with minimum functionality, so there will be breaking changes.

Installation via Composer:

``` bash
$ composer require chrishardinge/nbn-lookup
```

Usage
-----

``` php
use ChrisHardinge\NbnLookup\Search;

$search = new Search();
$result = $search->byAddress("Level 40 360 Elizabeth Street, Melbourne Victoria 3000");

```
Below is an example of the data returned. I've used `json_encode($result)` for ease of viewing
``` json
{
    "timestamp": 1538304606287,
    "location": {
        "id": "LOC000047125105",
        "formattedAddress": "L 40 360 ELIZABETH ST MELBOURNE VIC 3000 Australia",
        "latitude": -37.810952,
        "longitude": 144.961931
    },
    "servingArea": {
        "csaId": "CSA300000010316",
        "techType": "FTTC",
        "serviceType": "Fixed line",
        "serviceStatus": "in_construction",
        "serviceCategory": "brownfields",
        "rfsMessage": "Oct-Dec 2018",
        "description": "Exhibition"
    },
    "addressDetail": {
        "id": "LOC000047125105",
        "latitude": -37.810952,
        "longitude": 144.961931,
        "reasonCode": "FTTC_NA",
        "serviceType": "Fixed line",
        "serviceStatus": "in_construction",
        "techType": "FTTC",
        "rfsMessage": "Oct-Dec 2018",
        "formattedAddress": "L 40 360 ELIZABETH ST MELBOURNE VIC 3000 Australia",
        "frustrated": false
    }
}
```
You can get the same results by using
```php
$search->byLocId('LOC000047125105');
```
If there is no detail available from the API, null will be returned.

License
-------

The MIT License (MIT). Please see [LICENSE](LICENSE) for more information.