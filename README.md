# 創想知識後臺基本資料模板
## 環境需求
1. Laravel > 9.0
1. PHP > 8.1

## 環境配置
1. `vi composer.json`
2. `add`
    ```json
        "repositories": {
            "cpkm/basic-info": {
                "type": "vcs",
                "url": "git@github.com:cpkm-service/basic-info.git"
            }
        }
    ```
3. `composer require cpkm-service/basic-info`
4. `php artisan migrate`

