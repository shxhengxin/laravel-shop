<?php
/**
 * pay.php
 * Author: shenhengxin
 * Email: 853043009@qq.com
 * Created on 2018/10/3 17:35
 */
// https://openhome.alipay.com/platform/appDaily.htm?tab=info
//jufvgs2806@sandbox.com  111111
return [
    'alipay' => [
        'app_id'         => '2016102900777544',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwQTWe2i0jN7QUy6WJQlNBBGo+hiV2ApSOWn7E/oWx2T8a2NINYC0k3jNpFCK2qodemzIH7x6qSOtG3ZzmpDNbQkARNrtFs+A7s8YI1asSd1NCZS+a7pEfCE4apGgDC8SvrdYB2s8R2DZIVIh4R0YyNOWVUHtkZ5/TwUoZyBiTXx/3A6lYUR2/ioNCni0lD1k3wEDPaDW2xzc7xidMvibaPt5P/9Ov0KA4jk/mJ/NtEaSi/8PwXisr3/REzAiNENDcNz0VGjWC/R0+kqp60oRnBC28PhlKv9gaDBTz1giem2LJjYGPTDCmqQxMLRy7YmhV5ZDjeHzh8VhzNL8KX5B9wIDAQAB',
        'private_key'    => 'MIIEpAIBAAKCAQEAuSkkM3qEw74kX8NOVyD7bP5uHbwI/zfiKQawgfzLS2sTvjtxTsDYn9/fUs4Mj6k9pAqqFTbOM1tAsrTp+LvIGwp0hMvos8h9ap2Crnl6Ug8xY/72SB/9TTx2sgWz092iDTGRQiFxlkKMcm9mQ2j5aT86e+7VbTwmkfiKoa46elR3CoEA4wam7hRUCJ2UBwm84DazsaJZ35ryymqjpOFr1gmaPJU4i/YwiILbeG1TZYGxxAVKZaDyHPlBQviJfblBB6L5qwpRP0pg1YIYFftCdr0C57ezRWJYHoD/Xla83giH5y9pjG3Ns9wvh5zC0C9SeRkb7uRJAQ5BsmpiT8z21wIDAQABAoIBADyRhrQIOfHF+yQQQUojEdvfhqnXXqIN578/3vFGfkHXbwflbfUzBCmYE/eES3ubAvzsOCLkYKNQEGPk5jxlQNoHm4HtKdvVk6ESkTL9rdO2AJQTTQDe5f8j7jfhwadmcqIaOsgFJKDgeAze//bBGgUhl8H+qHYpHPzW7pJg6eQlumQfO5W+xYIx+MWwUueDcfjpH1KSSdLrhlXOPjNmwQwQyxWoGA8LKvPuov7ZuFRkLu4Rg1Dd/AegkC7b1AKJrjoDNKxL1GZKIyRNMp5f1Iv8F1T6hMM2826iM4qH0RfllZpZYJ/v30/zS/XrcjjmWL+fBtOIS9UXZZxNevXExWECgYEA6HvrQNCc4gMZ6JJFEO1ilkgau/sNrRZ6RThBsgToMB0e3lezqDJK3d8VfsAXWsaQczHD/kLBLfBMqJwNaNFTHRZPGA5eZJSATccbQo2be+zUwPUcSqi7KRGp8gRPwLdhusq34wY/WhS46YpgQv6QFhXLg1hjg4L0WMkxU7+PoZkCgYEAy+PNqdlmjc8EgrpsLznFapuz1fJQ/H355rTnDRIM6Eoys/vFSj2Xnp61bfIZjrL/cF0uoN4yCCxtpLhB3BPc8sWIiOSsG3PBxR8RXtD4+Q2W673mQrBudFC4K2lR6O3BLH//sZfTLjJFyP7waCuzhEBv1rNQ8RYHcKQFdHTfge8CgYBnz22s83oaMehPwYC1nkp3cJr/dYsVzwOqBQTQyQAk+9vczKycXliv2f1vK7dCAYhe58nsr0IzkSmp4ITcWRwT0PJge4oKv4TLNi0l+rWDEK2vu8N2UwG/xPNt7h7unvQ0xHB4H0IKp1Yqcm+peqI8Ol81tzI4dzFEtBIio1cvgQKBgQCYmDj/arcHYS22DYIUYj9vR3Lzp7SXFE2pLjFSpfTFEWsbK05//tLwI0YUMEKSe0MUPJk+Sq3VUjMJOeIIrVEK3W4PTl3E+gDG4Dam6O29sD8I1opz1QoFwbfkvaFRHEgcXvvmVYP3KibyhGM3A6YKUBOj83abyOnuksOGYkY5PwKBgQDEu177qWnV+mLVQFzTNngVFdXoo0rlUmOceScmEm5K7Yx4b4WvfQPNlBRSdnI+xOzkC5tOQpoFUl3fKnHgvgeefTpqoh2ldJeW/RCUW0iH/6c3Nf4DKPp6/B64+ttg4Gv421EbwU3U2FUBYGPEgC8ouP1pIxBQ8FrIrMaowkrInw==',
        'mode'           => 'dev',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];